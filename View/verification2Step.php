<!DOCTYPE html>
<html lang = "en">
	
<head>
	<title>
		Login- 2StepVerification
	</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styleLogin.css">
	
</head>

<body>
	
	<center>
	<form method="post" action="../Controller/verification2StepControl.php">
		<h1>2 - Step Verification</h1><br>
        <h3>5 Digit Code has been sent to your email.</h3>
		<div class="inputs">
			<input type = "text" name="verify" placeholder="2 Step Verification Code" required><br><br>
		</div>
		<div class="btn">	
		<button type="submit" name="enter">Enter</button>
		</div>
		
	</form>
	<center>
	
</body>
</html>