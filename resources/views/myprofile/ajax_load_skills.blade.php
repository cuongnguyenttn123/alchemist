<div id="profile-panel" class="your-profile">
  <?php $user_skills = $user->skills()->get()->pluck('id')->toArray();?>
  @foreach($cats as $cat)
    <?php $c_skill = $cat->skills->pluck('id')->toArray();?>
    @if(count(array_intersect($user_skills, $c_skill)) > 0)
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="heading{{$cat->id}}">
            <h6 class="mb-0">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$cat->id}}" aria-expanded="true" aria-controls="collapse{{$cat->id}}">{{$cat->name}}
                <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
              </a>
            </h6>
          </div>
          <div id="collapse{{$cat->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$cat->id}}">
            <ul class="your-profile-menu">
              @foreach($cat->skills as $skill)
                @if(in_array($skill->id, $user_skills))
                  <li>
                    <img src="img/star.svg" alt="" width="15" hspace="3" style="PADDING-BOTTOM: 3px">
                    <span class="country">{{$skill->name}} | </span>
                    <span class="ui-block-title-small">{{$skill->count_jobs}} Jobs</span>
                    <span class="tag-label bg-smoke remove_skill" data-id="{{$skill->id}}" style="color: #888da8; PADDING-LEFT: 10px; PADDING-RIGHT: 10px;cursor: pointer;">X</span>
                  </li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    @endif
  @endforeach
  <div class="ui-block-title">
    <a href="javascript:;" class="btn btn-grey-lighter btn-md full-width">{{$user->skills->count()}} / {{$user->limit_skill}}</a>
  </div>
    <input id="saveskill" type="hidden" name="" value="{{route('ajax.saveskill')}}">
    <input id="searchskill" type="hidden" name="" value="{{route('ajax.searchskill')}}">
    <input id="getskill" type="hidden" name="" value="{{route('ajax.getallskills')}}">
</div>
