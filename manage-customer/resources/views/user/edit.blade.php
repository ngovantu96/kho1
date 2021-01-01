@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Chinh Sua khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" placeholder="Enter name" >
                        {{--                        @error('name')--}}
                        {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}" placeholder="Enter password" >
                        {{--                        @error('image')--}}
                        {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="Enter email" >
                        {{--                        @error('email')--}}
                        {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                        {{--                        @enderror--}}
                    </div>

                    <button type="submit" class="btn btn-primary">Cap Nhat</button>
                </form>
            </div>
        </div>
    </div>
@endsection
