<!DOCTYPE html>
<html lang = "en">
	
<head>
	<title>
		Forgot Password
	</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="styleLogin.css" rel="stylesheet"/>
	
</head>

<body>
	<center>
	<form method="post" action="../Controller/forgotPassControl.php">
		<h1>Forgot Password</h1>
		<div class="inputs">
		<input type="text" name="username" placeholder="User Name" required><br>
		<input type="email" name="email" placeholder="Email" required><br>
		</div>

		<!--<input type="submit" name="submit" value="Submit" > <br>-->
		<div class="btn">	
		<button type="submit" name="submit">Submit</button><br>
		</div>
	</form>
	
	<center>
	
</body>
</html>

