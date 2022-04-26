@extends('master')
@section('home')
<style>
  .header{
    background: #fff;
    animation: none;
    -webkit-box-shadow: 0 0 3px rgb(0 0 0 / 8%) inset;
    box-shadow: 6px 5px 8px 3px rgb(0 0 0 / 8%);
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
                <img style="width: 100%" src = "{{ url('images') }}/{{$image}}" >
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
          <a href = "{{ route('home') }}" class = "product-link">Quay lại cửa hàng</a>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>

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
              </div>
              <div class="form-group">
              <h2 class="title-method" >Kích thước: </h2>
                @foreach($size as $value)
                  
                    <label class="lable-size ">
                        <input  class="dn"   type="radio" name="size" id="" value="{{ $value }}" >
                        {{ $value }}
                    </label>
                  
                @endforeach
              </div>
            <input type="hidden" name="id" value="{{ $product->id }}">
            <label class="quantity-form" for="number">Số lượng:</label>
            <input id="number" type="number" min="1" name="quantity"  value = "1">
            <input type="hidden" name="action" value="add">

            <button type = "submit" class = "btn">
              Thêm vào giỏ hàng <i class = "fas fa-shopping-cart"></i>
            </button>
            <button type = "button" class = "btn">Mua ngay</button>
          </form>

          <div class = "social-links">
            <p>Chia sẻ tới: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div>
        </div>
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
         