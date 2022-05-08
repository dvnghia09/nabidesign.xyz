@extends('master')
@section('style')
    <link rel="stylesheet" href="{{ url('frontend') }}/css/cart.css">
@stop

@section('home')

    @if($totalQuantity == 0)

    <div class="no-cart-box">
    <div class="wide grid no-margin ">
        <ol class="breadcrumb-arrows hide-on-mobile">
          <li class="breadcrumb-item"><a class="breadcrumb-item-link" href="/" target="_self"><i class="fa fa-home"></i>Trang chủ</a><i class="fa fa-angle-right icon-right" ></i></li>
          <li class="breadcrumb-item disable"><span>Giỏ hàng</span></li>
        </ol>
    </div>
        <img class="no-cart" src="{{url('frontend')}}/img/empty-cart.png" alt="Không có sản phẩm">
    </div>
    @else
    <div class="grid wide">

        <main>
        <div class="wide grid no-margin ">
          <ol class="breadcrumb-arrows no-margin hide-on-mobile">
            <li class="breadcrumb-item"><a class="breadcrumb-item-link" href="/" target="_self"><i class="fa fa-home"></i>Trang chủ</a><i class="fa fa-angle-right icon-right" ></i></li>
            <li class="breadcrumb-item disable"><span>Giỏ hàng</span></li>
          </ol>
        </div>
            <div class="basket">
              <!-- <div class="basket-module">
                <label for="promo-code">Nhập mã khuyến mãi</label>
                <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
                <button class="promo-code-cta">Nhập</button>
              </div> -->
              <div class="basket-labels">
                <ul>
                  <li class="item item-heading">Sản phẩm</li>
                  <li class="price">Giá</li>
                  <li class="quantity">Số lượng</li>
                  <li class="subtotal">Tổng giá</li>
                </ul>
              </div>
            @foreach($cart->getItems() as $key => $value)
              <div class="basket-product">
                <div class="item">
                  <div class="product-image">
                    <img width="20px" src="{{url('images')}}/{{$value['image']}}" alt="Placholder Image 2" class="product-frame">
                  </div>
                  <div class="product-details">
                    <h1><strong class="name-pro">{{ $value['product_name'] }}</strong></h1>
                    <p><strong>Màu: {{ $value['color'] }}, Size: {{ $value['size'] }}</strong></p>
                    <p>Mã sản phẩm - {{ $value['product_id'] }}</p>
                  </div>
                </div>
                <div class="price"><span class="on-mobile">Giá:</span>{{ number_format($value['price'],0,".",".") }} đ</div>
                <div class="quantity">
                  <span class="on-mobile">Số lượng:</span>
                    <form class="form-update" action="{{ route('update.cart') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $key }}" >
                        <input type="number" name="quantity" value="{{ $value['quantity'] }}" min="1" class="quantity-field">
                        <button class="btn-update" type="submit">Cập nhật</button>
                    </form>
                </div>
                <div class="subtotal"><span class="on-mobile">Tổng giá:</span>{{ number_format($value['price'] * $value['quantity'],0,".",".") }} đ</div>
                <div >
                    <a class="remove" href="{{route('delete.cart',$key)}}">Xóa</a>
                </div>
              </div> 
            @endforeach
            </div>
            <aside>
              <div class="summary">
                <div class="summary-total-items"><span class="total-items"></span>Giá trị đơn hàng</div>
                <div class="summary-subtotal">
                  <div class="subtotal-title">Tổng giá</div>
                  <div class="subtotal-value final-value" id="basket-subtotal">{{ number_format($totalPrice,0,".",".")}} đ</div>
                  <div class="summary-promo hide">
                    <div class="promo-title">Khuyến mãi</div>
                    <div class="promo-value final-value" id="basket-promo"></div>
                  </div>
                </div>
                <div class="summary-subtotal">
                  <div class="subtotal-title">Tổng số lượng</div>
                  <div class="subtotal-value final-value" id="basket-subtotal">{{ $totalQuantity }}</div>
                </div>
                
                
                <div class="summary-total">
                  <div class="total-title">Tổng thanh toán</div>
                  <div class="total-value final-value" id="basket-total">{{ number_format($totalPrice,0,".",".")}} đ</div>
                </div>
                <div class="summary-checkout">
                  <a href="{{ route('checkout.index') }}" class="checkout-cta">Đặt hàng</a>
                </div>
              </div>
            </aside>
          </main>
    </div>  
    @endif
@stop

