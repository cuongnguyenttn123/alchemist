@extends('admin.layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body text-center">
                    <div class="p-15">
                        <h3>109</h3>
                        <span>Today Works</span>
                    </div>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="87"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body text-center">
                    <div class="p-15">
                        <h3>87</h3>
                        <span>Today Tasks</span>
                    </div>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                    <div class="progress-bar" data-transitiongoal="34"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body text-center">
                    <div class="p-15">
                        <h3>318</h3>
                        <span>Statistics</span>
                    </div>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                    <div class="progress-bar" data-transitiongoal="54"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body text-center">
                    <div class="p-15">
                        <h3>520</h3>
                        <span>Analytics</span>
                    </div>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                    <div class="progress-bar" data-transitiongoal="67"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive position-relative">
                            <div class="filters position-absolute">
                                <button class="btn btn-sm btn-outline-info" action="filter" cmd="date" val="desc">Date</button>
                                <button class="btn btn-sm btn-outline-info" action="filter" cmd="budget" val="desc">Budget</button>
                                <button class="btn btn-sm btn-outline-info" action="filter" cmd="deadline" val="desc">Deadline</button>
           
                            </div>
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom table-fixed">
                                <thead>
                                <tr>        
                                  <th style="width: 30%">Name</th>
                                  <th style="width: 28%">Short desc</th>
                                  <th style="width: 10%">Budget</th>
                                  <th style="width: 12%">Deadline</th>
                                  <th style="width: 10%">Status</th>
                                  <th style="width: 20%">User</th>
                                  <th style="width: 10%"></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                  <th style="width: 30%">Name</th>
                                  <th style="width: 28%">Short desc</th>
                                  <th style="width: 10%">Budget</th>
                                  <th style="width: 12%">Deadline</th>
                                  <th style="width: 10%">Status</th>
                                  <th style="width: 20%">User</th>
                                  <th style="width: 10%"></th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            <a  href="{{route("admin.project.modify",["id"=>$project->id])}}">{{$project->name}}</a>
                                        </td>
                                        <td>{{$project->short_description}}</td>
                                        <td>{{$project->budget}}</td>
                                        <td>{{$project->deadline}}</td>
                                        <td class="text-{{ $project->status }}">{{ $project->status }}</td>
                                        <td>{{$project->email}}</td>
                                        <td>
                                            <button id="{{$project->id}}" class="btn btn-sm btn-danger delete-project">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="{{ $pages['first_page_url'] }}">First</a></li>
                                @for($i = $pages["current_page"]; $i<$pages["current_page"]+3; $i++)
                                    <li class="page-item @if(!($i<=$pages['last_page'])) disabled @endif "><a class="page-link" href="{{$pages['path']}}?page={{$i}}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item"><a class="page-link" href="{{ $pages['last_page_url'] }}">Last</a></li>

                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="delete_link" value="{{route("admin.project.delete")}}">
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/boss/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/boss/css/project.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.css')}}">

@endsection
@section('scripts')
    <script src="{{asset('public/admin/assets/bundles/datatablescripts.bundle.js')}}"></script>

{{--    <script src="{{asset('public/admin/assets/js/pages/tables/jquery-datatable.js')}}"></script>--}}
    <script src="{{asset('public/assets/boss/js/project/projects.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/boss.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/project.min.js')}}"></script>




@endsection
