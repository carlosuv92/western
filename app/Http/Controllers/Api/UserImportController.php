<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Imports\UsersImport;

use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    public function importFile(Request $request)
    {
    	if ($request->hasFile('import')) {
	        $file = $request->file('import');

	        switch($request->input('file')) {
	        	case 'users':
	        		Excel::import(new UsersImport, $file);
                    break;
            }
	    	return response()->json(array(
	            'status' =>  "archivo cargado"
	        ), 200);
	    } else {
	    	return response()->json(array(
	            'error' =>  "archivo no encontrado"
	        ), 401);
	    }
    }
}
