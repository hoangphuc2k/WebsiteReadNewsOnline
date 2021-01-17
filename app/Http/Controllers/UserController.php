<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\User;
use App\Roles;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listUser['Data'] = User::where('Status','=','Yes')->get();
        return view('User.allUser',$listUser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listRole['Data'] = Roles::where('Status','=','Yes')->get();
        return view('User.addUser',$listRole);
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
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if($request->hasFile('Img')){
            $data['Img'] = $user->id."user.jpg";
            $file = $request->Img;
            Storage::putFileAs('public', new File($file), $data['Img']);
            $user = User::find($user->id)->update($data);
        }
        if($user){
            return redirect()->route('User.index');
        }else{
            return view('User.addUser');
        }
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
        $user = User::find($id);
        return view('User.detailUser',$user);
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
        $user = User::find($id); 
        $listRoles['roles'] = Roles::all();
        return view('User.editUser',$user,$listRoles);
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
        //
        $data = $request->all();
        $user = User::find($id);
        if($request->hasFile('Img')){
            $data['Img'] = $user->id."user.jpg";
            $file = $request->Img;
            Storage::delete(storage_path('public/'.$data['Img']));
            Storage::putFileAs('public', new File($file), $data['Img']);
        }
        $request->Img = $user->id."user.jpg";
        $user = User::find($id)->update([
            'Username'=> $request->Username,
            'email' => $request->email,
            'FullName' => $request->FullName,
            'RoleCode_FK' => $request->RoleCode_FK,
            'Img' => $request->Img
        ]);
        return redirect()->route('User.index');
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
        $Role = Roles::find($id)->update(['Status'=>'No']);
        return redirect()->route('User.index');
    }
}
