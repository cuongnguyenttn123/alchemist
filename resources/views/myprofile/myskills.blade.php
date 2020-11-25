
    <div class="ui-block responsive-flex">
        <div class="ui-block-title">
            <div class="h6 title">My Skills</div>
            <div class="w-select">
                <div class="title">Skill Type</div>
                <fieldset class="form-group select-category">
                  <select class="selectpicker form-control" name="cat_skill">
                        <option value="">Select Category</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <form class="w-search" method="post" action="{{route('ajax.searchskill')}}">
                <div class="form-group with-button">
                  <input class="form-control" type="text" name="search_string" placeholder="Search Skill...">
                    <button>
                        <svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="ui-block list_cat">
        <div class="ui-block-title">
            <h6 class="title">Select Skill Categories
                <span class="tag-label bg-smoke skills_left" style="color: #888da8; PADDING-LEFT: 10px; PADDING-top: 5px; PADDING-bottom: 5px; PADDING-RIGHT: 10px">+ <span>{{$user->skills_left}}</span> Skills Remainig</span>
            </h6>
        </div>
        <div class="ui-block-content">


        <!-- Form Hobbies and Interests -->

        <form>
          <div class="row">
            @foreach($cats as $cat)
              <?php
              $title = str_replace('/','-',$cat->name);
              $titleConverter = str_replace(" ","-" ,$title);
              $titleConverter = $titleConverter.'-'.$cat->id;

              $img = "";
              switch ($cat->name){
                case "Web programmers":
                  $img = "img/coding.svg";
                  break;
                case "IT & Programing":
                  $img = "img/mobile-app.svg";
                  break;
                case "Writing & Translation":
                  $img = "img/typewriter.svg";
                  break;
                case "Legal field":
                  $img = "img/law.svg";
                  break;
                case "Multimedia & design":
                  $img = "img/tools.svg";
                  break;
                case "Customer & Administrative support":
                  $img = "img/tools-2.svg";
                  break;
                case "Marketing & Sales":
                  $img = "img/digital-campaign.svg";
                  break;
                case "Manufacturing & Engineering":
                  $img = "img/brain.svg";
                  break;
                default:
                  $img = "img/chart.svg";
                  break;

              }

              ?>
              <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">

                <div class="crumina-module crumina-info-box" data-mh="box--classic">
                  <div class="info-box-image">
                    <img src="{{$img}}" alt="icon" width="100">
                    <br>
                    <br>
                    <p class="info-box-title">{{$cat->name}}<br><br><span data-cat_id = "{{$cat->id}}" class="search-category btn btn-blue btn-sm">View Category</span></p>
                    <br>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </form>

        <!-- ... end Form Hobbies and Interests -->

      </div>
    </div>
    <div class="ui-block result_search">
        <div class="ui-block-title">
            <div class="h6 title"></div>
            <div class="align-right">
                <a href="javascript:;" class="btn btn-md-2 btn-border-think custom-color c-grey back_to_cat">Back to Categories</a>
                <a href="javascript:;" class="btn btn-primary btn-md-2 saveskill">Save all Changes</a>
            </div>
        </div>
        <div class="ui-block-content">
            <div class="row">
            </div>
        </div>
    </div>

@section('scripts1')
<script type="text/javascript">
    jQuery(document).ready(function(){
        $('.result_search').hide();
        $(document).on('click', '.saveskill', function() {
            _this = $(this).closest('.ui-block');
            var skill = [];
            var detach_skill = [];
            $('input[name="userskill[]"]:checked').each(function(i){
                skill[i] = $(this).val();
            });
            $('input[name="userskill[]"]:not(:checked)').each(function(i){
                detach_skill[i] = $(this).val();
            });
             //console.log("vao");
            // console.log(detach_skill);
            ajax_saveskills(skill,detach_skill);
        });
        $(document).on('click', '.remove_skill', function() {
            id = $(this).data('id');
            var skill = [];
            var detach_skill = [];
            detach_skill.push(id);
            // console.log(skill);
            // console.log(detach_skill);
            ajax_saveskills(skill,detach_skill);
            $(this).closest('li').remove();
        });

        function ajax_saveskills(skill, detach_skill){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url: "{{route('ajax.saveskill')}}",
                data: 'skill='+skill+'&detach_skill='+detach_skill,
                success:function(data){
                    $('.skills_left span').text(data.skills_left);
                    if(data.error){
                        jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                    }else {
                        jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                        // swal("Success!", data.message, "success");
                    }
                }
            });
        }
        $(document).on('click', '.crumina-module.crumina-info-box a', function() {
            alert('adada');
            _this = $(this).closest('.ui-block');
            cat_id = $(this).data('id');
            form_data = 'cat_id='+cat_id;
            ajax_searchskill(form_data);
        });
        $(document).on('submit', '.w-search', function(e) {
            e.preventDefault();
            cat_id = $(this).closest('.ui-block').find('select[name="cat_skill"]').val();
            form_data = $(this).serialize();
            if(cat_id){
                console.log(cat_id);
                form_data += '&cat_id='+cat_id;
            }
            ajax_searchskill(form_data);
        });
        function ajax_searchskill(form_data){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url: "{{route('ajax.searchskill')}}",
                data: form_data,
                success:function(data){
                    $('.result_search').find('.h6.title').html(data.title);
                    $('.result_search').find('.row').html(data.output);
                    $('.list_cat').hide();
                    $('.result_search').show();
                }
            });
        }
        $(document).on('click', '.back_to_cat', function() {
            $(this).closest('.ui-block').hide();
            $(this).closest('.ui-block').prev().show();
        });
    });
</script>
@endsection
