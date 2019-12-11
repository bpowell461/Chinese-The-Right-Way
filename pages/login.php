<!DOCTYPE html>
<html>
<style>
.alert {
  padding: 20px;
  background-color: red;
  color: white;
  display: none;
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>



<script>
$(document).ready(function () {

  $('#login-form').submit(function(e) {
      var form = this;

      e.preventDefault();
      var username = $("#username").val();
      var password = $("#password").val();
	  
	  console.log(username);
	  console.log(password);

      $.ajax({
          type: 'POST',
          url: '../php/authenticate.php',
          data: {
              username: username,
              password: password
          },
          success: function(data) {
              // do your PHP login and echo 1 if authentication was successfull
              if(parseInt(data) === 1) {
                  form.submit();
				  window.location.replace("../index.php");

              } else {
              // show alert or something that user has wrong credentials ...
				  console.log(typeof(data));
				  console.log(data);
                  $(".alert").show();
              }
          }
      });
  });

});
</script>

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
		
		
		
		<div class="alert">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
				<strong>Incorrect Password Or Username! Please Try Again!</strong>
			</div>
			
			
			
			<h1>Login</h1>
			
			<form id ="login-form" action="../php/authenticate.php" role = "form" method="post">
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
			
			
			<a href="register.php">Not a member? Sign up here!</a>
		</div>
		
		</div>
		
		
		
    <!-- Footer -->
    <footer class="footer">  
        <p>Cody "Tarkus" Lee, Brad Powell</p>
        <p>©MIT License - 2019</p>
    </footer>
</div>

</body>
</html>
