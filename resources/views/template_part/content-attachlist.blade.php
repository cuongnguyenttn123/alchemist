<tr class="cart_item">
   <td class="product-thumbnail">
      <div class="forum-item">
         <img src="img/{{$file->extension}}.svg" alt="forum" width="40">
         <div class="content">
            <a href="{{$file->link}}" class="h6 title">{{$file->name}}</a>
            <div class="post__date">
               <time class="published" datetime="2017-03-24T18:18">{{$file->extension}} File </time>
            </div>
         </div>
      </div>
   </td>
   <td class="product-price">
      <div class="author-freshness">
         <a href="javascript:;" class="h6 title">{{$file->user->full_name}}</a>
      </div>
   </td>
   <td class="product-quantity">
      <P class="price amount">{{$file->created_at}}</P>
      <time class="entry-date updated">{{$file->created_at->diffForHumans()}}</time>
   </td>
   <td class="product-subtotal">
      <a href="javascript:;" class="product-del remove" title="Remove this item">
         <img src="img/inbox.svg" class="olymp-close-icon">
         <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
         </svg>
      </a>
   </td>
   <td class="product-remove">
      <div class="checkbox">
         <label>
         <input type="checkbox" name="optionsCheckboxes">
         </label>
      </div>
   </td>
</tr>