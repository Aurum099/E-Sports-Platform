<?php
session_start();

?>

<!DOCTYPE html>
<html lang = "en">
	
<head>
	<title>
		Reset Password
	</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="styleLogin.css" rel="stylesheet"/>
	
</head>

<body>
	<center>
    <h1>Reset Password</h1>

	<form method="post" action="../Controller/forgotPassControl.php">
		<div class="inputs">
		<input type="password" name="new_password" placeholder="New Password" required ><br>
		<input type="password" name="confirm_password" placeholder="Confirm Password"required ><br>
		</div>

		<div class="btn">	
		<button type="submit" name="reset">Reset</button><br>
		</div>
       <!-- <input type="submit" name='reset' value='reset' > -->
	</form>
	<center>
	
</body>
</html>