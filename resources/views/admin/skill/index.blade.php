@extends('admin.layouts.master')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Skill</h2>
            </div>
            <div class="body">
                <form    method="POST" action="{{route('admin.skills.update')}}">
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
                                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                </div>
                                <select name="_category" class="custom-select" id="inputGroupSelect01">
                                    <option value="0" selected>None</option>
                                    @foreach($categories as $cate)
                                        <option value="{{$cate->id}}">{{$cate->Current}}</option>
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
                <h2>Skills</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($skills as $skill)
                            <tr>
                                <td class="name">{{$skill->name}}</td>
                                <td class="_category">{{$skill->name_category}}</td>
                                <td>
                                    <button data-id="{{$skill->id}}" type="button" class="btn btn-info edit-skill" title="Edit"><i class="fas fa-edit"></i></button>
                                    <button data-id="{{$skill->id}}" type="button" data-type="confirm" class="btn btn-danger js-sweetalert-delete" title="Delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <input type="hidden" name="delete-link" value="{{route('admin.skills.delete')}}">
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('public/admin/assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>



    <script src="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/boss.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/skill.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/pages/tables/jquery-datatable.js')}}"></script>


@endsection
