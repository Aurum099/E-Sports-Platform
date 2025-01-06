<?php
session_start();
require_once('../Model/queryFunctions.php');

//logOut
if(isset($_REQUEST['logOut']))
{
    session_destroy();
    header("Location: ../View/home.php");
}

//post upload
if(isset($_REQUEST['upload']))
{
    /*$userID=$_SESSION['user_id'];
    $userName=moderatorName($userID);
    $usersName=usersName($userID);
    //$adminID=$_SESSION['admin_id'];
    $post = $_REQUEST['post'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'View/' . $image;

    $upload_query=uploadPosts($userID,$usersName,$userName,$post,$image);
     
     
        if ($upload_query) {
           move_uploaded_file($image_tmp_name, $image_folder);
           echo "Uploaded Successfully";
           header("Location:../View/communityHub.php");
     
        }*/

/*
    $upload=uploadPosts($userID,$usersName,$userName,$post,$image);
        header("Location: ../View/communityHub.php");
    if(isset($_SESSION['user_id']))
    {
        
    }
    else if(isset($_SESSION['admin_id']))
    {
        $userName="Admin";
        $usersName="Admin"
        uploadPosts($adminID,$usersName,$userName,$post,$image);
    }*/


    //sss

/*
    if (isset($_POST['add_product'])) {
        $p_name = $_POST['p_name'];
        $p_price = $_POST['p_price'];
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
        $p_image_folder = 'uploaded_img/' . $p_image;
    
        $insert_query=addhallproduct($p_name,$p_price, $p_image);
     
     
        if ($insert_query) {
           move_uploaded_file($p_image_tmp_name, $p_image_folder);
           echo "product added succesfully";
           header("Location:../Views/hall.php");
     
        }
    function addhallproduct($p_name,$p_price, $p_image){
    
        $conn=getConnection();
    
        $insert_query = mysqli_query($conn, "INSERT INTO hall(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');
        return $insert_query;
    }
    }
    */
    $userID = $_SESSION['user_id'];
$userName = moderatorName($userID);
$usersName = usersName($userID);
$post = $_REQUEST['post'];

if (isset($_FILES['image']) && isset($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder =  $image;

    $upload_query = uploadPosts($userID, $usersName, $userName, $post, $image);

    if ($upload_query) {
        move_uploaded_file($image_tmp_name, $image_folder);
        echo "Uploaded Successfully";
        header("Location:../View/communityHub.php");
        exit(); // Add exit to stop script execution after redirection
    }
} else {
    echo "Image not provided or invalid.";
}


}


?>