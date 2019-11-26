<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Masuk Admin</title>
	
	<!-- ================= Favicon ================== -->
	<!-- Standard -->
	<link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
	<!-- Retina iPad Touch Icon-->
	<link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
	<!-- Retina iPhone Touch Icon-->
	<link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
	<!-- Standard iPad Touch Icon--> 
	<link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
	<!-- Standard iPhone Touch Icon--> 
	<link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
	
	<!-- Styles -->
	<link href="assets/fontAwesome/css/fontawesome-all.min.css" rel="stylesheet">
	<link href="assets/css/lib/themify-icons.css" rel="stylesheet">
	<link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/lib/nixon.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

	<div class="Nixon-login">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="login-content">
						<div class="login-logo">
							<a href="index.html"><span>Sosmed</span></a>
						</div>
						<div class="login-form">
							<h4>Masuk Administrator</h4>
							<form action="{{ route('login') }}" method="post">
								@csrf
								<div class="form-group @error('email') has-error @enderror">
									<label for="email">Email</label>
									<input required="required" value="{{ old('email') }}" name="email" id="email" type="email" class="form-control" placeholder="Email">
									@error('email')
									<span class="help-block">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group @error('password') has-error @enderror">
									<label for="password">Password</label>
									<input required="required" value="{{ old('password') }}" id="password" type="password" class="form-control" placeholder="Password" name="password">
									@error('password')
									<span class="help-block">{{ $message }}</span>
									@enderror
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="ingat_saya" value="1" @if(old('ingat_saya')) checked="checked" @endif> Ingat Saya
									</label>
									
								</div>
								<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Masuk</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>