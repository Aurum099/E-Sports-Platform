<?php
if(isset($_SESSION['user_id']))
{
   // echo"Welcome to Moderator HomePage";
    $_SESSION['mod_id']=$mID;
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
		Home
	</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="styleHome.css" rel="stylesheet"/>


	
</head>

<body>
	<!--TopBar Starts-->
    <form method="post" action="../Controller/homeController.php">
    <div class="topbar">
       <span class="material-symbols-outlined sports">sports_esports</span>
        <div class="topbar_option Active">
        <h2><a href="">Home</a></h2>
        </div>
        <div class="topbar_option">
        <h2><a href="communityHub.php">Community Hub</a></h2>
        </div>
        <div class="topbar_option">
        <h2><a href="User.php">Profile</a></h2>
        </div> 
        <!--Button-->
        <div class="Button">
        <input type="submit" name="Moderator" value= "Moderator Page">
        </div>

        <div class="Button">
        <input type="submit" name="logOut" value= "Log Out">
        </div>
        <!--Button Ends-->
        <!--user name-->
        <div class="username">
        <?php  echo '<p>Welcome, ' . $uname . '!</p>'; ?>
        </div>
        

    </div>
    </form>

    <!--TopBar Ends-->

    <!--Middle Portion-->
    <header>
        <center>
        <h1>ESPORTS</h1>
        <h2>Welcome to Moderator HomePage</h2>
        </center>
    </header>
    <div class="Mid">
        <div class="post">
            <a href="https://playvalorant.com/en-gb/" target= "_blank">
            <img src="val1.jpg" alt="Valorant">
            </a>
            <p>Riot Games presents VALORANT: a 5v5 character-based tactical FPS where precise gunplay meets unique agent abilities</p>
        </div>
        <div class="post">
            <a href="https://www.counter-strike.net/cs2" target= "_blank">
            <img src="cs2.jpeg" alt="Post 2">
            </a>    
            <p>For over two decades, Counter-Strike has offered an elite competitive experience, one shaped by millions of players from across the globe. 
                And now the next chapter in the CS story is about to begin. This is Counter-Strike 2.</p>
        </div>
        <div class="post">
            <a href="https://thewarwithin.blizzard.com/en-us/" target= "_blank">
            <img src="wow3.jpg" alt="Post 3">
            </a>    
            <p>Journey through never-before-seen subterranean worlds filled with hidden wonders and lurking perils, 
                down to the dark depths of the nerubian empire, where the malicious Harbinger of the Void is gathering arachnid forces to bring Azeroth to its knees.</p>
        </div>
        <div class="post">
            <a href="https://www.leagueoflegends.com/en-gb/" target= "_blank">
            <img src="lol4.jpeg" alt="Post 4">
            </a>
            <p>League of Legends (LoL) is a team-based multiplayer online battle arena (MOBA) game developed by Riot Games. 
                Players choose unique champions and work in teams to destroy the enemy Nexus. It has a diverse cast of champions, various maps, a competitive scene, 
                a large player community, and is free-to-play with microtransactions for cosmetics. 
                Communication and teamwork are key, and the game is known for its regular updates and esports tournaments.</p>
        </div>
        <div class="post">
            <a href="https://www.rocketleague.com/" target= "_blank">
            <img src="roc5.jpg" alt="Post 4">
            </a>
            <p>Rocket League is a highly popular vehicular soccer video game developed by Psyonix. In Rocket League, players control customizable rocket-powered cars 
                with the objective of scoring goals in a futuristic soccer match. It combines fast-paced action, physics-based gameplay, and competitive multiplayer.</p>
        </div>
        <div class="post">
            <a href="https://www.ea.com/en-gb/games/ea-sports-fc/fc-24" target= "_blank">
            <img src="fc6.jpg" alt="Post 6">
            </a>
            <p>EA SPORTS FC™ 24 kicks off a new era of The World's Game. Meet the new brand and the three technologies powering the true-to-football experience.</p>
        </div>
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