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
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <div class="h6 title">My Settings & Skills</div>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="profile_info col col-xl-9 col-lg-9 order-lg-2 col-md-12 col-sm-12 col-12 {{$cl1}}">
            <div class="tab-content" id="myTabContent">
                @yield('profile_content')
            </div>
        </div>

        <div class="col col-xl-3 col-lg-3 order-lg-1 col-md-12 col-sm-12 responsive-display-none  {{$cl2}}">
            <div class="ui-block">
                @include('myprofile.profile_nav')
            </div>
        </div>
    </div>
</div>
<div class="menu">
    <div id="responsive-container-panel" class="profile-settings-responsive">

        <a href="#" class="js-profile-settings-open profile-settings-open">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <div class="ui-block">
                @include('myprofile.profile_nav')
            </div>
        </div>
    </div>
</div>
@endif
@endsection


