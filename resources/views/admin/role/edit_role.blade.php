@extends('admin.layouts.master')
@section('title')
Edit Role
@endsection
@section('content')
                <div class="col-lg-12">
	<section class="content">
		<form action="{{route('role.edit', $role -> id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-12">
					<div class="dt-btns">
						<div class="dt-bb"><a href="{{route('role.list')}}">
							<button type="button" class="btn btn-default button-back"><i class="fas fa-angle-left"></i> Back</button>
						</a></div>
						<div class="dt-bb"><h3>Edit Role</h3></div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-12 no-title">
					<div class="form-group">
						<label for="" class="col-sm-2 control-label" style="text-align: left;">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name ="name" id="name" placeholder="Ex: User" value="{{$role -> name}}">
							<span class="errors">{{$errors -> first('name')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label" style="text-align: left;">Display Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name ="display_name" id="display_name" placeholder="Ex: User demo" value="{{$role -> display_name}}">
							<span class="errors">{{$errors -> first('display_name')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label" style="text-align: left;">Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="description" rows="3" placeholder="">{{$role -> description}}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label" style="text-align: left;">Permission</label>
						<div class="col-sm-10">
							@foreach($list_permission as $id => $display_name)
							<div class="col-sm-6">
								<input type="checkbox" name="permission[]" value="{{$id}}" @if(in_array($id, $role_permission)){{"checked"}}@endif>{{$display_name}}
							</div>
							@endforeach
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label" style="text-align: left;">
							<button type="submit" class="btn btn-primary">Update Role</button>
						</label>
						<div class="col-sm-10"></div>
					</div>
				</div>
			</div>
		</form>
	</section>
	<!-- end content -->
</div>
@endsection