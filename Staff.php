<?php
    require_once('C:/xampp/htdocs/hogwarts/mysqli_connect.php');
?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset="UTF-8">
        <title>Staff</title>
            <link rel="icon" href=".\Hogwartscrest.png" type="image/png">
            <link rel="stylesheet" type="text/css" href="decoration.css"/>
    </head>
    <body>
        <header>
            <a href="index.php"><img src="banner2.jpg" id="coverPhoto"/></a>
        </header>
        <nav id="top-menu">
            <div id ="menu-buttons">
                <a href="home.php">Home</a>
                <a href="headmasterAndFaculties.php">Headmaster and Faculties</a>
                <a href="TheNewWizards.php">The New Wizards</a>
                <a href="Courses.php">Courses</a>
                <a href="Staff.php">Non Teaching Staff</a>
                <a href="login_stat.php">Login</a>
            </div>
            
        </nav>
        <div id="wrapper">
            <div id="main"><?php
                    $query = "Select * FROM non_teaching_staff";
                    $response = @mysqli_query($dbc, $query);
                    $cat_rs = mysqli_fetch_array($response);
                ?>
                    <summary id ="thestaff">The Staff who keeps Hogwarts as it is</summary>
            <div id="staff">
                <?php

                  do {
                            ?>
                           <div id="wraped">
                               <p>
                            <div id="image">   
                            <div class = staff_img><img src="images/<?php 
                            echo $cat_rs['Image'];
                            ?>"></div></div>

                            <div id="infos">
                            <div class = fac_name><?php
                            echo "<b>Name:</b> ".$cat_rs['Name']; ?>
                            </div>
                            
                            <div class = wsn> <?php
                            echo "<b>Wizard Security No.:</b> ".$cat_rs['Wizard_Security_Number'];
                            ?>
                            </div>

                            <div class = workType><?php
                            echo "<b>Typer of Work:</b> ".$cat_rs['Type_Of_Work'];
                            ?>
                            </div>
                                </div>
                               </p>
                </div>
                            <?php
                           

                  }
                while ($cat_rs = mysqli_fetch_array($response));

?>
                
                </div>
        </div>
        </div>
        <p>
        <div class="footer">
        &copy; Hogwarts School of Witchcraft and Wizardy. All rights reserved by The Elder Wands &trade;
            </div>
        </p>
    </body>