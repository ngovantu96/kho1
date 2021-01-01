@extends('master')
@section('page-title','Danh Sách Nguoi Dung')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12 col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h1>Thêm mới san phẩm</h1>

                                    </div>
                                    <div class="col-12">
                                        <form method="post" action="{{ route('store') }}"  enctype="multipart/form-data" >
                                            @csrf
                                            <div class="form-group">
                                                <label>name</label>
                                                <input type="text" class="form-control" name="name"  required>
{{--                                                @error('name')--}}
{{--                                                <div class="alert alert-danger">{{ $messege }}</div>--}}
{{--                                                @enderror--}}
                                            </div>

                                            <div class="form-group">
                                                <label >price</label>
                                                <input type="text" class="form-control" name="price"  required>
                                                @error('price')
                                                <div class="alert alert-danger">{{ $messege }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label >description</label>
                                                <input type="text" class="form-control" name="description"  required>
{{--                                                @error('description')--}}
{{--                                                <div class="alert alert-danger">{{ $messege }}</div>--}}
{{--                                                @enderror--}}
                                            </div>
                                            <div class="form-group">
                                                <label >active</label>
                                                <input type="number" name="active" min="0" max="1">

                                            </div>
                                            <div class="form-group">
                                                <label >categoryId</label>
                                                <input type="number" name="category_id" min="0" max="3">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </form>

                        <!-- /.card-body -->
                    </div>
                                </div>
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
