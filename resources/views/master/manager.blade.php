<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <meta name="csrf-token" content="{{@csrf_token()}}">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/manager/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/manager/dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/manager/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/manager/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/manager/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/manager/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/manager/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/manager/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/manager/dist/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="/manager/dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="/manager/dist/css/custom-style.css">
    <link rel="stylesheet" href="/css/app.css">


</head>
<body>

@yield('main_body')
<div class="wrapper">


    <!-- Main Sidebar Container -->




@include('admin.section.navbar')
@include('admin.section.sidebar')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>CopyLeft &copy; 2018 <a href=" "> ناصر جعفری  </a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>


<!-- jQuery -->
<script src="/manager/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/manager/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/manager/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/manager/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/manager/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/manager/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/manager/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="/manager/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/manager/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/manager/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/manager/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/manager/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/manager/dist/js/adminlte.js"></script>
<script src="/manager/dist/js/persian-date.min.js"></script>
<script src="/manager/dist/js/persian-datepicker.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/manager/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/manager/dist/js/demo.js"></script>
<script src="/home/js/plyr.min.js"></script>
<script src="/home/js/fun.js"></script>
{{--<script src="/home/js/libd.js"></script>--}}

<script src="{{asset('/js/app.js')}}"></script>

</body>
@include('sweet::alert')
</html>
