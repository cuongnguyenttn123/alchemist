@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Tag</h2>
            </div>
            <div class="body">
                <form    method="POST" action="{{route('admin.categories.update')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" name="name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="0">
                        <div class="col-md-4 col-sm-12">
                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-outline-secondary w-100">Add more</button>
                                <button type="button"class="cancel-update btn btn-outline-danger offset-md-1 col-md-2 displaynone">x</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>Tags</h2>
            </div>
            <div class="body">

            </div>
        </div>
    </div>
    <input type="hidden" name="delete-link" value="{{route('admin.tags.delete')}}">
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.css')}}">
@endsection
@section('scripts')
    {{--<script src="{{asset('public/admin/assets/bundles/mainscripts.bundle.js')}}"></script>--}}
    <script src="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/category.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/boss.min.js')}}"></script>

@endsection
