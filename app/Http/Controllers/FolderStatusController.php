<?php

namespace App\Http\Controllers;

use App\Contract;
use App\FolderStatus;
use Illuminate\Http\Request;

class FolderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (\Auth::user()->hasRole('admin')) {
            return view('super.carpetas.index', [
                'title' => 'Contratos',
                'breadcrumb' => 'crud'
            ]);
        } else if (\Auth::user()->hasRole('seller')) {
            return redirect()->route('home');
        } else if (\Auth::user()->hasRole('super')) {
            return view('super.carpetas.index', [
                'title' => 'Contratos',
                'breadcrumb' => 'crud'
            ]);
        }
    }

    public function entregado($id)
    {
        $contrato = Contract::where('id', '=', $id)
            ->first();

        if ($contrato) {
            $contrato->folder_sup = 4;
        }

        //echo'<pre>';print_r($asistencia);die();
        $contrato->save();
        return "correcto";
    }

    public function enviado($id)
    {
        $contrato = Contract::where('id', '=', $id)
            ->first();

        if ($contrato) {
            $contrato->folder_sup = 5;
            $contrato->folder = 5;
        }

        //echo'<pre>';print_r($asistencia);die();
        $contrato->save();
        return "correcto";
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
     * @param  \App\FolderStatus  $folderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(FolderStatus $folderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FolderStatus  $folderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(FolderStatus $folderStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FolderStatus  $folderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FolderStatus $folderStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FolderStatus  $folderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(FolderStatus $folderStatus)
    {
        //
    }
}
