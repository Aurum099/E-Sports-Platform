<?php
session_start();
require_once('../Model/queryFunctions.php');

$userName=$_SESSION['uname'];



if(isset($_REQUEST['enter']))
	{
		$verific=$_REQUEST['verify'];
		$twoStepVerification=$_SESSION['twoStepVerification'];
		if($twoStepVerification!=$verific)
		{
			$email=bringEmail($userName);
			$to = $email;
			$_SESSION['to_email']=$to;
			$subject= "Your Account is trying to get Accessed";
			$message = "Some one is trying to access your account by using your credential. Wrong 2Step Verification Was given. If this was done by you please ignore this message. ";
			$headers="From: anurahaman099@gmail.com";
			$mail=mail($to,$subject,$message,$headers);
			session_destroy();
			header("location: ../View/home.php");
		
		}
		else if($twoStepVerification==$verific)
		{
			if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] !== null)
			{
				header("location: ../View/homeAdmin.php ");
			}
			if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null)
			{
				$userName=$_SESSION['user_id'];
				$moderStatus2=moderatorQuery2($userName);
				if($moderStatus2)//Admin Entry
				{
					//echo "Moderator Block";
					header("location: ../View/homeModerator.php");
		
				}
				else
				{
					//echo "User Block Session";
					header("location: ../View/homeUser.php");
				}
			}
	
		}
	
	

}
?>