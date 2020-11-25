@extends('admin.layouts.master')

@section('content')
    <div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Optionals </h2>
            </div>
            <div class="body">
                <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add row
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($optionals as $optional)
                            <tr class="gradeA" id="{{$optional->id}}">
                                <td class="name">{{$optional->meta_name}}</td>
                                <td class="value">{{$optional->meta_value}}</td>
                                <td class="description">{{$optional->meta_description}}</td>
                                <td class="actions">
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-editing m-r-5 button-save"
                                            data-toggle="tooltip" data-original-title="Save" hidden><i class="fas fa-save" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-editing button-discard"
                                            data-toggle="tooltip" data-original-title="Discard" hidden><i class="fas fa-times-circle" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                            data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                            data-toggle="tooltip" data-original-title="Remove"><i class="fas fa-trash" aria-hidden="true"></i></button>
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
    <input type="hidden" name="delete-link" value="{{route('admin.optionals.delete')}}">
    <input type="hidden" name="update-link" value="{{route('admin.optionals.update')}}">
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.css')}}">
@endsection
@section('scripts')
    {{--<script src="{{asset('public/admin/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>--}}
    <script src="{{asset('public/admin/assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

    <script src="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/boss.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/optional.js')}}"></script>

@endsection
