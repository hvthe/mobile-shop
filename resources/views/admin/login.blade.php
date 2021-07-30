<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mobile Shop - Administrator</title>

<link href="{{ asset ('admin/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('admin/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset ('admin/css/bootstrap-table.css') }}" rel="stylesheet">
<link href="{{ asset ('admin/css/styles.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if(session()->exists('loginFail'))
					<div class="alert alert-danger"> Sai mật khẩu !</div>
					@endif
					<form role="form" method="post">
						@csrf
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="" autofocus value = "{{ isset($email)? $email : old('email') }}">
								@if($errors->has('email'))
								<p class="text-danger">{{$errors->first('email')}}</p>
								@endif
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="password" type="password">
								@if($errors->has('password'))
								<p class="text-danger">{{$errors->first('password')}}</p>
								@endif
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>