<?php 
session_start();
require_once('../Model/queryFunctions.php');
$receiver=null;

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





if(isset($_REQUEST['login']))
{
	$userName=$_REQUEST['uName'];
	$pass=$_REQUEST['pass'];
	$twoStepVerify=twoStepVerify($userName);
	
	//User
	$userStatus= userQuery($userName,$pass);
	//Admin
	$adminStatus= adminQuery($userName,$pass);
	
	//BanStatus Check
	$banStatus=banQuery($userName,$pass);
	

	if($adminStatus)//Admin Entry
	{
		$_SESSION['admin_id']=$userName;
		//echo "Admin Block";
		if($twoStepVerify)
		{
			$email=bringEmail($userName);
			$twoStepVerification = mt_rand(10000, 99999); // Generate a 5-digit twoStepVerification
			$_SESSION['twoStepVerification'] = $twoStepVerification;
			$to = $email;
			$_SESSION['to_email']=$to;
			$subject= "Two Step Verification";
			$message = "Here is the Code for your Two Step Verification: $twoStepVerification. If you were not trying to log in, please change your credentials.";
			$headers="From: anurahaman099@gmail.com";
			$mail=mail($to,$subject,$message,$headers);
			header("location: ../View/verification2Step.php ");
		}
		else
		{
			header("location: ../View/homeAdmin.php ");
		}
        
	}
	else if($banStatus)
	{
		echo '<div style="text-align: center; font-size: 24px;">You are Banned. You will be redirected to home page in few seconds</div>';
    	echo '<meta http-equiv="refresh" content="3;url=home.php">';
	}
	else if($userStatus)
	{
		//echo "User Block";
		
		
		$_SESSION['uname']=$userName;
		$moderStatus=moderatorQuery($userName);
		if($moderStatus)//Admin Entry
		{
			if($twoStepVerify)
			{
				$email=bringEmail($userName);
				$twoStepVerification = mt_rand(10000, 99999); // Generate a 5-digit twoStepVerification
				$_SESSION['twoStepVerification'] = $twoStepVerification;
				$to = $email;
				$_SESSION['to_email']=$to;
				$subject= "Two Step Verification";
				$message = "Here is the Code for your Two Step Verification: $twoStepVerification. If you were not trying to log in, please change your credentials.";
				$headers="From: anurahaman099@gmail.com";
				$mail=mail($to,$subject,$message,$headers);
				header("location: ../View/verification2Step.php ");
			}
            //echo "Mod Block";
			else
			{
				header("location: ../View/homeModerator.php");
			}
		
		}
		else
		{
			if($twoStepVerify)
			{
				$email=bringEmail($userName);
				$twoStepVerification = mt_rand(10000, 99999); // Generate a 5-digit twoStepVerification
				$_SESSION['twoStepVerification'] = $twoStepVerification;
				$to = $email;
				$_SESSION['to_email']=$to;
				$subject= "Two Step Verification";
				$message = "Here is the Code for your Two Step Verification: $twoStepVerification. If you were not trying to log in, please change your credentials.";
				$headers="From: anurahaman099@gmail.com";
				$mail=mail($to,$subject,$message,$headers);
				header("location: ../View/verification2Step.php ");
			}
			//echo "User Block";
			else
			{
				header("location: ../View/homeUser.php");
			}
		}
			
			
	}
	
	
	else
	{
		echo "Invalid Credentials";
	}
	

}
?>
