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
<div class="wide grid no-margin ">
  <div class="breadcrumb ">
        <ol class="breadcrumb-arrows hide-on-mobile">
          <li class="breadcrumb-item"><a class="breadcrumb-item-link" href="/" target="_self"><i class="fa fa-home"></i>Trang chủ</a><i class="fa fa-angle-right icon-right" ></i></li>
          <li class="breadcrumb-item"><a class="breadcrumb-item-link" href="{{ route('product.category',$catePro->id) }}">{{ $catePro->name }}</a><i class="fa fa-angle-right icon-right" ></i></li>
          <li class="breadcrumb-item disable"><span>{{ $product->name }}</span></li>
        </ol>
  </div>
</div>

<div class = "card-wrapper">
      <div class = "card">
        <div class = "product-imgs">
          <!-- Ảnh detail trên mobile -->
          <div class="slideshow-container">
                  <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->
                  <div class="mySlides fade">
                    <img style="width: 100%" src = "{{ url('images') }}/{{$product->image}}" >
                    <div class="text">1 / {{count($images) + 1}}</div>
                  </div>
                  @foreach($images as $key => $image)
                  <div class="mySlides fade">
                    <img style="width: 100%" src = "{{ url('images') }}/{{$image}}" >
                    <div class="text">{{$key + 2}} / {{count($images) + 1}}</div>
                  </div>
                  @endforeach
                  <!-- Nút điều khiển mũi tên-->
                  <a class="prev" onclick="plusSlides(-1)">❮</a>
                  <a class="next" onclick="plusSlides(1)">❯</a>
                </div>
                

            
          <!--END Ảnh detail trên mobile -->
          <div class = "img-select hide-on-mobile" >
            <div class = "img-item" onclick="currentSlide(1)">
              <a href = "#" data-id = "1">
                <img style="width: 100%" src = "{{ url('images') }}/{{$product->image}}" alt = "shoe image">
              </a>
            </div>

            @foreach($images as $key => $image)
              <div class = "img-item" onclick="currentSlide({{$key+2}})">
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
            @if(!$product->price)
              <p class="new-price" style="margin-bottom: 8px;">Giá: Vui lòng liên hệ</p>
              <div style="display:flex; flex-wrap:wrap; gap:10px; margin-top:4px;">
                @php
                    $phonesJsonD = $settings['phones'] ?? null;
                    $phonesListD = $phonesJsonD ? json_decode($phonesJsonD, true) : [];
                    if (empty($phonesListD) && !empty($settings['phone'])) {
                        $phonesListD = [['number' => $settings['phone'], 'label' => '']];
                    }
                    $btnColors = [
                        'linear-gradient(135deg,#e53935,#c62828)',
                        'linear-gradient(135deg,#1e88e5,#1565c0)',
                        'linear-gradient(135deg,#43a047,#2e7d32)',
                        'linear-gradient(135deg,#fb8c00,#e65100)',
                    ];
                @endphp
                @foreach($phonesListD as $idxD => $phD)
                    @if(!empty($phD['number']))
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phD['number']) }}"
                       style="
                           display: inline-flex;
                           align-items: center;
                           gap: 8px;
                           background: {{ $btnColors[$idxD % count($btnColors)] }};
                           color: #fff;
                           text-decoration: none;
                           font-weight: 700;
                           font-size: 15px;
                           padding: 10px 20px;
                           border-radius: 50px;
                           box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                           transition: transform 0.2s ease, box-shadow 0.2s ease;
                           letter-spacing: 0.3px;
                       "
                       onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 18px rgba(0,0,0,0.28)';"
                       onmouseout="this.style.transform='';this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';">
                        <span style="width:30px;height:30px;border-radius:50%;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-phone" style="font-size:13px;"></i>
                        </span>
                        <span style="line-height:1.3;">
                            @if(!empty($phD['label']))<span style="display:block;font-size:11px;font-weight:400;opacity:0.88;">{{ $phD['label'] }}</span>@endif
                            {{ $phD['number'] }}
                        </span>
                    </a>
                    @endif
                @endforeach
              </div>
            @elseif($product->sale_price > 0)
              <p class = "last-price">Giá cũ: <span>{{ number_format($product->price,0,".",".") }} đ</span></p>
              <p class = "new-price">Giá sale: <span>{{ number_format($product->sale_price,0,".",".") }} đ</span></p>
            @else
              <p class = "new-price">Giá: <span>{{ number_format($product->price,0,".",".") }} đ</span></p>
            @endif
          </div>

          
          <!-- Add sản phẩn vào giỏ hàng -->
          <form method="POST" action="{{ route('add.cart') }}" class = "purchase-info">
            @csrf
            @foreach($attributes as $name => $values)
            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <h2 class="title-method" style="margin-top: 0">{{ $name }}: </h2>
                @foreach($values as $val)
                    <p style="font-size: 16px; margin-top: 0">
                        {{ $val->value }}
                    </p>
                @endforeach
              </div>
            @endforeach

            @if($product->price)
            <input type="hidden" name="id" value="{{ $product->id }}">
            <label class="quantity-form" for="number">Số lượng:</label>
            <input id="number" type="number" min="1" name="quantity"  value = "1">
            <input type="hidden" name="action" value="add">

            <button type = "submit" class = "btn">
              Thêm vào giỏ hàng <i class = "fas fa-shopping-cart"></i>
            </button>
            
            @endif
          </form>
          <div class = "product-detail">
            <h2>Mô tả về sản phẩm: </h2>
            {!! $product->description !!}
          </div>
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
                                        <a href="{{ route('product.detail', $value->slug ?? $value->id) }}" class="product-item">
                                            <div class="product-item__img" style="background-image:url({{ url('images') }}/{{$value->image}})"></div>
                                            <h4 class="product-item__name">{{$value->name}}</h4>
                                            <div class="product-item__price">
                                                @if(!$value->price)
                                                    <span class="product-item__price-present" style="color: #ff4d4d; font-weight: bold;">Liên hệ: {{ $settings['phone'] ?? '0919295123' }}</span>
                                                @elseif($value->sale_price > 0)
                                                    <span class="product-item__price-old">{{ number_format($value->price,0,".",".") }}đ</span>
                                                    <span class="product-item__price-present">{{ number_format($value->sale_price,0,".",".") }}đ</span>
                                                @else
                                                    <span class="product-item__price-present">{{ number_format($value->price,0,".",".") }}đ</span>
                                                @endif
                                            </div>
                                            @if($value->sale_price > 0 && $value->price > 0)
                                                <span class="product-item__sale">Giảm {{ceil(100-(($value->sale_price/$value->price)*100))}}%</span>
                                            @endif
                                        </a>
                                        <div class="product-item__btn">
                                            <a href="{{ route('product.detail', $value->slug ?? $value->id) }}" class="product-item__btn-buy">
                                                <i class="ti-shopping-cart"></i>
                                                Đặt hàng
                                            </a>
                                            <span class="product-item__btn-brick"></span>
                                            <a href="{{ route('product.detail', $value->slug ?? $value->id) }}" class="product-item__btn-buy">
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
             
@stop

@section('javascrip')
    <script src="{{ url('frontend') }}/js/product_detail.js"></script>
    <script>
      // khi chọn size và màu 

    var attrs = document.querySelectorAll('.lable-attr')

    attrs.forEach(function(item,index){
        item.onclick = function(){
            let parent = this.parentElement;
            if(parent.querySelector('.lable-attr.border-black')){
                parent.querySelector('.lable-attr.border-black').classList.remove('border-black')
            }
            this.classList.add('border-black');
        }
    })
    </script>
@stop
         