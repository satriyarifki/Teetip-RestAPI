<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class GetDataController extends Controller
{
    public function getrole()
    {
        $roleuser = Role::all();
        return response()->json([
            'success' => true,
            'role' => $roleuser,
           ]);
    }
    
}
