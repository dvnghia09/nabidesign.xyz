@extends('master')
@section('home')
<style>
    .mg-top{
        margin-top:84px !important;
    }
</style>

             <div class="products">
                <div class="grid wide">
                    <div class="product-new">
                          <div class="product-heading mg-top">
                            <ol class="breadcrumb-arrows hide-on-mobile">
                                <li class="breadcrumb-item"><a class="breadcrumb-item-link" href="/" target="_self"><i class="fa fa-home"></i>Trang chủ</a><i class="fa fa-angle-right icon-right" ></i></li>
                                <li class="breadcrumb-item disable"><span>Tìm kiếm</span></li>
                            </ol>
                             <h2 class="product-heading__title-cate">Kết quả tìm kiếm:{{ $key }}</h2>
                          </div>
                          <div class="row">
                            
                            @foreach($product as $value)
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
                                            <a href="" class="product-item__btn-buy">
                                                <i class="ti-shopping-cart"></i>
                                                Đặt hàng
                                            </a>
                                            <span class="product-item__btn-brick"></span>
                                            <a href="" class="product-item__btn-buy">
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
<script src="{{ url('frontend') }}/js/slide.js"></script>
@stop
         