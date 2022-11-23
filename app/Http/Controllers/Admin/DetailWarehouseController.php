<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\DetailWarehouse;
use Illuminate\Support\Facades\Storage;

class DetailWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'DetailWarehouse';
        $tables = DetailWarehouse::all();
        return view('admin.detail-warehouse.index', compact('tables', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.detail-warehouse.create');
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
            'panjang_petak' => 'required',
            'lebar_petak' => 'required',
            'luas_petak' => 'required',
            'harga' => 'required',
        ]);

        DetailWarehouse::where('id', $id)->create([
            'panjang_petak' => $request->panjang_petak,
            'lebar_petak' => $request->lebar_petak,
            'luas_petak' => $request->luas_petak,
            'harga' => $request->harga,
        ]);
        
        return redirect('/admin/detail-warehouse')->with('success', "Data berhasil diubah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'DetailWarehouse';
        $data = DetailWarehouse::where('id', $id)->first();
        return view('admin.detail-warehouse.detail', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'DetailWarehouse';
        $data = DetailWarehouse::where('id', $id)->first();
        return view('admin.detail-warehouse.edit', compact('title', 'data'));
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
            'panjang_petak' => 'required',
            'lebar_petak' => 'required',
            'luas_petak' => 'required',
            'harga' => 'required',
        ]);

        DetailWarehouse::where('id', $id)->update([
            'panjang_petak' => $request->panjang_petak,
            'lebar_petak' => $request->lebar_petak,
            'luas_petak' => $request->luas_petak,
            'harga' => $request->harga,
        ]);
        
        return redirect('/admin/detail-warehouse')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailWarehouse::where('id', $id)->delete();
        return redirect('/admin/detail-warehouse')->with('success', "Data berhasil dihapus");
    }
}
