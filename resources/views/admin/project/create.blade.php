@extends('admin.layouts.master')
@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Add new project</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ route('admin.project.update') }}" method="post">
                        @csrf
                        {{--  ====Name====  --}}

                        <div class="form-group border border-light rounded p-1">
                            <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        {{-- ====Short description==== --}}
                        <div class="form-group border border-light rounded p-1">
                            <label>Short description</label>
                            <textarea class="form-control" name="short_description" rows="3" cols="30">{{old('short_description')}}</textarea>
                        </div>
                        {{--  ====Description====  --}}
                        <input type="hidden" name="detail_description">
                        <div class="form-group border border-light rounded p-1">
                            <label>Description</label>
                            <textarea name="detail_description" class="summernote">{{old('detail_description')}}</textarea>
                        </div>
                        {{--  ====Budget====  --}}
                        <div class="form-group border border-light rounded p-1">
                            <label>Budget ($)</label>
                            <input type="number" name="budget" min="0" class="form-control" value="{{old('budget')}}">
                        </div>
                        {{--  ====Deadline====  --}}
                        <div class="form-group border border-light rounded p-1">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Deadline</label>
                                    <div class="input-group mb-3">
                                        <input class="project-deadline form-control" type="text" name="deadline"
                                               data-date-autoclose="true" class="form-control" value="{{old('deadline')}}">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <label>Biding time</label>
                                    <div class="input-daterange input-group" data-provide="datepicker">
                                        <input id="startbid" type="text" class="input-sm form-control" name="bid_start" value="{{old('bid_start')}}">
                                        <span class="input-group-addon ml-1 mr-1"> to </span>
                                        <input id="endbid" type="text" class="input-sm form-control" name="bid_end" value="{{old('bid_end')}}">
                                    </div>
                                </div>
                            </div>
                            {{--  Milestones  --}}
                            <div class="form-group border border-light rounded p-1">
                                <input type="hidden" name="milestones" value="{{old('milestones')}}">
                                <label for="">Milestones (?)</label>
                                <div class="p-5">
                                    <div class="row">
                                        <div class="col-md-12 p-2 border border-light rounded mile">
                                            <div class="mile-properties">
                                                <div class="mile-name">
                                                    <label>Name</label>
                                                    <input type="text" data-name="mile_name"
                                                           class="form-control data-change-handle">
                                                </div>
                                                <div class="mile-des">
                                                    <label>Description</label>
                                                    <textarea class="form-control data-change-handle" data-name="mile_description" rows="3" cols="30"></textarea>
                                                </div>
                                                <div class="mile-time">
                                                    <label for="">Work Day</label>
                                                    <div class="input-group">
                                                        <input type="number"
                                                               class="input-sm form-control data-change-handle"
                                                               data-name="mile_workday" min="0">
                                                    </div>
                                                </div>
                                                <div class="mile-perpay">
                                                    <label>Percent payment</label>
                                                    <input type="number" min="0" data-name="mile_perpay"
                                                           class="form-control data-change-handle">
                                                </div>
                                                <div class="mile-content">
                                                    <label>Content</label>
                                                    <textarea class="form-control data-change-handle"
                                                              data-name="mile_content" rows="3" cols="30"
                                                            ></textarea>
                                                </div>
                                                <div class="mile-show btn col-md-12 mt-1 bg-light text-center d-none">
                                                    <i class="fas fa-angle-double-down"></i>
                                                </div>
                                                <div class="mile-hide btn col-md-12 mt-1 bg-light text-center">
                                                    <i class="fas fa-angle-double-up"></i>
                                                </div>
                                                <div class="mile-trash btn col-md-12 mt-1 bg-light text-center">
                                                    <i class="fas fa-trash"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mile-add btn col-md-12 mt-1 bg-light text-center">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Tags --}}
                            <div class="form-group border border-light rounded p-1">
                                <label for="">Tags</label>
                                <div class="body ">
                                    <div class="input-group demo-tagsinput-area">
                                        <input
                                            type="text"
                                            class="form-control"
                                            data-role="tagsinput"
                                            name="tags"
                                            placeholder="Enter tag"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            {{-- Cateogries --}}
                            <div class="form-group border border-light rounded p-1">
                                <label>Cateogories</label>
                                <select id="optgroup" class="ms  form-control" multiple="multiple" name="categories[]">
                                    @foreach($categories as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- ========Address======== --}}
                        <div class="form-group border border-light rounded p-1">
                            <label for="">Address</label>
                            <div class="row">
                                <div class="col-md-4 location">
                                    <label>Country</label>
                                    <div class="form-contain">
                                        <select name="address_country"
                                                class="single_selection form-control multiselect multiselect-custom single-selection">
                                                <option selected value="">none</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 location">
                                    <label>State</label>
                                    <div class="form-contain">
                                        <select name="address_state"
                                                class="single_selection form-control multiselect multiselect-custom single-selection">
                                                <option selected value="">none</option>
                                                {{--@forelse($project->locations->states  as $state)--}}
                                                    {{--<option value=""></option>--}}
                                                {{--@empty--}}
                                                    {{--a--}}
                                                {{--@endforelse--}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 location">
                                    <label>City</label>
                                    <div class="form-contain">
                                        <select name="address_city"
                                                class="single_selection form-control multiselect multiselect-custom 
                                                single-selection">
                                                <option selected value="">none</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  ======Question=====  --}}
                        <div class="form-group border border-light rounded p-1">
                            <label for="">Questions</label>
                            <input type="hidden" name="questions">
                            <div class="p-5">
                                <div class="row">
                                    <div class="col-md-12 border border-light rounded p-2">
                                      <div class="_questions">

                                              <div class="_question">
                                                  <label>Question</label>
                                                  <textarea class="form-control question-change-hanlde" rows="3" cols="30" data-name="question"></textarea>
                                                  <div class="options">
                                                      <label>Option A</label>
                                                      <input type="text" class="form-control question-change-hanlde" data-name="option_a">
                                                      <label>Option B</label>
                                                      <input type="text" class="form-control question-change-hanlde" data-name="option_b">
                                                      <label>Option C</label>
                                                      <input type="text" class="form-control question-change-hanlde" data-name="option_c">
                                                      <label>Option D</label>
                                                      <input type="text" class="form-control question-change-hanlde" data-name="option_d">
                                                      <label for="">Correct option</label>
                                                      <select class="form-control question-change-hanlde" data-name="correct_option" id="">
                                                          <option value="option_a">Option A</option>
                                                          <option value="option_b">Option B</option>
                                                          <option value="option_c">Option C</option>
                                                          <option value="option_d">Option D</option>
                                                      </select>
                                                  </div>

                                                  <div class="question-show btn col-md-12 mt-1 bg-light text-center d-none">
                                                      <i class="fas fa-angle-double-down"></i>
                                                  </div>
                                                  <div class="question-hide btn col-md-12 mt-1 bg-light text-center">
                                                      <i class="fas fa-angle-double-up"></i>
                                                  </div>
                                                  <div class="question-trash btn col-md-12 mt-1 bg-light text-center">
                                                      <i class="fas fa-trash"></i>
                                                  </div>
                                              </div>
                                      </div>
                                    </div>
                                    <div class="question-add btn col-md-12 mt-1 bg-light text-center">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  ========Meta=======  --}}
                        <div class="form-group border border-light rounded p-1">
                            <label for="">Meta info</label>
                            <div class="p-5">
                                <div class="row">
                                  <input type="hidden" name="metas">
                                  @foreach($metas as $meta)
                                    <div class="col-md-12 border border-light rounded p-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Property</label>
                                                <input type="text" class="form-control" name="{{ $meta["meta_key"] }}" value="{{ $meta["meta_name"] }}" readonly/>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Value</label>
                                                <input type="text" key="{{ $meta["meta_key"] }}"class="form-control" types="meta">
                                            </div>
                                        </div>
                                    </div>
                                  @endforeach
{{--                                     
                                    <div class="milestone-add btn col-md-12 mt-1 bg-light text-center">
                                        <i class="fas fa-plus"></i>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                        {{--  ======File======  --}}
                        <div class="form-group border border-light rounded p-1">
                            <label for="">Files</label>
                            <div class="p-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="file_attached" value="{{ old('file_attached') }}">
                                        <a href="#largeModal" data-toggle="modal" data-target="#largeModal">
                                            <i class="fas fa-file"></i> Attach File
                                        </a>
                                        <div class="file-attached">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Add new</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Large Size -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">File</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#gallery"><i
                                    class="fas fa-user"></i>Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#new-upload"><i
                                    class="fas fa-upload"></i> Upload</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="gallery">
                          <div class="row media-container">
                            @forelse ($files as $file)
                               <div class="col-lg-2 col-md-3 col-sm-12 pl-1 pr-1">
                                  <div class="card file_manager">
                                      <div class="file m-1 image-contain">
                                          <a href="javascript:void(0);" data-id="{{ $file->id}}" class="file-select">
                                            @switch($file->extension)
                                                @case("jpg")
                                                  <div class="image">
                                                      <img src="{{ $file->url}}" alt="img" class="img-fluid"/>
                                                  </div>
                                                  @break
                                                @case("png")
                                                  <div class="image">
                                                      <img src="{{ $file->url}}" alt="img" class="img-fluid"/>
                                                  </div>
                                                  @break
                                                @case("jpeg")
                                                  <div class="image">
                                                      <img src="{{ $file->url}}" alt="img" class="img-fluid"/>
                                                  </div>
                                                  @break
                                                @case("doc")
                                                  <div class="icon">
                                                      <i class="fas fa-file-word"></i>
                                                  </div>
                                                  @break
                                                @case("xls")
                                                  <div class="icon">
                                                      <i class="fas fa-chart-bar text-warning"></i>
                                                  </div>
                                                  @break
                                                @case("xlsx")
                                                  <div class="icon">
                                                      <i class="fas fa-chart-bar text-warning"></i>
                                                  </div>
                                                  @break
                                                @case("pdf")
                                                  <div class="icon">
                                                      <i class="fas fa-file-pdf text-danger"></i>
                                                  </div>
                                                  @break
                                               @default
                                                <div class="icon">
                                                    <i class="fas fa-file text-dark"></i>
                                                </div>
                                            @endswitch
                                              <div class="file-name">
                                                  <p class="m-b-5 text-muted">{{ $file->name }}</p>
                                                  <small>{{ $file->size }} mb <span class="date text-muted">{{ $file->time }}</span></small>
                                              </div>
                                          </a>
                                      </div>
                                  </div>
                                </div> 
                            @empty
                            @endforelse
                              </div>
                          </div>
                        <div class="tab-pane" id="new-upload">
                            <form action="{{ route('file-upload') }}" enctype="multipart/form-data" class="dropzone"
                                  id="my-dropzone" >
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="state_link" value="{{ route("admin.locations._states") }}">
    <input type="hidden" name="city_link" value="{{ route("admin.locations._cities") }}">
@endsection
@section('styles')
    <link rel="stylesheet"
          href="{{asset('public/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/parsleyjs/css/parsley.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet"
          href="{{asset('public/admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/multi-select/css/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/boss/libs/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/boss/css/project.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('public/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    {{--  <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>  --}}
    <script src="{{asset('public/admin/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('public/assets/boss/libs/jquery.quicksearch.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/summernote/dist/summernote.js')}}"></script>
    <script src="{{ asset('public/assets/boss/libs/js/dropzone.js')}}"></script>

    <script src="{{asset('public/assets/boss/js/boss.min.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/file.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/project.min.js')}}"></script>
@endsection
