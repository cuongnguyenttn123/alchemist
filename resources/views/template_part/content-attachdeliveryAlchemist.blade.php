
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
    &emsp;&emsp;
  </td>
  <td class="product-subtotal" style="padding-right: 0px;">
    <a href="#" class="accept-request ">
      <span class="">
      <svg src="svg-icons/sprites/check-icon.svg" class="olymp-close-icon" style="height: 15px;width: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-check-icon"></use></svg>
      </span>
    </a>
    <a data-delete_file_cosan = "{{$file->id}}" data-key_show="{{$key}}" data-show_check="{{$show_key}}" class="click-delete-file-cosan accept-request request-del">
      <span class="">
      <img src="img/trash.svg" class="olymp-close-icon" style="height: 15px;width: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
      </span>
    </a>
  </td>
</tr>
