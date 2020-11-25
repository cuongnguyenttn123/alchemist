@extends('layouts.master')
@section('title')
Profile Setting
@endsection
@section('content')
@include('myprofile.profile_header')

@if(Auth::id())
<?php
    $cl1 = 'order-xl-2 order-md-1';
    $cl2 = 'order-xl-1 order-md-2';
    if(isset($sidebar) && $sidebar == 'left'){
        $cl1 = 'order-xl-1 order-md-1';
        $cl2 = 'order-xl-2 order-md-2';
    }
?>
<div class="container">
    <div class="row">
        <div class="col col-xl-9 col-lg-9 order-lg-2 col-md-12 col-sm-12 col-12 {{$cl1}}">
            @yield('profile_content')
        </div>

        <div class="col col-xl-3 col-lg-3 order-lg-1 col-md-12 col-sm-12 responsive-display-none  {{$cl2}}">
            <div class="ui-block">
               @include('myprofile.profile_nav')
            </div>
        </div>
    </div>
</div>
@endif
@endsection


