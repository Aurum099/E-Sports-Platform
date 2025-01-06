<?php 
require_once('conDB.php');


function moderQuery($sql_id)
{
    $conn=gerConnection();
    $sql5= "select * from moder where M_ID='$sql_id'";   
    $moder_res_c=mysqli_query($conn,$sql5);
    $count=mysqli_num_rows($moder_res_c);
    if($count==1)
    {
        return true;
    }
    else
    {
        return false;
    }

}

function checkQuery($H_ID,$start_Date)
{
    $conn=gerConnection();
    $check_query = "select * from tournament where H_ID = '$H_ID' and START_DATE = '$start_Date'";
    $result_check = mysqli_query($conn, $check_query);
    $count=mysqli_num_rows($result_check);
    if($count==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function getHost($hostUname)
{
    $conn=gerConnection();
    $get_host = "select U_ID from user where NAME = '" . $hostUname . "'";
    $result_host = mysqli_query($conn, $get_host);
    if (mysqli_num_rows($result_host) > 0) {
        $host_id = mysqli_fetch_assoc($result_host);
        $H_ID = $host_id['U_ID'];
        return $H_ID;
    }
}

function createTournament($randomString, $tournament_Name, $game_Name, $H_ID, $start_Date)
{
    $conn=gerConnection();
    $create_query = "insert into tournament(TOUR_ID, TOUR_NAME, GAME, H_ID, START_DATE) VALUES ('$randomString', '$tournament_Name', '$game_Name', '$H_ID', '$start_Date')";
    $result_query = mysqli_query($conn, $create_query);
    
}
function searchTourney($S)
{
    $conn=gerConnection();
    $search_query = "select * from tournament where TOUR_NAME = '$S'";
    $result_search = mysqli_query($conn, $search_query);
    return $result_search;
}

function teamLeader($team_leader_id)
{
    $conn=gerConnection();
    $team_leader_check_query = "select T_ID from team where L_ID = '$team_leader_id'";
    $team_leader_check = mysqli_query($conn, $team_leader_check_query);
    $count=mysqli_num_rows($team_leader_check);
    if($count==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function teamLeaderIDCheck($team_leader_id)
{
    $conn=gerConnection();
    $team_leader_check_query = "select T_ID from team where L_ID = '$team_leader_id'";
    $team_leader_check = mysqli_query($conn, $team_leader_check_query);
    $team_leader_data = mysqli_fetch_assoc($team_leader_check);
    $team_id = $team_leader_data['T_ID'];
    return $team_id;
}

function teamId($tournament_id)
{
    $conn=gerConnection();
    $current_query = "select TEAMID from tournament where TOUR_ID = '$tournament_id'";
    $result = mysqli_query($conn, $current_query);
    $current_team = mysqli_fetch_assoc($result);
    $teamID=$current_team['TEAMID'];
    return $team_id;
}

function insertTeam($team_id,$tournament_id)
{
    $conn=gerConnection();
    $insert_team_query = "update tournament set TEAMID = '$team_id' where TOUR_ID = '$tournament_id'";
    $insert_team = mysqli_query($conn, $insert_team_query);
}





?>