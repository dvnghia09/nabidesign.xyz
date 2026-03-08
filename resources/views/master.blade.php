<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $settings['meta_title'] ?? ($settings['brand_name'] ?? 'Nabi Design') }}</title>
    <meta name="description" content="{{ $settings['meta_description'] ?? ($settings['brand_name'] ?? 'Cung cấp sản phẩm chất lượng cao') }}">
    <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'nabi, design, ecommerce' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Favicon động --}}
    @if(!empty($settings['favicon']))
    <link rel="shortcut icon" type="image/png" href="{{ url('images/seo/' . $settings['favicon']) }}"/>
    <link rel="icon" href="{{ url('images/seo/' . $settings['favicon']) }}"/>
    @else
    <link rel="shortcut icon" type="image/png" href="{{ url('frontend') }}/img/logo.png"/>
    @endif
    {{-- OG Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $settings['og_title'] ?? ($settings['meta_title'] ?? ($settings['brand_name'] ?? 'Nabi Design')) }}">
    <meta property="og:description" content="{{ $settings['og_description'] ?? ($settings['meta_description'] ?? 'Cung cấp sản phẩm chất lượng cao') }}">
    @if(!empty($settings['og_image']))
    <meta property="og:image" content="{{ url('images/seo/' . $settings['og_image']) }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $settings['og_title'] ?? ($settings['brand_name'] ?? 'Nabi Design') }}">
    <meta name="twitter:description" content="{{ $settings['og_description'] ?? ($settings['meta_description'] ?? '') }}">
    @if(!empty($settings['og_image']))
    <meta name="twitter:image" content="{{ url('images/seo/' . $settings['og_image']) }}">
    @endif
    {{-- Google Analytics --}}
    @if(!empty($settings['google_analytics']))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['google_analytics'] }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ $settings['google_analytics'] }}');
    </script>
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/css/style.css?v={{ time() }}">
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
                         @if(!empty($settings['logo']))
                             <img src="{{ url('images/seo/' . $settings['logo']) }}"
                                  alt="{{ $settings['brand_name'] ?? 'Logo' }}"
                                  class="header-logo__img">
                         @else
                             <h2 class="header-logo__link-title">{{ $settings['brand_name'] ?? 'Nabi' }}</h2>
                         @endif
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
    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone'] ?? '0919295123') }}" class="call-btn shake">
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

        {{-- Thanh lợi ích --}}
        <div class="benefits-bar">
            <div class="benefits-bar__inner">
                <div class="benefits-bar__item">
                    <span class="benefits-bar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 5v4h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    </span>
                    <span class="benefits-bar__text">Giao hàng nhanh</span>
                </div>
                <div class="benefits-bar__item">
                    <span class="benefits-bar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                    </span>
                    <span class="benefits-bar__text">Hoá đơn đầy đủ</span>
                </div>
                <div class="benefits-bar__item">
                    <span class="benefits-bar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                    </span>
                    <span class="benefits-bar__text">Bảo hành chính hãng</span>
                </div>
                <div class="benefits-bar__item">
                    <span class="benefits-bar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/><path d="M6 8h4M6 11h4"/><rect x="14" y="8" width="4" height="5" rx="1"/></svg>
                    </span>
                    <span class="benefits-bar__text">Đa dạng sản phẩm</span>
                </div>
            </div>
        </div>

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
                            <div class="contact-item_link" style="cursor:default;">
                                <img class="contact-item_img" src="{{ url('frontend') }}/img/call.png" alt="">
                                <h2 class="contact-item_content">MUA HÀNG (8h00-22h00, T2-CN)</h2>
                                <p class="contact-item_content-sub">
                                    @php
                                        $phonesJson2 = $settings['phones'] ?? null;
                                        $phonesList2 = $phonesJson2 ? json_decode($phonesJson2, true) : [];
                                        if (empty($phonesList2) && !empty($settings['phone'])) {
                                            $phonesList2 = [['number' => $settings['phone'], 'label' => '']];
                                        }
                                    @endphp
                                    @foreach($phonesList2 as $ph2)
                                        @if(!empty($ph2['number']))
                                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $ph2['number']) }}" style="display:block; color:inherit;">
                                                @if(!empty($ph2['label']))<strong>{{ $ph2['label'] }}:</strong> @endif
                                                {{ $ph2['number'] }}
                                            </a>
                                        @endif
                                    @endforeach
                                </p>
                            </div>
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

