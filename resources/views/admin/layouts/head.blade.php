
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{asset('public/admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

<!-- VENDOR CSS -->

@yield('styles')
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('public/admin/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/assets/css/color_skins.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/assets/vendor/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/assets/css/style_admin.css')}}">
