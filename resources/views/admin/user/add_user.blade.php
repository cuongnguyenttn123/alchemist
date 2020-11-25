@extends('admin.layouts.master')

@section('title')
Edit User
@endsection

@section('content')
<div class="col-lg-12">
	<section class="content">
		
		<div class="row">
			<div class="col-md-12">
				<div class="dt-btns">
					<div class="dt-bb"><h3>Create User</h3></div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="row">
				<div class="col-md-12">
			<form action="{{route('postCreateUser')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
					
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" id="username" value="{{old('username')}}" >
							<span class="errors">{{$errors -> first('username')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">First name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="first_name" id="first_name" value="{{old('first_name')}}" >
							<span class="errors">{{$errors -> first('first_name')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-sm-2 control-label">Last name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name')}}" >
							<span class="errors">{{$errors -> first('last_name')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
							<span class="errors">{{$errors -> first('email')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" id="password">
							<span class="errors">{{$errors -> first('password')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Retype Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="re_password" id="re_password">
							<span class="errors">{{$errors -> first('re_password')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Role</label>
						<div class="col-sm-10">
							<select name="role" id="role" class="form-control">
                    			@foreach($list_role as $id => $display_name)
								<option value="{{$id}}">{{$display_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Role</label>
						<div class="col-sm-10">
							<select name="status" id="status" class="form-control">
                    			@foreach($list_status as $id => $status)
								<option value="{{$id}}">{{$status}}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					<div style="background-color:#ecf0f5;">
						<button type="submit" class="btn btn-primary" >Save</button>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
@endsection

@section('script')
<script >
	
	var file = document.getElementById('avatar');
	var img = document.getElementById('image_avatar');
	
	file.addEventListener("change", function() {
		if (this.value) {
			var file = this.files[0];
			img.onload = function () {
				window.URL.revokeObjectURL(this.src);
			};
			img.src = window.URL.createObjectURL(file);
		}
	});

	
</script>

<script>
	var date = "";
	$(function(){
		$('#hide').click(function(){
			var type = $('#password').attr('type');
			if(type == 'password'){
				$('#password').attr('type', 'text');
			}else{
				$('#password').attr('type', 'password');
			}
		});
		
		$('#birthday').datepicker({
			minDate: 0,
			defaultDate: date
		});
	});
</script>

@endsection