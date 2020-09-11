<?php

namespace App\Http\Controllers;

use App\WarehousePocket;
use App\Warehouse;
use App\Brand;
use App\User;
use DB;
use Illuminate\Http\Request;

class WarehousePocketController extends Controller
{
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
    }

    public function register($id)
    {
        $guide = Warehouse::find($id);
        $pockets = WarehousePocket::whereGuide($guide)->latest()->get();
        $brands = Brand::all();
        foreach ($pockets as $pocket) {
            if (!empty($pocket->assigned_to)) {
                $assigned_by = User::find($pocket->assigned_by);
                $assigned_to = User::find($pocket->assigned_to);
                if($assigned_by && $assigned_to){
                    $pocket->assigned_by = $assigned_by->name[0];
                    $pocket->assigned_to = $assigned_to->surname[0];
                }
            }
        }
        return view('warehouse.pocket.register', [
            'guide' => $guide,
            'pockets' => $pockets,
            'brands' => $brands,
            'title' => 'Registro de pockets Guia: ' . $guide->guide,
            'breadcrumb' => 'creacion',
        ]);
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
        if ($request->ajax()) {
            $phone = new WarehousePocket();
            $phone->guide = $request->get('guide');
            $phone->brand = $request->get('brand');
            $phone->reference = $request->get('reference');
            $phone->serie = $request->get('serie');
            $phone->save();
            if ($phone) {
                return response()->json(['success' => 'true']);
            } else {
                return response()->json(['success' => 'false']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WarehousePocket  $warehousePocket
     * @return \Illuminate\Http\Response
     */
    public function show(WarehousePocket $warehousePocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WarehousePocket  $warehousePocket
     * @return \Illuminate\Http\Response
     */
    public function edit(WarehousePocket $warehousePocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WarehousePocket  $warehousePocket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarehousePocket $warehousePocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WarehousePocket  $warehousePocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehousePocket $warehousePocket)
    {
        //
    }

    public function assignSup(Request $request)
    {
        //$today = date("dmy-His");
        $check_list = $request->input('check_list');
        switch ($request->input('action')) {
            case 'Asignar':
                if (empty($check_list)) {
                    return "Falta Seleccionar datos";
                } else {
                    $assigned = [];
                    foreach ($check_list as $check) {
                        $pocket = WarehousePocket::whereId($check)->first();
                        $pocket->assigned_to = $request->input('user');
                        $pocket->type = 2;
                        $pocket->save();
                        $assigned[] = $pocket;
                    }
                    return back();
                }
                break;
            case 'Almacen':
                if (empty($check_list)) {
                    return "Falta Seleccionar datos";
                } else {
                    $assigned = [];
                    foreach ($check_list as $check) {
                        $pocket = WarehousePocket::whereId($check)->first();
                        $pocket->assigned_to = null;
                        $pocket->type = 1;
                        $pocket->save();
                        $assigned[] = $pocket;
                    }
                    return back();
                }
                break;
            case 'Robado':
                if (empty($check_list)) {
                    return "Falta Seleccionar datos";
                } else {
                    $assigned = [];
                    foreach ($check_list as $check) {
                        $pocket = WarehousePocket::whereId($check)->first();
                        $pocket->type = 5;
                        $pocket->save();
                        $assigned[] = $pocket;
                    }
                    return back();
                }
                break;
        }
    }

    public function assign()
    {
        /*
        $equipo = WarehousePocket::whereSerie(1260692886)->first();
        echo'<pre>';print_r($equipo);die();*/
        $guides = \DB::table('warehouse_pockets')
            ->Join('warehouses', 'warehouses.id', '=', 'warehouse_pockets.guide')
            ->select('warehouse_pockets.guide', 'warehouses.id', 'warehouses.guide')
            ->whereNull('warehouse_pockets.assigned_to')
            ->groupBy('warehouse_pockets.guide', 'warehouses.id', 'warehouses.guide')
            ->get();

        $users = User::whereHas('roles', function ($q) {
            $q->where('name', 'super');
        })->orderBy('surname')->get();

        //$pockets = WarehousePocket::whereNotIn('type', [3, 4, 5,6,7,8,9,10,11])->get();
        $pockets = WarehousePocket::all();
        $data['total'] =  DB::table('warehouse_pockets')
            ->leftJoin('users as a', 'a.id', '=', 'warehouse_pockets.assigned_to')
            ->leftJoin('type_pos_fails as t', 't.id', '=', 'warehouse_pockets.type')
            ->select(
                'a.*',
                'warehouse_pockets.type as status',
                'warehouse_pockets.brand'
            )
            ->where('warehouse_pockets.type', 2)
            ->get();

        $pos['almacen'] = WarehousePocket::whereType(1)->whereBrand(2)->whereNull('assigned_to')->count();

        $pos['arequipa'] = 0;
        $pos['ica'] = 0;
        $pos['chimbote'] = 0;
        $pos['trujillo'] = 0;

        $pos['cuzco'] = 0;
        $pos['chiclayo'] = 0;
        $pos['huancayo'] = 0;
        $pos['piura'] = 0;

        foreach ($data['total'] as $c) {
            if ($c->province == 35 && $c->brand == 2) {
                $pos['arequipa']++;
            } elseif ($c->province == 25 && $c->brand == 2) {
                $pos['chimbote']++;
            } elseif ($c->province == 122 && $c->brand == 2) {
                $pos['trujillo']++;
            } elseif ($c->province == 99 && $c->brand == 2) {
                $pos['ica']++;
            } elseif ($c->province == 73 && $c->brand == 2) {
                $pos['cuzco']++;
            } elseif ($c->province == 124 && $c->brand == 2) {
                $pos['chiclayo']++;
            } elseif ($c->province == 106 && $c->brand == 2) {
                $pos['huancayo']++;
            } elseif ($c->province == 19 && $c->brand == 2) {
                $pos['piura']++;
            }
        }
        $pro['almacen'] = WarehousePocket::whereType(1)->whereBrand(1)->whereNull('assigned_to')->count();
        $pro['arequipa'] = 0;
        $pro['ica'] = 0;
        $pro['chimbote'] = 0;
        $pro['trujillo'] = 0;

        $pro['cuzco'] = 0;
        $pro['chiclayo'] = 0;
        $pro['huancayo'] = 0;
        $pro['piura'] = 0;

        foreach ($data['total'] as $c) {
            if ($c->province == 35 && $c->brand == 1) {
                $pro['arequipa']++;
            } elseif ($c->province == 25 && $c->brand == 1) {
                $pro['chimbote']++;
            } elseif ($c->province == 122 && $c->brand == 1) {
                $pro['trujillo']++;
            } elseif ($c->province == 99 && $c->brand == 1) {
                $pro['ica']++;
            }elseif ($c->province == 73 && $c->brand == 1) {
                $pro['cuzco']++;
            } elseif ($c->province == 124 && $c->brand == 1) {
                $pro['chiclayo']++;
            } elseif ($c->province == 106 && $c->brand == 1) {
                $pro['huancayo']++;
            } elseif ($c->province == 19 && $c->brand == 1) {
                $pro['piura']++;
            }
        }

        $full['almacen'] = WarehousePocket::whereType(1)->whereBrand(3)->whereNull('assigned_to')->count();
        $full['arequipa'] = 0;
        $full['ica'] = 0;
        $full['chimbote'] = 0;
        $full['trujillo'] = 0;

        $full['cuzco'] = 0;
        $full['chiclayo'] = 0;
        $full['huancayo'] = 0;
        $full['piura'] = 0;

        foreach ($data['total'] as $c) {
            if ($c->province == 35 && $c->brand == 3) {
                $full['arequipa']++;
            } elseif ($c->province == 25 && $c->brand == 3) {
                $full['chimbote']++;
            } elseif ($c->province == 122 && $c->brand == 3) {
                $full['trujillo']++;
            } elseif ($c->province == 99 && $c->brand == 3) {
                $full['ica']++;
            }elseif ($c->province == 73 && $c->brand == 3) {
                $full['cuzco']++;
            } elseif ($c->province == 124 && $c->brand == 3) {
                $full['chiclayo']++;
            } elseif ($c->province == 106 && $c->brand == 3) {
                $full['huancayo']++;
            } elseif ($c->province == 19 && $c->brand == 3) {
                $full['piura']++;
            }
        }
        /*print_r($pro['arequipa']." ".$pro['ica']." ".$pro['chimbote']." ".$pro['trujillo']);
        die();*/
        return view('warehouse.pocket.assign', [
            'pos' => $pos,
            'pro' => $pro,
            'full' => $full,
            'users' => $users,
            'pockets' => $pockets,
            'guides' => $guides,
            'title' => 'Asignación de pockets Guia: ',
            'breadcrumb' => 'asignacion',
        ]);
    }

    public function eliminar(Request $request)
    {
        $router = WarehousePocket::find($request->input('id'));

        if ($router->delete()) {
            echo 'Data Deleted';
        }
    }
}
