@extends('master')
@section('page-title','Danh Sách nhan vien')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Danh sách Sản Phẩm</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh Sác Sản Phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">


                            <a href="{{ route('create') }}"> <button type="button" class="btn btn-primary">
                                    Thêm Mới
                                </button></a>
                            <a href="{{ route('active') }}"> <button type="button" class="btn btn-primary">
                                    active
                                </button></a>
                            <a href="{{route('inActive')}}"> <button type="button" class="btn btn-primary">
                                    inActive
                                </button></a>
                            <a href="{{route('thongke')}}"> <button type="button" class="btn btn-primary">
                                    Thong ke
                                </button></a>
                        </div>

                        <div class="col-12">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>description</th>
                                    <th>active</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as  $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->active }}</td>
                                        <td><a href="{{ route('edit',$product->id) }}"><button type="button" class="btn btn-warning">edit</button></a>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
