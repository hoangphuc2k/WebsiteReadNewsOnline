<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\Http\Requests\RolesRequest;

class RolesController extends Controller
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
        $listRole['Data'] = Roles::where('Status','=','Yes')->get();
        return view('Roles.allRoles',$listRole);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Roles.addRoles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        //
        // $this->validate($request, [
        //     'RoleName' => 'bail|required|max:1000'
        // ]);
        $data = $request->all();
        $roles = Roles::create($data);
        return response()->json(['data'=>$roles],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Roles= Roles::where('RoleCode','=',$id)->get();
        return response()->json(['data'=>$Roles],200);
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
        $Roles= Roles::where('RoleCode','=',$id)->where('Status','=','Yes')->get();
        return response()->json(['data'=>$Roles],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request, $id)
    {
        //
        $Role = Roles::where('RoleCode','=',$id)->update(['RoleName'=>$request->RoleName]);
        return response()->json(['data'=>$Role],200);
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
        $Role = Roles::where('RoleCode','=',$id)->update(['Status'=>'No']);
        return response()->json(['data'=>'removed'],200);
    }
}
