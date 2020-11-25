@extends('myprofile.master')
@section('title')
My job postings
@endsection
@if(Auth::id())
@section('profile_content')

   <div class="ui-block responsive-flex">
      <div class="ui-block-title">
         <div class="h4 title">My Job Postings</div>
         <div class="block-btn align-right">
            <a href="{{route('profile.postjob')}}" class="btn btn-md-2 bg-blue btn-icon-left"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Create Job</a>
         </div>
         <ul class="nav nav-tabs photo-gallery" role="tablist" >
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Competitions">
               <a class="nav-link"  href="javascript:;" role="tab" >
                  <svg class="olymp-photos-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use>
                  </svg>
               </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="All Jobs">
               <a class="nav-link active"  href="javascript:;" role="tab">
                  <svg class="olymp-albums-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
                  </svg>
               </a>
            </li>
         </ul>
         <a href="javascript:;" class="more">
            <svg class="olymp-three-dots-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
            </svg>
         </a>
      </div>
   </div>
   <div class="ui-block responsive-flex1200">
      <form method="get" action="{{route('profile.myjobpostings')}}">
      <div class="ui-block-title">
         <div class="w-select">
            <div class="title">Filter By:</div>
            <fieldset class="form-group">
               <select class="selectpicker form-control" name="category">
                  <option value="">All Categories</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->name}}" {{isset($_GET['category']) && $_GET['category'] == $cat->name ? 'selected' : ''}}>{{$cat->name}}</option>
                    @endforeach
               </select>
            </fieldset>
         </div>
         <div class="w-select">
            <fieldset class="form-group">
               <select class="selectpicker form-control" name="filter">
                  <option value="">Select Filter</option>
                  <option value="id,desc" {{isset($_GET['filter']) && $_GET['filter'] == 'id,desc' ? 'selected' : ''}}>Most Recent Job</option>
                  <option value="id,asc" {{isset($_GET['filter']) && $_GET['filter'] == 'id,asc' ? 'selected' : ''}}>Oldest Job</option>
                  <option value="budget,desc" {{isset($_GET['filter']) && $_GET['filter'] == 'budget,desc' ? 'selected' : ''}}>Higest Price</option>
                  <option value="budget,asc" {{isset($_GET['filter']) && $_GET['filter'] == 'budget,asc' ? 'selected' : ''}}>Lowest Price</option>
                  <option value="">Most Amount of Days</option>
                  <option value="">Least Amount of Days</option>
               </select>
            </fieldset>
         </div>
         <button type="submit" class="btn btn-border-think custom-color c-grey btn-md-2">Filter</button>
         <div class="w-search">
            <div class="form-group with-button">
               <input class="form-control" type="text" placeholder="Search Skill......">
               <button>
                  <svg class="olymp-magnifying-glass-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                  </svg>
               </button>
            </div>
         </div>
      </div>
      </form>
   </div>
   @foreach($projects as $project)
      @include('template_part.content-job', ['project' => $project])
   @endforeach
   <!-- Pagination -->
      {!!$projects ->appends(request()->except('page')) -> links('pagination.default')!!}
   <!-- Pagination -->

@endsection
@endif

