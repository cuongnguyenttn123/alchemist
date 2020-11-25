@extends('myprofile.master')
@section('title')
list contest
@endsection
@if(Auth::id())
@section('profile_content')

               <div class="ui-block responsive-flex">
                  <div class="ui-block-title">
                     <div class="h4 title">My List Contest</div>
                     <div class="block-btn align-right">
                        <a href="{{route('get_new_contest')}}" class="btn btn-md-2 bg-blue btn-icon-left"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Create Contest</a>
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
                  <div class="ui-block-title">
                     <div class="w-select">
                        <div class="title">Filter By:</div>
                        <fieldset class="form-group">
                           <select class="selectpicker form-control">
                              <option value="">All Categories</option>
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                           </select>
                        </fieldset>
                     </div>
                     <div class="w-select">
                        <fieldset class="form-group">
                           <select class="selectpicker form-control">
                              <option value="">Select Filter</option>
                              <option value="id,desc">Most Recent Job</option>
                              <option value="id,asc">Oldest Job</option>
                              <option value="budget,desc">Higest Price</option>
                              <option value="budget,asc">Lowest Price</option>
                              <option value="">Most Amount of Days</option>
                              <option value="">Least Amount of Days</option>
                           </select>
                        </fieldset>
                     </div>
                     <a href="#" data-toggle="modal" data-target="#" class="btn btn-border-think custom-color c-grey btn-md-2">Filter</a>
                     <form class="w-search">
                        <div class="form-group with-button">
                           <input class="form-control" type="text" placeholder="Search Skill......">
                           <button>
                              <svg class="olymp-magnifying-glass-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                              </svg>
                           </button>
                        </div>
                     </form>
                  </div>
               </div>
               @foreach($contests as $contest)
                  <div class="ui-block">
			         <!-- Post -->
			         <div class="news-feed-form">
			            <div class="ui-block-title">
			               <h6 class="title">Contest: {{$contest->name_contest}}</h6>
			               <a href="#" class="more">
			                  <svg class="olymp-three-dots-icon">
			                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
			                  </svg>
			               </a>
			            </div>
			            <!-- Tab panes -->
			            <div class="tab-content">
			               <div class="tab-pane active" id="milestones{{$contest->id}}" role="tabpanel" aria-expanded="true">
			                  <article class="hentry post has-post-thumbnail thumb-full-width">
			                     <div class="post__author author vcard inline-items">
			                        <img src="img/coding.svg" alt="author">
			                        <div class="author-date">
			                           <a href="#" class="h6 post__author-name fn">Contest: {{$contest->name_contest}}<span class="tag-label bg-green">GUARANTEED FULL PAYMENT</span></a>
			                           <div class="post__date">
			                              <time class="published" datetime=""> {{$contest->time_start}} -- {{$contest->time_end}}</time>
			                           </div>
			                        </div>
			                        <div class="more">
			                           <div class="crumina-module crumina-heading with-title-decoration">
			                              <h4 class="heading-title">Prize ${{$contest->total_prize}} USD</h4>
			                           </div>
			                        </div>
			                     </div>
			                  </article>
			               </div>
			               <div class="add-options-message">
			                  <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="SAVE PROJECT">
			                     <svg class="olymp-heart-icon" data-toggle="modal" data-target="#">
			                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
			                     </svg>
			                  </a>
			                  <a href="javascript:;" class="options-message" data-toggle= "modal" data-target="#create-friend-group-add-friends" data-original-title="TAG YOUR CONTACTS">
			                     <svg class="olymp-computer-icon">
			                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
			                     </svg>
			                  </a>
			                  <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="SHARE PROJECT">
			                     <svg class="olymp-small-share-icon">
			                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
			                     </svg>
			                  </a>

			                  <a href="{{route('getEditContest',$contest->id)}}" class="btn btn-md-2 float-right" style="background-color: #90CB1E">Edit</a>
			                  <a href="{{route('deleteContest',$contest->id)}}" class="btn btn-md-2 float-right" style="background-color: #90CB1E">Delete</a>
			                  <a href="{{route('getContestDetail',$contest->id)}}" class="btn btn-md-2 btn-border-think btn-transparent c-grey float-right">FULL DETAILS</a>
			               </div>
			            </div>
			         </div>
			         <!-- .. end Post -->
			         </div>
               @endforeach
               <!-- Pagination -->
                  {!!$contests ->appends(request()->except('page')) -> links('pagination.default')!!}
               <!-- Pagination -->

@endsection
@endif

