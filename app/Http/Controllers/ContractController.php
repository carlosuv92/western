<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDocument;
use App\Contract;
use App\Department;
use App\ClientContract;
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
        $departments  = Department::all();
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
                $client->name = request('name');
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
                $client->save();
            }

            $contract = new Contract();
            $contract->status = 1;
            $contract->back_office = \Auth::id();
            $contract->type_service = request('service');
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
