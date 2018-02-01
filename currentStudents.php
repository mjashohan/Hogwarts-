<?php
    require_once('C:/xampp/htdocs/hogwarts/mysqli_connect.php');
?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset="UTF-8">
        <title>Current Wizards of Hogwarts</title>
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
               
                    $query = "Select * FROM current_students;";
                    $response = @mysqli_query($dbc, $query);
                    $cat_rs = mysqli_fetch_array($response);
                    echo "<table>
                    <tr>
                            <th><h4>ID</h4></th>
                            <th><h4>Name</h4></th>
                            <th><h4>Gender</h4></th>
                            <th><h4>House</h4></th>
                            <th><h4>Joining Date</h4></th>
                            <th><h4>Graduation Expectancy</h4></th>
                            <th><h4>Contact No.</h4></th>
                            <th><h4>Blood Group</h4></th>
                            </tr>";
                
            
                    do{
                        echo "<tr>";
                        echo "<td>".$cat_rs['ID']."</td>";
                        echo "<td>".$cat_rs['Name']."</td>";
                        echo "<td>".$cat_rs['Gender']."</td>";
                        echo "<td>".$cat_rs['House']."</td>";
                        echo "<td>".$cat_rs['Joining_Date']."</td>";
                        echo "<td>".$cat_rs['Grad_Expectancy']."</td>";
                        echo "<td>".$cat_rs['Contact_No,']."</td>";
                        echo "<td>".$cat_rs['Blood_Group']."</td>";
                        echo "</tr>";
                    }
                while ($cat_rs = mysqli_fetch_array($response));
                    echo "</table>";
                        ?>
                
                                </div>
                        
                </div>
            
        </div>
        </div>
        </div>
        <p>
        <div class="footer">
        &copy; Hogwarts School of Witchcraft and Wizardy. All rights reserved by The Elder Wands &trade;
            </div>
        </p>
    </body>