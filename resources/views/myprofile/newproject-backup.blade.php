@extends('myprofile.master')
@section('title')
{{ isset($project) ? "Edit Project" : "New Project" }}
@endsection
@if(Auth::id())
@section('profile_content')
<style type="text/css">
.form-section {
  padding-left: 15px;
  border-left: 2px solid #FF851B;
  display: none;
}
.form-section.current {
  display: inherit;
}
</style>
    <?php $project = isset($project) ? $project : null;?>
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">{{ isset($project) ? "Edit Project: ".$project->name : "New Project" }}</h6>
        </div>
        <div class="ui-block-content">
            <?php $action = isset($project) ? route('profile.editproject', $project->id) : route('profile.postjob')?>
            <form class="addnew-form" method="post" action="{!! $action !!}" enctype="multipart/form-data">
                @csrf
                <div class="progress-step">
                  <div class="step">
                    <div class="step-progress"></div>
                    <div class="icon-wrapper">
                      <div class="step-text">Step 1</div>
                    </div>
                  </div>
                  <div class="step">
                    <div class="step-progress"></div>
                    <div class="icon-wrapper">
                      <div class="step-text">Step 2</div>
                    </div>
                  </div>
                  <div class="step">
                    <div class="step-progress"></div>
                    <div class="icon-wrapper">
                      <div class="step-text">Step 3</div>
                    </div>
                  </div>
                  <div class="step">
                    <div class="step-progress"></div>
                    <div class="icon-wrapper">
                      <div class="step-text">Step 4</div>
                    </div>
                  </div>
                  <div class="step">
                    <div class="step-progress"></div>
                    <div class="icon-wrapper">
                      <div class="step-text">Step 5</div>
                    </div>
                  </div>
                  <div class="step">
                    <div class="icon-wrapper">
                      <div class="step-text">DONE!</div>      
                    </div>
                  </div>
                </div>

              <div class="form-section">
                {{-- Cateogries --}}
                <div class="form-group">
                    <label>Categories</label>
                    <select id="optgroup" name="cats[]" class="ms form-control" multiple="multiple">
                        @foreach($cats as $cate)
                            <option @if(isset($pj_cats) && in_array($cate->id, $pj_cats)){!! 'selected' !!}@endif value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{--  ====Name====  --}}
                <div class="form-group label-floating">
                    <label class="control-label">Name</label>
                    <input class="form-control" name="name" placeholder="" type="text" value="{{ old('name', isset($project->name) ? $project->name : '' ) }}"  required data-parsley-minlength="1">
                </div>
                {{-- ====Short description==== --}}
                <div class="form-group label-floating">
                    <label class="control-label">Short description</label>
                    <textarea class="form-control" name="short_description" rows="3" cols="30" required data-parsley-minlength="1">{{ old('short_description', isset($project->short_description) ? $project->short_description : '' ) }}</textarea>
                </div>
              </div>

              <div class="form-section">
                {{--  ====Description====  --}}
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea class="summernote" class="form-control" name="detail_description" required>{{ old('detail_description', isset($project->detail_description) ? $project->detail_description : '' ) }}</textarea>
                </div>
              </div>

              <div class="form-section">
                {{--  ====Budget====  --}}
                    <div class="form-group label-floating">
                        <label class="control-label">Budget ($)</label>
                        <input class="form-control" type="number" name="budget" min="50" value="{{ old('budget', isset($project->budget) ? $project->budget : '' ) }}" required>
                    </div>
                {{--  ====Deadline====  --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Deadline</label>
                                <input class="project-deadline form-control" type="text" name="deadline" value="{{ old('deadline', $project !== null ? $project->deadline() : '' ) }}" data-date-autoclose="true" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-9" id="time_period">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">start bid</label>
                                        <input class="actual_range" id="startbid" type="text" class="input-sm form-control" name="bid_start" value="{{ old('start_bid', isset($project->start_bid) ? $project->start_bid : '' ) }}" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">end bid</label>
                                        <input class="actual_range" id="endbid" type="text" class="input-sm form-control" name="bid_end" value="{{ old('end_bid', isset($project->end_bid) ? $project->end_bid : '' ) }}" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>

              <div class="form-section">
                <label for="">Milestones (?)</label>
                <div class="clearfix"></div>
                <div class="btn-group btn-toggle"> 
                    <button type="button" class="btn btn-default btn-success" data-toggle="collapse" data-target="#ms_target">Hide</button>
                </div>
                <div id="ms_target" class="milestone_group show">
                    @if(isset($project) && count($project->milestone))
                    @foreach($project->milestone as $key => $ms)
                        <div class="panel panel-default mile_property">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a class="collapsepanel" data-toggle="collapse" data-parent="#accordion" href="#milestone-{{$ms->id}}" aria-expanded="true">Milestone #{{$key+1}}</a>
                                    <a class="delpanel" class="pull-right" href="javascript:;"><i class="fa fa-trash"></i></a>
                                    <span class="info_percent pull-right"></span>
                                </h4>
                            </div>
                            <div id="milestone-{{$ms->id}}" class="props panel-collapse collapse" role="tabpanel">
                                <div class="panel-body">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Title</label>
                                        <input type="text" name="mile[{{$key}}][title]" class="form-control data-change-handle" value="{{$ms->title}}" required>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control data-change-handle" name="mile[{{$key}}][description]" rows="3" cols="30" required>{{$ms->description}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Workday</label>
                                                <input type="number" min="0" name="mile[{{$key}}][workday]" class="form-control data-change-handle" value="{{$ms->workday}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Percent payment</label>
                                                <input type="number" min="0" name="mile[{{$key}}][percent_payment]" class="form-control data-change-handle percent_payment" value="{{$ms->percent_payment}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="panel panel-default mile_property">
                            <div class="panel-heading" role="tab">
                                <h4 class="panel-title">
                                    <a class="collapsepanel" data-toggle="collapse" data-parent="#accordion" href="#milestone-1" aria-expanded="true">Milestone #1</a>
                                    <a class="delpanel" class="pull-right" href="javascript:;"><i class="fa fa-trash"></i></a>
                                    <span class="info_percent pull-right"></span>
                                </h4>
                            </div>
                            <div id="milestone-1" class="props panel-collapse collapse show" role="tabpanel">
                                <div class="panel-body">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Title</label>
                                        <input type="text" name="mile[0][title]" class="form-control data-change-handle" required>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control data-change-handle" name="mile[0][description]" rows="3" cols="30" required></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Workday</label>
                                                <input type="number" min="0" name="mile[0][workday]" class="form-control data-change-handle" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Percent payment</label>
                                                <input type="number" name="mile[0][percent_payment]" class="form-control data-change-handle percent_payment" min="10" max="100"  required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="clearfix"></div>
                    <a class="clone_ms" class="btn btn-danger" href="javascript:;"><i class="fa fa-plus"></i></a>
                </div>
                <div class="panel panel-default mile_property d-none">
                    <div class="panel-heading" role="tab">
                        <h4 class="panel-title">
                            <a class="collapsepanel" data-toggle="collapse" data-parent="#accordion" href="#milestone-1" aria-expanded="true">Milestone #1</a>
                            <a class="delpanel" class="pull-right" href="javascript:;"><i class="fa fa-trash"></i></a>
                            <span class="info_percent pull-right"></span>
                        </h4>
                    </div>
                    <div id="milestone-1" class="props panel-collapse collapse show" role="tabpanel">
                        <div class="panel-body">
                            <div class="form-group label-floating">
                                <label class="control-label">Title</label>
                                <input type="text" name="kt_mile[99][title]" class="form-control data-change-handle" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Description</label>
                                <textarea class="form-control data-change-handle" name="kt_mile[99][description]" rows="3" cols="30" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Workday</label>
                                        <input type="number" min="0" name="kt_mile[99][workday]" class="form-control data-change-handle" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Percent payment</label>
                                        <input type="number" name="kt_mile[99][percent_payment]" class="form-control data-change-handle percent_payment" min="10" max="100"  required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="form-section">
                {{-- User Title --}}
                <div class="form-group">
                    <label>Require User Level</label>
                    <div class="clearfix"></div>
                    @foreach($list_title as $title)
                        <div class="choose-photo-item col-md-2" data-mh="choose-item">
                          <div class="checkbox">
                            <label><input type="checkbox" name="user_title[]"  @if(isset($pj_user_title) && in_array($title->id, $pj_user_title)){!! 'checked' !!}@endif value="{{$title->id}}">{{$title->name}}
                                Level: {{$title->min_level}}-{{$title->max_level}}
                            </label>
                          </div>
                        </div>
                    @endforeach
                </div>
                {{-- Attach --}}
                <div class="form-group">
                    <label>Files</label>
                    <input type="file" name="file_attached[]" value="" multiple="">
                </div>
              </div>

              <div class="form-section">
                    {{-- Tags --}}
                    <label for="">Skills</label>
                    <select class="selectize" name="skill[]" multiple="multiple">
                       <option value="">Select skill</option>
                        @foreach($skills as $key=>$skill)
                          <option value="{{$key}}">{{$skill}}</option>
                        @endforeach
                    </select>
              </div>

              <div class="form-navigation">
                <button type="button" class="previous btn btn-primary pull-left">Previous</button>
                <button type="button" class="next btn btn-primary pull-right">Next</button>
                <button type="submit" class="btn btn-success pull-right">Submit</button>
                <span class="clearfix"></span>
              </div>

            </form>
            
        </div>
    </div>
    <!-- Modal Large Size -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                    <svg class="olymp-close-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                    </svg>
                </a>
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">File</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#gallery"><i class="fas fa-user"></i>Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#new-upload"><i class="fas fa-upload"></i> Upload</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="gallery">
                          <div class="row media-container">
                            @if(!empty($files))
                            @forelse ($files as $file)
                                {!!View::make('template_part.content-attachfile', ['file' => $file])!!}
                            @empty
                            @endforelse
                            @endif
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Attach</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif

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
    <link rel="stylesheet" href="{{asset('public/assets/boss/css/project.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/newjob.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('public/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('public/assets/boss/libs/jquery.quicksearch.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendor/summernote/dist/summernote.js')}}"></script>
    <script src="{{asset('public/assets/boss/js/boss.js')}}"></script>
    {{-- <script src="{{asset('public/assets/boss/js/project.js')}}"></script> --}}

    <script src="{{asset('public/frontend/js/form_step.js')}}"></script>
    <script src="{{asset('public/frontend/js/newjob.js')}}"></script>
    <script type="text/javascript">
    
    $(document).ready(function () {    
      //#endregion file select
      //#region modal handle closing
        let gen_file_selected = function () {
            $(".file-attached").html('');
                var _files = $("input[name=file_attached]").val();
                JSON.parse(_files).forEach(function (e) {
                 var text = $(`.image-contain a[data-id=${e}]`).find('.file-name p').text();
                 $(".file-attached").append(`
                  <div class="alert alert-success alert-dismissible" role="alert" data-file-name="${text}"><i class="fas fa-file"></i> ${text}</div>
                  `);
            })
        }
        $("#largeModal").on("hidden.bs.modal", gen_file_selected);

        let image_click_event = function () {
            var data = [];
            $(this).parent().toggleClass("highlight-select");
            $(".image-contain.highlight-select").each(function () {
                data.push($(this).find("a").attr("data-id"));
            });
            $("input[name=file_attached]").val(JSON.stringify(data));
        }

        let file_click_event_init = function () {
            $(".file-select").on("click", image_click_event);  
        }
        file_click_event_init();
          //#region dropzone
      });
    </script>
@endsection
