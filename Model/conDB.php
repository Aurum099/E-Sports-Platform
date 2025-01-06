<?php

function getConnection()
{
	$servername="localhost";
    $username="root";
    $pass="";
    $dbname="esports";
    $conn= new mysqli($servername,$username,$pass,$dbname);
    return $conn;
}

?>