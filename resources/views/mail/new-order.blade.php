<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Thông Báo Đơn Hàng Mới</title>
</head>
<body>
    <h1>Bạn có đơn hàng mới</h1>
    <h3>Mã đơn hàng: {{ $id }}</h3>
    <h3>Danh sách sản phẩm:</h3>
    @foreach ($cart as $value)
    <p>{{ $loop->iteration }}: {{ $value['product_name'] }}</p>
    @endforeach
</body>
</html>