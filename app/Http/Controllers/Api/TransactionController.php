<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailWarehouse;
use App\Models\Transaction;
use App\Models\UserCustomer;
use Illuminate\Http\Request;
use DateTime;
use Date;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        Transaction::where('txid', $id)->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
           ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
