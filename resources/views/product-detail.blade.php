@extends('master')
@section('home')
<style>
  .header{
    background: #fff;
    animation: none;
    -webkit-box-shadow: 0 0 3px rgb(0 0 0 / 8%) inset;
    box-shadow: 6px 5px 8px 3px rgb(0 0 0 / 8%);
  }

  .product-heading__same{
    border-top: 1px solid #ccc;
    margin:0;
    padding-top: 20px;
  }
</style>

<div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img style="width: 100%" src = "{{ url('images') }}/{{$product->image}}" >
              
              <!-- Phần ảnh mô tả -->
              @foreach($images as $image)
                <img class="" style="width: 100%" src = "{{ url('images') }}/{{$image}}" >
              @endforeach
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img style="width: 100%" src = "{{ url('images') }}/{{$product->image}}" alt = "shoe image">
              </a>
            </div>

            @foreach($images as $key => $image)
              <div class = "img-item">
                <a href = "#" data-id = "{{ $key + 2 }}">
                    <img style="width: 100%" src = "{{ url('images') }}/{{$image}}" alt = "shoe image">
                </a>
              </div>            
            @endforeach

          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">{{ $product->name }}</h2>

          <div class = "product-price">
            <p class = "last-price">Giá cũ: <span>{{ number_format($product->price,0,".",".") }} đ</span></p>
            <p class = "new-price">Giá sale: <span>{{ number_format($product->sale_price,0,".",".") }} đ</span></p>
          </div>

          <div class = "product-detail">
            <h2>Mô tả về sản phẩm: </h2>
            {!! $product->description !!}
          </div>
          <!-- Add sản phẩn vào giỏ hàng -->
          <form method="POST" action="{{ route('add.cart') }}" class = "purchase-info">
            @csrf
            <div class="form-group">
                <h2 class="title-method" >Màu sắc: </h2>
                @foreach($color as $value)
                  
                    <label class="lable-color">
                        <input class="dn"  type="radio" name="color" id="" value="{{ $value }}" >
                        {{ $value }}
                    </label>
                  
                @endforeach
                @error('color')
                        <span class="message-err" style="color:red;font-size: 14px;display: block;">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
              <h2 class="title-method" >Kích thước: </h2>
                @foreach($size as $value)
                  
                    <label class="lable-size ">
                        <input  class="dn"   type="radio" name="size" id="" value="{{ $value }}" >
                        {{ $value }}
                    </label>
                  
                @endforeach
                @error('size')
                        <span class="message-err" style="color:red;font-size: 14px;display: block;">{{ $message }}</span>
                @enderror
              </div>
            <input type="hidden" name="id" value="{{ $product->id }}">
            <label class="quantity-form" for="number">Số lượng:</label>
            <input id="number" type="number" min="1" name="quantity"  value = "1">
            <input type="hidden" name="action" value="add">

            <button type = "submit" class = "btn">
              Thêm vào giỏ hàng <i class = "fas fa-shopping-cart"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
                <div class="grid wide">
                <div class="product-new">
                          <div class="product-heading">
                             <h1 class="product-heading__same">Sản phẩm tương tự</h1>
                          </div>
                          <div class="row">
                            
                            @foreach($productSame as $value)
                                <div class="col l-3 m-6 c-6 ">
                                    <div class="product">
                                        <a href="{{ route('product.detail',$value->id) }}" class="product-item">
                                            <div class="product-item__img" style="background-image:url({{ url('images') }}/{{$value->image}})"></div>
                                            <h4 class="product-item__name">{{$value->name}}</h4>
                                            <div class="product-item__price">
                                                @if($value->sale_price > 0)
                                                <span class="product-item__price-old">{{ number_format($value->price,0,".",".") }}đ</span>
                                                <span class="product-item__price-present">{{ number_format($value->sale_price,0,".",".") }}đ</span>
                                                @else
                                                <span class="product-item__price-present">{{ number_format($value->price,0,".",".") }}đ</span>
                                                @endif
                                            </div>
                                            @if($value->sale_price > 0)
                                            <span class="product-item__sale">Giảm {{ceil(100-(($value->sale_price/$value->price)*100))}}%</span>
                                            @else
                                            <span class="product-item__sale">Giảm 0%</span>
                                            @endif
                                        </a>
                                        <div class="product-item__btn">
                                            <a href="{{ route('product.detail',$value->id) }}" class="product-item__btn-buy">
                                                <i class="ti-shopping-cart"></i>
                                                Đặt hàng
                                            </a>
                                            <span class="product-item__btn-brick"></span>
                                            <a href="{{ route('product.detail',$value->id) }}" class="product-item__btn-buy">
                                                <i class="ti-eye"></i>
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </div>                               
                                </div>
                            @endforeach
                          </div>
                          
                    </div>
                    
             </div>
    

        

        

 <script>
    

    // Khi click vào chọn size và màu


 </script>            
@stop

@section('javascrip')
<script src="{{ url('frontend') }}/js/product_detail.js"></script>
@stop
         