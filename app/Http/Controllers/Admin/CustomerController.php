<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserCustomer;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Customer';
        $tables = UserCustomer::all();
        return view('admin.customer.index', compact('tables', 'title'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Customer';
        $data = UserCustomer::where('id', $id)->first();
        return view('admin.customer.detail', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Customer';
        $data = UserCustomer::where('id', $id)->first();
        return view('admin.customer.edit', compact('title', 'data'));
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
        $tables = UserCustomer::where('id', $id)->first();

        $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'identity_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $identity_photo = null;
        

        if($tables->image && file_exists(storage_path('app/public/'. $tables->cover_image))){
            Storage::delete(['public/', $tables->cover_image]);
        }

        if($request->image != null && $request->identity_photo && $request->driver_license && $request->selfie_photo){
            $image = $request->file('image')->store('profile/'. $request->id, 'public');
            $identity_photo = $request->file('identity_photo')->store('archives/'. $request->id, 'public');
        }

        UserCustomer::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'identity_photo' => ($identity_photo != null) ? $request->identity_photo : $identity_photo,
        ]);
        
        return redirect('/admin/customers')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserCustomer::where('id', $id)->delete();
        return redirect('/admin/customers')->with('success', "Data berhasil dihapus");
    }
}
