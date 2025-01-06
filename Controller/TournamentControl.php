<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$H_ID = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) 
{
    header('location: login.php');
    exit;
} 
if (isset($_REQUEST['logout'])) 
{
    session_destroy();
    header('location: ../View/login.php');
    exit;
}
if (isset($_REQUEST['back'])) 
{
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null)
    {
        $sql_id=$_SESSION['user_id'];
        $moder_res=moderQuery($sql_id);
        
        if($moder_res)
            {
                header("location: homeModerator.php"); //mvc location dis
            }

            else
            {
                header("location: homeUser.php");//mvc location dis
            }
    }

    
}


$is_host = false;
$create_error = "";

if (isset($_REQUEST['create'])) {
    $tournament_Name = $_REQUEST['T_NAME'];
    $game_Name = $_REQUEST['G_NAME'];
    $start_Date = $_REQUEST['start_date'];

    if ($start_Date < date("Y-m-d")) {
        $create_error = "Invalid start date";
    } else {
        $checkQuery=checkQuery($H_ID,$start_Date);

        if ($checkQuery) {
            $create_error = "Cannot create multiple tournaments on the same starting day";
        } else {
            $n = 10;
            $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $randomString = substr(str_shuffle($characters), 0, $n);

            $hostUname=$_SESSION['uname'];
            $H_ID = getHost($hostUname);

            $insertTourney=createTournament($randomString, $tournament_Name, $game_Name, $H_ID, $start_Date);
          /*  $create_query = "insert into tournament(TOUR_ID, TOUR_NAME, GAME, H_ID, START_DATE) VALUES ('$randomString', '$tournament_Name', '$game_Name', '$H_ID', '$start_Date')";
            $result_query = mysqli_query($conn, $create_query);
            if ($result_query>0)
            {
                echo "Tournament Created!!";
            }
*/
            $is_host = true;
        }
    }
}

if (isset($_REQUEST['search'])) 
{    
    $S = $_REQUEST['searchfortournament'];

    if (empty($S)) 
    {
       echo "Please enter the tournament name you want to join";
    }
    else
    {
        $search=searchTourney($S);
    }
}

if (isset($_REQUEST['req'])) {
    $team_leader_id = $_SESSION['user_id'];
    $tournament_id = $_REQUEST['searchfortournament'];

    /*$team_leader_check_query = "select T_ID from team where L_ID = '$team_leader_id'";
    $team_leader_check = mysqli_query($conn, $team_leader_check_query);*/
    $teamLeader=teamLeader($team_leader_id)
    if ($teamLeader) 
    {
        $team_id = teamLeaderIDCheck($team_leader_id);

        $current_team=teamId($tournament_id)
        if ($current_team === null) 
        {
            $insertTeam=insertTeam($team_id,$tournament_id)

           /* if ($insert_team) 
            {
                echo "Team registered successfully!";
            } 

            else 
            {
                echo "Team registration failed!";
            }*/
        } 
        else 
        {
            echo "Team slot full!!";
        }
    } 
    else 
    {
        echo "You are not a team leader.";
    }
}


?>