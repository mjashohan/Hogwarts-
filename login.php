<?php 
	require_once("C:/xampp/htdocs/hogwarts/includes/database.php");
	require_once("C:/xampp/htdocs/hogwarts/includes/users.php");

	$msg="";
 	if (isset($_POST["submitLogIn"])) {
	$var= $user->authenticate($_POST["LoginEmail"], $_POST["Loginpass"]);
	if ($var==1) {
		
	}
	else{
		$msg="Invalid ID/ Password";
	}
	
	}

 ?><!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="style/style.css">
     <link rel="stylesheet" type="text/css" href="decoration.css"/>
 </head>
 <body>
 	
 	<h1 class="register-title">Please Sign In to Continue</h1>
 	<form class="register" action="login.php" method="post">	
 		<p id="error"><?php echo $msg; ?></p>
 
    <input type="email" class="register-input" placeholder="Email address" id="email" name="LoginEmail" required>
    <p class="error" id="errorE"></p>
<input type="password" class="register-input" name="Loginpass" placeholder="Password" id="pass"required>

  	<a href="resetpass.php">forget password?</a>
    <input type="submit" name="submitLogIn" value="Log In!" class="register-button">

  </form>
  <h1 class="register-title"><a class="ula register-title" href="signup.html">Or SignUp here</a></h1>
  <div id="tohome"><a href="home.php">Home</a><br>
  <a href="login_stat.php">Back to previous page</a></div>
 </body>
 </html>
 <script type="text/javascript" src="script/main.js"></script>