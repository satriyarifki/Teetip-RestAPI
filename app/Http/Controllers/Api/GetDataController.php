<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailWarehouse;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\UserCustomer;
use App\Models\UserOwner;
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

    public function getTransaction($cust_id, $userid)
    {
        $trans = Transaction::where('user_customer_id', $cust_id)->where('user_id', $userid);
        return response()->json([
            'success'=> true,
            'transaction' => $trans
        ]);
    }

    public function getWarehouseDetails($id)
    {
        $ware = Warehouse::where('id',$id)->first();
        $det = DetailWarehouse::whereNotIn('id', Transaction::pluck('detail_warehouse_id')->all())->get();
        return response()->json([
            'success'=> true,
            'warehouse' => $ware,
            'detail' => $det,
        ]);
    }

    public function getOwnerWarehouse($id)
    {
        $owner = UserOwner::where('user_id', $id)->first();
        $warehouse = Warehouse::where('user_owner_id', $owner->id)->get();
        return response()->json([
            'success'=> true,
            'ownerHouse' => $warehouse,
            'owner' => $owner,
        ]);
    }
    public function getCust($id)
    {
        $customer = UserCustomer::where('user_id', $id)->first();
        return response()->json([
            'success'=> true,
            'customer' => $customer,
        ]);
    }

    public function getCustTransaction($id)
    {
        $owner = UserCustomer::where('user_id', $id)->first();
        $warehouse = Transaction::where('user_customer_id', $owner->id)->get();
        return response()->json([
            'success'=> true,
            'data' => $warehouse,
        ]);
    }
    public function getOwnerTransaction($id)
    {
        $owner = UserOwner::where('user_id', $id)->first();
        $warehouse = Transaction::where('user_owner_id', $owner->id)->get();
        return response()->json([
            'success'=> true,
            'data' => $warehouse,
        ]);
    }

    public function getImage()
    {
        # code...
    }
}
