<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Client;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Contract;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        $contratos['mes'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '2')
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->groupBy('departments.name')
            ->get();

        $contratos['dia'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '2')->whereDay('clients.created_at', '=', Carbon::now()->day)
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->groupBy('departments.name')
            ->get();

        /*PROSPECTOS*/
        //SELECT d.name, count(w.id) FROM departments d left join clients w on  d.id =w.department and w.status=1 group by 1;

        $prospectos['mes'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '1')
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->groupBy('departments.name')
            ->get();

        $prospectos['dia'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '1')->whereDay('clients.created_at', '=', Carbon::now()->day)
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->groupBy('departments.name')
            ->get();


        return view('dashboard.principal', [
            'contratos' => $contratos,
            'prospectos' => $prospectos,
            'title' => 'Dashboard',
            'breadcrumb' => 'admin'
        ]);
    }


    public function getSalesTotal()
    {
        $querys =  \DB::table('users')
            ->leftJoin('contracts', 'users.id', '=', 'contracts.seller')
            ->leftJoin('districts', 'districts.id', '=', 'users.district')
            ->select(
                DB::raw('CONCAT(users.surname, ", ", users.name) AS full_name'),
                'users.id as idsup',
                'districts.name',
                DB::raw("count(contracts.seller) AS total")
            )
            ->groupBy('users.id', 'full_name')
            ->whereIn('contracts.status', ['1'])
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->take(5)->get();

        $contracts_days =  \DB::table('users')
            ->leftJoin('contracts', 'users.id', '=', 'contracts.seller')
            ->leftJoin('districts', 'districts.id', '=', 'users.district')
            ->select(
                DB::raw('CONCAT(users.surname, ", ", users.name) AS full_name'),
                'users.id as idsup',
                'districts.name',
                DB::raw("count(contracts.seller) AS total")
            )
            ->groupBy('users.id', 'full_name')
            ->whereIn('contracts.status', ['1'])
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->whereDay('contracts.created_at', '=', Carbon::now()->day)
            ->take(5)->get();

        $querys->suma = 0;
        foreach ($contracts_days as $c) {
            foreach ($querys as $query) {
                if ($query->idsup == $c->idsup) {
                    $query->suma = $c->total;
                }
            }
        }
        //print_r($querys);die();
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function actualizaPrecio(Request $request)
    {
        $precio_pro = Brand::whereId(1)->first();
        $precio_pre = Brand::whereId(2)->first();
        $precio_full = Brand::whereId(3)->first();

        $precio_pro->precio = request('pro');
        $precio_pro->save();
        $precio_pre->precio = request('jr');
        $precio_pre->save();
        $precio_full->precio = request('full');
        $precio_full->save();

        $pro = Contract::whereBrand(1)
            ->whereBetween('created_at', [request('ini'), request('fin')])->get();
        $pre = Contract::whereBrand(2)
            ->whereBetween('created_at', [request('ini'), request('fin')])->get();
        $full = Contract::whereBrand(3)
            ->whereBetween('created_at', [request('ini'), request('fin')])->get();

        foreach ($pro as $p) {
            $p->precio = $precio_pro->precio;
            $p->save();
        }
        foreach ($pre as $p) {
            $p->precio = $precio_pre->precio;
            $p->save();
        }
        foreach ($full as $p) {
            if (substr($p->ruc, 0, 2) === '10') {
                $p->precio =  $precio_full->precio - 30;
            } elseif (substr($p->ruc, 0, 2) === '20') {
                $p->precio =  $precio_full->precio - 200;
            } else {
                $p->precio =  $precio_full->precio;
            }
            $p->save();
        }
        return redirect()->route('home');
    }
}
