@extends('admin.layouts.master')

@section('title')
Add Package
@endsection

@section('content')
<div class="col-lg-12">
	<section class="content">
		
		<div class="row">
			<div class="col-md-12">
				<div class="dt-btns">
					<div class="dt-bb"><h3>Add Package</h3></div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="row">
				<div class="col-md-12">
			<form action="{{route('mempack.add')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
					<div class="col-md-8 no-title">
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
								<span class="errors">{{$errors -> first('title')}}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="price" class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
								<span class="errors">{{$errors -> first('price')}}</span>
							</div>
		            </div>
		            <div class="form-group">
		              <label for="description" class="col-sm-2 control-label">Description</label>
		              <div class="col-sm-10">
		                <textarea class="form-control data-change-handle" name="description" rows="3" cols="20"></textarea>
		              </div>
		            </div>
		            <div class="form-group">
						<label for="price" class="col-sm-2 control-label">Duration</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="duration" id="duration" value="{{old('duration')}}">
							<span class="errors">{{$errors -> first('duration')}}</span>
						</div>
		            </div>
		            <div class="form-group">
						<label for="price" class="col-sm-2 control-label">Type</label>
						<div class="col-sm-10">
							<select name="type" class="form-control"id="">
			                  <option value="0">Normal</option>
			                  @foreach($user_types as $type)
			                    <option value="{{ $type->id }}">{{ $type->display_name }}</option>
			                  @endforeach
			                </select>
							<span class="errors">{{$errors -> first('type')}}</span>
						</div>
		            </div>
		            
					<!--<div class="all_meta">
						<h2>Meta</h2>
						<a href="javascript:;" class="add_meta">Add meta</a>
					</div> -->
					<div>
						<button type="submit" class="btn btn-primary" >Add</button>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
@endsection

@section('scripts')
<script type="text/template" id="metafield">
	<div class="form-group">
		<div class="row">
			<div class="col-sm-5">
				<input type="text" class="form-control" name="meta_key[]" id="" value="" placeholder="Label">
			</div>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="meta_value[]" id="" value="" placeholder="value">
			</div>
			<div class="col-sm-2">
				<a href="javascript:;" class="remove_meta">remove</a>
			</div>
		</div>
	</div>
</script>
<script >
	/*var template = $('#metafield').html();

	$(document).on('click', '.add_meta', function() {
	    $('.all_meta').append(template);
	});
	$(document).on('click', '.remove_meta', function() {
	    $(this).closest('.form-group').remove();
	});*/
</script>

@endsection