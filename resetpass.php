<?php 
	require_once("C:/xampp/htdocs/hogwarts/includes/database.php");
	require_once("C:/xampp/htdocs/hogwarts/includes/users.php");
	require_once("C:/xampp/htdocs/hogwarts/includes/class.phpmailer.php");
	$msg="Enter your Email Address";
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>tuntuni - reset password</title>
 	<link rel="stylesheet" href="style/style.css"> 
 </head>
 <body>
 	<?php 
 		if (isset($_POST["submitResetPass"])) {
 			$result=$user->find_users_by_email($_POST["EmailforResetpass"]);
 			if (empty($result)) {
 				
 				$msg="Email not found in out database";

	?>
				<!-- if Sent email doesnt exists in out database-->
		 		<section>
		     		<h1 class="register-title">Reset password for tuntuni.tk</h1>
		 			<form class="register" action="resetpass.php" method="post">	
		 			<p id="error"><?php echo $msg; ?></p>
		 
		   			<input type="email" class="register-input" placeholder="Email address" id="email" name="EmailforResetpass" required>
		    		<input type="submit" name="submitResetPass" value="Reset" class="register-button">
		     	</section>

 	<?php  
		 			
		 	}// ends if (empty($result)) {
		 			else{
		 				//echo $result["Email"];
		 				$link=$user->passResetLink($result["ChatmeID"]);
		 				$send=$user->sendMail("Click to reset password", $result["Email"], "Please follow the link to change your pass.<br>".$link);

		 				if ($send!=1) {
		 					echo "<script>alert('There was an error');</script>";
		 				}
		 				else{
		 					echo "<script>alert('Please Check Your mail For instructions');</script>";
		 					header("refresh:5; url='login.php'");
		 				}
		 			}
 				
 	?>
 	
    <?php 
    	}// ends if (isset($_POST["submitResetPass"]))

    	else if (isset($_GET["ref"]) & isset($_GET["token"]) & isset($_GET["bula"])) {
    		 $param1=html_entity_decode(urldecode($_GET["ref"]));
    		 $param2=html_entity_decode(urldecode($_GET["token"]));
    		 $param3=html_entity_decode(urldecode($_GET["bula"]));
    		$result=$user->checkPassResetTokens($param1, $param2, $param3);
    		//var_dump($result);
    		if (!empty($result)) {
    			$msg="Enter your new Password";
    			
    			//echo($_SESSION["ChatmeID"]=$result["ChatmeID"]);
    ?>
    
    		<!-- Section for reset to new password-->
    		<section>
		     		<h1 class="register-title">Hello <?php echo $result["First_Name"]; ?></h1>
		 			<form class="register" action="resetpass.php" method="post">	
		 			<p id="error" ><?php echo $msg; ?></p>
		 
		   			 <p class="error" id="errorE"></p>
					<input type="password" class="register-input" name="NewPassword" placeholder="Password" id="pass"required>

    				<p class="error" id="errorP"></p>
    				<input type="password" class="register-input" placeholder=" Re-Enter Password" id="Rpass" required>
		    		<input type="submit" name="submitNewPass" value="Change password" class="register-button">
		    </section>

    <?php
 		}// End of if (!empty($result))
 		else if(empty($result)){
 			echo "<h1 class=\"register-title\">Unknow token </h1>";
 		}

    	}// End of else if isset($_GET["ref"]) & isset($_GET["token"])
    	else if (isset($_POST["submitNewPass"])){
    		$id=$_SESSION["ChatmeID"];
    		 $_SESSION["ChatmeID"]=null;
    		 session_destroy();
    		$user->updatePassword($id, $_POST["NewPassword"]);
    	}// End of else if ($_POST["submitNewPass"])
    	else{
    ?>
     	<section>
     		<h1 class="register-title">Reset password for tuntuni.tk</h1>
 			<form class="register" action="resetpass.php" method="post">	
 			<p id="error"><?php echo $msg; ?></p>
 
   			<input type="email" class="register-input" placeholder="Email address" id="email" name="EmailforResetpass" required>
    		<input type="submit" name="submitResetPass" value="Reset" class="register-button">
     	</section>

    <?php 

     	}// Ends Else
    ?>


 </body>
 </html>
 <script type="text/javascript" src="script/main.js"></script>