<?php 
session_start();
$uName= $_SESSION['uName'];
$to=$_SESSION['to_email'];
$otp=$_SESSION['otp']; 

if ($_SESSION['otp'] === null ) 
{
    header('Location: login.php');
}

?>



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
    <h1>Forgot Password</h1>
	<?php echo "OTP sent successfully to $to";?>
	<form method ="post" action="../Controller/forgotPassControl.php">
		<div class="inputs">
		<input type="text" name="otpEntered" placeholder="OTP" required><br>
		</div>
		<!--<input type="submit" name='submit' value='submit'>-->
		<div class="btn">	
		<button type="submit" name="submit2">Submit</button><br>
		</div>
		
	</form>
	<form method="post" action="../Controller/forgotPassControl.php">
	<!--<input type="submit" name='exit' value='exit'>-->
	<div class="btn">	
		<button type="submit" name="exit">Exit</button><br>
	</div>
	</form>
	<center>
	
</body>
</html>

