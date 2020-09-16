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
    public function getProspect()
    {
        $querys = \DB::table('clients')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'clients.status')
            ->leftJoin('user_relations', 'user_relations.user', '=', 'clients.lead_by')
            ->leftJoin('departments', 'departments.id', '=', 'clients.department')
            ->leftJoin('users as b', 'b.id', '=', 'clients.lead_by')
            ->select(
                'clients.*',
                'departments.name AS department',
                DB::raw('CONCAT(b.surname, " ", b.name) AS seller')
            )
            ->where('clients.status', 1)
            ->whereMonth('clients.created_at', Carbon::now()->month)->whereYear('clients.created_at', Carbon::now()->year)
            ->get();
        $datatable = DataTables::of($querys)->make(true);
        return $datatable;
    }

    public function getContracts()
    {
        $querys = \DB::table('contracts')
            ->leftJoin('type_services as ts', 'ts.id', '=', 'contracts.type_service')
            ->leftJoin('client_contract as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->select(
                'c.*',
                'contracts.id as idcont',
                'contracts.department as department',
                'contracts.department as department',
                'ts.name as tipo',
                DB::raw("DATE_FORMAT(contracts.created_at, '%Y/%m/%d') as fecha"),
                DB::raw('CONCAT(a.surname, " ", a.name) AS super'),
                DB::raw('CONCAT(b.surname, " ", b.name) AS vendedor')
            )
            ->where('c.status', 2)
            ->whereMonth('c.created_at', Carbon::now()->month)->whereYear('c.created_at', Carbon::now()->year)
            ->get();
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
                DB::raw('CONCAT(b.surname, " ", b.name) AS seller')
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
            ->where('users.active', 1)
            ->orWhere('roles.id', 1)
            ->groupBy('iduser')
            ->get();

        foreach ($querys as $q) {
            if ($q->active == 1) {
                $q->active = "ACTIVO";
            } else {
                $q->active = "DE BAJA";
            }
        }
        $datatable = DataTables::of($querys)->make(true);
        return $datatable;
    }
}
