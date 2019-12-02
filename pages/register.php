<!DOCTYPE html>
<html>
<style>
<<<<<<< HEAD:pages/login.html
  .alert {
    padding: 20px;
    background-color: green;
    color: white;
    display: none;
  }
=======
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}
>>>>>>> Brad:pages/register.php

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

<<<<<<< HEAD:pages/login.html
<script>
  <?php session_start(); ?>
  function showAccount(){
    var box = document.getElementsByClassName("alert");

    var created = "<?php echo json_encode($_SESSION['created']); ?>";

    if(created){
     box.style.display = 'inline';
   }
 }
</script>
<head>
  <title>Chinese the Right Way</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
=======
<head>
    <title>Chinese the Right Way</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
>>>>>>> Brad:pages/register.php
</head>
<body>

<<<<<<< HEAD:pages/login.html
  <!-- Sticky Navbar -->
  <ul class="navbar">
    <li class="navbutton"><a href="../index.html" class="headerButton">Home</a></li>
    <li class="navbutton"><a href="flashcards.html" class="headerButton">Flashcards</a></li>
    <li class="navbutton"><a href="huamulan.html" class="headerButton">Hua Mulan</a></li>
    <li class="navbutton"><a href="resources.html" class="headerButton">Resources</a></li>
    <li class="navbutton"><a href="db.html" class="headerButton">Database</a></li>
=======
<!-- Sticky Navbar -->
<ul class="navbar">
    <li class="navbutton"><a href="../index.php" class="headerButton">Home</a></li>
    <li class="navbutton"><a href="flashcards.php" class="headerButton">Flashcards</a></li>
    <li class="navbutton"><a href="huamulan.php" class="headerButton">Hua Mulan</a></li>
    <li class="navbutton"><a href="resources.php" class="headerButton">Resources</a></li>
    <li class="navbutton"><a href="db.php" class="headerButton">Database</a></li>
>>>>>>> Brad:pages/register.php
    <li class="navbutton"><a href="../php/login.php" class="headerButton">Account</a></li>
  </ul>

<<<<<<< HEAD:pages/login.html
  <div class="login">
    
   <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong>Account Created!</strong> Please log in with your account credentials.
  </div>
  
  <h1>Login</h1>
  <form action="../php/authenticate.php" method="post">
    <label for="username">
     <i class="fas fa-user"></i>
   </label>
   <input type="text" name="username" placeholder="Username" id="username" required>
   <label for="password">
     <i class="fas fa-lock"></i>
   </label>
   <input type="password" name="password" placeholder="Password" id="password" required>
   <input type="submit" value="Login">
 </form>
 <a href="register.html" class="headerButton">Not a member? Sign up here!</a>
</div>
<!-- Footer -->
<footer class="footer">  
  <p>Cody "Tarkus" Lee</p>
  <p>©MIT License - 2019</p>
</footer>
=======
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
        <p>Cody "Tarkus" Lee</p>
        <p>©MIT License - 2019</p>
    </footer>
>>>>>>> Brad:pages/register.php
</div>

</body>
</html>
