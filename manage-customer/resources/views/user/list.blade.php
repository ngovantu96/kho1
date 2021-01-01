@extends('home')
@section('title', 'Danh sách nguoi dung')
@section('content')

{{--    <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--        <div class="container-fluid">--}}
{{--            <a class="navbar-brand" href="#">Navbar</a>--}}
{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Link</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="{{ route('user.logout') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            logout--}}
{{--                        </a>--}}

{{--                    </li>--}}

{{--                </ul>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}

    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Nguoi Dung</h1></div>
            <div class="col-6">

                <form class="navbar-form navbar-left" action="{{ route('user.search') }}" method="get">

                    @csrf

                    <div class="row">

                        <div class="col-8">

                            <div class="form-group">

                                <input type="text" name="search" class="form-control" placeholder="Search">

                            </div>

                        </div>

                        <div class="col-4">

                            <button type="submit" class="btn btn-default">Tìm kiếm</button>

                        </div>

                    </div>

                </form>

            </div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif

            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Nguoi Dung</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Role</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($users as $key => $user)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            </td>
                            <td><a href="{{ route('user.edit', $user->id) }}">sửa</a></td>
                            <td><a href="{{ route('user.destroy', $user->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            <a class="btn btn-primary" href="{{ route('user.create') }}">Thêm mới</a>
        </div>

    </div>

@endsection
