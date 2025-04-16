@extends('layouts.master')

@section('content')
	
	<div class="container">
		<div id="content">
			
			<form action="{{ route('postsignin') }}" method="POST" class="beta-form-checkout">
				@csrf
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
							<p>{{ $err }}</p>
						@endforeach
					</div>
				@endif
				@if(Session::has('success'))
					<div class="alert alert-success">{{ Session::get('success') }}</div>
				@endif

				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4 style="font-family:Times New Roman;">Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="username">Username*</label>
							<input type="text" id="username" name="username" required>
						</div>

						<div class="form-block">
							<label for="address">Address*</label>
							<input type="text" id="address" name="address" required>
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" id="phone" name="phone" required>
						</div>

						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" id="password" name="password" required>
						</div>

						<div class="form-block">
							<label for="repassword">Re-enter Password*</label>
							<input type="password" id="repassword" name="repassword" required>
						</div>

						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection
