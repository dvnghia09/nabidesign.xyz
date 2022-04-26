
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nabi Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="shortcut icon" type="image/png" href="{{ url('frontend') }}/img/logo.png"/>
  <link rel="stylesheet" href="{{ url('assest') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('assest') }}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('assest') }}/css/AdminLTE.css">
  <link rel="stylesheet" href="{{ url('assest') }}/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{ url('assest') }}/css/jquery-ui.css">
  <link rel="stylesheet" href="{{ url('assest') }}/css/style.css" />
  <script src="{{ url('assest') }}/js/angular.min.js"></script>
  <script src="{{ url('assest') }}/js/app.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@include('admin.layouts.header') 

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
@include('admin.layouts.sidebar') 

  <!-- =============================================== -->

@yield('home')
  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">Nabi_Admin</a>.</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

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

