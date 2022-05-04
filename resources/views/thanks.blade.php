@extends('master')
@section('home')


    <div class="thank">
        <i class="fas fa-check-circle icon"></i>
        <h2 class="thank-title">Đặt hàng thành công</h2>
        <p class="thank-sub">Nhân viên của nabi sẽ liên hệ cho anh/chị để xác nhận đơn hàng trong ít phút</p>
        <a href="{{ route('home') }}" class="continue-buy">Tiếp tục mua hàng</a>
    </div>
            
@stop


         