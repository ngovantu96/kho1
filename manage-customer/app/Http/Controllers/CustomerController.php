<?php

namespace App\Http\Controllers;


use App\Models\City;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

//use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
//        $customers = Customer::paginate(5);
        $cities = City::all();
        return view('customer.list', compact('customers', 'cities'));
    }

    public function filterByCity(Request $request)
    {
        $idCity = $request->input('city_id');
        //kiem tra city co ton tai khong
        $cityFilter = City::findOrFail($idCity);
        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();
        return view('customers.list', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }

//    public function create()
//    {
//        $cities = City::all();
//        return view('customer.create', compact('cities'));
//    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;

        $path = $request->image->store('public/avatar');
        $customer->image = $path;

//        $file = $request->image;
//        $fileName = $file->store('public');
//        $customer->image = $fileName;
//        $fileName = $request->file('image')->extension();
//        $customer->image = $fileName;


        $customer->email = $request->email;

        $customer->dob = $request->dob;
        $customer->city_id = $request->city_id;
        $customer->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới khách hàng thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $cities = City::all();
        return view('customer.edit', compact('customer', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;

        $path = $request->image->store('public/avatar');
        $customer->image = $path;

        $customer->email = $request->email;
        $customer->dob = $request->dob;
        $customer->city_id = $request->city_id;
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật khách hàng thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        Storage::delete($customer->image);
        $customer->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa khách hàng thành công');

        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = customer::where('name', 'like', '%' . $keyword . '%')->paginate(5);
        $cities = City::all();

        return view('customer.list', compact('customers', 'cities'));
    }

}
