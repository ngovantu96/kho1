@extends('home')
@section('title', 'Thêm mới khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('user.store') }}" >
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" >
{{--                        @error('name')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" >
{{--                        @error('image')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" >
{{--                        @error('email')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input name="roles[{{ $role->id }}]" class="form-check-input" type="checkbox" value="{{ $role->id }}">
                                <label class="form-check-label">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
