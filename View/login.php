<!DOCTYPE html>
<html lang = "en">
	
<head>
	<title>
		Login 
	</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styleLogin.css">
	<script src="../Controller/jsControl.js" defer></script>
</head>

<body>
	
	<center>
	<form name="loginForm" method="post" action="../Controller/loginControl.php">
		<h1>Login</h1><br>
		<div class="inputs">
			<input type = "text" name='uName' placeholder="User Name" required><br><br>
		
			<input type = "password" name='pass' placeholder="Password" required><br><br>
		</div>
		
			
			<!--<label><input type="checkbox">Remember me</label>-->
		<div class="link">
 		<a href="ForgetPass.php">Forgot Password?</a><br> <br>
		</div>
	
		<div class="btn">	
		<button type="submit" name="login" onclick="return validateLoginForm()">Login</button>
		</div>

		
		<div class="link">
			Don't have an account?<br>
				<a href="registration.php">Sign Up</a>
		</div>
		
	</form>
	<center>

</body>
</html>
