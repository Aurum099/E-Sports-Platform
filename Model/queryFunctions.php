<?php 
require_once('conDB.php');

//Login Part and Home Starts
function userQuery($userName,$pass)
{
    $conn=getConnection();
    $sql1= "SELECT * FROM user WHERE U_NAME='$userName' AND PASSWORD = '$pass'";
	$user_res=mysqli_query($conn,$sql1);
    $login_count1=mysqli_num_rows($user_res);
    if($login_count1==1)
    {
        while($r=mysqli_fetch_assoc($user_res))
		{
            $_SESSION['user_id']=$r["U_ID"];
			$uID=$_SESSION['user_id'];
			
        }
        return true;
    }
    else
    {
        return false;
    }
}
function adminQuery($userName,$pass)
{
    $conn=getConnection();
    $sql2= "SELECT * FROM admin WHERE A_ID='$userName' AND A_PASS='$pass'";
	$admin_res=mysqli_query($conn,$sql2);
    $login_count2=mysqli_num_rows($admin_res);
    if($login_count2==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function moderatorQuery($userName)
{
    $conn=getConnection();
    $sql4= "SELECT * FROM moder WHERE M_ID='$userName'";
	$moder_res=mysqli_query($conn,$sql4);
    $login_count3=mysqli_num_rows($moder_res);
    if($login_count3==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function banQuery($userName,$pass)
{
    $conn=getConnection();
    $sql3= "SELECT * FROM user WHERE U_NAME='$userName' AND (STATUS = 'BAN' OR STATUS = 'ban' OR STATUS = 'Ban' OR STATUS ='Banned')";
	$ban_res=mysqli_query($conn,$sql3);
    $login_count4=mysqli_num_rows($ban_res);
    if($login_count4==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function moderatorQuery2($userName)
{
    $conn=getConnection();
    $sql5= "SELECT * FROM moder WHERE M_ID='$userName'";
	$moder_res_c=mysqli_query($conn,$sql5);
    $login_count5=mysqli_num_rows($moder_res_c);
    if($login_count5==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
//two step verification
function twoStepVerify($userName)
{
    $conn=getConnection();
    $sqltwo="SELECT * FROM user WHERE U_NAME='$userName' AND VERIFICATION='Yes'";
    $restwo=mysqli_query($conn,$sqltwo);
    $counttwo=mysqli_num_rows($restwo);
    if($counttwo==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function bringEmail($userName)
{
    $conn=getConnection();
    $sqlthree="SELECT * FROM user WHERE U_NAME='$userName' AND VERIFICATION='Yes'";
    $resthree=mysqli_query($conn,$sqlthree);
    while($r=mysqli_fetch_assoc($resthree))
    {
        $email=$r['EMAIL'];
    }
    return $email;
}
//Login Part and Home Ends


//Forgot Pass Startss

function forgetPass($userName,$email) 
{ 
    $conn=getConnection();
    $sql6= "SELECT * FROM user WHERE U_NAME = '$userName' AND EMAIL = '$email'";
	$submit_res=mysqli_query($conn,$sql6);
    $count6=mysqli_num_rows($submit_res);
    if($count6==1)
    {
        while($r=mysqli_fetch_assoc($submit_res))
	    {	
		    $_SESSION['user_id']=$r["U_ID"];
        }
        return true;
    }
    else
    {
        return false;
    }
    
}

function forgetPassUpdate($newPass,$uID) 
{ 
    $conn=getConnection();
    $updateSql="UPDATE user SET PASSWORD ='$newPass' WHERE U_ID = '$uID'";
    $update_res=mysqli_query($conn,$updateSql);
}

//Forgot Pass Ends

//admin Home Page Starts
function adminHProfile($uID)
{
    $conn=getConnection();
    $sql7= "SELECT * FROM admin WHERE A_ID='$uID'";
	$moder_res=mysqli_query($conn,$sql7);
    $login_count7=mysqli_num_rows($moder_res_c);
    if($login_count7==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}


//admin Home Page Ends


//Moderator Home Page Starts
function moderatorName($mID) //also used to bring username in community hub.
{
    $conn=getConnection();
    $sql8= "SELECT * FROM user WHERE U_ID='$mID'";
    $user_res=mysqli_query($conn,$sql8);
    while($r=mysqli_fetch_assoc($user_res))
    {
        return $uname=$r["U_NAME"];
    }
}

//Moderator Home Page Ends

//User Home Page Starts
function UserName($uID)
{
    $conn=getConnection();
    $sql9= "SELECT * FROM user WHERE U_ID='$uID'";
    $user_res2=mysqli_query($conn,$sql9);
    while($r2=mysqli_fetch_assoc($user_res2))
    {
        return $uname=$r["U_NAME"];
    }
}

//User Home Page Ends

//Registration Parts Start

function userNameCheck($Uname)
{
    $conn=getConnection();
    $sql10 = "SELECT U_NAME FROM user WHERE U_NAME= '$Uname'";
    $res10 = mysqli_query($conn, $sql10);
    $count8 = mysqli_num_rows($res10);
    if($count8==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function emailCheck($Email)
{
    $conn=getConnection();
    $sql11 = "SELECT Email FROM user WHERE Email = '$Email'";
    $res11 = mysqli_query($conn, $sql11);
    $count9 = mysqli_num_rows($res11);
    if($count9==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function register($randomString,$name,$uName,$country,$dateOfBirth,$Email,$Password)
{
    $conn=getConnection();
    $sql12 = "INSERT INTO user(U_ID, NAME, U_NAME,COUNTRY,DOB,EMAIL,PASSWORD,STATUS,VERIFICATION) VALUES ('$randomString','$name','$uName','$country','$dateOfBirth','$Email','$Password','Unverified','No')";
    mysqli_query($conn, $sql12);
}

function friendUID($randomString)
{
    $conn=getConnection();
    $sql13 = "INSERT INTO friend(USER_ID) VALUES ('$randomString')";
    mysqli_query($conn, $sql13);
}

function verify($vUID)
{
    $conn=getConnection();
    $status="General Member";
    $sql14 = "UPDATE user SET STATUS ='$status' WHERE U_ID = '$vUID'";
    mysqli_query($conn, $sql14);
}


//Registration Parts End

//Community Hub Posts Starts

function allPostBring()
{
    $conn=getConnection();
    $sql15 = "SELECT * FROM communityposts ";
    $res15 = mysqli_query($conn, $sql15);
    return $res15;
}

function uploadPosts($ID,$usersName,$userName,$post,$image)
{
    $conn=getConnection();
    $sql16 = "INSERT INTO communityposts(U_ID, NAME, U_NAME,POSTS,PHOTOS) VALUES ('$ID','$usersName','$userName','$post','$image')";
    mysqli_query($conn, $sql16);
}
function usersName($ID) //also used to bring username in community hub.
{
    $conn=getConnection();
    $sql17= "SELECT * FROM user WHERE U_ID='$ID'";
    $user_res=mysqli_query($conn,$sql17);
    while($r=mysqli_fetch_assoc($user_res))
    {
        return $uname=$r["NAME"];
    }
}
//Community Hub Posts Ends

?>
