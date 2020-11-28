<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDocument;
use App\Contract;
use App\ClientContract;
use App\Department;
use App\TypeServices;
use App\User;
use App\Local;
use App\Conyuge;
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
        $departments = Department::where('status',1)->get();
        $services =  TypeServices::all();
        $sellers = User::whereHas('roles', function ($q) {
            $q->where('name', 'seller');
        })->orderBy('surname', 'asc')->where('active', 1)->get();

        return view('admin.contract.create', [
            'departments' => $departments,
            'documents' => $documents,
            'sellers' => $sellers,
            'services' => $services,
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
                $client->name = request('rrll_name');
                $client->user_document = 1;
                $client->document = request('rrll_document');
                $client->cellphone = request('rrll_phone');
                $client->address = request('rrll_address');
                $client->lead_by = request('seller');
                $client->department = request('rrll_department');
                $client->district = request('rrll_district');
                $client->province = request('rrll_province');
                $client->dob = request('rrll_fech_nac');
                $client->status_civil = request('rrll_estado_civil');
                $client->email = request('rrll_correo');
                $client->save();
            }
            //Local

            $local = new Local();

            $local->client = $client->id;
            $local->ruc = request('ruc');
            $local->name = request('negocio');
            $local->socname = request('razon_social');
            $local->ant_negocio = request('antique');
            $local->giro = request('giro');
            $local->department = request('neg_department');
            $local->province = request('neg_province');
            $local->district = request('neg_district');
            $local->address = request('neg_direccion');
            $local->reference = request('neg_reference');
            $local->phone = request('neg_phone');
            $local->email = request('neg_correo');
            $local->geo = request('geo');
            $local->type_local = request('type_local');
            $local->inscription = request('inscription');
            $local->postal = request('cod_postal');
            $local->save();

            if ($client->status_civil == 2) {
                $cony = new Conyuge();
                $cony->client = $client->id;
                $cony->name = request('cony_name');
                $cony->user_document = 1;
                $cony->document = request('cony_document');
                $cony->cellphone = request('cony_phone');
                $cony->address = request('cony_address');
                $cony->department = request('cony_department');
                $cony->district = request('cony_district');
                $cony->province = request('cony_province');
                $cony->dob = request('cony_fech_nac');
                $cony->status_civil = request('cony_estado_civil');
                $cony->email = request('cony_correo');
                $cony->save();
            }

            $contract = new Contract();
            $contract->status = 1;
            $contract->back_office = \Auth::id();
            $contract->created_at = request('created_at');
            $contract->type_service = 1;
            $contract->seller = request('seller');
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
