<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Department;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AddSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospectos['mes'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '1')
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->whereNotIn('departments.name', ["LIMA"])
            ->groupBy('departments.name')->orderBy('total', 'desc')
            ->get();

        $prospectos['dia'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '1')
                    ->whereDay('clients.created_at', '=', Carbon::now()->day)
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->whereNotIn('departments.name', ["LIMA"])
            ->groupBy('departments.name')->orderBy('total', 'desc')
            ->get();


        $cant['fecha'] = DB::select("SELECT count(CAST(c.created_at AS DATE)) as total,
                                                    CAST(c.created_at AS DATE) as fecha FROM clients c
                                    where status=1 GROUP by fecha");
        $cant['prioridad_mi'] = DB::select("SELECT count(CAST(c.created_at AS DATE)) as total,
                                                    CAST(c.created_at AS DATE) as fecha FROM clients c
                                            where status = 1 and priority=2 GROUP by fecha");

        $cant['prioridad_i'] = DB::select("SELECT count(CAST(c.created_at AS DATE)) as total,
                                                            CAST(c.created_at AS DATE) as fecha FROM clients c
                                            where status = 1 and priority=1 GROUP by fecha");

        foreach ($cant['fecha'] as $cantidad) {
            $cantidad->pr_mi = 0;
            $cantidad->pr_i = 0;
            foreach ($cant['prioridad_mi'] as $pr_mi) {
                if ($pr_mi->fecha === $cantidad->fecha)
                    $cantidad->pr_mi = $pr_mi->total;
            }

            foreach ($cant['prioridad_i'] as $pr_i) {
                if ($pr_i->fecha === $cantidad->fecha)
                    $cantidad->pr_i = $pr_i->total;
            }
        }
        return view('dashboard.prospect', [
            'prospectos' => $prospectos,
            'cant' => $cant,
            'title' => 'Prospectos',
            'breadcrumb' => 'admin'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments  = Department::all();

        $sellers = User::whereHas('roles', function ($q) {
            $q->where('name', 'seller');
        })->orderBy('surname', 'asc')->where('active', 1)->get();

        return view('sales.prospect.create', [
            'departments' => $departments,
            'sellers' => $sellers,
            'title' => 'Contrato',
            'breadcrumb' => 'crear'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'phone' => 'min:5|max:7',
            'cellphone' => 'min:9|max:9',
        ];
        $customMessages = [
            'min' => 'Cuidado!! el campo :attribute debe tener minimo :min digitos',
            'max' => 'Cuidado!! el campo :attribute debe tener maximo :max digitos',
        ];

        $request->validate($rules, $customMessages);

        DB::beginTransaction();
        try {

            $client = new Client();

            $client->status = 1;
            $client->name = request('name');
            $client->phone = request('phone');
            $client->cellphone = request('cellphone');
            $client->department = request('department');
            $client->priority = request('priority');
            $client->address = request('address');
            $client->lead_by = request('seller');
            $client->save();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw $ex;
        }

        return redirect()->back()->with('success', 'PROSPECTO GENERADO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSeller($id)
    {
        return DB::table('users')
            ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->select('users.*')
            ->where('role_user.role_id', 3)->where('users.department', $id)
            ->get();
    }
}