<a href="{{ route('warranty.index') }}" class="footer__content-title">Chính sách bảo hành</a>
<a href="{{ route('contact.index') }}" class="footer__content-title">Liên hệ với chúng tôi</a>
                         </div>
                    </div>
                    <div class="col l-3 m-6 c-6 ">
                      <div class="footer__content">
                        <h4 class="footer__content-heading">
                         VỀ CHÚNG TÔI:
                        </h4>
                        <p class="footer__content-title"><strong>{{ $settings['company_name'] ?? 'Công ty TNHH NABI SHOP' }}</strong></p>
                        <p class="footer__content-title"><strong>Địa chỉ: </strong>{{ $settings['address'] ?? 'Số 96 Di Ái, Xã Di Trạch, Quận Hoài Đức, Thành phố Hà Nội' }}</p>
                        <p class="footer__content-title"><strong>Điện thoại: </strong>
                            @php
                                $phonesJson3 = $settings['phones'] ?? null;
                                $phonesList3 = $phonesJson3 ? json_decode($phonesJson3, true) : [];
                                if (empty($phonesList3) && !empty($settings['phone'])) {
                                    $phonesList3 = [['number' => $settings['phone'], 'label' => '']];
                                }
                            @endphp
                            @foreach($phonesList3 as $ph3)
                                @if(!empty($ph3['number']))
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $ph3['number']) }}" style="color:inherit; display:block;">
                                        @if(!empty($ph3['label']))<em>{{ $ph3['label'] }}:</em> @endif
                                        {{ $ph3['number'] }}
                                    </a>
                                @endif
                            @endforeach
                        </p>

                        <p class="footer__content-title"><strong>Email: </strong>{{ $settings['email'] ?? 'nghiadv13@gmail.com' }}</p>
                        <a href="">
                            <img class="Verification" src="" alt="">
                        </a>      
                      </div>

                  </div>
                  
                  <div class="col l-3 m-6 c-6 ">
                       <h4 class="footer__content-heading">THEO DÕI CHÚNG TÔI:</h4>
                       {{-- Social Links --}}
                        <div class="footer-social" style="margin-bottom: 20px;">
                            @if(!empty($settings['facebook_url']))
                            <a href="{{ $settings['facebook_url'] }}" target="_blank" rel="noopener" class="footer-social__link" title="Facebook" style="display:inline-block; margin-right:15px; font-size:24px; color:#1877f2;">
                                <i class="fab fa-facebook"></i>
                            </a>
                            @endif
                            @if(!empty($settings['zalo_url']))
                            <a href="{{ $settings['zalo_url'] }}" target="_blank" rel="noopener" class="footer-social__link" title="Zalo" style="display:inline-block; margin-right:15px; font-size:24px; color:#0068ff; transform: translateY(-3px);">
                                <svg viewBox="0 0 32 32" width="28" height="28" fill="currentColor">
                                    <text x="5" y="24" font-size="24" font-weight="900" font-family="Arial,sans-serif">Z</text>
                                </svg>
                            </a>
                            @endif
                            @if(!empty($settings['messenger_link']))
                            <a href="{{ $settings['messenger_link'] }}" target="_blank" rel="noopener" class="footer-social__link" title="Messenger" style="display:inline-block; margin-right:15px; font-size:24px; color:#0084ff;">
                                <i class="fab fa-facebook-messenger"></i>
                            </a>
                            @endif
                            @if(!empty($settings['phone']))
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}" class="footer-social__link" title="{{ 'Gọi điện' }}" style="display:inline-block; font-size:24px; color:#28a745;">
                                    <i class="fas fa-phone-square-alt"></i>
                                    
                                </a>
                                @endif
                            {{--@php
                                $phonesJson4 = $settings['phones'] ?? null;
                                $phonesList4 = $phonesJson4 ? json_decode($phonesJson4, true) : [];
                                if (empty($phonesList4) && !empty($settings['phone'])) {
                                    $phonesList4 = [['number' => $settings['phone'], 'label' => '']];
                                }
                            @endphp
                            @foreach($phonesList4 as $ph4)
                                @if(!empty($ph4['number']))
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $ph4['number']) }}" class="footer-social__link" title="{{ $ph4['label'] ?: 'Gọi điện' }}" style="display:inline-block; font-size:24px; color:#28a745;">
                                    <i class="fas fa-phone-square-alt"></i>
                                    @if(!empty($ph4['label']))<small style="font-size:11px; display:block; line-height:1;">{{ $ph4['label'] }}</small>@endif
                                </a>
                                @endif
                            @endforeach--}}
                        </div>
                       <div > 
                        <h3 class="footer-form_heading">FANPAGE CHÚNG TÔI</h3>                 
                        @if(!empty($settings['fanpage_iframe']))
                            {!! $settings['fanpage_iframe'] !!}
                        @else
                            <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnabicloset9&tabs=timeline&width=340&height=700&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                            width="100%"
                            height="220"
                            style="border: none; overflow: hidden;"
                            scrolling="no"
                            frameborder="0"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                            ></iframe>
                        @endif              
                       </div>
                       
                        {{--<div class="footer-form">                           
                            <h3 class="footer-form_heading">NHẬN ĐĂNG KÝ THÔNG TIN MỚI</h3>
                            <div class="footer-form_form">
                                <input class="footer-form_input" type="email" placeholder="Nhập email của bạn...">
                                <button class="footer-form_button">ĐĂNG KÝ</button>
                            </div> 
                        </div>--}}
                    </div>
                    <div class="col l-3 m-6 c-6 ">
                      <h4 class="footer__content-heading">ĐỊA CHỈ CỦA CHÚNG TÔI:</h4>
                      <div >  
                        @if(!empty($settings['map_iframe']))
                            {!! $settings['map_iframe'] !!}
                        @else
                            <iframe class="map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.750117515277!2d106.26297961422215!3d20.310607717282842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313609986cd3c043%3A0x8d338f0dacb29a19!2zxJDhu5IgR-G7liBRVUFORyDEkOG7ik5I!5e0!3m2!1svi!2s!4v1630928162018!5m2!1svi!2s"
                            width="100%"
                            height="300"
                            style="border: 0;"
                            allowfullscreen=""
                            loading="lazy"
                            ></iframe>
                        @endif                        
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
    {{-- Nút social floating (góc trái dưới màn hình) --}}
    <div class="social-float" id="socialFloat">
        {{-- Gọi điện - hiển thị tất cả số --}}
        @php
            $phonesJson5 = $settings['phones'] ?? null;
            $phonesList5 = $phonesJson5 ? json_decode($phonesJson5, true) : [];
            if (empty($phonesList5) && !empty($settings['phone'])) {
                $phonesList5 = [['number' => $settings['phone'], 'label' => '']];
            }
        @endphp
        @foreach($phonesList5 as $ph5)
            @if(!empty($ph5['number']))
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $ph5['number']) }}"
               class="social-float__item social-float__item--phone sf-phone-pill"
               title="{{ $ph5['label'] ?: $ph5['number'] }}">
                <span class="sf-phone-icon"><i class="fas fa-phone"></i></span>
                <span class="sf-phone-label">{{ $ph5['label'] ?: $ph5['number'] }}</span>
            </a>
            @endif
        @endforeach

        {{-- Facebook --}}
        @if(!empty($settings['facebook_url']))
        <a href="{{ $settings['facebook_url'] }}" target="_blank" rel="noopener"
           class="social-float__item social-float__item--fb" title="Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        @endif

        {{-- Zalo --}}
        @if(!empty($settings['zalo_url']))
        <a href="{{ $settings['zalo_url'] }}" target="_blank" rel="noopener"
           class="social-float__item social-float__item--zalo" title="Zalo">
            <svg viewBox="0 0 32 32" width="22" height="22" fill="currentColor">
                <text x="5" y="24" font-size="22" font-weight="900" font-family="Arial,sans-serif">Z</text>
            </svg>
        </a>
        @endif

        {{-- Messenger --}}
        @if(!empty($settings['messenger_link']))
        <a href="{{ $settings['messenger_link'] }}" target="_blank" rel="noopener"
           class="social-float__item social-float__item--mess" title="Messenger">
            <i class="fab fa-facebook-messenger"></i>
        </a>
        @endif
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