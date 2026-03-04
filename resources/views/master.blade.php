<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $settings['meta_title'] ?? ($settings['brand_name'] ?? 'Nabi Design') }}</title>
    <meta name="description" content="{{ $settings['meta_description'] ?? ($settings['brand_name'] ?? 'Cung cấp sản phẩm chất lượng cao') }}">
    <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'nabi, design, ecommerce' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ url('frontend') }}/img/logo.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/css/base.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/css/grid.css">
    @yield('style')
    <link rel="stylesheet" href="{{ url('frontend') }}/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('frontend') }}/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/font/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
    

</head>
<body>
    
   <div id="app">
       <header class="header">

                <!-- navbar and search on mobile-table -->
                <div class="header-left">
                    <div class="header-menu-mobile">
                        <i class="ti-menu header-menu-mobile-icon"></i>
                    </div>

                    <div class="nav-mobile-overlay">

                    </div>

                    <nav class="nav-mobile">
                        <div class="nav-mobile-title">
                            <h4 class="nav-mobile-title-sub">
                                MENU
                            </h4>
                        </div>
                        <ul class="nav-mobile-list">
                        @foreach($category as $value)
                            <li class="nav-mobile-item">
                                <div class="nav-mobile-item-wrapper">
                                    <a href="{{ ($value->link && $value->link != '#') ? $value->link : route('product.parent-category', $value->id) }}" class="nav-mobile-item__link">
                                        {{ $value->name }}
                                    </a>
                                    @if(count($value->categorySub) > 0)
                                        <i class="ti-angle-down nav-mobile-toggle"></i>
                                    @endif
                                </div>
                                @if(count($value->categorySub) > 0)
                                    <ul class="nav-mobile__child">
                                        @foreach($value->categorySub as $cate)
                                            <li class="nav-mobile__child-item">
                                                <a href="{{ route('product.category',$cate->id) }}" class="nav-mobile__child-item-link">{{$cate->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        <li class="nav-mobile-item">
                            <a href="{{ route('warranty.index') }}" class="nav-mobile-item__link">CHÍNH SÁCH BẢO HÀNH</a>
                        </li>
                        <li class="nav-mobile-item">
                            <a href="{{ route('contact.index') }}" class="nav-mobile-item__link">LIÊN HỆ</a>
                        </li>
                        </ul>
                        <div class="nav-close">
                            <i class="ti-close nav-close-icon"></i>
                        </div>
                    </nav>

                    <div class="header-menu-mobile">
                        <i class="ti-search header-menu-mobile-search"></i>
                    </div>
                    
                    
                </div>

                <div class="header-logo">
                     <a class="header-logo__link" href="{{route('home')}}">
                         <h2 class="header-logo__link-title">{{ $settings['brand_name'] ?? 'Nabi' }}</h2>
                     </a>
                </div>
               <div class="header-menu  hide-on-mobile-table">
                   <ul class="header-menu-list">
                       
                        @foreach($category as $value)  
                        <li class="header-menu__item">
                           <a href="{{ ($value->link && $value->link != '#') ? $value->link : route('product.parent-category', $value->id) }}" class="header-menu__item-link">{{ $value->name }}</a>
                           <ul class="header-menu__child">
                                @foreach($value->categorySub as $cate)
                                    <li class="header-menu__child-item">
                                        <a href="{{ route('product.category',$cate->id) }}" class="header-menu__child-item-link">{{$cate->name}}</a>
                                    </li>
                                @endforeach
                                
                           </ul>
                        </li>

                        @endforeach

                        <li class="header-menu__item">
                            <a href="{{ route('warranty.index') }}" class="header-menu__item-link">CHÍNH SÁCH BẢO HÀNH</a>
                        </li>
                        <li class="header-menu__item">
                            <a href="{{ route('contact.index') }}" class="header-menu__item-link">LIÊN HỆ</a>
                        </li>

                   </ul>

               </div>
               <div class="header-right ">
                    <div class="header-search hide-on-mobile-table">
                        <form action="{{ route('product.search') }}" method="POST">
                            @csrf
                            <div class="header-search__form" >
                            <input class="header-search__form-input" type="text" name="key" placeholder="Tìm kiếm...">
                            <button type="submit" class="header-search__form-btn">
                                <i class="ti-search"></i>
                            </button>
                            </div>

                        </form>
                    </div>
                    <div class="header-function">
                        
                    {{--<div class="header-function-sub">
                        <a href="{{ route('user') }}" class="header-user__link" title="Đăng nhập" ><i class="ti-user"></i></a>
                    </div>
                    <div class="header-function-sub">
                       <a href="{{ route('showCart.user') }}" class="header-user__link" title="Giỏ hàng"><i class="ti-shopping-cart"></i></a>
                        @if($totalQuantity > 0)
                            <span class="noti_cart-quantity">{{ $totalQuantity }}</span>
                        @endif
                    </div>--}}
                    <div class="header-call">
    <a href="tel:{{ $settings['phone'] ?? '0919295123' }}" class="call-btn shake">
        <div class="call-btn-content">

            <span class="call-icon">📞</span>
            <span class="call-text">Gọi ngay</span>
        </div>
        <span class="call-number">{{ $settings['phone'] ?? '0919.295.123' }}</span>
    </a>
</div>
                    </div>
               </div>
            
        </header>

        <div class="app__container">
            @yield('home')      
        </div>
        
        <div class="contact">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-3 m-6 c-6 contact-item_padding">
                        <div class="contact-item">
                            <a class="contact-item_link" href="#">
                                <img class="contact-item_img" src="{{ url('frontend') }}/img/freeship.png" alt="">
                                <h2 class="contact-item_content">GIAO HÀNG TOÀN QUỐC</h2>
                            <p class="contact-item_content-sub">Nhận hàng tại nhà trên toàn quốc</p>
                            </a>
                        </div>
                    </div>
                    <div class="col l-3 m-6 c-6 contact-item_padding">
                        <div class="contact-item">
                            <a class="contact-item_link" href="#">
                                <img class="contact-item_img" src="{{ url('frontend') }}/img/antoan.png" alt="">
                                <h2 class="contact-item_content">ĐÓNG GÓI CẨN THẬN</h2>
                            <p class="contact-item_content-sub">Đóng gói cẩn thận, đảm bảo an toàn cho sản phẩm</p>
                            </a>
                        </div>
                    </div>
                    <div class="col l-3 m-6 c-6 contact-item_padding">
                        <div class="contact-item">
                            <a class="contact-item_link" href="tel:{{ $settings['phone'] ?? '0919295123' }}">
                                <img class="contact-item_img" src="{{ url('frontend') }}/img/call.png" alt="">
                                <h2 class="contact-item_content">MUA HÀNG (8h00-22h00, T2-CN)</h2>
                            <p class="contact-item_content-sub">Mua hàng : {{ $settings['phone'] ?? '0919.295.123' }}</p>
                            </a>
                        </div>
                    </div>
                    <div class="col l-3 m-6 c-6 contact-item_padding">
                        <div class="contact-item">
                            <a class="contact-item_link" href="#">
                                <img class="contact-item_img" src="{{ url('frontend') }}/img/thuhang.png" alt="">
                                <h2 class="contact-item_content">HỖ TRỢ 24/7</h2>
                            <p class="contact-item_content-sub">Luôn sẵn sàng hỗ trợ bạn</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- footer -->
        <footer class="footer">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-3 m-6 c-6 ">
                         <div class="footer__content">
                           <h4 class="footer__content-heading">
                            CHÍNH SÁCH VÀ QUY ĐỊNH:
                           </h4>
                           <a href="tel:{{ $settings['phone'] ?? '0919295123' }}" class="footer__content-title">Cách thức đặt hàng</a>
                           <a href="tel:{{ $settings['phone'] ?? '0919295123' }}" class="footer__content-title">Chính sách thành viên</a>
                           <a href="tel:{{ $settings['phone'] ?? '0919295123' }}" class="footer__content-title">Chính sách giao hàng</a>
                           <a href="tel:{{ $settings['phone'] ?? '0919295123' }}" class="footer__content-title">Quy định đổi trả</a>
                           <a href="tel:{{ $settings['phone'] ?? '0919295123' }}" class="footer__content-title">Hình thức thanh toán</a>
                           <a href="tel:{{ $settings['phone'] ?? '0919295123' }}" class="footer__content-title">Chính sách bảo mật</a>
                           <a href="tel:{{ $settings['phone'] ?? '0919295123' }}" class="footer__content-title">Chính sách xử lý khiêu nại</a>
                         </div>
                    </div>
                    <div class="col l-3 m-6 c-6 ">
                      <div class="footer__content">
                        <h4 class="footer__content-heading">
                         VỀ CHÚNG TÔI:
                        </h4>
                        <p class="footer__content-title"><strong>{{ $settings['company_name'] ?? 'Công ty TNHH NABI SHOP' }}</strong></p>
                        <p class="footer__content-title"><strong>Địa chỉ: </strong>{{ $settings['address'] ?? 'Số 96 Di Ái, Xã Di Trạch, Quận Hoài Đức, Thành phố Hà Nội' }}</p>
                        <p class="footer__content-title"><strong>Điện thoại: </strong>{{ $settings['phone'] ?? '091.9295.123' }}</p>
                        <p class="footer__content-title"><strong>Email: </strong>{{ $settings['email'] ?? 'nghiadv13@gmail.com' }}</p>
                        <a href="">
                            <img class="Verification" src="" alt="">
                        </a>      
                      </div>

                  </div>
                  
                  <div class="col l-3 m-6 c-6 ">
                       <h4 class="footer__content-heading">THEO DÕI CHÚNG TÔI:</h4>
                       <div > 
                        <h3 class="footer-form_heading">FANPAGE CHÚNG TÔI</h3>                 
                        <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnabicloset9&tabs=timeline&width=340&height=700&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="100%"
                        
                        style="border: none; overflow: hidden;"
                        scrolling="no"
                        frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                        ></iframe>              
                       </div>
                       
                        <div class="footer-form">                           
                            <h3 class="footer-form_heading">NHẬN ĐĂNG KÝ THÔNG TIN MỚI</h3>
                            <div class="footer-form_form">
                                <input class="footer-form_input" type="email" placeholder="Nhập email của bạn...">
                                <button class="footer-form_button">ĐĂNG KÝ</button>
                            </div> 
                        </div>
                    </div>
                    <div class="col l-3 m-6 c-6 ">
                      <h4 class="footer__content-heading">ĐỊA CHỈ CỦA CHÚNG TÔI:</h4>
                      <div >  
                        <iframe class="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.750117515277!2d106.26297961422215!3d20.310607717282842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313609986cd3c043%3A0x8d338f0dacb29a19!2zxJDhu5IgR-G7liBRVUFORyDEkOG7ik5I!5e0!3m2!1svi!2s!4v1630928162018!5m2!1svi!2s"
                        width="100%"
                        height="300"
                        style="border: 0;"
                        allowfullscreen=""
                        loading="lazy"
                        ></iframe>                        
                      </div>
                   </div>
                  </div>
        
            </div>
        
        
          </footer>

            <form action="{{ route('product.search') }}" method="POST">
                @csrf
                <div class="box-search">
                    <input class="header-search__form-input" name="key" type="text" placeholder="Tìm kiếm...">
                    <button type="submit" class="header-search__form-btn">
                        <i class="ti-search"></i>
                    </button>
                </div>
            </form>



        
        
   </div>
    <!-- Nhắn tin đến message -->
    <div class="btn-mess">
        <a href="{{ $settings['messenger_link'] ?? 'https://m.me/Nabidesign2020' }}" class="link-mess">
            <i class="fab fa-facebook-messenger"></i>
        </a>
    </div>

    <!-- nút quận lên đầu trang -->
    <div class="btntop">
        <span class="btntop-title">Về đầu trang</span>
        <img class="btntop-img" src="https://img.icons8.com/ios-glyphs/30/000000/long-arrow-right.png"/>
    </div>

  <script src="{{ url('frontend') }}/js/main.js"></script>
  @yield('javascrip')
    
</body>

 
    
 

  
</html>