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
$user_check_query = mysqli_query($con, "SELECT id, symbol, definition FROM flashcards WHERE level='$Progress'");
//ChromePhp::log($user_check_query);
$array = array();
while($row = mysqli_fetch_assoc($user_check_query))
{
	$array[] = $row;
}
$json_array = json_encode($array);
//insert into an array of cards
$statusQuery = mysqli_query($con, "SELECT seen, FlashID FROM completionRelation");

$statusArray = array();
while($row = mysqli_fetch_assoc($statusQuery))
{
	$statusArray[] = $row;
}
$status_array = json_encode($statusArray);

$data = json_decode(stripslashes($_POST['data']));
function markSeen()
{
	
}
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
    <script type="text/javascript">
	/*This should be a 2D array with 'symbol' and 'definition' as the only two contents of the array
	this should allow us to dynamically generate flashcards based on a user's level.*/

	console.log(<?php echo $json_array; ?>);
	dataSet =(<?php echo $json_array; ?>);
	statusSet = (<?php echo $status_array; ?>);
	
    var i;
    function shuffle(dataSet) {
 		dataSet.sort(() => Math.random() - 0.5);
	}
    $(document).ready(function () { // default to first entry in array
        i = 0;
        shuffle(dataSet);
		check(dataSet[i].id, statusSet);
        document.getElementById("character").innerHTML = dataSet[i].symbol;
        document.getElementById("translation").innerHTML = dataSet[i].definition;
    });
    function deci() { // next flashcard in array
        i--;
		check(dataSet[i].id, statusSet);
        document.getElementById("character").innerHTML = dataSet[i].symbol;
        document.getElementById("translation").innerHTML = dataSet[i].definition;
    };
    function inci() { // previous flashcard in array
        i++;
		check(dataSet[i].id, statusSet);
        document.getElementById("character").innerHTML = dataSet[i].symbol;
        document.getElementById("translation").innerHTML = dataSet[i].definition;
    };
	function check(id, statusSet)
	{
		for(let j=0; j<statusSet.length; j++)
		{
			if(id == statusSet[j].FlashID)
			{
				if(statusSet[j].seen == true)
					document.getElementByClassName("status").display = "inline";
			}
		}
	}
	var jsonString = JSON.stringify(statusSet);
   $.ajax({
        type: "POST",
        url: "flashcards.php",
        data: {data : jsonString}, 
        cache: false,

        success: function(){
        }
    });
    </script>
</head>
<style>

.status {
	position: relative;
	text-align: center;
	margin-bottom: 25px;
	font-size: 50px;
	color: lightgrey;
	display: none;
}
</style>
<body>

<!-- Sticky Navbar -->
<ul class="navbar">
    <li class="navbutton"><a href="../index.html" class="headerButton">Home</a></li>
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
		  <div class='status'>Completed</div>
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
        <p>Cody "Tarkus" Lee, Brad Powell</p>
        <p>©MIT License - 2019</p>
        <p>character database contents provided by Unihan</p>
    </footer>
</div>

</body>
</html>
