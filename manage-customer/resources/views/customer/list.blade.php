@extends('home')
@section('title', 'Danh sách khách hàng')
@section('content')
    <script>
        $(document).ready(function(){
           $("tr:even").css("background-color","yellow");
        });
    </script>
    <!-- Button trigger modal -->

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Thêm Mới
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Khách Hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên khách hàng</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" >
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Hinh Anh</label>
                            <input type="file" class="form-control" name="image" id="image" >
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" >
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birthday">Ngày sinh</label>
                            <input type="date" class="form-control" name="dob" id="birthday" >
                            @error('dob')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group"> <a href=""></a>
                            <label for="city"> Tỉnh thành</label>
                            <select class="form-control" name="city_id" id="city">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
{{--                    <a class="btn btn-primary" href="{{ route('customers.create') }}">Lưu</a>--}}
                </div>
            </div>
        </div>
    </div>

        <!-- chinh sua -->
        <!-- Modal -->



    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Khách Hàng</h1></div>
            <div class="col-6">

                <form class="navbar-form navbar-left" action="{{ route('customers.search') }}" method="get">

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

                    @if(isset($totalCustomerFilter))
                        <span class="text-muted">
                    {{'Tìm thấy' . ' ' . $totalCustomerFilter . ' '. 'khách hàng:'}}
                </span>
                    @endif

                    @if(isset($cityFilter))
                        <div class="pl-5">
                   <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                       {{ 'Thuộc tỉnh' . ' ' . $cityFilter->name }}</span>
                        </div>
                    @endif

            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Hinh Anh</th>
                    <th scope="col">Ngày Sinh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tinh Thanh</th>

                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <td scope="row">{{ ++$key }}</td>
                            <td>{{ $customer->name }}</td>
                            <td><img src="{{ asset('storage/'.substr($customer->image,7)) }}" width="100px" height="100px"></td>
                            <td>{{ $customer->dob }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->city->name }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $customer->id) }}">sủa</a>

                            </td>
                            <td><a href="{{ route('customers.destroy', $customer->id) }}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
<!--sua khach hang -->
    <!-- phan trnag -->
{{--    {{ $customers->appends(request()->query()) }}--}}

    <div class="modal fade" id="cityModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form action="{{ route('customers.filterByCity') }}" method="get">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!--Lọc theo khóa học -->
                        <div class="select-by-program">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh thành</label>
                                <div class="col-sm-7">
                                    <select class="custom-select w-100" name="city_id">
                                        <option value="">Chọn tỉnh thành</option>
                                        @foreach($cities as $city)
                                            @if(isset($cityFilter))
                                                @if($city->id == $cityFilter->id)
                                                    <option value="{{$city->id}}" selected >{{ $city->name }}</option>
                                                @else
                                                    <option value="{{$city->id}}">{{ $city->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{$city->id}}">{{ $city->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <!--End-->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitAjax" class="btn btn-primary" >Chọn</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
