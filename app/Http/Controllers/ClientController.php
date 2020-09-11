<?php

namespace App\Http\Controllers;

use App\Client;
use App\Department;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
        return view('admin.prospect.index', [
            'title' => 'Prospecto',
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
        $departments  = Department::all();
        $user  = User::where('id', \Auth::user()->id)->first();

        $sellers = User::whereHas('roles', function ($q) {
            $q->where('name', 'seller');
        })->orderBy('surname', 'asc')->where('active', 1)->get();

        return view('admin.prospect.create', [
            'departments' => $departments,
            'user' => $user,
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
        $buscar_cliente = Client::where('document', request('document'))->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->first();
        if ($buscar_cliente) {
            return view('layouts.error', [
                'url' => "javascript:history.back()",
                'title' => 'YA SE REGISTRO ESTE CLIENTE',
                'message' => 'Esta cliente ya se encuentra registrado, comunicarse con su superior.'
            ]);
        } else {

            DB::beginTransaction();
            try {

                $client = new Client();

                $client->status = 1;
                $client->name = request('name');
                $client->phone = request('phone');
                $client->department = request('department');
                $client->priority = request('priority');
                $client->address = request('address');
                $client->lead_by = \Auth::user()->id;
                $client->save();

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
                throw $ex;
            }

            return Redirect::route('prospect.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
