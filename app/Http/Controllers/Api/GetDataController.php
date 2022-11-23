<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Warehouse;

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
    
    public function getWarehouse()
    {
        $warehouse = Warehouse::all();
        return response()->json([
            'success'=> true,
            'warehouse' => $warehouse,
        ]);
    }
}
