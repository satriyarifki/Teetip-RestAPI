<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Owner';
        $tables = Warehouse::all();
        return view('admin.warehouse.index', compact('tables', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warehouse.create');
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
            'deskripsi' => 'required',
            'alamat' => 'required',
            'luas_total' => 'required',
            'harga_m2' => 'required',
            'tipe' => 'required',
        ]);

        Warehouse::where('id', $id)->create([
            'deskripsi' => $request->name,
            'alamat' => $request->alamat,
            'luas_total' => $request->luas_total,
            'harga_m2' => $request->harga_m2,
            'tipe' => $request->tipe,
        ]);
        
        return redirect('/admin/warehouse')->with('success', "Data berhasil diubah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Warehouse';
        $data = UserWarehouse::where('id', $id)->first();
        return view('admin.warehouse.detail', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Warehouse';
        $data = UserWarehouse::where('id', $id)->first();
        return view('admin.warehouse.edit', compact('title', 'data'));
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
            'deskripsi' => 'required',
            'alamat' => 'required',
            'luas_total' => 'required',
            'harga_m2' => 'required',
            'tipe' => 'required',
        ]);

        UserCustomer::where('id', $id)->update([
            'deskripsi' => $request->name,
            'alamat' => $request->alamat,
            'luas_total' => $request->luas_total,
            'harga_m2' => $request->harga_m2,
            'tipe' => $request->tipe,
        ]);
        
        return redirect('/admin/warehouse')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserOwner::where('id', $id)->delete();
        return redirect('/admin/warehouse')->with('success', "Data berhasil dihapus");
    }
}
