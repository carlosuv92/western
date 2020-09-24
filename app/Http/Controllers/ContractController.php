<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDocument;
use App\Contract;
use App\Department;
use App\ClientContract;
use App\Departamento;
use App\TypeServices;
use App\User;
use App\UserRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContractController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = DB::table('users')
            ->leftJoin('user_relations as ur', 'ur.user', '=', 'users.id')
            ->leftJoin('role_user as ru', 'ru.user_id', '=', 'users.id')
            ->select('users.id as iduser', DB::raw('CONCAT(users.surname, " ", users.name) AS vendedor'))
            ->whereIn('ru.role_id', [2, 3])
            ->orderBy('vendedor')
            ->get();

        return view('admin.contract.index', [
            'sellers' => $sellers,
            'title' => 'Contratos',
            'breadcrumb' => 'crud'
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents  = ClientDocument::all();
        $departments  = Department::whereNotIn('id',[1])->get();
        $services =  TypeServices::all();
        $v_departments = Departamento::whereIn('id', [13, 14, 20])->get();
        $sellers = User::whereHas('roles', function ($q) {
            $q->where('name', 'seller');
        })->orderBy('surname', 'asc')->where('active', 1)->get();

        return view('admin.contract.create', [
            'departments' => $departments,
            'documents' => $documents,
            'sellers' => $sellers,
            'services' => $services,
            'v_departments' => $v_departments,
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
        DB::beginTransaction();
        try {
            $client = Client::where('document', request('document'))->first();
            if ($client) {
                $client->status = 2;
                $client->save();
            } else {

                $client = new Client();

                $client->status = 2;
                $client->name = request('razon_social');
                $client->user_document = request('doc');
                $client->document = request('document');
                $client->ruc = request('ruc');
                $client->giro = request('giro');
                $client->negocio = request('negocio');
                $client->phone = request('phone');
                $client->cellphone = request('cellphone');
                $client->address = request('address');
                $client->lead_by = request('seller');
                $client->department = request('department');
                $client->cli_department = request('cli_department');
                $client->cli_district = request('cli_district');
                $client->cli_province = request('cli_province');
                $client->fech_nac = request('fech_nac');
                $client->fech_venc = request('fech_venc');
                $client->estado_civil = request('estado_civil');


                $client->razon_social = request('razon_social');
                $client->negocio = request('negocio');
                $client->tipo_local = request('tipo_local');
                $client->ant_sunat = request('ant_sunat');
                $client->neg_direccion = request('neg_direccion');
                $client->neg_department = request('neg_department');
                $client->neg_district = request('neg_district');
                $client->neg_province = request('neg_province');
                $client->referencia = request('referencia');
                $client->geo = request('geo');
                $client->neg_correo = request('neg_correo');

                if ($client->estado_civil == 2) {
                    $client->cony_nom = request('cony_nom');
                    $client->cony_direccion = request('cony_direccion');
                    $client->cony_department = request('cony_department');
                    $client->cony_district = request('cony_district');
                    $client->cony_province = request('cony_province');
                    $client->cony_correo = request('cony_correo');
                    $client->cony_cellphone = request('cony_cellphone');
                    $client->cony_dni = request('cony_dni');
                    $client->cony_fech_nac = request('cony_fech_nac');
                }
                $client->save();
            }

            $contract = new Contract();
            $contract->status = 1;
            $contract->back_office = \Auth::id();
            $contract->type_service = 1;
            $contract->seller = request('seller');
            $contract->department = request('department');
            $contract->supervisor_seller = UserRelation::where('user', $contract->seller)->first()->supervisor;
            $contract->save();

            $generateContract = new ClientContract();
            $generateContract->client_id = $client->id;
            $generateContract->contract_id = $contract->id;
            $generateContract->save();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw $ex;
        }

        return Redirect::route('contract.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
