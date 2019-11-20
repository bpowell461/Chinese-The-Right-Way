<?php

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
$user_check_query = mysqli_query($con, "SELECT * FROM `flashcards` WHERE `level` = '$Progress'");
while($array = mysqli_fetch_assoc($user_check_query));
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
    <script type="text/javascript" src="../javascript/dbcontents.js"></script>
    <script type="text/javascript">
	
	console.log(<?php echo $json_array; ?>);
    var i;
    function shuffle(dataSet) {
 		dataSet.sort(() => Math.random() - 0.5);
	}
    $(document).ready(function () { // default to first entry in array
        i = 0;
        shuffle(dataSet);
        document.getElementById("character").innerHTML = dataSet[i][0];
        document.getElementById("translation").innerHTML = dataSet[i][2];
    });
    function deci() { // next flashcard in array
        i--;
        document.getElementById("character").innerHTML = dataSet[i][0];
        document.getElementById("translation").innerHTML = dataSet[i][2];
    };
    function inci() { // previous flashcard in array
        i++;
        document.getElementById("character").innerHTML = dataSet[i][0];
        document.getElementById("translation").innerHTML = dataSet[i][2];
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
