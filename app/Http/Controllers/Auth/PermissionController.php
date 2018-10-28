<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;
use Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelcode = Auth::user()->hotelcode;
        $roles = Role::where('hotelcode','=',$hotelcode)->get();
        $permissions = Permission::all();
        $formtype="insert";
        return view('auth.permission',compact('roles','permissions','formtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $role = Role::where('id','=',$request->role_id)->first();
            $role->permissions()->sync($request->permission_id);
            return redirect()->route('permissions.edit', ['id' => $role]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
            ->pluck('permission_role.permission_id','permission_role.permission_id')
            ->all();

        $formtype="edit";
        return view('auth.permission',compact('role','permissions','rolePermissions','formtype'));
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
        $role = Role::where('id','=',$id)->first();
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('permissions.edit', ['id' => $role]);
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
