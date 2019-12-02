<?php
include '../php/chromelogger.php';
error_reporting(-1);
ini_set('display_errors', 'true');

session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (!$con) {
     die('Could not connect: ' . mysqli_error());
}
if (!isset($_SESSION['loggedin'])) {
	$Progress = "1";
}
else {
$stmt = $con->prepare('SELECT Progress FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute(); //Query to get progress level 
$stmt->bind_result($Progress);
$stmt->fetch();
$stmt->close();
}
//query database to find all cards with a level 1
$user_check_query = mysqli_query($con, "SELECT symbol, definition FROM flashcards WHERE level='$Progress'");
//ChromePhp::log($user_check_query);
$array = array();
while($row = mysqli_fetch_assoc($user_check_query))
{
	$array[] = $row;
}
$json_array = json_encode($array);
//insert into an array of cards

?>
<!DOCTYPE html>
<html>
<head>
    <title>Chinese the Right Way</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/flash.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../javascript/jquery-3.4.1.min.js"></script>
    <!--<script type="text/javascript" src="../javascript/dbcontents.js"></script>-->
    <script type="text/javascript">
	/*This should be a 2D array with 'symbol' and 'definition' as the only two contents of the array
	this should allow us to dynamically generate flashcards based on a user's level.*/

	console.log(<?php echo $json_array; ?>);
	dataSet =(<?php echo $json_array; ?>);
	
	//console.log(testArray[0].symbol);
	
	
    var i;
    function shuffle(dataSet) {
 		dataSet.sort(() => Math.random() - 0.5);
	}
    $(document).ready(function () { // default to first entry in array
        i = 0;
        shuffle(dataSet);
        document.getElementById("character").innerHTML = dataSet[i].symbol;
        document.getElementById("translation").innerHTML = dataSet[i].definition;
    });
    function deci() { // next flashcard in array
        i = i-1 % dataSet.length;
        document.getElementById("character").innerHTML = dataSet[i].symbol;
        document.getElementById("translation").innerHTML = dataSet[i].definition;
    };
    function inci() { // previous flashcard in array
        i = i+1 % dataSet.length;
        document.getElementById("character").innerHTML = dataSet[i].symbol;
        document.getElementById("translation").innerHTML = dataSet[i].definition;
    };
    </script>
</head>
<body>

<!-- Sticky Navbar -->
<ul class="navbar">
    <li class="navbutton"><a href="../index.php" class="headerButton">Home</a></li>
    <li class="navbutton"><a href="flashcards.php" class="headerButton">Flashcards</a></li>
    <li class="navbutton"><a href="huamulan.php" class="headerButton">Hua Mulan</a></li>
    <li class="navbutton"><a href="resources.php" class="headerButton">Resources</a></li>
    <li class="navbutton"><a href="db.php" class="headerButton">Database</a></li>
    <li class="navbutton"><a href="../php/login.php" class="headerButton">Account</a></li>
	<p> You are viewing level <?php echo $Progress; ?> flashcards! </p>
</ul>
<div class="grid-container">
    <div class="middle">
        <div class="flip3D">
          <div class="front"><p id="character"></p></div>
          <div class="back"><p id="translation"></p></div>
        </div>
        <div class="flashnav">
            <button onclick="deci();" class="fbutton">Previous</button>
            <button onclick="inci();" class="fbutton">Next</button>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <p>Cody "Tarkus" Lee</p>
        <p>©MIT License - 2019</p>
        <p>character database contents provided by Unihan</p>
    </footer>
</div>

</body>
</html>
