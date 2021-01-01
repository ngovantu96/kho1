
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Danh sách khách hàng</h1>
<p><a href=" {{ route('create') }} ">add customer</a></p>

<table border="1">
    <thead>
    <tr>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    <?php $customers = [
        [
            'id'=>'1',
            'name'=> 'nguyen van a',
            'phone'=>'0943535345',
            'email'=>'vana@gmail.com'
        ],
        [
            'id'=>'2',
            'name'=> 'nguyen van b',
            'phone'=>'0943535345',
            'email'=>'vana@gmail.com'
        ],
        [
            'id'=>'3',
            'name'=> 'nguyen van c',
            'phone'=>'0943535345',
            'email'=>'vanc@gmail.com'
        ],
    ] ?>
     @foreach ($customers as $key=>$value)
    <tr>
        <td>{{ $value['id'] }}</td>
        <td>{{$value['name']}}</td>
        <td>{{$value['phone']}}</td>
        <td>{{$value['email']}}</td>
        <td>
            <a href=" {{ route('show') }} ">Xem</a> | <a href="">Sửa</a> | <a href="#">Xóa</a>
        </td>
    </tr>
     @endforeach



    </tbody>
</table>
</body>
</html>

