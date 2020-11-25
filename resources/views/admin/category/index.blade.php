@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Category</h2>
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
                            <div class="col-md-4 col-sm-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Parent</label>
                                    </div>
                                    <select name="_parent" class="custom-select" id="inputGroupSelect01">
                                        <option value="0" selected>None</option>
                                        @foreach($categories as $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>

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
                <h2>Categories</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                        <tr>
                            <th>
                                <label class="fancy-checkbox">
                                    <input class="select-all" type="checkbox" name="checkbox">
                                    <span></span>
                                </label>
                            </th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Projects</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $cate)
                                <tr>
                                    <td style="width: 50px;">
                                        <label class="fancy-checkbox">
                                            <input class="checkbox-tick" type="checkbox" name="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <p class="c_name">{{$cate->name}}</p>
                                    </td>
                                    <td>
                                        <span class="p_name"><i class="zmdi zmdi-phone m-r-10"></i>@if($cate->_parent != 0){{$cate->_parent}}@endif</span>
                                    </td>
                                    <td>
                                      <p class="">{{$cate->project_categorys->count()}}</p>
                                  </td>
                                    <td>
                                        <button data-id="{{$cate->id}}" type="button" class="btn btn-info edit-category" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button data-id="{{$cate->id}}" type="button" data-type="confirm" class="btn btn-danger js-sweetalert-delete" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        {!!$categories -> appends(request()->except('page')) -> links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="delete-link" value="{{route('admin.categories.delete_category')}}">
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('public/admin/assets/bundles/mainscripts.bundle.js')}}"></script>
    {{--<script src="{{asset('public/admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>--}}

    <script src="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/category.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/boss.min.js')}}"></script>

@endsection
