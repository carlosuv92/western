<?php

namespace App\Http\Controllers;

use App\Department;
use App\Role;
use App\RoleUser;
use App\TypeDocument;
use App\User;
use App\UserRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.user.index', [
            'title' => 'Usuarios',
            'breadcrumb' => 'crud'
        ]);
    }


    public function create()
    {
        $documents = TypeDocument::orderBy('name')->get();
        $departments = Department::where('status',1)->orderBy('name')->get();

        $supervisors = User::whereHas('roles', function ($q) {
            $q->where('name', 'supervisor_seller');
        })->orderBy('surname', 'asc')->where('active', 1)->get();

        $roles = Role::orderBy('name')->get();

        return view('admin.user.create', [
            'documents' => $documents,
            'departments' => $departments,
            'supervisors' => $supervisors,
            'roles' => $roles,
            'title' => 'Usuarios',
            'breadcrumb' => 'crud'
        ]);
    }

    public function edit($id)
    {
        $documents = TypeDocument::orderBy('name')->get();
        $departments = Department::where('status',1)->orderBy('name')->get();

        $supervisors = User::whereHas('roles', function ($q) {
            $q->where('name', 'supervisor_seller');
        })->orderBy('surname', 'asc')->where('active', 1)->get();

        $roles = Role::orderBy('name')->get();

        $user = \DB::table('users')
            ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftJoin('user_relations', 'users.id', '=', 'user_relations.user')
            ->select('users.*', 'role_user.role_id', 'user_relations.supervisor')
            ->where('users.id', '=', $id)
            ->first();

        return view('admin.user.edit', [
            'documents' => $documents,
            'departments' => $departments,
            'user' => $user,
            'supervisors' => $supervisors,
            'roles' => $roles,
            'title' => 'Usuarios',
            'breadcrumb' => 'crud'
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|unique:users',
            'document' => 'required|unique:users',
        ];
        $customMessages = [
            'unique' => 'Cuidado!! el campo :attribute debe ser unico',
        ];

        $request->validate($rules, $customMessages);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->email = $request->input('email');
            $user->department = $request->input('department');
            $user->type_document = $request->input('type_document');
            $user->document = $request->input('document');
            $user->password = bcrypt('123456');
            $user->active = 1;
            $user->save();

            $userrole = new RoleUser();
            $userrole->user_id = $user->id;
            $userrole->role_id = $request->input('role');
            $userrole->save();

            if ($userrole->role_id == 4) {
                $relation = new UserRelation();
                $relation->user = $user->id;
                $relation->supervisor = $user->id;
                $relation->save();

                $userrole = new RoleUser();
                $userrole->user_id = $user->id;
                $userrole->role_id = 3;
                $userrole->save();

            } else if ($userrole->role_id == 3) {
                $relation = new UserRelation();
                $relation->user = $user->id;
                $relation->supervisor = $request->input('supervisor');
                $relation->save();
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
        return redirect()->route('usuarios.index');
    }


    public function update(Request $request, $id)
    {

    }

    public function active($id)
    {
        $user = User::find($id);
        $user->active = true;
        $user->save();
    }


    public function desactive($id)
    {
        $user = User::find($id);
        $user->active = false;
        $user->save();
    }
}
