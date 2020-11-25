@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Status</h2>
            </div>
            <div class="body">
                <form id="form_status" method="POST" action="{{route('admin.status.add')}}">
                    @csrf
                    @if(session('success'))
                    {!!session('success')!!}
                    @endif
                    @if(session('error'))
                    {!!session('error')!!}
                    @endif
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" name="status" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <span class="errors">{{$errors->first('status')}}</span>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="type_status">Type</label>
                                </div>
                                <select name="type_status" class="custom-select" id="type_status">
                                    @foreach( array_keys($array_status) as $type )
                                        <option value="{{$type}}">{{ucfirst(str_replace('_', ' ', $type))}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="errors">{{$errors->first('type_status')}}</span>
                        </div>
                        <input type="hidden" name="id" value="0">
                        <div class="col-md-4 col-sm-12">
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
        </div>
        <div class="card">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                @foreach( array_keys($array_status) as $type )
                    <li class="nav-item"><a class="nav-link @if($current_tab==$type){{'active'}}@endif" data-toggle="tab" href="#{{$type}}">{{ucfirst(str_replace('_', ' ', $type))}}</a>
                @endforeach
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                @foreach( $array_status as $key=>$value )
                <div class="tab-pane @if($current_tab==$key){{'active'}}@endif" id="{{$key}}">
                    <div class="header">
                        <h2>{{ucfirst(str_replace('_', ' ', $key))}}</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($value as $status)
                                    <tr>
                                        <td class="name">{{$status->status}}</td>
                                        <td>
                                            <button data-id="{{$status->id}}" data-type="{{$key}}" type="button" class="btn btn-info edit-status" title="Edit"><i class="fas fa-edit"></i></button>
                                            <a href="{{route('admin.status.delete', [$key, $status->id])}}" title="delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.editdiv').hide();
            $('.edit-status').click(function(){
                name = $(this).closest('tr').find('td.name').text();
                id = $(this).data('id');
                type = $(this).data('type');
                form = $('#form_status');
                form.find('input[name=status]').val(name);
                form.find('select').val(type);
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
