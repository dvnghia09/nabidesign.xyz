<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ url('frontend') }}/img/logo.jpg"/>
    <link rel="stylesheet" href="{{ url('frontend') }}/css/account.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/font/fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Nabi Design</title>
</head>
<body>
    <!-- Nếu đăng nhập thì hiển thị ra tên email -->
    <!-- @if(Auth::check()){
        <h1>{{ Auth::user()->email }}</h1>
    }
    @else
    {
        <h1>Chưa đăng nhập</h1>
    }
    @endif -->

    <div class="header">
        <a href="{{ route('home') }}" class="logo">Nabi</a>
        <a href="{{ route('home') }}" class="exit">Trở lại</a>   
    </div>

    <div class="modal modal-active" style="background-image: url('frontend/img/login.jpg')" >
            <!-- form đăng nhập -->
            <div class="modal__form modal__form-active">
            <form action="{{ route('account.login') }}" method="POST">
                    @csrf
                <div class="modal__form-container">
                        <div class="modal__form-header">
                        <h3 class="modal__form-heading">Đăng nhập</h3>
                        
                        </div>
                        @if(Session::has('message'))              
                            <h2 class="message" >{{ Session::get('message') }}</h2>
                        @endif
                    <div class="modal__form-form">
                        <div class="modal__form-group">
                        <input type="email" class="modal__form-control" name="email" placeholder="Email ...">
                        </div>
                        <div class="modal__form-group">
                        <input type="password" class="modal__form-control" name="password" placeholder="Mật khẩu của bạn">
                        </div>
                    
                    </div>
                    
                        <div class="modal__form-help">
                            <a href="" class="modal__form-help-link modal__form-help-forgot">Quên Mật Khẩu</a>
                            <span class="modal__form-help-brick"></span> 
                            <a href="" class="modal__form-help-link">Cần trợ giúp?</a>
                        </div>
                    
                    <div class="modal__form-button">
                        <a href="{{ route('home') }}" class="btn btn-back">TRỞ LẠI</a>
                        <button type="submit" class="btn btn--primary">ĐĂNG NHẬP</button>
                    </div>
                </div>
                </form>
                    <div class="modal__form-socials hiden-mb-tb hiden">
                    <a href="https://www.facebook.com/" class="btn btn--size-s btn--fb">
                        <i class="fab fa-facebook-square btn--fb-icon"></i>
                        <span class="modal__form-social-title">Kết nối với Facebook</span>
                    
                    </a>
                    <a href="" class="btn btn--size-s btn--gg">
                        <img class="size-icon-google" src="https://img.icons8.com/color/48/000000/google-logo.png"/>
                        <span class="modal__form-social-title">Kết nối với Google</span>
                        
                    </a>

                    </div>


                </div>
            <!-- form đăng ký -->
            <div class="modal__form modal__form-active">
            <form action="{{ route('account.register') }}" method="POST">
                    @csrf
            <div class="modal__form-container">
            
                   
                    <div class="modal__form-header">
                    <h3 class="modal__form-heading">Đăng ký</h3>
                    
                    </div>
                <div class="modal__form-form">
                    <div class="modal__form-group">
                    <input type="text" class="modal__form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Tên ...">
                    @error('name')
                        <span class="message-err"  style="color:red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="modal__form-group">
                    <input type="text" class="modal__form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Email ...">
                    @error('email')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="modal__form-group">
                    <input type="password" class="modal__form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Nhập mật khẩu của bạn ...">
                    @error('password')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="modal__form-group">
                    <input type="password" class="modal__form-control @error('password_confirm') is-invalid @enderror" value="{{ old('password_confirm') }}" name="password_confirm" placeholder="Nhập lại mật khẩu của bạn ...">
                    @error('password_confirm')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                
                
                <div class="modal__form-button">
                    <a href="{{ route('home') }}" class="btn btn-back">TRỞ LẠI</a>
                    <button type="submit" class="btn btn--primary">ĐĂNG KÝ</button>
                </div>
            </div>
            </form>
                <div class="modal__form-socials hiden-mb-tb hiden">
                <a href="https://www.facebook.com/" class="btn btn--size-s btn--fb">
                    <i class="fab fa-facebook-square btn--fb-icon"></i>
                    <span class="modal__form-social-title">Kết nối với Facebook</span>
                
                </a>
                <a href="" class="btn btn--size-s btn--gg">
                    <img class="size-icon-google" src="https://img.icons8.com/color/48/000000/google-logo.png"/>
                    <span class="modal__form-social-title">Kết nối với Google</span>
                    
                </a>

                </div>


            </div>
            
            </div>
            
    </body>
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
</html>