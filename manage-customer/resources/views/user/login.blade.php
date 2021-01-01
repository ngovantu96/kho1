@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>DANG NHAP</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('checklogin') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" name="email" id="name" placeholder="Enter name" >

                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" >

                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
