
@auth
<div class="modal fade modal-target" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">File</h4>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#gallery"><i
                                class="fas fa-user"></i>Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#new-upload"><i
                                class="fas fa-upload"></i> Upload</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="gallery">
                      <div class="row media-container">
                        @forelse ($files as $file)
                           @include('template_part.content-file', [$val = 'id'])
                        @empty
                        @endforelse
                          </div>
                      </div>
                    <div class="tab-pane" id="new-upload">
                        <form action="{{ route('file-upload') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone" >
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            	<button class="file-select btn btn-primary">Attach</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
@endauth