<?php

namespace App\Http\Controllers;

use App\Contract;
use App\RoleUser;
use App\User;
use App\UserRelation;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SuperController extends Controller
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

        $request->user()->authorizeRoles(['user', 'super']);
        //data de ventas
        $contratos_pos = Contract::where('supervisor_seller', \Auth::user()->id)->where('modelpocket', 2)->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->count();
        $enviado_pos = Contract::where('supervisor_seller', \Auth::user()->id)->where('modelpocket', 2)->where('folder', 5)->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->count();
        $contratos_pend = $contratos_pos - $enviado_pos;

        $querys =  \DB::table('users')
            ->leftJoin('contracts', 'users.id', '=', 'contracts.seller')
            ->leftJoin('districts', 'districts.id', '=', 'users.district')
            ->select(
                DB::raw('CONCAT(users.surname, ", ", users.name) AS full_name'),
                'users.id as idsup',
                'districts.name as zona',
                DB::raw("count(contracts.seller) AS total")
            )
            ->groupBy('users.id', 'full_name')
            ->whereIn('contracts.status', ['1'])
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->where('contracts.supervisor_seller', \Auth::user()->id)
            ->orderBy('total', 'DESC')
            ->take(5)->get();

        $contracts_days =  \DB::table('users')
            ->leftJoin('contracts', 'users.id', '=', 'contracts.seller')
            ->leftJoin('districts', 'districts.id', '=', 'users.district')
            ->select(
                DB::raw('CONCAT(users.surname, ", ", users.name) AS full_name'),
                'users.id as idsup',
                'districts.name as zona',
                DB::raw("count(contracts.seller) AS total")
            )
            ->groupBy('users.id', 'full_name')
            ->whereIn('contracts.status', ['1'])
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->whereDay('contracts.created_at', '=', Carbon::now()->day)
            ->where('contracts.supervisor_seller', \Auth::user()->id)
            ->orderBy('total', 'DESC')
            ->take(5)->get();

        foreach ($querys as $q) {
            $q->suma = 0;
        }
        foreach ($contracts_days as $c) {
            foreach ($querys as $query) {
                if ($query->idsup == $c->idsup) {
                    $query->suma = $c->total;
                }
            }
        }
        $total['jr'] = Contract::whereModelpocket(1)->whereBrand(2)->where('supervisor_seller', \Auth::user()->id)->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->count();
        $total['full'] = Contract::whereModelpocket(1)->whereBrand(3)->where('supervisor_seller', \Auth::user()->id)->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->count();
        $total['pro'] = Contract::whereModelpocket(1)->whereBrand(1)->where('supervisor_seller', \Auth::user()->id)->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->count();
        $total['pos'] = Contract::whereModelpocket(2)->where('supervisor_seller', \Auth::user()->id)->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->count();
        $total['otros'] = $total['full']+Contract::whereModelpocket(3)->orWhere('modelpocket', 4)->where('supervisor_seller', \Auth::user()->id)->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->count();
        $total['all'] = $total['jr'] + $total['pro'] + $total['pos'] + $total['otros'];

        $cash_pre = DB::table('contracts')
            ->where('serie', 'like', '2700%')
            ->where('supervisor_seller', \Auth::user()->id)
            ->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)
            ->sum('precio');
        $cash_pro = DB::table('contracts')
            ->where('serie', 'like', '12%')
            ->where('supervisor_seller', \Auth::user()->id)
            ->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)
            ->sum('precio');


        $a_liqui = DB::table('contracts')
            ->whereNull('pagado')
            ->where('supervisor_seller', \Auth::user()->id)
            ->whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)
            ->sum('precio');

        return view('dashboard.supervisor', [
            'contratos_pend' => $contratos_pend,
            'contratos_pos' => $contratos_pos,
            'enviado_pos' => $enviado_pos,
            'a_liqui' => $a_liqui,
            'cash_pre' => $cash_pre,
            'cash_pro' => $cash_pro,
            'querys' => $querys,
            'total' => $total,
            'title' => 'Dashboard General',
            'breadcrumb' => 'supervisor'
        ]);
    }
}
