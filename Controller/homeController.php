<?php 
session_start();
require_once('../Model/queryFunctions.php');

//Home Admin Starts

if(isset($_REQUEST['Admin']))
{
    $uID=$_SESSION['admin_id'];
    $adminProfile=adminHProfile($uID);
    if($adminProfile)//Admin Entry
	{
		echo "Admin Block";
		header("location: ../View/admin.php");
		
	}
    else
    {
        echo "Not Admin Block";
    }
}


//Home Admin Ends

//Home Moderator Starts
if(isset($_REQUEST['Moderator']))
{
    header("location: ../View/moderator.php");	
}
//Home Moderator Ends

//logOut
if(isset($_REQUEST['logOut']))
{
    header("Location: ../View/home.php");
    session_destroy();
    
}
?>
