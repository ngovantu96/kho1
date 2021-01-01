<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\CreateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.list', compact('users'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }
    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->roles);
        return redirect()->route('user.index');

    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }
    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index');
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
    public function search(){

    }
    public function login(){
        return view('user.login');
    }
    public function checklogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        $auth = Auth::attempt(['email'=> $email, 'password'=>$password]);

        if($auth){
            return redirect()->route('user.index');
        }else {
            return redirect()->route('login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
