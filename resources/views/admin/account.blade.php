@extends('layouts.admin')
@section('content')
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script>
		@if(\Session::has('message'))
        var type = "{{ \Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ \Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ \Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ \Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ \Session::get('message') }}");
                break;
        }
		@endif
	</script>
	<!-- MAIN CONTENT-->
	<div class="main-content">
		<div class="section__content section__content--p30">
			<h2 class="text-center mb-5" style="font-family: 'Adobe Devanagari', sans-serif">Update User</h2>
			<form action="{{ route('user.account.update') }}" method="post" enctype="multipart/form-data" class="mb-5">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div>
							<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Username" value="{{ Auth::user()->name }}">
							@if ($errors->has('name'))
								<span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('name') }}</strong>
	                            </span>
							@endif
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ Auth::user()->email }}">
							@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
							@endif
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="current_password" class="form-control {{ $errors->has('current_password') ? ' is-invalid' : '' }}" placeholder="Текущий пароль">
							@if ($errors->has('current_password'))
								<span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('current_password') }}</strong>
	                            </span>
							@endif
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Новый пароль">
							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('password') }}</strong>
	                            </span>
							@endif
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтвердите новый пароль">
						</div>
					</div>
					<div class="col-md-6 text-center">
						<img src="{{ asset('storage') .'/'. Auth::user()->avatar}}" alt="Avatar" style="max-width: 12em">
						<br>
						<input type="file" name="avatar" accept="image/jpeg, image/jpg, image/png" class="form-control {{ $errors->has('avatar') ? ' is-invalid' : '' }}">
						@if ($errors->has('avatar'))
							<span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </span>
						@endif
					</div>
				</div>
				<button type="submit" class="btn btn-outline-secondary mb-5">Обновить</button>
			</form>
		</div>
	</div>
@endsection