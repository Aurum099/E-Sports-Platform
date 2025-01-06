<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$is_host = false;
$create_error = "";
?>

<!DOCTYPE html>
<html>
<head></head>
    <style> 
        body
        {
        background-color: rgb(32,32,32);
        color:brown;
         }   

    </style>
    <style>
        ul {
            list-style-type: none;
        }

        .tournament-ladder {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 4px solid #000;
            padding: 10px;
        }

        .match {
            display: flex;
            align-items: center;
        }

        .team {
            width: 100px;
            text-align: center;
            font-weight: bold;
        }
    </style>
    <script>
    function toggleTable(tableId) {
        var table = document.getElementById(tableId);
        table.style.display = table.style.display === "none" ? "table" : "none";
    }
</script>
<script>
    function toggleForm(tableId) {
        var form = document.getElementById(tableId);
        form.style.display = form.style.display === "none" ? "form" : "none";
    }
</script>



<body>

<h1><?php echo $_SESSION['uname']; ?></h1>

<input type='button' name='host' value="HOST A TOURNAMENT" onclick="toggleTable('tournamentTable');"><br><br>
<?php
if (!$is_host) {
    echo '<input type="submit" name="join" value= "JOIN A TOURNAMENT" onclick="toggleTable(\'srch\')"><br>';
} else if ($is_host) {
    echo '<input type="button" id="toggleLadder" value="TOGGLE LADDER" onclick="toggleTable(\'ladderTable\')"><br>';
}
?>

<form id="srch" method="post" action="../Controller/TournamentControl.php" style="display: none;">
    <input type="text" name='searchfortournament' >
    <input type='submit' name='search' value="Search"  >

</form>

<br><br>
<span><?php echo $create_error; ?></span>

    <table id="searchTable" border="1" style="display: none;">
        <tr>
            <th>TOURNAMENT NAME</th>
            <th>GAME</th>
            <th>START DATE</th>
            <th>ACTION</th>
        </tr>
        <?php if (isset($result_search)&& mysqli_num_rows($result_search) > 0) 
        {
            $result_search=searchTourney($S);
            while ($row = mysqli_fetch_assoc($result_search)) 
            {
                if (strpos($row['TOUR_NAME'], $search_term) !== false) 
                    { ?>
                    <tr>
                        <td><center><?php echo $row['TOUR_NAME']; ?></center></td>
                        <td><center><?php echo $row['GAME']; ?></center></td>
                        <td><center><?php echo $row['START_DATE']; ?></center></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="searchfortournament" value="<?php echo $row['TOUR_ID']; ?>">
                                <button type="submit" name="req">Request to Join</button>
                            </form>
                        </td>
                    </tr>
                <?php }
            }

        }
        else if (isset($_POST['search'])) {
            echo '<tr><td colspan="4">No tournament found !!</td></tr>';} ?>
    </table>


<form method='post'>
    <table id="tournamentTable" border="1" style="display: none;">
        <br><br>
        <tr>
            <th>NAME</th>
            <th>GAME</th>
            <th>STARTING DATE</th>
            <th>OPTION</th>
        </tr>
        <tr>
            <td> <input type="text" name='T_NAME' placeholder="TOURNAMENT NAME"><br></td>
            <td> <input type='text' name='G_NAME' placeholder="GAME"><br></td>
            <td><input type='date' name='start_date' placeholder="START DATE"><br></td>
            <td><input type='submit' name='create' value="CREATE"></td>
        </tr>
    </table>
    <br><input type='submit' name='back' value="Back"><br>
    <br><input type='submit' name='logout' value="LOGOUT">

</form>
<br>
<br>
<!--<span><?php echo $create_error; ?></span> -->


<table border="1"></table>
<center>
<div class="tournament-ladder" id="ladderTable"style="display: none;">
    <div class="team">ROUND OF 8</div>
    <ul>
        <li class="match">
            <div class="team">Team 1</div>
            <div class="team">-</div>
            <div class="team">Team 2</div>
        </li>
<li class="match">
            <div class="team">Team 3</div>
            <div class="team">-</div>
            <div class="team">Team 4</div>
        </li>
        <li class="match">
            <div class="team">Team 5</div>
            <div class="team">-</div>
            <div class="team">Team 6</div>
        </li>
        <li class="match">
            <div class="team">Team 7</div>
            <div class="team">-</div>
            <div class="team">Team 8</div>
        </li>
    </ul>
    <br>

    <div class="team">QUARTER FINAL</div>
    <ul>
        <li class="match">
            <div class="team">Winner 1-2</div>
            <div class="team">-</div>
            <div class="team">Winner 3-4</div>
        </li>
        <li class="match">
            <div class="team">Winner 5-6</div>
            <div class="team">-</div>
            <div class="team">Winner 7-8</div>
        </li>
    </ul>
    <br>
    <div class="team"> SEMI FINAL</div>
    <ul>
        <li class="match">
            <div class="team">Finalist 1</div>
            <div class="team">-</div>
            <div class="team">Finalist 2</div>
        </li>
        <li class="match">
            <div class="team">Finalist 3</div>
            <div class="team">-</div>
            <div class="team">Finalist 4</div>
        </li>
    </ul>
    <br>
    <div class="team">FINAL</div>
    <ul>
        <li class="match">
            <div class="team">Champion 1</div>
            <div class="team">-</div>
            <div class="team">Champion 2</div>
        </li>    </ul>
</div>
</center>
</body>
</html>
