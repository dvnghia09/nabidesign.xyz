@extends('master')
@section('style')
    <link rel="stylesheet" href="{{ url('frontend') }}/css/checkout.css">
@stop
@section('home')
<div class="grid wide check-out-container">

        <ol class="breadcrumb-arrows hide-on-mobile">
          <li class="breadcrumb-item"><a class="breadcrumb-item-link" href="/" target="_self"><i class="fa fa-home"></i>Trang chủ</a><i class="fa fa-angle-right icon-right" ></i></li>
          <li class="breadcrumb-item disable"><span>Đặt hàng</span></li>
        </ol>
<p class="checkout-title-sub" >Vui lòng nhập các trường bên dưới để hoàn tất đơn hàng của bạn</p>
<div class="row row-checkout">
  <!-- Sản phẩm -->
  <div class="col c-12 m-12 l-6">
    
              <div class="boxx">

              
              
              <div class="basket-labels">
                <ul class="list-item-pro" >
                  <li class="item item-heading">Sản phẩm</li>
                  <li class="price hide-on-mobile">Giá</li>
                  <li class="quantity hide-on-mobile">Số lượng</li>
                  <li class="subtotal">Tổng giá</li>
                </ul>
              </div>

              @foreach($cart->getItems() as $key => $value)
              <div class="basket-product">
                <div class="item">
                  <div class="product-image">
                    <img src="{{url('images')}}/{{$value['image']}}" alt="Ảnh sản phẩm" class="product-frame">
                  </div>
                  <div class="product-details">
                    <h1 class="product-details-name" >{{ $value['product_name'] }}</h1>
                    <p class="product-details-tt" ><strong>Màu: {{ $value['color'] }}, Size: {{ $value['size'] }} </br>Số lượng:{{ $value['quantity'] }}</strong></p>
                  </div>
                </div>
                <div class="price hide-on-mobile">{{ number_format($value['price'],0,".",".") }} đ</div>
                <div class="quantity hide-on-mobile">{{ $value['quantity'] }}</div>
                <div class="subtotal">{{ number_format($value['price'] * $value['quantity'],0,".",".") }} đ</div>
              </div> 
              @endforeach
              
              <div class="total-pay">
                <div class="pay-title">Tổng thanh toán : </div>
                <div class="pay-price"> {{ number_format($totalPrice,0,".",".")}} đ</div>
              </div>
      </div>
    
  </div>
  <!-- Form đặt hàng -->
  <div class="col c-12 m-12 l-6">
    <div class="container">
      <form action="" method="POST">
            @csrf
            <input type="hidden" name="id_user" value="{{ Auth::id() }}">
            <h3 class="form-title" >Thông tin giao hàng</h3>
            <div class="group-form">
                <label for="fname">Tên :</label>
                <input type="text" id="fname" value="{{ Auth::user() ? Auth::user()->name : '' }}" class="@error('name') is-invalid @enderror" name="name" placeholder="Nhập tên của bạn ...">
                    @error('name')
                        <p class="message-err" style="color:red;">{{ $message }}</p>
                    @enderror
            </div>
            <div class="group-form">
                <label for="fname1">Số điện thoại :</label>
                <input type="text" id="fname1" value="{{old('phone')}}" class="@error('phone') is-invalid @enderror" name="phone" placeholder="Nhập số điện thoại của bạn ...">
                    @error('phone')
                        <p class="message-err" style="color:red;">{{ $message }}</p>
                    @enderror
            </div>
            <div class="group-form">
                <label for="fname2">Địa chỉ :</label>
                <input type="text" id="fname2" value="{{old('address')}}" class="@error('address') is-invalid @enderror" name="address" placeholder="Nhập địa chỉ của bạn ...">
                    @error('address')
                        <p class="message-err" style="color:red;">{{ $message }}</p>
                    @enderror
            </div>
            <div class="group-form">
                <label for="fname3">Ghi chú :</label>
                <textarea name="note" id="fname3" cols="30" rows="10">{{old('note')}}</textarea>               
            </div>   

            <div class="submit-form group-form">
                <button class="btn" type="submit" >Đặt hàng</button>
            </div>
      </form>
    </div>
  </div>
  
</div>

</div>
<script>
  var inputAdd = document.querySelectorAll('.is-invalid')
  var messageErr = document.querySelectorAll('.message-err')



  inputAdd.forEach((value,index) => {
      const message =  messageErr[index]
      value.onfocus = function(){
          this.classList.remove("is-invalid")
          message.style.display = 'none'
      }
  })
</script>

@stop