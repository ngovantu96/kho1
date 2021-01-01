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
                                        <h1>sửa sản phẩm</h1>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <form method="post" action="{{ route('update',$product->id) }}"  enctype="multipart/form-data" >
                                            @csrf
                                            <div class="form-group">
                                                <label>name</label>
                                                <input type="text" class="form-control" name="name" value="{{$product->name}}" required>

                                            </div>
                                            <div class="form-group">
                                                <label >price</label>
                                                <input type="text" class="form-control" name="price"  value="{{$product->price}}" required>

                                            </div>
                                            <div class="form-group">
                                                <label >description</label>
                                                <input type="text" class="form-control" name="description"  value="{{$product->description}}" required>

                                            </div>
                                            <div class="form-group">
                                                <label >active</label>
                                                <input type="number" value="{{$product->active}}" name="active" min="0" max="1">

                                            </div>
                                            <div class="form-group">
                                                <label >categoryId</label>
                                                <input type="number" name="category_id" min="0" max="1">

                                            </div>

                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- /.card-header -->

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
