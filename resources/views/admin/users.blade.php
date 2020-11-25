@extends('admin.layouts.master')
@section('title')
MANAGE USER
@endsection
@section('content')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>List Users</h2>
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

                                <div class="col-md-12">
                                    <div class="mailbox-controls" style="padding: 0px;">
                                        <div class="btn-group" >
                                            <ul class="breadcrumb" style="padding: 25px 5px 5px 5px;background-color:#ecf0f5;" >
                                                <li class="breadcrumb-item"><a href="{{route('getListUser')}}">All({{$total_user}})</a></li>
                                                @if($list_status)
                                                    @foreach($list_status as $status)
                                                        <li class="breadcrumb-item">
                                                            <a href="{{route('getListUser',['status' => $status->id ])}}">{{$status->name}}({{$status->user->count()}})</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="btn-group pull-right" style="width: 300px; padding:25px 5px 15px 5px" >
                                            <form action="{{route('getListUser')}}" method="get">
                                                <div class="box-tools pull-right">
                                                    <div class="input-group ">
                                                        <input type="text" name="keyword" id="keyword" value="{{$keyword}}" class="form-control">
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="btn btn-info btn-flat">Search</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- /.box-tools -->
                                    </div>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="fancy-checkbox">
                                                    <input class="select-all" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </th>
                                            <th>Username</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @foreach($list_user as $user)
                                        <tr>
                                            <td style="width: 50px;">
                                                <label class="fancy-checkbox">
                                                    <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->full_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if($user->role_name)
                                                <a href="{{route('getListUser', ['role' => $user->user_role->role->id])}}">
                                                    {{$user->role_name}}
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                {{$user->status}}
                                            </td>
                                            <td>
                                                <a href="{{route('getEditUser', $user->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>

                                                <a href="{{route('deleteUser', $user->id)}}" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!!$list_user ->appends(request()->except('page')) -> links()!!}
                        </div>
                    </div>
                </div>
@endsection

