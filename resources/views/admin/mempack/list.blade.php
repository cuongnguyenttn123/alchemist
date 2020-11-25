@extends('admin.layouts.master')
@section('title')
List Package
@endsection
@section('content')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>All Packages</h2>
                        </div>
                        <div class="body">
                            <div class="body table-responsive">
                              @if(session('edit'))
                              {!!session('edit')!!}
                              @endif
                              @if(session('add'))
                              {!!session('add')!!}
                              @endif
                              @if(session('err'))
                              {!!session('err')!!}
                              @endif

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="fancy-checkbox">
                                                    <input class="select-all" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>duration</th>
                                            <th>type</th>
                                            <th>description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @foreach($all_packs as $pack)
                                        <tr>
                                            <td style="width: 50px;">
                                                <label class="fancy-checkbox">
                                                    <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td>{{$pack->title}}</td>
                                            <td>{{$pack->price}}</td>
                                            <td>{{$pack->duration}}</td>
                                            <td>{{$pack->type}}</td>
                                            <td>{{$pack->description}}</td>
                                            <td>
                                                <a href="{{route('mempack.edit', $pack->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>

                                                <a href="{{route('mempack.delete', $pack->id)}}" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

