<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Sign Up- Registration
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="styleHome.css" rel="stylesheet"/>
</head>


<body>
<?php
        if(isset($_SESSION['error_message_User']))
        {
            echo "<p style='color:red;'>".$_SESSION['error_message_User']."<p>";
            unset($_SESSION['error_message_User']);
        }
        if(isset($_SESSION['error_message_Email']))
        {
            echo "<p style='color:red;'>".$_SESSION['error_message_Email']."<p>";
            unset($_SESSION['error_message_Email']);
        }
    ?>
<div class="registration">
        <form method="post" action="../Controller/registrationControl.php">
        <center>

        <fieldset style="max-width: max-content;">
            <legend align="center">Sign Up</legend>

            <input type="Text" name="name" placeholder=" Name"  /><br /><hr>
            <span>
                <?php 
                    if(isset($_SESSION['error_message_Name']))
                    {
                        echo "<p style='color:red;'>".$_SESSION['error_message_Name']."<p>";
                        unset($_SESSION['error_message_Name']);
                    } 
                ?>
            </span>
            <br>

            <input type="Text" name="uname" placeholder="User Name"  /><br /><hr>
            <span>
                <?php 
                    if(isset($_SESSION['error_message_UserName']))
                    {
                        echo "<p style='color:red;'>".$_SESSION['error_message_UserName']."<p>";
                        unset($_SESSION['error_message_UserName']);
                    } 
                ?>
            </span>
            <br>

            <input type="Text" name="country" placeholder="country" /><br /><hr>
            <span>
                <?php 
                    if(isset($_SESSION['error_message_country']))
                    {
                        echo "<p style='color:red;'>".$_SESSION['error_message_country']."<p>";
                        unset($_SESSION['error_message_country']);
                    } 
                ?>
            </span>
            <br>


            <input type="Email" name="Email" placeholder="Email Address" /><br /><hr>
            <span>
                <?php 
                    if(isset($_SESSION['error_message_Emails']))
                    {
                        echo "<p style='color:red;'>".$_SESSION['error_message_Emails']."<p>";
                        unset($_SESSION['error_message_Emails']);
                    } 
                ?>
            </span>
            <br>

            
            <input type="Date" name="dateOfBirth" placeholder="Date of Birth" /><br /><hr>
            <span>
                <?php 
                    if(isset($_SESSION['error_message_dob']))
                    {
                        echo "<p style='color:red;'>".$_SESSION['error_message_dob']."<p>";
                        unset($_SESSION['error_message_dob']);
                    } 
                ?>
            </span>
            <br>

          
            <input type="Password" name="Password" placeholder="Password" /><br /><hr>
            <span>
                <?php 
                    if(isset($_SESSION['error_message_Pass']))
                    {
                        echo "<p style='color:red;'>".$_SESSION['error_message_Pass']."<p>";
                        unset($_SESSION['error_message_Pass']);
                    } 
                ?>
            </span>
            <br>

            
            <input type="Password" name="conPassword" placeholder="Confirm Password" /><br /><hr>
            <span>
                <?php 
                    if(isset($_SESSION['error_message_Conpass']))
                    {
                        echo "<p style='color:red;'>".$_SESSION['error_message_Conpass']."<p>";
                        unset($_SESSION['error_message_Conpass']);
                    } 
                ?>
            </span>
            <br>

            <button name="signUp" onclick=showEmailSentMessage()>Sign Up</button><br><hr>
        </form>
        <?php
        if (isset($_POST['signUp'])) 
        {
            $Password = $_POST['Password'];
            $Conpass = $_POST['conPassword'];
            if ($Password != $Conpass) 
            {
                echo "Password and Confirm Password does not match! Please Check and Try Again";
            }
        }
        ?>
            <p>Already have an account?<a href="../View/login.php">Log in</a></p>

            <?php
            
            ?>

        </fieldset>
        </center>
    

</div>
    
</body>

</html>