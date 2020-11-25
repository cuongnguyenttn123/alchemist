@extends('admin.layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/toastr/toastr.min.css')}}">
@endsection
@section('content')
    <h3>Content</h3>
@endsection

@section('scripts')
    <script src="{{asset('public/admin/assets/bundles/chartist.bundle.js')}}"></script>
    <script src="{{asset('public/admin/assets/bundles/knob.bundle.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/toastr/toastr.js')}}"></script>
    <script src="{{asset('public/admin/assets/bundles/mainscripts.bundle.js')}}"></script>
@endsection
