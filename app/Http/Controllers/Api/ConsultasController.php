<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\District;
use App\Province;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\Else_;

class ConsultasController extends Controller
{
    public function getGuias()
    {
        $querys = \DB::table('warehouses')
            ->leftJoin('users', 'users.id', '=', 'warehouses.received_by')
            ->select('warehouses.*', DB::raw('CONCAT(users.surname, " ", users.name) AS full_name'))
            ->get();
        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    //Para Administradores
    public function getVisitas()
    {
        $querys = \DB::table('clients')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'clients.status')
            ->leftJoin('user_relations', 'user_relations.user', '=', 'clients.regis_por')
            ->leftJoin('users as b', 'b.id', '=', 'clients.regis_por')
            ->select(
                'clients.*',
                'b.address AS lugar',
                DB::raw('CONCAT(b.surname, " ", b.name) AS asesor')
            )
            ->where('clients.status', 1)
            ->whereMonth('clients.created_at',Carbon::now()->month)->whereYear('clients.created_at',Carbon::now()->year)
            ->get();
        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getContracts()
    {
        $fromDate = Carbon::now()->subYear(4)->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->endOfMonth()->toDateString();

        $querys = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('warehouse_pockets as w', 'w.serie', '=', 'contracts.serie')
            ->leftJoin('brands as br', 'br.id', '=', 'w.brand')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.precio as precio',
                'contracts.serie',
                'br.name as tipo',
                'a.address AS lugar',
                'contracts.orden',
                DB::raw("DATE_FORMAT(contracts.created_at, '%Y/%m/%d') as fecha"),
                'client_statuses.name as status',
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('c.status', 2)
            ->whereMonth('contracts.created_at',Carbon::now()->month)->whereYear('contracts.created_at',Carbon::now()->year)
            //->whereBetween('contracts.created_at', [$fromDate,$tillDate])
            ->get();
        foreach ($querys as $q) {
            if (is_null($q->tipo)) {
                $q->tipo = "POS";
            }
        }
        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getPos()
    {
        $querys = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('warehouse_pockets as w', 'w.serie', '=', 'contracts.serie')
            ->leftJoin('brands as br', 'br.id', '=', 'w.brand')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.serie',
                'contracts.estado_llamada',
                'contracts.comentario',
                'br.name as tipo',
                'contracts.orden',
                DB::raw("DATE_FORMAT(contracts.created_at, '%Y/%m/%d') as fecha"),
                DB::raw("DATE_FORMAT(contracts.fecha_llamada, '%Y/%m/%d') as llamada"),
                'client_statuses.name as status',
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('contracts.modelpocket', 2)
            ->where('contracts.estado_llamada', '<>', 2)
            ->where('c.status', 2)
            ->whereMonth('c.created_at', Carbon::now()->month)
            ->whereYear('c.created_at', Carbon::now()->year)
            ->get();
        foreach ($querys as $q) {
            if (is_null($q->tipo)) {
                $q->tipo = "POS";
            }
        }

        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getPosInsta()
    {
        $querys = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('warehouse_pockets as w', 'w.serie', '=', 'contracts.serie')
            ->leftJoin('brands as br', 'br.id', '=', 'w.brand')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.serie',
                'contracts.estado_llamada',
                'contracts.comentario',
                'br.name as tipo',
                'contracts.orden',
                DB::raw("DATE_FORMAT(contracts.created_at, '%Y/%m/%d') as fecha"),
                DB::raw("DATE_FORMAT(contracts.fecha_llamada, '%Y/%m/%d') as llamada"),
                'client_statuses.name as status',
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('contracts.modelpocket', 2)
            ->where('contracts.estado_llamada', '=', 2)
            ->whereMonth('contracts.created_at', Carbon::now()->month)
            ->whereYear('contracts.created_at', Carbon::now()->year)
            ->where('c.status', 2)
            ->get();
        foreach ($querys as $q) {
            if (is_null($q->tipo)) {
                $q->tipo = "POS";
            }
        }

        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    //Para Vendedores
    public function getVisitasSell($id)
    {
        $querys = \DB::table('clients')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'clients.status')
            ->select('clients.*')
            ->where('regis_por', $id)
            ->where('clients.status', 1)
            ->whereMonth('clients.created_at', Carbon::now()->month)
            ->whereYear('clients.created_at', Carbon::now()->year)
            ->get();
        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getVisitasSuper($id)
    {
        $querys = \DB::table('clients')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'clients.status')
            ->leftJoin('user_relations', 'user_relations.user', '=', 'clients.regis_por')
            ->leftJoin('users as a', 'a.id', '=', 'clients.regis_por')
            ->select(
                'clients.*',
                DB::raw('CONCAT(a.surname, " ", a.name) AS vendedor')
            )
            ->where('user_relations.supervisor', $id)
            ->where('clients.status', 1)
            ->whereMonth('clients.created_at', Carbon::now()->month)
            ->whereYear('clients.created_at', Carbon::now()->year)
            ->get();
        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }


    public function getContratosSell($id)
    {
        $querys = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.serie',
                'contracts.orden',
                'client_statuses.name as status',
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('vend_por', $id)
            ->whereMonth('contracts.created_at', '>=', Carbon::now()->month - 1)
            ->whereYear('contracts.created_at', Carbon::now()->year)
            ->get();
        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }


    //Para Vendedores
    public function getVisitasSup($id)
    {
        $querys = \DB::table('clients')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'clients.status')
            ->leftJoin('contracts', 'contracts.id', '=', 'clients.vend_por')
            ->select('clients.*', 'client_statuses.name')
            ->where('contracts.supervisor_seller', $id)
            ->where('clients.status', 1)
            ->whereMonth('clients.created_at', Carbon::now()->month)
            ->whereYear('clients.created_at', Carbon::now()->year)
            ->get();
        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getContratosSup($id)
    {
        $querys = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('model_pockets as p', 'p.id', '=', 'contracts.modelpocket')
            ->leftJoin('brands as br', 'br.id', '=', 'contracts.brand')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.*',
                'p.name as pok',
                'br.name as marca',
                'client_statuses.name as status',
                DB::raw("DATE_FORMAT(contracts.created_at, '%Y/%m/%d') as fecha"),
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('contracts.supervisor_seller', $id)
            ->whereMonth('contracts.created_at', '>=', Carbon::now()->month - 1)
            ->whereYear('contracts.created_at', Carbon::now()->year)
            ->where('c.status', 2)
            ->get();

        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getLiquidacionSup($id)
    {
        $querys = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('model_pockets as p', 'p.id', '=', 'contracts.modelpocket')
            ->leftJoin('brands as br', 'br.id', '=', 'contracts.brand')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.*',
                'p.name as pok',
                'br.name as marca',
                'client_statuses.name as status',
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('contracts.supervisor_seller', $id)
            ->where('c.status', 2)
            ->whereNull('contracts.pagado')
            ->where('contracts.modelpocket', 1)
            ->get();

        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getLiquidacion()
    {
        $querys = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('model_pockets as p', 'p.id', '=', 'contracts.modelpocket')
            ->leftJoin('brands as br', 'br.id', '=', 'contracts.brand')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.*',
                'p.name as pok',
                'br.name as marca',
                'client_statuses.name as status',
                DB::raw("DATE_FORMAT(contracts.created_at, '%Y/%m/%d') as fecha"),
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('c.status', 2)
            ->whereNull('contracts.pagado')
            ->where('contracts.modelpocket', 1)
            ->get();

        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getUsuarios()
    {
        $querys = \DB::table('users')
        ->leftJoin('user_relations as ur', 'ur.user', '=', 'users.id')
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
        ->select(
            'users.id as iduser',
            'users.*',
            'roles.description as roles'
        )
        ->where('roles.id',1)
        ->where('users.active',1)
        ->groupBy('iduser')
        ->get();

        foreach ($querys as $q) {
            if ($q->active == 1) {
                $q->active = "ACTIVO";
            } else {
                $q->active = "DE BAJA";
            }
        }
        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getUsuariosSuper($id)
    {
        $querys = \DB::table('users')
        ->leftJoin('user_relations as ur', 'ur.user', '=', 'users.id')
        ->select('users.id as iduser', 'users.*')
        ->where('ur.supervisor', $id)->where('users.active', 1)
        ->get();

        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getCarpetasSup($id)
    {
        $querys = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('model_pockets as p', 'p.id', '=', 'contracts.modelpocket')
            ->leftJoin('brands as br', 'br.id', '=', 'contracts.brand')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.*',
                'p.name as pok',
                'br.name as marca',
                'client_statuses.name as status',
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('contracts.supervisor_seller', $id)
            ->where('c.status', 2)
            ->where('contracts.modelpocket', 2)
            ->get();

        //print_r($querys);
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function buscaProvincia($id)
    {
        return Province::where('departament', $id)->get();
    }

    public function buscaDistrito($id)
    {
        return District::where('province', $id)->get();
    }


    public function getPocket($id)
    {
        $querys = \DB::table('warehouse_pockets')
            ->leftJoin('warehouses', 'warehouses.id', '=', 'warehouse_pockets.guide')
            ->leftJoin('brands', 'brands.id', '=', 'warehouse_pockets.brand')
            ->select('warehouse_pockets.*', 'warehouses.guide as guia', 'brands.name as marca')
            ->where('warehouse_pockets.guide', '=', $id)
            ->get();
        //print_r($querys);
        $datatable = DataTables::of($querys)
            ->addColumn('action', function ($query) {
                return '<div style="text-align:center"><a class="btn btn-xs btn-danger delete" id="' . $query->id . '"><i class="fa fa-trash" style="
                color: white;"></i></a></div>';
            })
            ->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getLiquidacionD()
    {
        $querys = \DB::table('users as a')
        ->leftJoin('role_user', 'a.id', '=', 'role_user.user_id')
        ->select(
            'a.address AS lugar'
        )
        ->where('role_user.role_id', '3')->where('a.active', '1')->whereNotIn('a.address', ['CUZCO','LIMA'])
        ->groupBy('lugar')
            ->get();

        $querys2 = \DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('model_pockets as p', 'p.id', '=', 'contracts.modelpocket')
            ->leftJoin('brands as br', 'br.id', '=', 'contracts.brand')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.*',
                'p.name as pok',
                'br.name as marca',
                'a.address AS lugar',
                'client_statuses.name as status',
                DB::raw("DATE_FORMAT(contracts.created_at, '%Y/%m/%d') as fecha"),
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw("SUM(contracts.precio) as precio"),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('c.status', 2)
            ->whereNull('contracts.pagado')
            ->where('contracts.modelpocket', 1)
            ->groupBy('lugar')
            ->get();
        foreach ($querys as $q) {
            $q->precio = 0;
            foreach ($querys2 as $q2) {
                if ($q->lugar == $q2->lugar) {
                    $q->precio = $q2->precio;
                }
            }
        }
        /* echo'<pre>';
         print_r($querys);
         die();*/
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }


    public function getVisitasV()
    {
        $visitas = \DB::table('clients')
        ->leftJoin('client_statuses', 'client_statuses.id', '=', 'clients.status')
        ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
        ->leftJoin('contracts', 'contracts.id', '=', 'clients.vend_por')
        ->select(
            'clients.*',
            'clients.created_at as fecha',
            DB::raw('COUNT(clients.id) AS total'),
            'client_statuses.name'
        )
        ->where('clients.status', 1)
        ->whereMonth('clients.created_at', Carbon::now()->month)
        ->whereYear('clients.created_at', Carbon::now()->year)
        ->groupBy('fecha', 'regis_por')
        ->get();

        echo'<pre>';
        print_r($visitas);
        die();
        $datatable = DataTables::of($visitas)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function getWare()
    {
        $querys = \DB::table('users as a')
        ->leftJoin('role_user', 'a.id', '=', 'role_user.user_id')
        ->select(
            'a.address AS lugar'
        )
        ->where('role_user.role_id', '3')->where('a.active', '1')
        ->groupBy('lugar')
        ->get();

        $jr = \DB::table('warehouse_pockets')
        ->leftJoin('users', 'users.id', '=', 'warehouse_pockets.assigned_to')
        ->select(
            DB::raw('COUNT(warehouse_pockets.id) AS total'),
            'users.address AS lugar'
        )
        ->where('warehouse_pockets.brand', 2)
        ->where('warehouse_pockets.type',2)
        ->groupBy('lugar')
        ->get();

        $pro = \DB::table('warehouse_pockets')
        ->leftJoin('users', 'users.id', '=', 'warehouse_pockets.assigned_to')
        ->select(
            DB::raw('COUNT(warehouse_pockets.id) AS total'),
            'users.address AS lugar'
        )
        ->where('warehouse_pockets.brand', 1)
        ->where('warehouse_pockets.type',2)
        ->groupBy('lugar')
        ->get();

        $full = \DB::table('warehouse_pockets')
        ->leftJoin('users', 'users.id', '=', 'warehouse_pockets.assigned_to')
        ->select(
            DB::raw('COUNT(warehouse_pockets.id) AS total'),
            'users.address AS lugar'
        )
        ->where('warehouse_pockets.brand', 3)
        ->where('warehouse_pockets.type',2)
        ->groupBy('lugar')
        ->get();


        foreach ($querys as $q) {
            $q->totjr = 0;
            $q->totpro = 0;
            $q->totfull = 0;
        }

        foreach ($querys as $q) {
            foreach ($jr as $j) {
                if ($q->lugar == $j->lugar) {
                    $q->totjr = $j->total;
                }
            }

            foreach ($pro as $p) {
                if ($q->lugar == $p->lugar) {
                    $q->totpro = $p->total;
                }
            }

            foreach ($full as $f) {
                if ($q->lugar == $f->lugar) {
                    $q->totfull = $f->total;
                }
            }
        }
        /*
        echo'<pre>';
        print_r($querys);
        die();
        */
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
