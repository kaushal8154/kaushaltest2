@extends('admin.layouts.loginapp')
 
@section('title', 'Login')

@section('pagecontent')

<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0);">
        <b>Admin</b>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">

    @foreach ($errors->all() as $error) 
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            {{ $error }}
        </div>
    @endforeach

    @if(session('success'))			
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            {{ session('success') }}
        </div>
	@endif

	@if(session('error'))			
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            {{ session('error') }}
        </div>
	@endif

    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form name="frmAdminLogin" id="frmAdminLogin" action="{{ url('admin/signin') }}" method="post">
        @csrf
        
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@endsection


@section('pagescript')

	<script>	

		$("#frmAdminLogin").validate({
			rules: {
				email: {
					required: true,
					email:true
				},
				password: {
					required: true,					
				},
			},
			submitHandler: function(form) {				
				form.submit();
			},
			errorPlacement: function (error, element) {
				// Place error message in the custom container
				const targetContainer = $("#" + element.attr("name")).parent();
				error.insertAfter(targetContainer);
				//targetContainer.parent().insertAfter(error);
        	},
		});

	</script>	


@endsection
