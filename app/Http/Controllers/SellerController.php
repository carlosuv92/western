<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SellerController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'seller']);

        $contract = Contract::where('status',1)->where('seller', \Auth::user()->id)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        $contract_dia = Contract::where('status',1)->where('seller', \Auth::user()->id)->whereDay('created_at',Carbon::now()->day)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        $contract_pos = Contract::where('modelpocket',2)->where('status',1)->where('seller', \Auth::user()->id)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        $contract_jr = Contract::where('brand',2)->where('modelpocket',1)->where('status',1)->where('seller', \Auth::user()->id)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        $contract_pro = Contract::where('brand',1)->where('modelpocket',1)->where('status',1)->where('seller', \Auth::user()->id)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        $contract_full = Contract::where('brand',3)->where('modelpocket',1)->where('status',1)->where('seller', \Auth::user()->id)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        $visitas = Client::where('status',1)->where('regis_por', \Auth::user()->id)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        $visitas_dia = Client::where('status',1)->where('regis_por', \Auth::user()->id)->whereDay('created_at',Carbon::now()->day)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        $visitas = Client::where('status',1)->where('prioridad', "ALTA")->where('regis_por', \Auth::user()->id)->whereDay('created_at',Carbon::now()->day)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        $visitas = Client::where('status',1)->where('prioridad', "MEDIA")->where('regis_por', \Auth::user()->id)->whereDay('created_at',Carbon::now()->day)->whereMonth('created_at',Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();


        $color_contrato = "F44336";
        $color_contrato_dia = "F44336";
        $color_visita = "F44336";
        $color_visita_dia = "F44336";

        if($contract_dia==2){
            $color_contrato_dia = "FFC107";
        }else if($contract_dia>2){
            $color_contrato_dia = "8BC34A";
        }

        if($contract>5 && $contract<12){
            $color_contrato = "FFC107";
        }else if($contract>11){
            $color_contrato = "8BC34A";
        }

        if($visitas_dia>=4 && $visitas_dia<8){
            $color_visita_dia = "FFC107";
        }else if($visitas_dia>7){
            $color_visita_dia = "8BC34A";
        }

        if($visitas>96 && $visitas<191){
            $color_visita_dia = "FFC107";
        }else if($visitas>190){
            $color_visita_dia = "8BC34A";
        }

        return view('dashboard.vendedor',[
            'contract_pos' => $contract_pos,
            'contract_jr' => $contract_jr,
            'contract_pro' => $contract_pro,
            'contract_full' => $contract_full,
            'visitas' => $visitas,
            'visitas_dia' => $visitas_dia,
            'contract' => $contract,
            'contract_dia' => $contract_dia,
            'color_contrato' => $color_contrato,
            'color_contrato_dia' => $color_contrato_dia,
            'color_visita' => $color_visita,
            'color_visita_dia' => $color_visita_dia,
            'title' => 'Dashboard',
            'breadcrumb' => 'vendedor'
        ]);

    }
}
