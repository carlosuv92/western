<?php

namespace App\Http\Controllers;

use App\Warehouse;
use App\WarehousePocket;
use Illuminate\Http\Request;

class WarehouseController extends Controller
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
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        return "Dashboard Warehouse";
    }

    public function listGuide(Request $request)
    {

        return view('warehouse.list', [
            'title' => 'Warehouse',
            'breadcrumb' => 'list'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGuide(Request $request)
    {
        if ($request->ajax()) {
            $box = $request->all();
            $myValue =  array();
            parse_str($box['data'], $myValue);

            $warehouse = new Warehouse();
            $warehouse->guide = $myValue['guia-name'];
            $warehouse->pockets = $myValue['pocket-mount'];
            $warehouse->pos = $myValue['pocket-mount'];
            $warehouse->registered_by = \Auth::user()->id;
            $warehouse->received_by = \Auth::user()->id;
            $warehouse->received_at = $myValue['date-name'];
            $warehouse->save();

            if ($warehouse) {
                return response()->json(['success' => 'true']);
            } else {
                return response()->json(['success' => 'false']);
            }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    { }

    public function register($id)
    {
        $guide = Warehouse::find($id);
        $pockets = WarehousePocket::whereGuide($id)->count();
        //print_R($routers);die();
        $values = array(
            'pockets' => [
                'complete' => $pockets == $guide->pockets,
                'color' => $pockets == $guide->pockets ? 'success' : ($pockets >= ($guide->pockets / 2) ? 'warning' : 'danger'),
                'total' => $guide->pockets,
                'registered' => $pockets,
                'faltantes' => ($guide->pockets) - $pockets,
                'percent' => $pockets > 0 ? ($pockets * 100) / $guide->pockets : 0,
            ],
        );

        return view('warehouse.register', [
            'guide' => $guide->id,
            'values' => $values,
            'title' => 'Registro Guia: ' . str_repeat(' ', 5) . $guide->guide,
            'breadcrumb' => 'Registro',
        ]);
    }
    public function delete($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();
    }
}
