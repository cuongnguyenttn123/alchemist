
   <div class="ui-block">
      <div class="ui-block-title">
         <h6 class="title">Project & Contest Notifications</h6>
         <a href="#" class="more">
            <svg class="olymp-three-dots-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
            </svg>
         </a>
      </div>
      <!-- Notification List Frien Requests -->
      <ul class="notification-list friend-requests">
         @auth
         <?php $notif = $user->notifications()->unread('job');?>
         @foreach($notif as $n )
             @include('notification.content-job')
         @endforeach
         @endauth
      </ul>
      <!-- ... end Notification List Frien Requests -->
   </div>
