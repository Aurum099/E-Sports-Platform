<?php
session_start();
require_once('../Model/queryFunctions.php');
$vUID=$_SESSION['verifyUID'];
$verify=verify($vUID);
echo '<div style="text-align: center; font-size: 24px;">Your Account has been Verified. You will be redirected to login page in a few seconds</div>';
session_unset();
echo '<meta http-equiv="refresh" content="3;url=../View/login.php">';
?>