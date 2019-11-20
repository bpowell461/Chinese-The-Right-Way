<!DOCTYPE html>
<html>
<head>
    <title>DB Prototype</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../javascript/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../javascript/dbcontents.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#chn').DataTable( {
                data: dataSet,
                columns: [
                    { title: "Character" },
                    { title: "Pinyin" },
                    { title: "Definition" },
                    { title: "Radical" },
                    { title: "Stroke Count" },
                    { title: "HSK Level" },
                    { title: "General Standard #" },
                    { title: "Frequency Rank" }
                ]
            } );
        } );
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
        <table id="chn" class="display"></table> <!--data pulled from .js file -->
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
