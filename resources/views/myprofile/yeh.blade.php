
<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">Your Education History</h6>
    </div>
    <div class="ui-block-content">
        @php
            $edu = json_decode($user->get_usermeta('edu'));
            $emp = json_decode($user->get_usermeta('emp'));
        @endphp
        <!-- Education History Form -->
        <form method="post" action="{{route('profile.ene')}}">
            <div class="row">
                @if(session('edu'))
                <div class="col-sm-12 col-12">
                    <div class="alert alert-success">{!!session('edu')!!}</div>
                </div>
                @endif
                @if(isset($edu))
                @foreach($edu as $e)
                <div class="col-sm-12 edu">
                    <div class="row">
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Title or Place</label>
                                <input class="form-control edu_data" placeholder="" type="text" data-type="title" value="{{$e->title ?? ""}}">
                            </div>
                        </div>

                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Period of Time</label>
                                <input class="form-control edu_data" placeholder="" type="text" data-type="time"value="{{$e->time ?? ""}}">
                            </div>
                        </div>

                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Description</label>
                                <textarea class="form-control edu_data" placeholder="" data-type="descrition">{{$e->descrition ?? ""}}</textarea>
                            </div>
                        </div>
                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button type="button" class="btn btn-secondary btn-xs float-right remove_item">Remove</button>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <div class="col col-sm-12 col-12">
                    <a href="javascript:;" class="add-field" data-type="edu">
                        <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                        <span>Add Education Field</span>
                    </a>
                </div>
                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                    <button type="button" class="btn btn-secondary btn-lg full-width reset_form">Reset</button>
                </div>

                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                    <button type="submit" class="btn btn-primary btn-lg full-width">Save all Changes</button>
                </div>
            </div>
            @csrf
        </form>
        <!-- ... end Education History Form -->
    </div>
    </div>
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Your Employement History</h6>
        </div>
        <div class="ui-block-content">
            <!-- Employement History Form -->
        <form method="post" action="{{route('profile.ene')}}">
            <div class="row">
                @if(session('emp'))
                <div class="col-sm-12 col-12">
                    <div class="alert alert-success">{!!session('emp')!!}</div>
                </div>
                @endif
                @if(isset($emp))
                @foreach($emp as $e)
                <div class="col-sm-12 edu">
                    <div class="row">
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Title or Place</label>
                                <input class="form-control edu_data" placeholder="" type="text" data-type="title" value="{{$e->title ?? ""}}">
                            </div>
                        </div>

                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Period of Time</label>
                                <input class="form-control edu_data" placeholder="" type="text" data-type="time"value="{{$e->time ?? ""}}">
                            </div>
                        </div>

                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Description</label>
                                <textarea class="form-control edu_data" placeholder="" data-type="descrition">{{$e->descrition ?? ""}}</textarea>
                            </div>
                        </div>
                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button type="button" class="btn btn-secondary btn-xs float-right remove_item">Remove</button>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <div class="col col-sm-12 col-12">
                    <a href="javascript:;" class="add-field" data-type="emp">
                        <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                        <span>Add Employment Field</span>
                    </a>
                </div>
                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                    <button type="button" class="btn btn-secondary btn-lg full-width reset_form">Reset</button>
                </div>

                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                    <button type="submit" class="btn btn-primary btn-lg full-width">Save all Changes</button>
                </div>
            </div>
            @csrf
        </form>
            <!-- ... end Employement History Form -->
        </div>
    </div>
    <div class="clone d-none col-sm-12 edu">
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Title or Place</label>
                    <input class="form-control edu_data" placeholder="" type="text" data-type="title">
                </div>
            </div>

            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Period of Time</label>
                    <input class="form-control edu_data" placeholder="" type="text" data-type="time">
                </div>
            </div>

            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Description</label>
                    <textarea class="form-control edu_data" placeholder="" data-type="descrition"></textarea>
                </div>
            </div>
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <button type="button" class="btn btn-secondary btn-xs float-right remove_item">Remove</button>
            </div>
        </div>
    </div>


@section('scripts')
<script type="text/javascript">
    $(document).on('click', '.add-field', function(){
        var _parent = $(this).parent();
        var clone = $('.clone.edu').clone().removeClass('d-none clone');
        clone.insertBefore(_parent);
    });
    $(document).on('click', '.remove_item', function(){
        $(this).closest('.edu').remove();
    });
    $(document).on('click', 'button[type=submit]', function(e){
        e.preventDefault();
        var edu = {};
        let _this = $(this).closest('form');
        type = _this.find('.add-field').data('type');
        console.log(type);
        _this.find('.edu').each(function(index){
            ele = {};
            var _this = $(this);
            _this.find('.edu_data').each(function(i){
                var _this = $(this);
                name = _this.attr('data-type');
                val = _this.val();
                ele[name] = val;
            });
            edu[index] = ele;
        });
        console.log(edu);
        var input = JSON.stringify(edu);
        //var input2 = input.replace("'/gi","&#39;")
        var input2 = input.split("'").join("&#39;");
        console.log(input2);
        _this.append("<input type='hidden' name='meta["+type+"]' value='"+input2+"'>");
        console.log(_this.serialize());
        // _this[0].submit();
    });
</script>
@endsection

