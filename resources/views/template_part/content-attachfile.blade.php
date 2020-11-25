
                               <div class="col-lg-2 col-md-3 col-sm-12 pl-1 pr-1">
                                  <div class="card file_manager">
                                      <div class="file m-1 image-contain">
                                          <a href="javascript:void(0);" data-id="{{ $file->id}}" class="file-select">
                                            @switch($file->extension)
                                                @case("jpg")
                                                  <div class="image">
                                                      <img src="{{ $file->url}}" alt="img" class="img-fluid"/>
                                                  </div>
                                                  @break
                                                @case("png")
                                                  <div class="image">
                                                      <img src="{{ $file->url}}" alt="img" class="img-fluid"/>
                                                  </div>
                                                  @break
                                                @case("jpeg")
                                                  <div class="image">
                                                      <img src="{{ $file->url}}" alt="img" class="img-fluid"/>
                                                  </div>
                                                  @break
                                                @case("doc")
                                                  <div class="icon">
                                                      <i class="fas fa-file-word"></i>
                                                  </div>
                                                  @break
                                                @case("xls")
                                                  <div class="icon">
                                                      <i class="fas fa-chart-bar text-warning"></i>
                                                  </div>
                                                  @break
                                                @case("xlsx")
                                                  <div class="icon">
                                                      <i class="fas fa-chart-bar text-warning"></i>
                                                  </div>
                                                  @break
                                                @case("pdf")
                                                  <div class="icon">
                                                      <i class="fas fa-file-pdf text-danger"></i>
                                                  </div>
                                                  @break
                                               @default
                                                <div class="icon">
                                                    <i class="fas fa-file text-dark"></i>
                                                </div>
                                            @endswitch
                                              <div class="file-name">
                                                  <p class="m-b-5 text-muted">{{ $file->name }}</p>
                                                  <small>{{ $file->size }} mb <span class="date text-muted">{{ $file->time }}</span></small>
                                              </div>
                                          </a>
                                      </div>
                                  </div>
                                </div> 