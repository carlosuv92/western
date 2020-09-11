<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeDocument;
use App\Departament;
use App\User;



class RegistroController extends Controller
{
    public function index()
    {
        $documents = TypeDocument::all();
        $departaments = Departament::all();


        return view('rrhh.registro', [
            'documents' => $documents,
            'departaments' => $departaments,
            'page' => [
                'title' => 'Listado de Usuarios',
                'subtitle' => 'CRUD Usuarios',
                'breadcrumb' => 'user',
            ],
        ]);
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->type_document = $request->type_document;
        $user->document = $request->document;
        $user->address = $request->address;
        $user->province = $request->province;
        $user->departament = $request->departament;
        $user->district = $request->district;
        $user->password = bcrypt('123456');
        $user->save();

        return "REGISTRO CORRECTO.";
    }
}
