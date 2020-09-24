<?php

namespace App\Http\Controllers\Api;

use App\Distrito;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provincia;
use App\User;

class JqueryController extends Controller
{
    public function getDepartmentSeller($id){
        return User::where('users.id',$id)->select('departments.name','users.department')->Join('departments','departments.id','=','users.department')->first();
    }

    public function getDistrito($id){
        return Distrito::where('province_id',$id)->select('id','name')->get();
    }

    public function getProvincia($id){
        return Provincia::where('department_id',$id)->select('id','name')->get();
    }

}
