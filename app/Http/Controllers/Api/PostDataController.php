<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailWarehouse;
use App\Models\Transaction;
use App\Models\UserCustomer;
use Illuminate\Http\Request;

class PostDataController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'start_at' => 'required',
            'end_at' => 'required',
            'detailId' => 'required',
            'harga'=> 'required',
            'luas' => 'required',
            'idCust' => 'required',
        ]);

        $customer = UserCustomer::where('user_id', $request->idCust)->first();
        // dd($customer->id);
        $owner = DetailWarehouse::where('id', $request->detailId)->first();
        $total = $request->harga * $request->total_hari;

        Transaction::create([
            'txid' => 'TX'.time(),
            'user_customer_id' => $customer->id,
            'user_owner_id' => $owner->warehouse->user_owner_id,
            'detail_warehouse_id' => $request->detailId,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'information' => $request->information,
            'total' => $total
        ]);

        return response()->json([
            'success' => true,
           ],200);
    }
}
