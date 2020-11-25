@extends('admin.layouts.master')
@section('title')
List Withdrawal
@endsection
@section('content')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>List Withdrawal</h2>
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
                                                <li class="breadcrumb-item"><a href="{{route('getListUser')}}">All()</a></li>
                                               
                                            </ul>
                                        </div>

                                        <div class="btn-group pull-right" style="width: 300px; padding:25px 5px 15px 5px" >
                                            <form action="{{route('getListUser')}}" method="get">
                                                <div class="box-tools pull-right">
                                                    <div class="input-group ">
                                                        <input type="text" name="keyword" id="keyword" value="" class="form-control">
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
                                            <!-- <th>
                                                <label class="fancy-checkbox">
                                                    <input class="select-all" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </th> -->
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Request Time</th>
                                            <th>Amount</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                            <th>Process Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                       	@foreach($list_withdraws as $list_withdraw)
                                        <tr>
                                            <td>{{$list_withdraw->user->username}}</td>
                                            <td>{{$list_withdraw->withdraw_email}}</td>
                                            <td>{{$list_withdraw->created_at}}</td>
                                            <td>{{$list_withdraw->amount}}</td>
                                            <td>{{$list_withdraw->payment_method}}</td>
                                            <td>{{$list_withdraw->status}}</td>
                                            <td>{{$list_withdraw->updated_at}}</td>
                                            <td>
                                            	@if($list_withdraw->check_status())
                                                <a href="{{route('accept_withdraw',$list_withdraw->id)}}" class="btn btn-info" title="Edit">Process</a>

                                                <a href="{{route('cancel_withdraw',$list_withdraw->id)}}" data-type="confirm" class="btn btn-danger js-sweetalert" title="Cancel"><i class="fa fa-trash"></i></a>
                                                @endif
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
                            {!!$list_withdraws->appends(request()->except('page')) -> links()!!}
                        </div>
                    </div>
                </div>
@endsection

