
<tr class="event-item">
    <?php $project = $receipt->project;?>
    <td class="author" >
      <div class="author-freshness" align="center">
         <span><span class="color-2 fontsize-14 fontweight-500 marginright5">Project ID:</span><span class="fontsize-14">{{$project->id}}</span></button>
         <a href="javascript:;" class="h6 title fontweight-500">{{$project->name}}</a>
         <time class="entry-date updated"><em class="fontsize-12">{{$project->catname}}</em></time>
         <br>
         <time class="entry-date updated"><em class="fontsize-12">{{$project->skillname}}</em></time>
      </div>
    </td>
     <td class="alchemit-col freshness inline-items" align="center">
      <div class="author-freshness margintop-5">
      	{!!$project->user->getAvatarImgAttribute(36)!!}
         <br>
         <a href="javascript:;" class="h6 title margintop-5">{{$project->user->full_name}} <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon avatarplag"></a>
         <time class="entry-date updated" datetime="2017-06-24T18:18" ><span class="fontsize-12">{{$project->user->user_title}} | LV {{$project->user->level}}<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon avatarcricle"></span></time>
      </div>
     </td>
    <td class="freshness inline-items" align="center">
       <div class="author-freshness margintop-5">
       	<a href="javascript:;" class="margintop-5 h6 title">Invoice Ref. </a>
          <time class="entry-date updated" datetime="2017-06-24T18:18" >
          	<span class="fontsize-12">INV: 0000000001</span>
          </time>
       </div>
    </td>
    <td class="freshness inline-items" align="center">
       <div class="author-freshness margintop-5">
       	<a href="javascript:;" class="margintop-5 h6 title">Invoice Amount</a>
          <time class="entry-date updated" datetime="2017-06-24T18:18" >
          	<span class="fontsize-12">${{$receipt->money}}</span>
          </time>
       </div>
    </td>
    <td class="align-top add-event align-center">
       <a class="btn btn-purple btn-sm btn-icon-left">
       	<i class="fa fa-download" aria-hidden="true" ></i>
       	Download
       </a>
    </td>
</tr>
