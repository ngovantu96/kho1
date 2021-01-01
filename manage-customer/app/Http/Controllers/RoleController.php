<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('role.list',compact('roles'));
    }
    public  function create() {
        $role = Role::all();
        return view('role.create',compact('role'));
    }
    public function store(Request $request){
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return redirect()->route('role.index');
    }
    public function edit($id) {
        $roles = Role::findOrFail($id);
        return view('role.edit',compact('roles'));

    }
    public  function update(Request $request,$id){
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
//        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('role.index');
    }
    public function destroy($id) {
        Role::where('id',$id)->delete();
        return redirect()->route('role.index');
    }
}
