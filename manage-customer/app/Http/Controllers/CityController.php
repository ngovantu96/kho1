<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index(){
        $cities = City::all();

        return view('city.list',compact('cities'));
    }
    public function create(){
        $cities = City::all();
        return view('city.create',compact('cities'));
    }
    public function store(Request $request){
        $city = new City();
        $city->name     = $request->input('name');
        $city->save();
        //tao mowi xong ve trnag khach hang
        return redirect()->route('customers.index');
    }
    public function edit($id){
        $city = City::findOrFail($id);
        return view('city.edit',compact('city'));
    }
    public function update(Request $request, $id){
        $city = City::findOrFail($id);
        $city->name = $request->input('name');
        $city->save();
//        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('Cities.index');
    }
    public function destroy($id){
        $city = City::findOrFail($id);
        $city->customers()->delete();
        $city->delete();

//        Session::flash('success', 'xoa nhật khách hàng thành công');

        return redirect()->route('Cities.index');
    }
}
