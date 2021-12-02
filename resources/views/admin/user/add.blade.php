@extends('layouts.admin')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
	<form class="kt-form kt-form--label-right" method="POST" action="{{route('user.submit')}}" enctype="multipart/form-data">
		@csrf
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
	      <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
				<h3 class="kt-portlet__head-title">User Registration</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						<a href="{{route('user.all')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-plus-circle"></i>All User</a>
                    </div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">Name:</label>
				<div class="col-md-7">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }} </strong>
                    </span>
                    @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">Email:</label>
				<div class="col-md-7">
                    <input type="text" class="form-control" name="email" value="">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">Phone:</label>
				<div class="col-md-7">
                    <input type="text" class="form-control" name="phone" value="">
                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">Password:</label>
				<div class="col-md-7">
                    <input type="password" class="form-control" name="password" value="">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">Confirm-Password:</label>
				<div class="col-md-7">
                    <input type="password" class="form-control" name="password_confirmation" value="">
                    @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">User Role:</label>
				<div class="col-md-7">
                    @php
                    $roles = \App\Models\Role::all();
                @endphp
                <select name="role" id="" class="form-control">
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
				</div>
			</div>
			<div class="form-group row custom_row">
				<label class="col-md-3 col-form-label">Upload Photo:</label>
				<div class="col-md-7">
					<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
							<div class="kt-avatar__holder" style="background-image: url({{asset('uploads')}}/avatar.png)"></div>
							<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="image" accept=".png, .jpg, .jpeg">
							</label>
							<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
							</span>
					</div>
					<span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
				</div>
			</div>
		</div>
	  <div class="kt-portlet__foot text-center">
	    <button type="submit" class="btn btn-md btn-brand">REGISTRATION</button>
		</div>
	</form>
</div>
@endsection
