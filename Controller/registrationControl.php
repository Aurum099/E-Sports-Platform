<?php
session_start();
require_once('../Model/queryFunctions.php');
$NameError="";
$uNameError="";
$countryError="";
$dateOfBirthError="";
$emailError="";
$passError="";
$conPassError="";


if (isset($_REQUEST['signUp'])) 
{
    $name = $_REQUEST['name'];
    $uName = $_REQUEST['uname'];

    $Email = $_REQUEST['Email'];
    $country = $_REQUEST['country'];
    $dateOfBirth = $_REQUEST['dateOfBirth'];

    $Password = $_REQUEST['Password'];
    $Conpass = $_REQUEST['conPassword'];

    $count1 = userNameCheck($uName);
   // $count2 = emailCheck($Email);

    if ($name != null && $uName != null && $uName != null && $Email != null && $dateOfBirth != null && $Password != null && $Password == $Conpass && $count1==0 && $count2==0 ) 
    { 
        $n=10;
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randomString = substr(str_shuffle($characters), 0, $n);
        $_SESSION['verifyUID']=$randomString;
        $register=register($randomString,$name,$uName,$country,$dateOfBirth,$Email,$Password);
        $friendUID=friendUID($randomString);
        //Verification Mail
        $to = $Email;
		$_SESSION['to_email']=$to;
		$subject= "Verify your Account";
		$message = "Thank you for registering in this website. To Verify your account please copy the Link and run it on a different tab. Link: localhost/ProjectMain/Controller/verificationControl.php";
		$headers="From: anurahaman099@gmail.com";
		$mail=mail($to,$subject,$message,$headers);
        echo '<script>
            function showEmailSentMessage() {
                alert("Email has been sent! Please check your inbox.");
            }
            showEmailSentMessage();
        </script>';

        header("Location:../View/login.php");

    }
    else if ($count1) 
    {
        $_SESSION['error_message_User']="UserName already exists. Please Choose a Unique Username.";
        header('location:../View/registration.php');
    }
  /*  else if($count2)
    {
        $_SESSION['error_message_Email']="Email address already exists. Please use different Email.";
        header('location:../View/registration.php');
    } */
    
    if(empty($name))
    {
        $_SESSION['error_message_Name']="Full Name Required!";
        header('location:../View/registration.php');
    }
    if(empty($uName))
    {
        $_SESSION['error_message_UserName']="User Name Required.";
        header('location:../View/registration.php');
    }
    if(empty($country))
    {
        $_SESSION['error_message_country']="Country Required.";
        header('location:../View/registration.php');
    }
    if(empty($Email))
    {
        $_SESSION['error_message_Emails']="Email is required";
        header('location:../View/registration.php');
    }
    if(empty($dateOfBirth))
    {
        $_SESSION['error_message_dob']="Date of Birth Required";
        header('location:../View/registration.php');
    }
       
    if(empty($Password))
    {
        $_SESSION['error_message_Pass']="Password Required!";
        header('location:../View/registration.php');
    }
    if(empty($Conpass))
    {
        $_SESSION['error_message_Conpass']="Confirm Password Required!";
        header('location:../View/registration.php');
    } 
}

?>

