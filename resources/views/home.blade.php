@extends('master')
@section('home')
            <!-- slider -->
             <div class="slide">
                  <div class="slide-move">
                         <div class="slide-move__item active">
                             <a href="{{$sliderOne->link}}" target="_blank" class="slide-move__item-link">
                                <img class="slide-move__item-img" src="{{url('images')}}/{{$sliderOne->image}}"alt="">
                             </a>
                         </div>
                         <div class="slide-move__item">
                            <a href="{{$sliderTwo->link}}" target="_blank" class="slide-move__item-link">
                                <img class="slide-move__item-img" src="{{url('images')}}/{{$sliderTwo->image}}"alt="">
                            </a>
                        </div>
                        <div class="slide-move__item">
                            <a href="{{$sliderThree->link}}" target="_blank" class="slide-move__item-link">
                                <img class="slide-move__item-img" src="{{url('images')}}/{{$sliderThree->image}}"alt="">
                            </a>
                        </div>
                       
                  </div>
                  <div class="slide-next">
                      <span class="slide-up"><i class="ti-angle-right"></i></span>
                      <span class="slide-back"><i class="ti-angle-left"></i></span>
                  </div>
             </div>

            <!-- product -->
             <div class="products">
                <div class="grid wide">
                    <div class="product-new">
                          <div class="product-heading">
                             <h2 class="product-heading__title">SẢN PHẨM MỚI</h2>
                             <h3 class="product-heading__subtitle">New Arrival</h3>
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
                          <div class="see-all">
                              <a href="{{ route('see.all') }}" class="see-all-link">Xem tất cả mẫu mới</a>
                          </div>
                    </div>
                    <div class="product-new">
                        <div class="product-heading">
                           <h2 class="product-heading__title">SIÊU SALE THÁNG</h2>
                           <h3 class="product-heading__subtitle">Sale off</h3>
                        </div>
                        <div class="row">
                        @foreach($productSale as $value)
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
                        <div class="see-all">
                            <a href="{{ route('see.all.sale') }}" class="see-all-link">Xem tất cả</a>
                        </div>
                    </div>
                    <div class="product-new">
                        <div class="product-heading">
                           <h2 class="product-heading__title">TOP BÁN CHẠY NHẤT</h2>
                           <h3 class="product-heading__subtitle">Hot Item</h3>
                        </div>
                        <div class="row">
                            <!-- img top bán CHẠY -->
                            <div class="col l-6 m-12 c-12">                               
                                <a class="hot-item" href="{{ $proHot->link }}">
                                    <img class="hot-item-img" src="{{url('images')}}/{{$proHot->image}}" alt="">
                               </a>                               
                            </div>


                            <div class="col l-6 m-12 c-12">
                                <div class="row ">
                                   
                                    @foreach($productTopSale as $value)
                                <div class="col l-2-6 m-6 c-6 ">
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
                            
                            <div class="see-all">
                                <a href="{{ route('see.all.buy') }}" class="see-all-link">Xem tất cả</a>
                            </div>
                        </div>
                    </div>    
             </div>
             <!-- end product -->
             <div class="look-book">
                 <div class="grid wide">
                     <h1 class="look-book-name">LOOK BOOK</h1>
                     <div class="row">
                         @foreach($lookBook as $value)
                        <div class="col l-3 m-6 c-6 ">
                            <a href="{{$value->link}}" target="_blank" class="look-book-item">
                                <img src="{{url('images')}}/{{$value->image}}" alt="look-book" class="look-book-image">
                                <h2 class="name-look-book">{{$value->name}}</h2>
                            </a>
                        </div> 
                        @endforeach   
                     </div>
                 </div>
             </div>
               
@stop

@section('javascrip')
<script src="{{ url('frontend') }}/js/slide.js"></script>
@stop
         