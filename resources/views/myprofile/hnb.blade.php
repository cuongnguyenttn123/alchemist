

    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Hobbies and Interests</h6>
        </div>
        <div class="ui-block-content">
            <!-- Form Hobbies and Interests -->                    
            <form method="post" action="{{route('profile.hnb')}}">
                <div class="row">
                    @if(session('success'))
                    <div class="col-sm-12 col-12">
                        <div class="alert alert-success">{!!session('success')!!}</div>
                    </div>
                    @endif
                    <?php
                        $list_hnb = [
                            "Hobbies", "Favourite TV Shows", "Favourite Movies", "Favourite Games",
                            "Favourite Music Bands / Artists", "Favourite Books", "Favourite Writers", "Other Interests"
                        ];
                    ?>
                    @foreach($list_hnb as $hnb) 
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">{{$hnb}}</label>
                            <textarea name="meta[{{preg_replace("![^a-z0-9]+!i", "-", strtolower($hnb))}}]" class="form-control" placeholder="">{{$meta[preg_replace("![^a-z0-9]+!i", "-", strtolower($hnb))] ?? ""}}</textarea>
                        </div>
                    </div>
                    @endforeach
            
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <button type="button" class="btn btn-secondary btn-lg full-width reset_form">Reset</button>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <button type="submit" class="btn btn-primary btn-lg full-width">Save all Changes</button>
                    </div>
                @csrf
                </div>
            </form>
            <!-- ... end Form Hobbies and Interests -->
        </div>
    </div>



