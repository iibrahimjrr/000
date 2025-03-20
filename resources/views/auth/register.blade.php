<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Site keywords here">
	<meta name="description" content="">
	<meta name='copyright' content=''>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title -->
	<title>Register - Sehty</title>

	<!-- Favicon -->
	<link rel="icon" href="img/favicon.png">

	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
		rel="stylesheet">


	<!-- Medipro CSS -->
	
	<link rel="stylesheet" href="css/auth.css">
	
</head>

<body>



	<!-- From  -->

	<main class="auth-container">
		<div class="auth-box">
			<h2>Create your account</h2>
			<form id="registerForm" class="auth-form">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" id="name" name="name" required>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="age">Age</label>
					<input type="number" id="age" name="age" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<button type="submit" class="submit-button">Register</button>
				<p class="login-link">Already have an account? <a href="login.html">Log in</a></p>
			</form>
		</div>
	</main>

	<script>
		lucide.createIcons();
	</script>
	<script src="js/auth.js"></script>
	<script src="js/register.js"></script>



</body>

</html>