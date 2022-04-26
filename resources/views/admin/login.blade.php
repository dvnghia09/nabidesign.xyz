<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nabi Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('assest') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('assest') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('assest') }}/css/AdminLTE.css">
    <link rel="stylesheet" href="{{ url('assest') }}/css/_all-skins.min.css">
    <link rel="stylesheet" href="{{ url('assest') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ url('assest') }}/css/style.css" />
    <script src="{{ url('assest') }}/js/angular.min.js"></script>
    <script src="{{ url('assest') }}/js/app.js"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Nabi</b> Admin</a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Đăng nhập để vào trang quản trị shop</p>

            <form action="{{ route('postLogin.admin') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email ..." name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror

                    @if(Session::has('err'))
                        <span style="color:red;" >{{ Session::get('err') }}</span>           
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control @error('sale_price') is-invalid @enderror" value="{{old('password')}}" placeholder="Mật Khẩu ..." name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror

                    @if(Session::has('message'))
                        <span style="color:red;" >{{ Session::get('message') }}</span>           
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                    style="position: relative;">
                                    <input type="checkbox" style="position: absolute; top: 0; left: -62%; display: block; width: 140%; /* height: 140%; */ margin: 0px; padding: 0px; margin-top: 4px;background: rgb(255, 255, 255); border: 1px solid #000; opacity: 1;">
                                    <ins
                                        class="iCheck-helper"
                                        style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div><span style="margin-left:22px">Nhớ mật khẩu</span> 
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                    </div>

                </div>
            </form>
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Đăng nhập bằng facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Đăng nhập bằng google</a>
            </div>

            <a href="#">Quên mật khẩu</a><br>
            <a href="register.html" class="text-center">Đăng ký tải khoản</a>
        </div>

    </div>


    <script src="{{ url('assest') }}/js/jquery.min.js"></script>
    <script src="{{ url('assest') }}/js/jquery-ui.js"></script>
    <script src="{{ url('assest') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('assest') }}/js/adminlte.min.js"></script>
    <script src="{{ url('assest') }}/js/dashboard.js"></script>
    @yield('tinymce')
    <script src="{{ url('assest') }}/js/function.js"></script>
    <script src="{{ url('assest') }}/js/app.js"></script>
</body>

</html>