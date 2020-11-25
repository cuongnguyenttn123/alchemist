
<tr class="cart_item">
 <td class="product-thumbnail" style="padding-left: 25px">
    <div class="forum-item">
      <img src="img/{{$file->extension}}.svg" alt="forum" width="40">
      <div class="content">
            <a href="{{$file->link}}" data-name="{{$file->ori_name}}" class="h6 title my-files">{{$file->name}}</a>
            <div class="post__date">
               <time class="published">{{$file->extension}} File </time>
            </div>
      </div>
    </div>
 </td>
 <td class="product-quantity">
   <p class="price amount">{{$file->created_at}}</p>
   <time class="entry-date updated">{{$file->created_at->diffForHumans()}}</time>
 </td>
 <td class="product-subtotal">
    <a href="{{$file->link}}" class="product-del remove" title="Download this item" download>
      <img src="img/inbox.svg" class="olymp-close-icon">
    </a>
 </td>
</tr>