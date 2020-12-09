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
        $data = $request->all();
        $roles = Roles::create($data);
        return redirect()->route('Roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Roles['data'] = Roles::where('RoleCode','=',$id)->where('Status','=','Yes')->get();
        return view('Roles.detailRoles',$Roles);
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
        $Roles['data'] = Roles::where('RoleCode','=',$id)->where('Status','=','Yes')->get();
        return view('Roles.editRoles',$Roles);
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
        return redirect()->route('Roles.index');
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
        return redirect()->route('Roles.index');
    }
}
