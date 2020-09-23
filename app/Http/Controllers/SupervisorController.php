<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = \Auth::user();

        $cant['fecha'] = DB::select("SELECT count(CAST(c.created_at AS DATE)) as total,
                                                    CAST(c.created_at AS DATE) as fecha FROM clients c
                                    where status = 1 and " . $user->department . " GROUP by fecha");
        $cant['prioridad_mi'] = DB::select("SELECT count(CAST(c.created_at AS DATE)) as total,
                                                    CAST(c.created_at AS DATE) as fecha FROM clients c
                                            where status = 1 and " . $user->department . " and priority=2 GROUP by fecha");

        $cant['prioridad_i'] = DB::select("SELECT count(CAST(c.created_at AS DATE)) as total,
                                                            CAST(c.created_at AS DATE) as fecha FROM clients c
                                            where status = 1 and " . $user->department . " and priority=1 GROUP by fecha");

        $contratos['mes'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '2')
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->where('departments.id', \Auth::user()->department)
            ->groupBy('departments.name')
            ->first();

        $contratos['dia'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '2')->whereDay('clients.created_at', '=', Carbon::now()->day)
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->where('departments.id', \Auth::user()->department)
            ->groupBy('departments.name')
            ->first();

        $prospectos['mes'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '1')
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->where('departments.id', \Auth::user()->department)
            ->groupBy('departments.name')
            ->first();

        $prospectos['dia'] = DB::table('departments')
            ->leftJoin('clients', function ($join) {
                $join->on('clients.department', '=', 'departments.id')
                    ->where('clients.status', '1')->whereDay('clients.created_at', '=', Carbon::now()->day)
                    ->whereMonth('clients.created_at', '=', Carbon::now()->month)->whereYear('clients.created_at', '=', Carbon::now()->year);
            })
            ->select('departments.name', DB::raw("count(clients.id) as total"))
            ->where('departments.id', \Auth::user()->department)
            ->groupBy('departments.name')
            ->first();

        foreach ($cant['fecha'] as $cantidad) {
            $cantidad->pr_mi = 0;
            $cantidad->pr_i = 0;
            foreach ($cant['prioridad_mi'] as $pr_mi) {
                if ($pr_mi->fecha === $cantidad->fecha)
                    $cantidad->pr_mi = $pr_mi->total;
            }

            foreach ($cant['prioridad_i'] as $pr_i) {
                if ($pr_i->fecha === $cantidad->fecha)
                    $cantidad->pr_i = $pr_i->total;
            }
        }
        return view('dashboard.supervisor', [
            'cant' => $cant,
            'contratos' => $contratos,
            'prospectos' => $prospectos,
            'title' => 'Prospectos',
            'breadcrumb' => 'admin'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
