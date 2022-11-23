<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserOwner;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Owner';
        $tables = UserOwner::all();
        return view('admin.owner.index', compact('tables', 'title'));
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
        $title = 'Owner';
        $data = UserOwner::where('id', $id)->first();
        return view('admin.owner.edit', compact('title', 'data'));
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
        $tables = UserOwner::where('id', $id)->first();
        
        $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'identity_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        
        $identity_photo = null;
        

        if($tables->image && file_exists(storage_path('app/public/'. $tables->cover_image))){
            Storage::delete(['public/', $tables->cover_image]);
        }

        if($request->identity_photo!=null){
            
            $identity_photo = $request->identity_photo->store('profile/'. $request->id, 'public');
        }
        

        UserOwner::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'identity_photo' => ($identity_photo != null) ? $identity_photo : $request->identity_photo,
        ]);
        
        return redirect('/admin/owner')->with('success', "Data berhasil diubah");
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
        return redirect('/admin/owner')->with('success', "Data berhasil dihapus");
    }
}
