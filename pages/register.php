<!DOCTYPE html>
<html>
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>

<head>
    <title>Chinese the Right Way</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>

<!-- Sticky Navbar -->
<ul class="navbar">
    <li class="navbutton"><a href="../index.html" class="headerButton">Home</a></li>
    <li class="navbutton"><a href="flashcards.php" class="headerButton">Flashcards</a></li>
    <li class="navbutton"><a href="huamulan.php" class="headerButton">Hua Mulan</a></li>
    <li class="navbutton"><a href="resources.php" class="headerButton">Resources</a></li>
    <li class="navbutton"><a href="db.php" class="headerButton">Database</a></li>
    <li class="navbutton"><a href="../php/login.php" class="headerButton">Account</a></li>
</ul>

		<div class="login">
		
			<!-- <div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				<strong>Error!</strong> Incorrect Username Or Password!
			</div> -->
			
			<h1>Sign Up</h1>
			<form action="../php/register.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password_1" placeholder="Password" id="password" required>
				<label for="confirmpassword">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password_2" placeholder="Confirm Password" id="password" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="email" required>
				Are you a Teacher?
				<input type="checkbox" name="AccType" placeholder="AccType" id="AccType" value="Yes">
				<input type="submit" name="reg_user" value="Register">
			</form>
			<a href="login.php" class="headerButton">Already a member? Log in here!</a>
		</div>
    <!-- Footer -->
    <footer class="footer">  
        <p>Cody "Tarkus" Lee, Brad Powell</p>
        <p>©MIT License - 2019</p>
    </footer>
</div>

</body>
</html>
