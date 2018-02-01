<?php
    require_once('C:/xampp/htdocs/hogwarts/mysqli_connect.php');
?>

<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset="UTF-8">
        <title>The New Wizards</title>
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
                    $query = "Select * FROM alumni";
                    $response = @mysqli_query($dbc, $query);
                    $cat_rs = mysqli_fetch_array($response);
                ?>
                <details>
                    <summary><h3>Alumni of Hogwarts<br></h3></summary>
            <div id="alumni">
                <?php

                  do {
                            ?>
                           <div id="wrap">
                               <p>
                            <div id="image">   
                            <div class = std_img><img src="images/<?php 
                            echo $cat_rs['Image'];
                            ?>"></div></div>

                            <div id="info">
                            <div class = std_name><?php
                            echo "<b>Name:</b> ".$cat_rs['Name']; ?>
                            </div>
                            
                            <div class = wsn> <?php
                            echo "<b>Wizard Security No.:</b> ".$cat_rs['Wizard_Security_Number'];
                            ?>
                            </div>

                            <div class = std_cgpa><?php
                            echo "<b>CGPA:</b> ".$cat_rs['CGPA'];
                            ?>
                            </div>
                            
                            <div class = joinDate><?php
                            echo "<b>Joining Date:</b> ".$cat_rs['Joining_Date'];
                            ?>
                            </div>
                                
                            <div class = gradYear><?php
                            echo "<b>Year of graduation:</b> ".$cat_rs['Grad_Year'];
                            ?>
                            </div>
                            
                            <div class = house><?php
                            echo "<b>House:</b> ".$cat_rs['House'];
                            ?>
                            </div>
                            
                            <div class = contactNo><?php
                            echo "<b>Contact No.:</b> ".$cat_rs['Contact_No.'];
                            ?>
                            </div>
                                </div>
                               </p>
                </div>
                            <?php
                           

                  }
                while ($cat_rs = mysqli_fetch_array($response))

?>
                </details>
                </div>
            
                <a href="currentStudents.php" id="links"><h3>Current Wizards of Hogwarts</h3></a>
            <details>
                <summary><h3>Click to see your Amol Nama</h3></summary>
                               <p><form method="post" action="gradesheet.php">
                      Enter the name of the student:
                  <input name="std_name" type="text" />
                      <input name="submit" type="submit" value="Get Amolnama"/>
                            </form></p></details>
            </div>
        
            
                            
        </div>
        </div>
        <p>
        <div class="footer">
        &copy; Hogwarts School of Witchcraft and Wizardy. All rights reserved by The Elder Wands &trade;
            </div>
        </p>
    </body>
