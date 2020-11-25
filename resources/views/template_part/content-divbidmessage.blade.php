<div class="chat-field">
   <div class="ui-block-title">
      <h6 class="title">Chat to {{($bid->author) ? $project->user->full_name : $bid->user->full_name}}</h6>
   </div>
  <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" style="max-height: 300px;" data-ps-id="e90a4d7a-08fc-f139-a476-d6acb8c4d882">
     <ul id="messages" class="hp-notification-right notification-list chat-message-2 chat-message-field chat-message-li" style="max-width: 100%;">
       @php $target_id = $message->user->id ?? false; @endphp
       <?php
       $temp = 0;
       $check_end = false;
       $data = $bid->messages;
       ?>
       @if(count($data) != 0)
         @for ($i = 0; $i < count($data); $i++)
           @if($temp == 0)
             <?php
             $message = $data[$i];
             ?>
             <li class="{{ (Auth::id() == $message->_user ) ? 'seeker-mess' : 'alchemist-mess'}}" style="padding-top: 0px;padding-bottom: 30px;">
               @if(isset($target_id) && $target_id != $message->user->id)
                 <div class="author-thumb" style="margin-top: 10px;">
                   {!!$message->user->getAvatarImgAttribute(36)!!}
                 </div>
               @endif
               <div class="notification-event" style="width: 80%;padding-top: 0px;">
                 @if(isset($target_id) && $target_id != $message->user->id)
                   <a href="javascript:;" class="h6 notification-friend" style="padding-top: 10px;">{{$message->user->fullname}}</a>
                 @endif
                 <span class="chat-message-item" style="clear: both;margin: 10px 0;">{!!$message->message!!}</span>
                 @if($message->attach())
                   <div class="hp_showimg js-zoom-gallery post-block-photo" style="clear: both;margin: 10px 0 0;">
                     @foreach($message->attach() as $file)
                       @if($file->extension == 'jpg' || $file->extension == 'png' || $file->extension == 'gif')
                         <a href="{{$file->link}}" class="col col-3-width no-padding image_show" style="float:left;max-width: 20%;margin-right: 10px">
                           <img src="{{$file->link}}" alt="photo" style="object-fit: cover;">
                         </a>
                       @else
                         <div class="forum-item" style="clear: both;padding-bottom: 10px;">
                           <img class="img_prefile" src="img/{{$file->extension}}.svg" alt="forum" width="40">
                           <div class="content">
                             <a href="{{$file->link}}" class="h6 title stop-show" style="word-break: break-word;padding: 0;margin-bottom: 0;" download>{{$file->name}}</a>
                             <div class="post__date" style="clear: both;">
                               <time class="published">{{$file->extension}} File</time>
                             </div>
                           </div>
                         </div>
                       @endif
                     @endforeach
                   </div>
                 @endif
                 @if($i < count($data)-1 && $data[$i+1]->user->id != $message->user->id || $i == count($data)-1)
                     <span class="notification-date" style="float:left; position: unset!important;"><time class="entry-date updated">{{$message->created_at->diffForHumans()}}</time></span>
                   @endif

                 @for ($j = $i+1; $j < count($data); $j++)
                   <?php $temp++; ?>
                   @if($message->user->id == $data[$j]->user->id)

                     <span class="chat-message-item" style="clear: both;">{!!$data[$j]->message!!}</span>
                     @if($data[$j]->attach())
                       <div class="{{-- added-photos --}} hp_showimg js-zoom-gallery post-block-photo" style="clear: both;margin: 10px 0 0;">
                         @foreach($data[$j]->attach() as $file)
                           @if($file->extension == 'jpg' || $file->extension == 'png' || $file->extension == 'gif')
                             <a href="{{$file->link}}" class="col col-3-width no-padding image_show" style="float:left;max-width: 20%;margin-right: 10px">
                               <img src="{{$file->link}}" alt="photo" style="object-fit: cover;">
                             </a>
                           @else
                             <div class="forum-item" style="clear: both;padding-bottom: 10px;">
                               <img class="img_prefile" src="img/{{$file->extension}}.svg" alt="forum" width="40">
                               <div class="content">
                                 <a href="{{$file->link}}" class="h6 title stop-show" style="word-break: break-word;padding: 0;margin-bottom: 0;" download>{{$file->name}}</a>
                                 <div class="post__date" style="clear: both;">
                                   <time class="published">{{$file->extension}} File</time>
                                 </div>
                               </div>
                             </div>
                           @endif
                         @endforeach
                       </div>
                     @endif
                     @if($j < count($data) -1 && $data[$j]->user->id != $data[$j+1]->user->id || $j == count($data)-1)
                         <span class="{{ (Auth::id() == $message->_user ) ? 'time-notification-custom' : 'notification-date'}}" >
                           <time class="entry-date updated">{{$data[$j]->created_at->diffForHumans()}}</time>
                         </span>
                     @endif
                   @else
                     @break
                   @endif
                   @endfor
               </div>
             </li>
             @else
             <?php
             $temp--;
             ?>
           @endif
           @php $target_id = $message->user->id; @endphp
         @endfor
       @endif
     </ul>
   </div>
   <form id="post_status" class="message-reply showfile files-group" data-parsley-validate>
      <div class="form-group label-floating is-empty">
         <label class="control-label">Enter Comment...</label>
         <textarea class="form-control" placeholder="" name="message" required></textarea>
      </div>
      <div class="ui-block-content photo-preview d-hidden" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px">
         <div class="post-block-photo" style="overflow: hidden;"></div>
         <div>
            <a href="javascript:;" class="col col-3-width clone_img clone d-hidden" style="max-width: 20%;" >
               <i class="fas fa-times-circle removeimg"></i>
               <img class="" src="img/1.jpg" alt="photo" style="object-fit: cover;height: 90px;margin-top: 10px;">
            </a>
         </div>
      </div>
      <div class="ui-block-content file-preview d-hidden" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px">
         <div class="post-block-files" style="overflow: hidden;"></div>
         <div>
            <a href="javascript:;" class="col col-3-width clone_file clone d-hidden" style="position: relative;padding-top: 10px;width: auto;" >
               <button type="button" class="btn btn-blue btn-sm" style="padding-top: 4px;padding-bottom: 4px; padding-left: 10px;padding-right: 10px">Video Reference.mp4</button>
               <i class="fas fa-times-circle removeimg"></i>
            </a>
         </div>
      </div>
      <div class="add-options-message form-group" style="padding-top: 20px;border-top: solid 1px #e6ecf5;">
         <input type="hidden" name="list_media" value="">
         <a id="add-image" href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top">
            <label for="add-photo" class="marginbottom-0">
               <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
               </svg><span style="vertical-align: super;font-size: 15px; padding-left: 8px;">+ Add Image</span>
            </label>
         </a>
         <a id="add-files" href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top">
            <label for="hp_file" class="marginbottom-0">
               <svg class="olymp-camera-icon" >
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use>
               </svg><span style="vertical-align: super;font-size: 15px; padding-left: 8px;">+ Add File</span>
            </label>
         </a>
         <button class="btn btn-primary btn-sm">Post Reply</button>
         {{-- <input type="reset" class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color clear_all" value="Clear" style="float: right;margin-right: 12px; width: auto;" /> --}}
         <input type="hidden" name="id" value="{{$bid->id}}">
         <input id="add-photo" class="add-photo d-none" type="file" name="files[]" accept="image/*" value="" multiple data-parsley-max-file="4" >
         <input id="hp_file" class="add-files d-none" type="file" name="files[]" accept=".zip,.rar,.txt,.docx,.pptx,.pdf,video/*,audio/*" value="" multiple data-parsley-max-file="3">
      </div>
   </form>

</div>
