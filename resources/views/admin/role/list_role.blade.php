@extends('admin.layouts.master')
@section('title')
List Role
@endsection
@section('content')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>List role</h2>
							<a class="btn btn-sm btn-default" href="{{route('role.add')}}">Add new</a>
                        </div>
                        @if(session('error'))
                        {!! session('error')!!}
                        {!!Session::forget('error')!!}
                        @endif
                        @if(session('success'))
                        {!! session('success')!!}
                        {!!Session::forget('success')!!}
                        @endif
						@if(session('add'))
						{!! session('add')!!}
						{!!Session::forget('add')!!}
						@endif
                        <div class="body">
                            <div class="body table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="fancy-checkbox">
                                                    <input class="select-all" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>

										@foreach($list_role as $role)
										<tr>
                                            <td style="width: 50px;">
                                                <label class="fancy-checkbox">
                                                    <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </td>
											<td>{{$role -> name}}</td>
											<td>{{$role -> display_name}}</td>
											<td>{{$role -> description}}</td>
											<td >
												<a class="btn btn-info" href="{{route('role.edit', $role -> id)}}" title="Edit"><i class="fa fa-edit"></i></a>
												<a class="btn btn-danger js-sweetalert" href="{{route('role.delete', $role -> id)}}" title="Delete"><i class="fa fa-trash-alt"></i> </a>
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

