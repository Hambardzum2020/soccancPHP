<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Sign In/Sign Up</title>
</head>
<body>
	<!-- <div class="start">friends.com</div> -->
	<div class="ham">
	<div class="container" id="container">
	<div class="form-container sign-up-container">
		<section>
			<h1>Create Account</h1>
			<input type="text" id="name" placeholder="Name" />
			<input type="text" id="surname" placeholder="Surname" />
			<input type="text" id="email" placeholder="Email" />
			<input type="text" id="age" placeholder="Age" />
			<input type="text" id="password" placeholder="Password" />
			<input type="text" id="confirm_password" placeholder="Confirm-password" />
			<button id="save">Sign Up</button>
		</section>
	</div>
	<div class="form-container sign-in-container">
		<section>
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="text" id="email1" placeholder="Email" />
			<input type="text" id="password1" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button id="singIn" class="login">Sign In</button>
		</section>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p class="text">To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p class="text">Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</div>
</body>
	<script src="script.js"></script>  	
</html>