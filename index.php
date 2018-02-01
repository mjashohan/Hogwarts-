<?php 
    session_start();
   // $_SESSION["id"]="kala";
    require_once("C:/xampp/htdocs/hogwarts/includes/config.php");
    require_once("C:/xampp/htdocs/hogwarts/includes/database.php");
    require_once("C:/xampp/htdocs/hogwarts/includes/users.php");
    if (!isset($_SESSION["id"])) {
        header("Location:login.php");
    }
    else if(isset($_POST["logOut"])){
        $user->logOut();
    }
    else{
        ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Hogwarts owl</title>
        <link type="text/css" rel="stylesheet" href="style/mainchatstyle.css" />
        <link rel="stylesheet" href="style/stylenav.css">
    </head>
    <body onload="getLocation()">
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome, <?php echo $user->showMyName(); ?><b></b></p>
                <form action="index.php" method="post"><input type="submit" class="logout" value="LogOut!"name="logOut"></form> 
                <div style="clear:both"></div>
            </div><!-- End of div menu-->
     
            <div id="chatbox"></div>
     
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" size="63" autocomplete='off'/>
                <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
            </form><!-- End of form message-->
        </div><!-- End of Div id Wrapper-->

         <nav class="menu" tabindex="0">
    <div class="smartphone-menu-trigger"></div>
  <header class="avatar">
        <img src="style/defaultpropic.png" />
    <h2><?php echo $user->showMyNameFull(); ?></h2>
  </header>
    <section >
    <h2 style="text-align:center;"><button onclick="showOnline()">Online Users</button></h2>
   <ul id="sidebarul">
   
  </ul> 
  </section>
</nav>
        
    </body>
    </html>
   


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="script/script.js"></script>
<script type="text/javascript">
       function  showOnline(){
            var httpObj=new XMLHttpRequest();
      var userE="whoisonline=online";

      httpObj.onreadystatechange=function(){
        if (httpObj.readyState==4 && httpObj.status=="200") {
       // alert(httpObj.responseText);
         document.getElementById("sidebarul").innerHTML=httpObj.responseText;

        }
      }// End of check

      httpObj.open("POST","../includes/bulala.php",true);
      httpObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      httpObj.setRequestHeader("Content-length", userE.length);
      httpObj.setRequestHeader("Connection", "close");
      httpObj.send(userE);
        }
        showOnline();
        //setTimeout("showOnline", 3000);
      // End of check
    </script>

        <?php
    }
 ?>

