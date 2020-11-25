
<div class="ui-block-title ui-block-title-small">
	<h6 class="title">Filter Preferences</h6>
</div>
<div id="accordion" role="tablist" aria-multiselectable="true">
	<div class="card">
		<div class="card-header" role="tab" id="headingOne-2" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
			<h6 class="mb-0">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2-{{$screen}}" aria-expanded="true" aria-controls="collapseOne-2"><img src="svg-icons/sprites/tools.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
					<span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Search Skills </span>
					<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
				</a>
			</h6>
		</div>

		<div id="collapseOne-2-{{$screen}}" class="collapse show" role="tabpanel" aria-labelledby="headingOne-2">

			<div class="col col-lg-12 col-12 no-padding" style="padding-left: 1.55rem;padding-top: 20px;">
				<h6>Search Skills</h6>
			</div>
			<ul class="your-profile-menu">
             <li style="padding-bottom: 10px;">
                <select class="selectize" name="filter_skill[]"  multiple="multiple">
                   <option value="">Enter Skills To Search...</option>
                       	@foreach($skills as $value)
                  			<option value="{{$value->name}}"
                  				{{(isset($_GET['filter_skill']) && in_array($value->name, $_GET['filter_skill'])) ? 'selected' : ''}}
                  	>			{{$value->name}}</option>
                   @endforeach
                </select>
             </li>
             <button class="btn btn-blue clear_selectize">Clear Skills</button>
          </ul>
		</div>
	</div>
</div>

<div id="accordion" role="tablist" aria-multiselectable="true">
	<div class="card">
		<div class="card-header" role="tab" id="headingOne-4" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
			<h6 class="mb-0">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-4-{{$screen}}" aria-expanded="true" aria-controls="collapseOne-4">
					<img src="svg-icons/menu/target-square.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                   <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Price Range </span>
                   <svg class="olymp-dropdown-arrow-icon">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                   </svg>
				</a>
			</h6>
		</div>

		<div id="collapseOne-4-{{$screen}}" class="collapse " role="tabpanel" aria-labelledby="headingOne-4">
			<div class="search_price" style="padding: 0 1.5rem;border-bottom: solid; border-bottom-width: 1px;border-top-width: 0px;border-bottom-color: #E6ECF5;float: left;width: 100%;">

				<h6 style="padding-top: 20px;">Price Range</h6>
				<div class="price-range">
                	<input placeholder="Min" class="none_arrow" type="number" name="minprice" value="{{isset($_GET['minprice']) ? $_GET['minprice'] : ''}}">

                	<input style="float: right;" placeholder="Max" class="none_arrow" type="number" name="maxprice"  value="{{isset($_GET['maxprice']) ? $_GET['maxprice'] : ''}}">
				</div>
				<button class="btn btn-blue clear_price">Clear Price</button>
			</div>
		</div>
	</div>
</div>
<div id="accordion" role="tablist" aria-multiselectable="true">
	<div class="card">
		<div class="card-header" role="tab" id="headingOne-5" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
			<h6 class="mb-0">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-5" aria-expanded="true" aria-controls="collapseOne-5">
					<img src="svg-icons/menu/maps-and-flags.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
					<span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6">  Contest Location  </span>
					<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
				</a>
			</h6>
		</div>

		<div id="collapseOne-5" class="collapse" role="tabpanel" aria-labelledby="headingOne-3">
          <ul class="your-profile-menu">
          	<h6 style="padding-top: 20px;">+ Add Location</h6>
             <li style="padding-bottom: 10px;">
                <select class="selectize" name="location[]" multiple="multiple">
                   <option value="">Add Location</option>
                   @foreach($list_location as $location)
				 	<?php $selected = (isset($_GET['location']) && is_array($_GET['location']) && in_array($location->id, $_GET['location'])) ? 'selected' : '';?>
                      <option value="{{$location->id}}" {{$selected}}>{{$location->country}}</option>
                   @endforeach
                </select>
             </li>
             <button class="btn btn-blue clear_selectize">Clear Location</button>
          </ul>
       </div>
	</div>
</div>
<div id="accordion" role="tablist" aria-multiselectable="true">
	<div class="card">
		<div class="card-header" role="tab" id="headingOne-5" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
			<h6 class="mb-0">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-6" aria-expanded="true" aria-controls="collapseOne-6">
					<img src="svg-icons/menu/chat.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
					<span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Language </span>
					<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
				</a>
			</h6>
		</div>
		<div id="collapseOne-6" class="collapse" role="tabpanel" aria-labelledby="headingOne-3">
              <ul class="your-profile-menu">
              	<h6 style="padding-top: 20px;">+ Add Language</h6>
                 <li style="padding-bottom: 10px;">
                    <select class="selectize" name="language[]" multiple="multiple">
                       <option value="">Add Language</option>
                       @foreach($list_language as $language)
				 		<?php $selected = (isset($_GET['language']) && is_array($_GET['language']) && in_array($language->language_name, $_GET['language'])) ? 'selected' : '';?>
                        <option value="{{$language->language_name}}" {{$selected}}>{{$language->language_name}}</option>
                       @endforeach
                    </select>
                 </li>
                 <button class="btn btn-blue clear_selectize">Clear Language</button>
              </ul>
        </div>
	</div>
</div>
<div class="align-center" style="background-color: #fff;padding: 20px 20px 5px;">
	<button class="btn btn-blue" style="width: 100%;padding: 15px 0;">SEARCH</button>
</div>
