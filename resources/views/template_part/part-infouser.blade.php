<div class="post__author author vcard inline-items" style="padding-bottom: 0px;margin-bottom: 0;">
  <div class="label-avatar bg-primary"><span>{{$user->level}}</span></div>
  <img width="75" height="75" alt="author" src="{{$user->avatar ??$user->default_img}}" class="avatar">
  <div class="author-date">
    <a class="h6 post__author-name fn" href="{{$user->permalink()}}">{{$user->fullname}}</a>

    <img src="svg-icons/Flags/country-code/{{$user->countryflag}}.svg" class="olymp-heart-icon">
    <div class="post__date">
      <time class="published">
        {{$user->user_type}} | {{$user->user_title}} | LV {{$user->level}}
      </time>
      <div class="skills-item inline-items" style="margin-bottom: 10px">

        <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; ">
          <div class="units">
            <div>
              <font color="#71768E " style="font-weight: 400; margin-right: 0px;">{{number_format((float)$user->rating, 1, '.', '')}}</font>
              <font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font>
            </div>
          </div>
        </div>
        <div class="rating-box">
          <div class="rating-a" style="width:{{$user->rating*20}}%;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
