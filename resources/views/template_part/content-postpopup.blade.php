
                     <article class="hentry post">
                        <div class="post__author author vcard inline-items">
                           <img src="img/author-page.jpg" alt="author">
                           <div class="author-date">
                              <a class="h6 post__author-name fn" href="javascript:;">{{$post->user->fullname}}</a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18">
                                 {{$post->created_at->diffForHumans()}}
                                 </time>
                              </div>
                           </div>
                           <div class="more">
                              <svg class="olymp-three-dots-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                              </svg>
                              <ul class="more-dropdown">
                                 <li><a href="javascript:;">Edit Post</a></li>
                                 <li><a href="javascript:;">Delete Post</a></li>
                                 <li><a href="javascript:;">Turn Off Notifications</a></li>
                                 <li><a href="javascript:;">Select as Featured</a></li>
                              </ul>
                           </div>
                        </div>
                        <p>{{$post->album->description}}</p>
                        <p>With: <a href="javascript:;">Jessy Owen</a>, <a href="javascript:;">Marina Valentine</a></p>
                        <div class="post-additional-info inline-items">
                           <?php
                              $targeted = $post->is_target() ? 'targeted' : '';
                              $like_svg = 'like_gray.svg';
                              $dislike_svg = 'dislike_gray.svg';
                              if($post->user_liked()) $like_svg = 'like.svg';
                              if($post->user_disliked()) $dislike_svg = 'dislike.svg';
                           ?>
                           <a href="javascript:;" class="post-add-icon inline-items {{$targeted}} likepost_btn" data-id="{{$post->id}}">
                              <img src="{{asset("public/frontend/img/$like_svg")}}">
                              <span>{{$post->likes()}}</span>
                           </a>
                           <a href="javascript:;" class="post-add-icon inline-items {{$targeted}} dislikepost_btn" data-id="{{$post->id}}">
                              <img src="{{asset("public/frontend/img/$dislike_svg")}}">
                              <span>{{$post->dislikes()}}</span>
                           </a>
                           <ul class="friends-harmonic">
                              <li>
                                 <a href="javascript:;"><img src="img/friend-harmonic7.jpg" alt="friend"></a>
                              </li>
                              <li>
                                 <a href="javascript:;"><img src="img/friend-harmonic8.jpg" alt="friend"></a>
                              </li>
                              <li>
                                 <a href="javascript:;"><img src="img/friend-harmonic9.jpg" alt="friend"></a>
                              </li>
                              <li>
                                 <a href="javascript:;"><img src="img/friend-harmonic6.jpg" alt="friend"></a>
                              </li>
                           </ul>
                           <div class="names-people-likes">
                              <a href="javascript:;">Diana</a>, <a href="javascript:;">Nicholas</a> and
                              <br>13 more liked this
                           </div>
                           <div class="comments-shared">
                              <a href="javascript:;" class="post-add-icon inline-items">
                                 <svg class="olymp-speech-balloon-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                 </svg>
                                 <span>{{$post->total_comments}}</span>
                              </a>
                              <a href="javascript:;" class="post-add-icon inline-items">
                                 <svg class="olymp-share-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                 </svg>
                                 <span>0</span>
                              </a>
                           </div>
                        </div>
                        <div class="control-block-button post-control-button">
                           <a href="javascript:;" class="btn btn-control">
                              <svg class="olymp-like-post-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                              </svg>
                           </a>
                           <a href="javascript:;" class="btn btn-control">
                              <svg class="olymp-comments-post-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                              </svg>
                           </a>
                           <a href="javascript:;" class="btn btn-control">
                              <svg class="olymp-share-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                              </svg>
                           </a>
                        </div>
                     </article>
                     <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="comments-list">
                           @foreach($post->comments as $comment)
                              @include('template_part.content-comment', [$comment])
                           @endforeach
                        </ul>
                     </div>
                     <form class="comment-form inline-items">
                        <div class="post__author author vcard inline-items post_comment">
                           <img src="img/author-page.jpg" alt="author">
                           <div class="form-group with-icon-right ">
                              <textarea class="form-control" name="content" placeholder="Press Enter to post..."></textarea>
                              <div class="add-options-message">
                                 <a href="javascript:;" class="options-message">
                                    <svg class="olymp-camera-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                    </svg>
                                 </a>
                              </div>
                           </div>
                           <input type="hidden" name="id" value="{{$post->id}}">
                        </div>
                     </form>
