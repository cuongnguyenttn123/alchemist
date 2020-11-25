<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>

<body class="theme-cyan">
    <div id="wrapper">
        {{--Header--}}
        @include('admin.layouts.header')
        {{--nav--}}
        @include('admin.layouts.nav')

        {{--content--}}
        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                        <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                            <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                                <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                                     data-fill-Color="transparent">3,5,1,6,5,4,8,3</div>
                                <span>Visitors</span>
                            </div>
                            <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                                <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                                     data-fill-Color="transparent">4,6,3,2,5,6,5,4</div>
                                <span>Visits</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    @if(Session::has('success'))
                        <span  class="btn-toastr displaynone" data-context="success" data-message="{{ Session::get('success') }}" data-position="bottom-right">{{ Session::get('success') }}</span>
                    @endif
                    @if(Session::has('error'))
                        <span  class="btn-toastr displaynone" data-context="error" data-message="{{Session::get('error') }}" data-position="bottom-right">{{Session::get('error') }}</span>
                    @endif
                    @if(count($errors) > 0)
                            @foreach( $errors->all() as $bug)
                            <span  class="btn-toastr displaynone" data-context="error" data-message="{{$bug}}" data-position="bottom-right">{{$bug}}</span>
                            @endforeach
                    @endif
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.layouts.foot')
</body>
</html>