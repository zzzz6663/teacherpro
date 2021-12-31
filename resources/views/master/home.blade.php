<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/home/css/style.css">
    <link rel="stylesheet" href="/home/css/persianDatepicker-default.css">

    <link rel="stylesheet" href="/home/css/responsive.css">
    <link rel="stylesheet" href="/home/css/iziToast.min.css">
    <link rel="stylesheet" href="/home/css/lightslider.css">
    <link rel="stylesheet" href="/home/css/select2.min.css">
    <link rel="stylesheet" href="/home/css/lightbox.min.css">
    <link rel="stylesheet" href="/home/css/croppie.css">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{@csrf_token()}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
{{--    <script type="text/javascript" src="/home/js/jquery.min.js"></script>--}}
    <script type="text/javascript" src="/home/js/jquery-2.2.0.min.js"></script>


</head>
<body>
@include('home.section.sidebar_home')
<div id="site-content">
    @include('home.section.header_home')
{{--    @includeWhen((Route::currentRouteName()==''),'home.teacher.sidebar')--}}
    @yield('main_body')
    @include('home.section.footer_home')

</div>


<script type="text/javascript" src="/home/js/iziToast.min.js"></script>

<script type="text/javascript" src="/home/js/jquery-ui.js"></script>
<script type="text/javascript" src="/home/js/jquery.videoplayer.js"></script>
<script type="text/javascript" src="/home/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/home/js/jQuery.countdownTimer.js"></script>
<script type="text/javascript" src="/home/js/jQuery.countdownTimer-fa.js"></script>
<script type="text/javascript" src="/home/js/apexcharts.min.js"></script>
<script type="text/javascript" src="/home/js/tinymce/tinymce.min.js"></script>
{{--<script type="text/javascript" src="/home/js/jquery.uploadfile.min.js"></script>--}}
<script type="text/javascript" src="/home/js/bootstrap-input-spinner.js"></script>


<script type="text/javascript" src="/home/js/persianDatepicker.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drop-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drop.live-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drag-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drag.live-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/home/js/select2.full.min.js"></script>
<script type="text/javascript" src="/home/js/lightbox.min.js"></script>
<script type="text/javascript" src="/home/js/metisMenu.js"></script>
<script type="text/javascript" src="/home/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/home/js/mm-vertical.js"></script>
<script type="text/javascript"  src="/home/js/plyr.min.js"></script>
<script type="text/javascript" src="/home/js/croppie.js"></script>
<script type="text/javascript" src="/home/js/fun.js"></script>
<script type="text/javascript" src="/home/js/lightslider.min.js"></script>
<script type="text/javascript" src="/home/js/template.js"></script>
<script type="text/javascript" src="/home/js/home.js"></script>
<script type="text/javascript" src="/home/js/theia-sticky-sidebar.js"></script>
<script type="text/javascript" src="/js/app.js"></script>

</body>
@include('sweet::alert')
</html>
