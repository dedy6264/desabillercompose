<!doctype html>
<html lang="en">
  <head>
  	<title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{url('login/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #08</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
				 @if (Session::get('success'))
					 {{Session::get('success')}}
					 <a href="{{route('home')}}">login</a>
				 @else
				 {{Session::get('fail')}}
				 @endif
		      	<h3 class="text-center mb-4">Create an account?</h3>
				<form action="{{route('daftar.simpan')}}" class="login-form" method="post">
                            @csrf
		      		<div class="form-group">
		      			<input type="text" name="name" class="form-control rounded-left " id="name" placeholder="Name" required>
					</div>
					<div class="form-group">
						<input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
					</div>
	            	<div class="form-group d-flex">
	            		<input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
	            	</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control rounded-left" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="number" name="phone" class="form-control rounded-left" placeholder="089.........." required>
					</div>
	            	<div class="form-group">
	            		<button type="submit" value="submit" class="btn btn-primary rounded submit p-3 px-5">Register</button>
	            	</div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{url('login/js/jquery.min.js"></script>
  <script src="{{url('login/js/popper.js"></script>
  <script src="{{url('login/js/bootstrap.min.js"></script>
  <script src="{{url('login/js/main.js"></script>

	</body>
</html>

