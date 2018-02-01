<?php
    require_once('C:/xampp/htdocs/hogwarts/mysqli_connect.php');
?>

<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset="UTF-8">
        <title>Courses Taught</title>
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
                    $query = "Select Distinct a.Wizard_Security_Number,a.Name,b.Course_Code,b.Course_Name from faculty a Inner Join courses b on a.Wizard_Security_Number=b.WSN_Faculty order by a.Wizard_Security_Number asc ";
                    $response = @mysqli_query($dbc, $query);
                    $cat_rs = mysqli_fetch_array($response);
                    echo "<table>
                    <tr>
                            <th><h4>Wizard Security Number</h4></th>
                            <th><h4>Name</h4></th>
                            <th><h4>Course Code</h4></th>
                            
                            </tr>";
                do{
                        echo "<tr>";
                        echo "<td>".$cat_rs['Wizard_Security_Number']."</td>";
                        echo "<td>".$cat_rs['Name']."</td>";
                        echo "<td>".$cat_rs['Course_Code']."</td>";
                          echo "</tr>";
                    }
                while ($cat_rs = mysqli_fetch_array($response));
                    echo "</table>";
                ?>
        </div>
        </div>
            <p>
        <div class="footer">
        &copy; Hogwarts School of Witchcraft and Wizardy. All rights reserved by The Elder Wands &trade;
            </div>
        </p>
    </body>