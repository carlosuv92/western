<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDocument;
use App\Departament;
use App\User;
use App\District;
use App\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        if (\Auth::user()->hasRole('admin')) {
            return view('admin.visita.index', [
                'title' => 'Visita',
                'breadcrumb' => 'crud'
            ]);
        } else if (\Auth::user()->hasRole('seller')) {
            return view('seller.visita.index', [
                'title' => 'Visita',
                'breadcrumb' => 'crud'
            ]);
        }else if (\Auth::user()->hasRole('super')) {
            return view('super.visita.index', [
                'title' => 'Visita',
                'breadcrumb' => 'crud'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $t_docs  = ClientDocument::all();
        $provincias  = Province::all();
        $distritos  = District::all();
        $departamentos  = Departament::all();
        $user  = User::where('id', \Auth::user()->id)->first();
        if (\Auth::user()->hasRole('admin')) {
            return view('admin.visita.create', [
                'provincias' => $provincias,
                'departamentos' => $departamentos,
                'distritos' => $distritos,
                'user' => $user,
                't_docs' => $t_docs,
                'title' => 'Contrato',
                'breadcrumb' => 'crear'
            ]);
        } else if (\Auth::user()->hasRole('seller')) {
            return view('seller.visita.create', [
                'provincias' => $provincias,
                'departamentos' => $departamentos,
                'distritos' => $distritos,
                'user' => $user,
                't_docs' => $t_docs,
                'title' => 'Contrato',
                'breadcrumb' => 'crear'
            ]);
        }
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

            $client = new Client();

            $client->status = 1;
            $client->name = request('name');
            $client->user_document = request('t_doc');
            $client->document = request('document');
            $client->phone = request('phone');
            $client->district = request('district');
            $client->address = request('address');
            $client->prioridad = request('prioridad');
            $client->interesado = request('interesado');
            $client->fecha_retorno = request('fecha_retorno');
            $client->comment = request('comment');
            $client->regis_por = \Auth::user()->id;
            $client->save();


            $client->save();
            if (\Auth::user()->hasRole('admin')) {
                return view('admin.visita.index', [
                    'title' => 'Visita',
                    'breadcrumb' => 'crear'
                ]);
            } else if (\Auth::user()->hasRole('seller')) {
                return view('seller.visita.index', [
                    'title' => 'Visita',
                    'breadcrumb' => 'crear'
                ]);
            }
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
