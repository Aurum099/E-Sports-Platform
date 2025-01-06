<?php 
session_start();
require_once('../Model/queryFunctions.php');
if(isset($_SESSION['admin_id']))
{
    //echo"Welcome to Community Hub";
}
else if(isset($_SESSION['mod_id']))
{
   // echo"Welcome to Community Hub";
}
else if(isset($_SESSION['user_id']))
{
   // echo"Welcome to Community Hub";
}
else
{
    header("Location: home.php");
}





?>


<!DOCTYPE html>
<html lang = "en">
	
<head>
	<title>
		Community Hub
	</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="styleHome.css" rel="stylesheet"/>


	
</head>

<body>
	<!--TopBar Starts-->
    <form method="post" action="../Controller/communityHubController.php">
    <div class="topbar">
        <span class="material-symbols-outlined">diversity_3</span>
        <div class="topbar_option ">
        <h2><a href="home.php">Home</a></h2>
        </div>
        <div class="topbar_option Active">
        <h2><a href="communityHub.php">Community Hub</a></h2>
        </div>
        <!---Button Starts-->
        <div class="Button">
        <input type="submit" name="logOut" value= "Log Out">
        </div>
        <!---Button Ends-->
    </div>
    </form>

    <!--TopBar Ends-->

    <!--Middle Portion-->
  <header>
        <center><h1>ESPORTS COMMUNITY HUB</h1></center>
    </header>
    <div class="Mid">
        <div class="post">
            <a href="Tournament.php">
           <img src="tournament.jpg" alt="Post 1">
            </a>
            <p>Looking for tournament to join? Want to Host tournament? Select this</p>
        </div>
        <div class="post">
            <a href="team.php">
            <img src="teamjoin.jpg" alt="Post 2">
            </a>
            <p>Want to team up and take challenge against other team? Create your own team or join other team here!!</p>
        </div>
       
    </div>
    <br>
    <br>
    <!--Middle Portion Post Part-->
    <div class="Com-Posts-Upload">
        <form action="../Controller/communityHubController.php" method="post">
                  <h3>Upload a new Post!</h3>
                  <input type="text" name="post" placeholder="Write your post here">
                  <input type="file" name="image" accept="image/png, image/jpg, image/jpeg">
                  <input type="submit" value="Upload" name="upload">
        </form>


    </div>
    <div class="Com-Posts">
        <table>

            <form method="post">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <?php
                    $res=allPostBring();
                    while ($row = mysqli_fetch_assoc($res)) 
                    {?>
                        <tr>
                            <td>
                                <?php echo $row['NAME']; ?>
                            </td>
                            <td>
                                <?php echo $row['U_NAME']; ?>/-
                            </td>
                            <td><br>
                                <?php echo $row['POSTS']; ?>/-
                            </td>
                            <td><img src="../View/<?php echo $row['PHOTO']; ?>" height="200" alt="Pic"></td>
                        </tr>

                        <?php
                     }

                    ?>
            </form>

        </table>




    </div>

    <!--Middle Portion Ends-->

    <!-- Bottom Bar Starts -->
    <div class="bottom">
        <h3><a href="">Privacy Policy</a></h3>
        <h3><a href="">About US</a></h3>
        <h3><a href="">Community Guidlines</a></h3>

    </div>
    <!-- Bottom Bar End -->

	
</body>
</html>