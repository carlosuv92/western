<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Contract;
use App\User;
use App\Role;
use App\UserRelation;
use App\WarehousePocket;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
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
        $request->user()->authorizeRoles(['user', 'admin']);

        /*$cambiar = Contract::whereId(26)->first();
        $cambiar->orden = 650099279;
        $cambiar->save();*/
        /*
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Julio Marco';
        $user->surname = 'Inocencio Pereyra';
        $user->address = 'AV ROSA DE AMERICA 914';
        $user->email = 'julio.inocencio@vconnections.pe';
        $user->type_document = 1;
        $user->document = 'REGU123406';
        $user->province = 122;
        $user->departament = 12;
        $user->district = 1200;
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);
        */
        $precio_pro = Brand::whereId(1)->first()->precio;
        $precio_pre = Brand::whereId(2)->first()->precio;
        $precio_full = Brand::whereId(3)->first()->precio;
        $totcontratos['mes'] = Contract::whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->whereIn('status', ['1'])->count();

        $pre_pocket = DB::table('contracts')
            ->where('serie', 'like', '2700%')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->count();
        $pro_pocket = DB::table('contracts')
            ->where('serie', 'like', '12%')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->count();


        $cash_pre = DB::table('contracts')
            ->where('serie', 'like', '2700%')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->sum('precio');

        $cash_pro = DB::table('contracts')
            ->where('serie', 'like', '12%')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->sum('precio');

        $pos_otros = $totcontratos['mes'] - $pre_pocket - $pro_pocket;

        $a_liqui = DB::table('contracts')
            ->whereNull('pagado')->orWhere('pagado', '<>', '1')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->sum('precio');

        $cash_tot = $cash_pre + $cash_pro;

        //Genero porcentaje
        $pre_pocket = ($totcontratos['mes'] == 0) ? 0 : ($pre_pocket / $totcontratos['mes'] * 100);
        $pro_pocket = ($totcontratos['mes'] == 0) ? 0 : ($pro_pocket / $totcontratos['mes'] * 100);
        $pos_otros = ($totcontratos['mes'] == 0) ? 0 : ($pos_otros / $totcontratos['mes'] * 100);
        //
        $usuarios = DB::table('users')
            ->leftJoin('role_user as r', 'r.user_id', '=', 'users.id')
            ->leftJoin('roles as ro', 'r.role_id', '=', 'ro.id')
            ->select(
                DB::raw('CONCAT(users.surname, " ", users.name) AS full_name'),
                'ro.name as rol'
            )
            ->where('r.role_id', 2)
            ->where('users.active', 1)
            ->count();

        //2do doug
        $cuota = $usuarios * 7;
        $percent['proyectado'] = round((($totcontratos['mes'] / (Carbon::now()->day)) * 30 / $cuota * 100), 2); //-1
        $percent['pen_proy'] = 100 - $percent['proyectado'];


        $totcontratos['ant'] = Contract::whereMonth('created_at', '=', Carbon::now()->month)->whereYear('created_at', '=', Carbon::now()->year)->whereDay('created_at', '<', Carbon::now()->day)->whereIn('status', ['1', '4', '5', '6'])->count();
        $totcontratos['dia'] = Contract::whereDay('created_at', '=', Carbon::now()->day)->whereYear('created_at', '=', Carbon::now()->year)->whereMonth('created_at', '=', Carbon::now()->month)->whereIn('status', ['1', '4', '5', '6'])->count();
        $totcontratos['cuota'] = round(($cuota - $totcontratos['ant']) / (30 - (Carbon::now()->day >= 30 ? 1 : Carbon::now()->day)));
        $percent['cuota'] = round($totcontratos['dia'] / $totcontratos['cuota'] * 100);
        $percent['cuo_pen'] = ($percent['cuota'] > 100) ? 100 : (100 - $percent['cuota']);


        $contracts['total'] = DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'a.*',
                'contracts.modelpocket',
                'contracts.brand'
            )
            ->where('contracts.status', 1)
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->get();

        $contracts['arequipa'] = 0;
        $contracts['ica'] = 0;
        $contracts['chimbote'] = 0;
        $contracts['trujillo'] = 0;
        $contracts['cuzco'] = 0;
        $contracts['chiclayo'] = 0;
        $contracts['lima'] = 0;
        $contracts['huancayo'] = 0;
        $contracts['piura'] = 0;

        foreach ($contracts['total'] as $c) {
            if ($c->province == 35) {
                $contracts['arequipa']++;
            } elseif ($c->province == 25) {
                $contracts['chimbote']++;
            } elseif ($c->province == 122) {
                $contracts['trujillo']++;
            } elseif ($c->province == 99) {
                $contracts['ica']++;
            } elseif ($c->province == 73) {
                $contracts['cuzco']++;
            } elseif ($c->province == 124) {
                $contracts['chiclayo']++;
            } elseif ($c->province == 135) {
                $contracts['lima']++;
            } elseif ($c->province == 106) {
                $contracts['huancayo']++;
            }elseif ($c->province == 157) {
                $contracts['piura']++;
            }
        }

        $dias['total'] = DB::table('contracts')
            ->leftJoin('client_contracts as cc', 'cc.contract_id', '=', 'contracts.id')
            ->leftJoin('clients as c', 'c.id', '=', 'cc.client_id')
            ->leftJoin('users as a', 'a.id', '=', 'contracts.supervisor_seller')
            ->leftJoin('users as b', 'b.id', '=', 'contracts.seller')
            ->leftJoin('client_statuses', 'client_statuses.id', '=', 'c.status')
            ->select(
                'a.*',
                'contracts.modelpocket',
                'contracts.brand'
            )
            ->where('contracts.status', 1)
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereDay('contracts.created_at', '=', Carbon::now()->day)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->get();

        $dias['arequipa'] = 0;
        $dias['ica'] = 0;
        $dias['chimbote'] = 0;
        $dias['trujillo'] = 0;
        $dias['cuzco'] = 0;
        $dias['chiclayo'] = 0;
        $dias['lima'] = 0;
        $dias['huancayo'] = 0;
        $dias['piura'] = 0;

        foreach ($dias['total'] as $c) {
            if ($c->province == 35) {
                $dias['arequipa']++;
            } elseif ($c->province == 25) {
                $dias['chimbote']++;
            } elseif ($c->province == 122) {
                $dias['trujillo']++;
            } elseif ($c->province == 99) {
                $dias['ica']++;
            } elseif ($c->province == 73) {
                $dias['cuzco']++;
            } elseif ($c->province == 124) {
                $dias['chiclayo']++;
            } elseif ($c->province == 135) {
                $dias['lima']++;
            } elseif ($c->province == 106) {
                $dias['huancayo']++;
            }elseif ($c->province == 157) {
                $dias['piura']++;
            }
        }

        //data de ventas

        $querys =  \DB::table('users')
            ->leftJoin('contracts', 'users.id', '=', 'contracts.seller')
            ->leftJoin('districts', 'districts.id', '=', 'users.district')
            ->select(
                DB::raw('CONCAT(users.surname, ", ", users.name) AS full_name'),
                'users.id as idsup',
                'districts.name as zona',
                DB::raw("count(contracts.seller) AS total")
            )
            ->groupBy('users.id', 'full_name')
            ->whereIn('contracts.status', ['1'])
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->orderBy('total', 'DESC')
            ->take(5)->get();

        $contracts_days =  \DB::table('users')
            ->leftJoin('contracts', 'users.id', '=', 'contracts.seller')
            ->leftJoin('districts', 'districts.id', '=', 'users.district')
            ->select(
                DB::raw('CONCAT(users.surname, ", ", users.name) AS full_name'),
                'users.id as idsup',
                'districts.name as zona',
                DB::raw("count(contracts.seller) AS total")
            )
            ->groupBy('users.id', 'full_name')
            ->whereIn('contracts.status', ['1'])
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereDay('contracts.created_at', '=', Carbon::now()->day)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->orderBy('total', 'DESC')
            ->take(5)->get();

        foreach ($querys as $q) {
            $q->suma = 0;
        }
        foreach ($contracts_days as $c) {
            foreach ($querys as $query) {
                if ($query->idsup == $c->idsup) {
                    $query->suma = $c->total;
                }
            }
        }
        //
        $otros['arequipa'] = 0;
        $pocket['arequipa'] = 0;
        $pro['arequipa'] = 0;
        $otros['chimbote'] = 0;
        $pocket['chimbote'] = 0;
        $pro['chimbote'] = 0;
        $otros['trujillo'] = 0;
        $pocket['trujillo'] = 0;
        $pro['trujillo'] = 0;
        $otros['ica'] = 0;
        $pocket['ica'] = 0;
        $pro['ica'] = 0;
        $otros['cuzco'] = 0;
        $pocket['cuzco'] = 0;
        $pro['cuzco'] = 0;
        $otros['chiclayo'] = 0;
        $pocket['chiclayo'] = 0;
        $pro['chiclayo'] = 0;
        $otros['lima'] = 0;
        $pocket['lima'] = 0;
        $pro['lima'] = 0;
        $otros['huancayo'] = 0;
        $pocket['huancayo'] = 0;
        $pro['huancayo'] = 0;
        $otros['piura'] = 0;
        $pocket['piura'] = 0;
        $pro['piura'] = 0;
        //POCKET - PRO Y POS
        foreach ($contracts['total'] as $c) {
            if ($c->province == 35) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['arequipa']++;
                    } else {
                        $pocket['arequipa']++;
                    }
                } else {
                    $otros['arequipa']++;
                }
            } elseif ($c->province == 25) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['chimbote']++;
                    } else {
                        $pocket['chimbote']++;
                    }
                } else {
                    $otros['chimbote']++;
                }
            } elseif ($c->province == 122) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['trujillo']++;
                    } else {
                        $pocket['trujillo']++;
                    }
                } else {
                    $otros['trujillo']++;
                }
            } elseif ($c->province == 99) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['ica']++;
                    } else {
                        $pocket['ica']++;
                    }
                } else {
                    $otros['ica']++;
                }
            } elseif ($c->province == 73) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['cuzco']++;
                    } else {
                        $pocket['cuzco']++;
                    }
                } else {
                    $otros['cuzco']++;
                }
            } elseif ($c->province == 124) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['chiclayo']++;
                    } else {
                        $pocket['chiclayo']++;
                    }
                } else {
                    $otros['chiclayo']++;
                }
            } elseif ($c->province == 135) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['lima']++;
                    } else {
                        $pocket['lima']++;
                    }
                } else {
                    $otros['lima']++;
                }
            } elseif ($c->province == 106) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['huancayo']++;
                    } else {
                        $pocket['huancayo']++;
                    }
                } else {
                    $otros['huancayo']++;
                }
            }elseif ($c->province == 157) {
                if ($c->modelpocket == 1) {
                    if ($c->brand == 1) {
                        $pro['piura']++;
                    } else {
                        $pocket['piura']++;
                    }
                } else {
                    $otros['piura']++;
                }
            }
        }


        ///




        return view('dashboard.principal', [
            'percent' => $percent,
            'pos_otros' => $pos_otros,
            'cuota' => $cuota,
            'pre_pocket' => $pre_pocket,
            'pro_pocket' => $pro_pocket,
            'precio_pro' => $precio_pro,
            'precio_pre' => $precio_pre,
            'precio_full' => $precio_full,
            'a_liqui' => $a_liqui,
            'cash_pre' => $cash_pre,
            'cash_tot' => $cash_tot,
            'cash_pro' => $cash_pro,
            'totcontratos' => $totcontratos,
            'contracts' => $contracts,
            'dias' => $dias,
            'pocket' => $pocket,
            'pro' => $pro,
            'usuarios' => $usuarios,
            'otros' => $otros,
            'querys' => $querys,
            'title' => 'Dashboard',
            'breadcrumb' => 'admin'
        ]);
    }


    public function getSalesTotal()
    {
        $querys =  \DB::table('users')
            ->leftJoin('contracts', 'users.id', '=', 'contracts.seller')
            ->leftJoin('districts', 'districts.id', '=', 'users.district')
            ->select(
                DB::raw('CONCAT(users.surname, ", ", users.name) AS full_name'),
                'users.id as idsup',
                'districts.name',
                DB::raw("count(contracts.seller) AS total")
            )
            ->groupBy('users.id', 'full_name')
            ->whereIn('contracts.status', ['1'])
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->take(5)->get();

        $contracts_days =  \DB::table('users')
            ->leftJoin('contracts', 'users.id', '=', 'contracts.seller')
            ->leftJoin('districts', 'districts.id', '=', 'users.district')
            ->select(
                DB::raw('CONCAT(users.surname, ", ", users.name) AS full_name'),
                'users.id as idsup',
                'districts.name',
                DB::raw("count(contracts.seller) AS total")
            )
            ->groupBy('users.id', 'full_name')
            ->whereIn('contracts.status', ['1'])
            ->whereMonth('contracts.created_at', '=', Carbon::now()->month)
            ->whereYear('contracts.created_at', '=', Carbon::now()->year)
            ->whereDay('contracts.created_at', '=', Carbon::now()->day)
            ->take(5)->get();

        $querys->suma = 0;
        foreach ($contracts_days as $c) {
            foreach ($querys as $query) {
                if ($query->idsup == $c->idsup) {
                    $query->suma = $c->total;
                }
            }
        }
        //print_r($querys);die();
        $datatable = DataTables::of($querys)->make(true);
        //return datatables()->eloquent(\App\User::query())->toJson();
        return $datatable;
    }

    public function actualizaPrecio(Request $request)
    {
        $precio_pro = Brand::whereId(1)->first();
        $precio_pre = Brand::whereId(2)->first();
        $precio_full = Brand::whereId(3)->first();

        $precio_pro->precio = request('pro');
        $precio_pro->save();
        $precio_pre->precio = request('jr');
        $precio_pre->save();
        $precio_full->precio = request('full');
        $precio_full->save();

        $pro = Contract::whereBrand(1)
            ->whereBetween('created_at', [request('ini'), request('fin')])->get();
        $pre = Contract::whereBrand(2)
                ->whereBetween('created_at', [request('ini'), request('fin')])->get();
        $full = Contract::whereBrand(3)
                    ->whereBetween('created_at', [request('ini'), request('fin')])->get();

        foreach ($pro as $p) {
            $p->precio = $precio_pro->precio;
            $p->save();
        }
        foreach ($pre as $p) {
            $p->precio = $precio_pre->precio;
            $p->save();
        }
        foreach ($full as $p) {
            if (substr($p->ruc, 0, 2) === '10') {
                $p->precio =  $precio_full->precio - 30;
            } elseif (substr($p->ruc, 0, 2) === '20') {
                $p->precio =  $precio_full->precio-200;
            } else {
                $p->precio =  $precio_full->precio;
            }
            $p->save();
        }
        return redirect()->route('home');
    }
}
