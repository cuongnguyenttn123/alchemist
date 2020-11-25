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
					<div class="dt-bb"><a href="#">
						<button type="button" class="btn btn-default button-back"><i class="fas fa-angle-left"></i> Back</button>
					</a></div>
					<div class="dt-bb"><h3>Profile</h3></div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<form action="{{route('postEditUser', $info_user -> id)}}" class="form-horizontal" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="col-md-8 no-title">

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<input type="username" class="form-control" name="username" id="username" value="{{$info_user ->username}}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" id="email" value="{{$info_user ->email}}" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="first_name" class="col-sm-2 control-label">First Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name', $info_user->first_name) }}">
								<span class="errors">{{$errors -> first('first_name')}}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="last_name" class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name', $info_user->last_name) }}">
								<span class="errors">{{$errors -> first('last_name')}}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Role</label>
							<div class="col-sm-10">
								<select name="role" id="role" class="form-control">
				                    @foreach($list_role as $id => $display_name)
				                    <option value="{{ $id }}"@if( $info_user->user_role && $id == $info_user->user_role->role_id){!! 'selected="selected"' !!}@endif>{{ $display_name }}</option>
				                    @endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<select name="status" id="status" class="form-control">
				                    @foreach($list_status as $id => $status)
				                    <option value="{{ $id }}"@if($id == $info_user->_status){!! 'selected="selected"' !!}@endif>{{ $status }}</option>
				                    @endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Skills</label>
							<div class="col-sm-10">
								@foreach($skills as $id => $name)
	                            <label class="fancy-checkbox">
								<input type="checkbox" name="userskill[]" value="{{$id}}" @if(in_array($id, $user_skills)){!! 'checked' !!}@endif>
	                                <span>{{$name}}</span>
	                            </label>
								@endforeach
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" name="password" id="password" value="">
							</div>
						</div>
						<div>
							<button type="submit" class="btn btn-primary" >Update Profile</button>
						</div>
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
	var date = <?php echo json_encode($info_user -> birthday); ?>;
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