<?php 
session_start();
require_once('../Model/queryFunctions.php');





if(isset($_REQUEST['submit']))
{
	$userName = $_REQUEST['username'];
	$email = $_REQUEST['email'];
	$_SESSION['uName']=$userName;

	$forgetPassStatus=forgetPass($userName,$email);
	if($forgetPassStatus)
	{
		$sessionUID=$_SESSION['user_id'];

		$otp = mt_rand(1000, 9999); // Generate a 4-digit OTP
		$_SESSION['otp'] = $otp;
		$to = $email;
		$_SESSION['to_email']=$to;
		$subject= "One Time Password";
		$message = "Looks like you want to reset your password. Here is your OTP: $otp. If this wasn't send by you ignore this message.";
		$headers="From: anurahaman099@gmail.com";
		$mail=mail($to,$subject,$message,$headers);
		//echo"Done";
		header("location: ../View/ForgetPass_Next.php ");

		
	}
	else
	{
		echo "Please check your User Name and Email and Try again";
	}
}
$uName= $_SESSION['uName'];
$to=$_SESSION['to_email'];
if(isset($_POST['exit']))
{
	header('Location: ../View/login.php');
	unset($_SESSION['otp']);
}

if(isset($_POST['submit2']))
{   
    $otp=$_SESSION['otp'];
	$otpEntered=$_POST['otpEntered'];
	if($otpEntered==$otp)
	{
		header("location:../View/passReset.php");
		unset($_SESSION['otp']);
	}
	else
	{
		echo "OTP do not match";
	}
}


$uID=$_SESSION['user_id'];
if(isset($_POST['reset']))
{			
	$newPass=$_POST['new_password'];
	$conPass=$_POST['confirm_password'];
	if($newPass==$conPass)
	{
		forgetPassUpdate($newPass,$uID);
   		echo "";
		echo '<div style="text-align: center; font-size: 24px;">Password is updated. You will be redirected to Login page in few seconds</div>';
		echo '<meta http-equiv="refresh" content="3;url=../View/login.php">';
   		//header("location: login.php");
   		session_destroy();
	}
    else
	{
		echo "Passwords do not match";
	}
}



?>

