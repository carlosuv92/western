<?php

namespace App\Http\Controllers\Api;

use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use App\User;

class JqueryController extends Controller
{
    public function getDepartmentSeller($id){
        return User::where('department',$id)->select('id','name','surname')->get();
    }

    public function getDistrito($id){
        return District::where('province_id',$id)->select('id','name')->get();
    }

    public function getProvincia($id){
        return Province::where('department_id',$id)->select('id','name')->get();
    }

}
