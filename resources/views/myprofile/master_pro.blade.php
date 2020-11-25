@extends('layouts.master')
@section('title')
Profile Setting
@endsection
@section('content')
@include('myprofile.profile_header')

{{-- @if(Auth::id()) --}}

<div class="container">
    <div class="row">
        @yield('profile_content')
    </div>
</div>
{{-- @endif --}}
@endsection


