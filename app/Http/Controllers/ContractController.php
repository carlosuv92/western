<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientDocument;
use App\Contract;
use App\Departament;
use App\District;
use App\Province;
use App\Brand;
use App\ClientContract;
use App\RoleUser;
use App\User;
use App\ModelPocket;
use App\Bank;
use App\UserRelation;
use App\Warehouse;
use Carbon\Carbon;
use DB;
use App\WarehousePocket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

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
        $sellers = \DB::table('users')
            ->leftJoin('user_relations as ur', 'ur.user', '=', 'users.id')
            ->leftJoin('role_user as ru', 'ru.user_id', '=', 'users.id')
            ->select('users.id as iduser', DB::raw('CONCAT(users.surname, " ", users.name) AS vendedor'))
            ->whereIn('ru.role_id', [2, 3])
            ->orderBy('vendedor')
            ->get();


        if (\Auth::user()->hasRole('admin')) {
            //print_r(WarehousePocket::whereSerie('6K298041')->first());die();
            return view('admin.contract.index', [
                'sellers' => $sellers,
                'title' => 'Contratos',
                'breadcrumb' => 'crud'
            ]);
        } else if (\Auth::user()->hasRole('seller')) {
            return view('seller.contract.index', [
                'title' => 'Contratos',
                'breadcrumb' => 'crud'
            ]);
        } else if (\Auth::user()->hasRole('super')) {
            return view('super.contract.index', [
                'title' => 'Contratos',
                'breadcrumb' => 'crud'
            ]);
        }
    }
    public function pos()
    {
        $sellers = \DB::table('users')
            ->leftJoin('user_relations as ur', 'ur.user', '=', 'users.id')
            ->leftJoin('role_user as ru', 'ru.user_id', '=', 'users.id')
            ->select('users.id as iduser', DB::raw('CONCAT(users.surname, " ", users.name) AS vendedor'))
            ->whereIn('ru.role_id', [2, 3])
            ->orderBy('vendedor')
            ->get();
        return view('admin.contract.pos', [
            'sellers' => $sellers,
            'title' => 'Contratos',
            'breadcrumb' => 'crud'
        ]);
    }

    public function posinsta()
    {
        $sellers = \DB::table('users')
            ->leftJoin('user_relations as ur', 'ur.user', '=', 'users.id')
            ->leftJoin('role_user as ru', 'ru.user_id', '=', 'users.id')
            ->select('users.id as iduser', DB::raw('CONCAT(users.surname, " ", users.name) AS vendedor'))
            ->whereIn('ru.role_id', [2, 3])
            ->orderBy('vendedor')
            ->get();
        return view('admin.contract.pos_instalado', [
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
        $t_docs  = ClientDocument::all();
        $provincias  = Province::all();
        $distritos  = District::all();
        $departamentos  = Departament::all();
        $tipos  = Brand::all();
        $models  = ModelPocket::all();
        $banks  = Bank::all();
        $user  = User::where('id', \Auth::user()->id)->first();

        if (UserRelation::where('user',  \Auth::user()->id)->first()) {
            $supervisor = UserRelation::where('user',  \Auth::user()->id)->first()->supervisor;
        } else {
            $supervisor = \Auth::user()->id;
        }
        $ware = WarehousePocket::where('assigned_to', $supervisor)->where('type',2)->get();

        $usuarios = \DB::table('users')
            ->leftJoin('user_relations as ur', 'ur.user', '=', 'users.id')
            ->select('users.id as iduser', DB::raw('CONCAT(users.surname, " ", users.name) AS vendedor'))
            ->where('ur.supervisor', \Auth::user()->id)
            ->get();

        if (\Auth::user()->hasRole('admin')) {
            return view('admin.contract.create', [
                'provincias' => $provincias,
                'ware' => $ware,
                'departamentos' => $departamentos,
                'distritos' => $distritos,
                'user' => $user,
                'usuarios' => $usuarios,
                't_docs' => $t_docs,
                'banks' => $banks,
                'models' => $models,
                'tipos' => $tipos,
                'title' => 'Contrato',
                'breadcrumb' => 'crear'
            ]);
        } else if (\Auth::user()->hasRole('seller')) {
            return view('seller.contract.create', [
                'provincias' => $provincias,
                'ware' => $ware,
                'departamentos' => $departamentos,
                'distritos' => $distritos,
                'user' => $user,
                'usuarios' => $usuarios,
                't_docs' => $t_docs,
                'banks' => $banks,
                'models' => $models,
                'tipos' => $tipos,
                'title' => 'Contrato',
                'breadcrumb' => 'crear'
            ]);
        } else if (\Auth::user()->hasRole('super')) {
            return view('super.contract.create', [
                'provincias' => $provincias,
                'ware' => $ware,
                'departamentos' => $departamentos,
                'distritos' => $distritos,
                'user' => $user,
                'usuarios' => $usuarios,
                't_docs' => $t_docs,
                'banks' => $banks,
                'models' => $models,
                'tipos' => $tipos,
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
        $precio_pre = Brand::whereId(2)->first()->precio;
        $precio_pro = Brand::whereId(1)->first()->precio;
        $precio_ful = Brand::whereId(3)->first()->precio;
        if (\Auth::user()->hasRole('seller')) {
            $usuario = \Auth::user()->id;
        } else if (\Auth::user()->hasRole('super')) {
            $usuario = request('usuario');
        }
        if (UserRelation::where('user', $usuario)->first()) {
            $supervisor = UserRelation::where('user', $usuario)->first()->supervisor;
        } else {
            $supervisor = \Auth::user()->id;
        }
        /*$orden = Contract::where('orden', request('orden'))->first();
        if (request('orden') != "" || request('orden') != "999") {
            if ($orden) {
                //print_r($orden);die();
                return view('layouts.error', [
                    'url' => "javascript:history.back()",
                    'title' => 'ORDEN UTILIZADA EN OTRO CONTRATO',
                    'message' => 'Esta orden ya se encuentra en otro contrato, comunicarse a almacen'
                ]);
            }
        }*/
        if (request('model') == 1) {
            $serie = WarehousePocket::where('serie', request('serie'))->first();
            if ($serie && $serie->type != 3) {
                if (!$supervisor) {
                    $supervisor = $usuario;
                }

                $client = Client::where('document', request('document'))->first();
                if ($client) {
                    $client->status = 2;
                    $client->vend_por = $usuario;
                    $client->negocio = request('negocio');
                    $client->giro = request('giro');
                    $client->ruc = request('ruc');
                    $client->bank = request('bank');
                    $client->save();
                } else {
                    $client = new Client();

                    $client->status = 2;
                    $client->name = request('name');
                    $client->user_document = request('t_doc');
                    $client->document = request('document');
                    $client->ruc = request('ruc');
                    $client->giro = request('giro');
                    $client->negocio = request('negocio');
                    $client->phone = request('phone');
                    $client->bank = request('bank');
                    $client->district = request('district');
                    $client->vend_por = $usuario;
                    $client->regis_por = $usuario;
                    $client->save();
                }

                $contract = new Contract();
                $contract->seller = $usuario;
                $contract->supervisor_seller = $supervisor;
                $contract->sales_manager = $supervisor;
                $contract->modelpocket = request('model');
                $contract->brand = request('tipo');
                $contract->orden = request('orden');
                $contract->serie = request('serie');
                //$contract->created_at = request('creacion');
                if (request('tipo') == "2") {
                    $contract->precio =  $precio_pre;
                } elseif (request('tipo') == "1") {
                    $contract->precio =  $precio_pro;
                } elseif (request('tipo') == "3") {
                    if(substr($client->ruc, 0, 2) === '10'){
                        $contract->precio =  $precio_ful - 30;
                    }else if(substr($client->ruc, 0, 2) === '20'){
                        $contract->precio =  $precio_ful-200;
                    }else{
                        $contract->precio =  $precio_ful;
                    }
                }

                $contract->save();

                $generateContract = new ClientContract();
                $generateContract->client_id = $client->id;
                $generateContract->contract_id = $contract->id;
                $generateContract->save();

                $serie->type = 3;
                $serie->save();


                if (\Auth::user()->hasRole('admin')) {
                    return view('admin.contract.index', [
                        'title' => 'Contrato',
                        'breadcrumb' => 'crear'
                    ]);
                } else if (\Auth::user()->hasRole('seller')) {
                    return view('seller.contract.index', [
                        'title' => 'Contrato',
                        'breadcrumb' => 'crear'
                    ]);
                } else if (\Auth::user()->hasRole('super')) {
                    return view('super.contract.index', [
                        'title' => 'Contrato',
                        'breadcrumb' => 'crear'
                    ]);
                }
            } else if ($serie && $serie->type == 3) {
                return view('layouts.error', [
                    'url' => "javascript:history.back()",
                    'title' => 'SERIE UTILIZADA EN OTRO CONTRATO',
                    'message' => 'Esta serie ya se encuentra en otro contrato, comunicarse a almacen'
                ]);
            } else if (!$serie) {
                return view('layouts.error', [
                    'url' => "javascript:history.back()",
                    'title' => 'SERIE NO EXISTE',
                    'message' => 'Esta serie no se encuentra registrada, comunicarse a almacen'
                ]);
            }
        } else {

            if (!$supervisor) {
                $supervisor = $usuario;
            }

            $client = Client::where('document', request('document'))->first();
            if ($client) {
                $client->status = 2;
                $client->save();
            } else {

                $client = new Client();

                $client->status = 2;
                $client->name = request('name');
                $client->user_document = request('t_doc');
                $client->document = request('document');
                $client->ruc = request('ruc');
                $client->giro = request('giro');
                $client->negocio = request('negocio');
                $client->phone = request('phone');
                $client->bank = request('bank');
                $client->district = request('district');
                $client->vend_por = $usuario;
                $client->save();
            }

            $contract = new Contract();
            $contract->seller = $usuario;
            $contract->supervisor_seller = $supervisor;
            $contract->sales_manager = $supervisor;
            $contract->modelpocket = request('model');
            $contract->orden = request('orden');

            $contract->save();

            $generateContract = new ClientContract();
            $generateContract->client_id = $client->id;
            $generateContract->contract_id = $contract->id;
            $generateContract->save();


            if (\Auth::user()->hasRole('admin')) {
                return view('admin.contract.index', [
                    'title' => 'Contrato',
                    'breadcrumb' => 'crear'
                ]);
            } else if (\Auth::user()->hasRole('seller')) {
                return view('seller.contract.index', [
                    'title' => 'Contrato',
                    'breadcrumb' => 'crear'
                ]);
            } else if (\Auth::user()->hasRole('super')) {
                return view('super.contract.index', [
                    'title' => 'Contrato',
                    'breadcrumb' => 'crear'
                ]);
            }
        }
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


    public function IndexLiquidaciones()
    {
        if (\Auth::user()->hasRole('admin')) {
            return view('admin.liquidacion.index', [
                'title' => 'Contratos',
                'breadcrumb' => 'crud'
            ]);
        } else if (\Auth::user()->hasRole('seller')) {
            return redirect()->route('home');
        } else if (\Auth::user()->hasRole('super')) {
            return view('super.liquidaciones.index', [
                'title' => 'Contratos',
                'breadcrumb' => 'crud'
            ]);
        }
    }


    public function assign(Request $request)
    {
        //$today = date("dmy-His");
        $check_list = $request->input('check_list');
        //print_r($check_list);die();
        switch ($request->input('action')) {
            case 'Pagar':
                if (empty($check_list)) {
                    return "Falta Seleccionar datos";
                } else {
                    $i = 0;
                    $assigned = [];
                    foreach ($check_list as $check) {
                        $pocket = Contract::whereId($check)->first();
                        if ($pocket->pagado != 1) {
                            $pocket->num_voucher = $request->input('voucher');
                            $pocket->pagado = 1;
                            $pocket->save();
                        }
                        $assigned[] = $pocket;
                        $i++;
                    }
                    //return back();
                    /* foreach ($assigned as $a) {
                        $a->cliente = \DB::table('contracts')
                            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
                            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')->select('c.name as cliente')
                            ->where('contracts.id', $a->id)
                            ->first()->cliente;

                        $a->modelo = \DB::table('contracts')
                            ->leftJoin('model_pockets as c', 'contracts.modelpocket', '=', 'c.id')
                            ->select('c.name as modelo')
                            ->where('contracts.id', $a->id)
                            ->first()->modelo;

                        $a->tipo = \DB::table('contracts')
                            ->leftJoin('brands as c', 'contracts.brand', '=', 'c.id')
                            ->select('c.name as modelo')
                            ->where('contracts.id', $a->id)
                            ->first()->modelo;
                    }*/
                    /* if (\Auth::user()->hasRole('super')) {
                        return view('super.liquidaciones.lista_voucher', [
                            'assigned' => $assigned,
                            'contador' => $i,
                            'voucher' => $request->input('voucher'),
                            'title' => 'Contratos',
                            'breadcrumb' => 'crud'
                        ]);
                    }*/
                    return back();
                }
                break;
        }
    }

    public function pagarVoucher(Request $request, $assigned)
    {

        dd($request->all());
    }

    public function cambiarVendedor(Request $request)
    {
        if ($request->ajax()) {
            $box = $request->all();
            $myValue =  array();
            parse_str($box['data'], $myValue);
            $contrato = Contract::where('id', $myValue['id'])->first();
            if ($contrato) {
                $contrato->seller = $myValue['seller'];
                $contrato->supervisor_seller = UserRelation::where('user', $contrato->seller)->first()->supervisor;
                $contrato->sales_manager  =  $contrato->supervisor_seller;
                $contrato->save();
            }

            return "correcto";
        }
    }

    public function comentario(Request $request)
    {
        if ($request->ajax()) {
            $box = $request->all();
            $myValue =  array();
            parse_str($box['data'], $myValue);
            $contrato = Contract::where('id', $myValue['id'])->first();
            if ($contrato) {
                $contrato->estado_llamada = $myValue['estado_llamada'];
                $contrato->fecha_llamada = $myValue['fecha_llamada'];
                $contrato->comentario  =  $myValue['comentario'];
                $contrato->save();
            }

            return "correcto";
        }
    }
}
