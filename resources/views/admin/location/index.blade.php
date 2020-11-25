@extends('admin.layouts.master')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                <h2>Locations </h2>
                </div>
                <div class="body">
                    <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                        <i class="icon wb-plus" aria-hidden="true"></i> Add row
                    </button>
                    <div class="body">
                <form id="form_status" method="POST" action="{{route('admin.locations.update')}}"  enctype="multipart/form-data">
                    @csrf
                    @if(session('success'))
                    {!!session('success')!!}
                    @endif
                    @if(session('error'))
                    {!!session('error')!!}
                    @endif
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Country</span>
                                </div>
                                <input type="text" name="country" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <span class="errors">{{$errors->first('country')}}</span>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default-1">Country Code</span>
                                </div>
                                <input type="text" name="country_code" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <span class="errors">{{$errors->first('country_code')}}</span>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default-2">Thumbnail</span>
                                </div>
                                <input type="file" name="thumbnail[]" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <span class="errors">{{$errors->first('thumbnail')}}</span>
                        </div>
                        <input type="hidden" name="id" value="0">
                        <div class="col-md-3 col-sm-12">
                            <div class="input-group mb-3 adddiv">
                                <button type="submit" class="btn btn-outline-secondary w-100">Add more</button>
                            </div>
                            <div class="input-group mb-3 editdiv">
                                <button type="submit" class="btn btn-outline-secondary col-md-8">Update</button>
                                <button type="button"class="cancel-update btn btn-outline-danger offset-md-1 col-md-2">x</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                            <thead>
                            <tr>
                                <th>Country</th>
                                <th>Country Code</th>
                                <th>Country thumbnail</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Country</th>
                                <th>Country Code</th>
                                <th>Country thumbnail</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($locations as $location)
                                <tr class="gradeA" id="{{$location->id}}">
                                    <td class="country">{{$location->country}}</td>
                                    <td class="country_code">{{$location->country_code}}</td>
                                    <td class="thumbnail">@if($location->media != null)<img src="{{$location->media->url}}" style="width: 100px;height: auto;">@endif</td>
                                    <td class="actions">
                                        <!-- <button class="btn btn-sm btn-icon btn-pure btn-default on-editing m-r-5 button-save"
                                                data-toggle="tooltip" data-original-title="Save" hidden><i class="fas fa-save" aria-hidden="true"></i></button>
                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-editing button-discard"
                                                data-toggle="tooltip" data-original-title="Discard" hidden><i class="fas fa-times-circle" aria-hidden="true"></i></button> -->
                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 edit-status"
                                                data-id="{{$location->id}}" data-type="edit" type="button" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                        <a class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                data-toggle="tooltip" href="{{route('admin.locations.delete', $location->id)}}" data-original-title="Remove"><i class="fas fa-trash" aria-hidden="true"></i></a>

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
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.css')}}">
@endsection
@section('scripts')
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.editdiv').hide();
            $('.edit-status').click(function(){
                country = $(this).closest('tr').find('td.country').text();
                country_code = $(this).closest('tr').find('td.country_code').text();
                thumbnail = $(this).closest('tr').find('td.thumbnail').text();
                id = $(this).data('id');
                form = $('#form_status');
                form.find('input[name=country]').val(country);
                form.find('input[name=country_code]').val(country_code);
                form.find('input[name=thumbnail]').val(thumbnail);
                form.find('input[name=id]').val(id);
                $('.adddiv').hide();$('.editdiv').show();
                $("html, body").animate({ scrollTop: $('body').offset().top }, 500);
            });
            $('.cancel-update').click(function(){
                form = $('#form_status');
                form.trigger("reset")
                $('.editdiv').hide();$('.adddiv').show();
            });
        });
    </script>
@endsection