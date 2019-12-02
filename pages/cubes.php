<!DOCTYPE html>
<html>
<head>
  <title>Chinese the Right Way</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/cube.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <script type="text/javascript" src="../javascript/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../javascript/dbcontents.js"></script>
  <script type="text/javascript">
    var i;
    function shuffle(dataSet) {
      dataSet.sort(() => Math.random() - 0.5);
    }
    $(document).ready(function () { // default to first entry in array
      i = 0;
      shuffle(dataSet);
      document.getElementById("f1").innerHTML = dataSet[i][0];
      document.getElementById("f2").innerHTML = dataSet[i][2];
    });
    function deci() { // next flashcard in array
      i--;
      document.getElementById("f1").innerHTML = dataSet[i][0];
      document.getElementById("f2").innerHTML = dataSet[i][2];
    };
    function inci() { // previous flashcard in array
      i++;
      document.getElementById("f1").innerHTML = dataSet[i][0];
      document.getElementById("f2").innerHTML = dataSet[i][2];
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
      <div class = "wrapper">
        <div class="viewport">
          <div class="cube">
            <div class="side"><div class="cube-image"><p id="f4">1</p></div></div>
            <div class="side"><div class="cube-image"><p id="f2">2</p></div></div>
            <div class="side"><div class="cube-image"><p id="f3">3</p></div></div>
            <div class="side"><div class="cube-image"><p id="f1">4</p></div></div>
            <div class="side"><div class="cube-image" ><p id="f5">Hello</p></div></div>
            <div class="side"><div class="cube-image active"><p id="f6">6</p></div></div>
          </div>
        </div>
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
      <p>f1 database contents provided by Unihan</p>
    </footer>
  </div>
  <script type="text/javascript" src="../javascript/cube.js"></script>
</body>
</html>
