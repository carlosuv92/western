<?php

namespace App\Http\Controllers;

use App\Departament;
use App\District;
use App\Province;
use App\Role;
use App\RoleUser;
use App\TypeDocument;
use App\User;
use App\UserRelation;
use CreateUserRelationsTable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (\Auth::user()->hasRole('admin')) {
            return view('admin.user.index', [
                'title' => 'Usuarios',
                'breadcrumb' => 'crud'
            ]);
        } elseif (\Auth::user()->hasRole('seller')) {
            return view('super.user.index', [
                'title' => 'Usuarios',
                'breadcrumb' => 'crud'
            ]);
        } elseif (\Auth::user()->hasRole('super')) {
            return view('super.user.index', [
                'title' => 'Usuarios',
                'breadcrumb' => 'crud'
            ]);
        }
    }


    public function create()
    {
        $documents = TypeDocument::orderBy('name')->get();
        $supervisors = User::whereHas('roles', function ($q) {
            $q->where('name', 'super');
        })->orderBy('surname', 'asc')->where('active', 1)->get();

        $roles = Role::orderBy('name')->get();
        if (\Auth::user()->hasRole('admin')) {
            return view('admin.user.create', [
                'documents' => $documents,
                'supervisors' => $supervisors,
                'roles' =>$roles,
                'title' => 'Usuarios',
                'breadcrumb' => 'crud'
            ]);
        }elseif (\Auth::user()->hasRole('super')) {
            return view('super.user.create', [
                'documents' => $documents,
                'supervisors' => $supervisors,
                'roles' =>$roles,
                'title' => 'Usuarios',
                'breadcrumb' => 'crud'
            ]);
        }
    }

    public function edit($id)
    {
        $documents = TypeDocument::orderBy('name')->get();
        $supervisors = User::whereHas('roles', function ($q) {
            $q->where('name', 'super');
        })->orderBy('surname', 'asc')->where('active', 1)->get();

        $roles = Role::orderBy('name')->get();

        $user = \DB::table('users')
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftJoin('user_relations', 'users.id', '=', 'user_relations.user')
            ->select('users.*', 'role_user.role_id', 'user_relations.supervisor')
            ->where('users.id', '=', $id)
            ->first();

        if (\Auth::user()->hasRole('admin')) {
            return view('admin.user.edit', [
                'documents' => $documents,
                'user' => $user,
                'supervisors' => $supervisors,
                'roles' =>$roles,
                'title' => 'Usuarios',
                'breadcrumb' => 'crud'
            ]);
        }elseif (\Auth::user()->hasRole('super')) {
            return view('super.user.edit', [
                'documents' => $documents,
                'user' => $user,
                'supervisors' => $supervisors,
                'roles' =>$roles,
                'title' => 'Usuarios',
                'breadcrumb' => 'crud'
            ]);
        }
    }

    public function store(Request $request)
    {

        /* CREANDO UN NUEVO USUARIO */
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');

        if($request->input('address')==35){
            $user->address="AREQUIPA";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==25){
            $user->address="CHIMBOTE";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==122){
            $user->address="TRUJILLO";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==99){
            $user->address="ICA";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==124){
            $user->address="CHICLAYO";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==135){
            $user->address="LIMA";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==106){
            $user->address="HUANCAYO";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==157){
            $user->address="PIURA";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }


        $user->type_document = $request->input('type_document');
        $user->document = $request->input('document');
        $user->email = $request->input('email');
        $user->password = bcrypt('123456');
        $user->active = 1;
        $user->save();

        /* ASIGNACION DEL ROL DE USUARIO */
        $userrole = new RoleUser();
        $userrole->user_id = $user->id; /* RECONOCE EL USUARIO ANTES CREADO */
        $userrole->role_id = $request->input('role');
        $userrole->save();

        /* ASIGNACION DEL LA RELACION DE USUARIO */

        if ($userrole->role_id == 3) {
            $relation = new UserRelation();
            $relation->user = $user->id; /* RECONOCE EL USUARIO ANTES CREADO */
            $relation->supervisor = $user->id;
            $relation->salesmanager = $user->id;
            $relation->save();
        } else if ($userrole->role_id == 2) {
            $relation = new UserRelation();
            $relation->user = $user->id; /* RECONOCE EL USUARIO ANTES CREADO */
            $relation->supervisor = $request->input('supervisor');
            $relation->salesmanager =   $request->input('supervisor');
            $relation->save();
        }



        return redirect()->route('usuarios.index'); /* REDIRIGE A LA PANTALLA DE INICIO */
    }


    public function update(Request $request, $id)
    {

        /* CREANDO UN NUEVO USUARIO */
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');

        if($request->input('address')==35){
            $user->address="AREQUIPA";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==25){
            $user->address="CHIMBOTE";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==122){
            $user->address="TRUJILLO";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==99){
            $user->address="ICA";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==124){
            $user->address="CHICLAYO";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==135){
            $user->address="LIMA";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==106){
            $user->address="HUANCAYO";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }
        if($request->input('address')==157){
            $user->address="PIURA";
            $user->province = $request->input('address');
            $user->departament = Province::whereId($user->province)->first()->departament;
            $user->district =District::whereName($user->address)->first()->id;
        }


        $user->type_document = $request->input('type_document');
        $user->document = $request->input('document');
        $user->email = $request->input('email');
        $user->save();

        /* ASIGNACION DEL ROL DE USUARIO */
        $userrole = new RoleUser();
        $userrole->user_id = $user->id; /* RECONOCE EL USUARIO ANTES CREADO */
        $userrole->role_id = $request->input('role');
        $userrole->save();

        /* ASIGNACION DEL LA RELACION DE USUARIO */
        $relation = UserRelation::where('user', $id)->first();
        if ($userrole->role_id == 3) {
            $relation = new UserRelation();
            $relation->user = $user->id; /* RECONOCE EL USUARIO ANTES CREADO */
            $relation->supervisor = $user->id;
            $relation->salesmanager = $user->id;
            $relation->save();
        } else if ($userrole->role_id == 2) {
            $relation = new UserRelation();
            $relation->user = $user->id; /* RECONOCE EL USUARIO ANTES CREADO */
            $relation->supervisor = $request->input('supervisor');
            $relation->salesmanager =   $request->input('supervisor');
            $relation->save();
        }


        /* SI EL USUARIO TIENE UN RELACION ENTONCES LO EDITA
        SINO CREA Y ASIGNA EL RELACION AL USUARIO */
        $relation = UserRelation::where('user', $id)->first();
        if ($relation) {
            $relation->supervisor = $request->input('supervisor');
            $relation->salesmanager = UserRelation::where('user', $request->input('supervisor'))->first()->salesmanager;
            //$relation->salesmanager = $request->manager;
            $relation->save();

            $contracts = Contract::whereMonth('created_at', '=', Carbon::now()->month)->where('seller', $id)->get();
            foreach ($contracts as $contract) {
                $contract->supervisor_seller = $request->input('supervisor');
                $contract->sales_manager =$relation->salesmanager;
                $contract->save();
            }
        } else {
            if ($userrole->role_id == 3) {
                $relation = new UserRelation();
                $relation->user = $user->id; /* RECONOCE EL USUARIO ANTES CREADO */
                $relation->supervisor = $user->id;
                $relation->salesmanager =   $user->id;
                $relation->save();
            } else if ($userrole->role_id == 2) {
                $relation = new UserRelation();
                $relation->user = $user->id; /* RECONOCE EL USUARIO ANTES CREADO */
                $relation->supervisor = $request->input('supervisor');
                $relation->salesmanager =   $request->input('supervisor');
                $relation->save();
            }
        }

        return redirect()->route('usuarios.index'); /* REDIRIGE A LA PANTALLA DE INICIO */
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->active = true;
        $user->save();
    }


    /* CESAR USUARIO */
    public function desactive($id)
    {
        $user = User::find($id);
        $user->active = false;
        $user->save();
    }

}
