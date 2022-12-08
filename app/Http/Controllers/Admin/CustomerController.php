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
        
        if($request->identity_photo!=null){ 
            // dd($request->identity_photo); 
            $identity_photo = $request->identity_photo->store('profile/customer/'. $request->id, 'public');
        }

        UserCustomer::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'identity_photo' => ($identity_photo != null) ?$identity_photo : $request->identity_photo,
        ]);
        
        return redirect('/admin/customer')->with('success', "Data berhasil diubah");
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
        return redirect('/admin/customer')->with('success', "Data berhasil dihapus");
    }
}
