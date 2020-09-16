<?php

namespace App\Http\Controllers;

use App\Client;
use App\Department;
use App\User;
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
        $rules = [
            'phone' => 'numeric|min:5|max:7',
            'cellphone' => 'numeric|min:9|max:9',
        ];
        $customMessages = [
            'numeric' => 'Cuidado!! el campo :attribute debe ser numerico',
            'min' => 'Cuidado!! el campo :attribute debe tener minimo :min',
            'max' => 'Cuidado!! el campo :attribute debe tener maximo :max',
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

        return Redirect::route('prospect.index');
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
