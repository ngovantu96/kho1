@extends('home')
@section('title', 'Danh sách tỉnh thành')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Quan Tri</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Quan Tri</th>

                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key => $role)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $role->name }}</td>

                            <td><a href="{{ route('role.edit',$role->id) }}">sửa</a></td>
                            <td><a href="{{ route('role.delete',$role->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                @endforeach

                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('role.create') }}">Thêm mới</a>
        </div>
    </div>
@endsection
