<?php
    require_once('C:/xampp/htdocs/hogwarts/mysqli_connect.php');
?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <meta charset="UTF-8">
        <title>Courses</title>
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
                    $query = "Select Serial,Course_Name,Course_Code FROM courses where serial<'10'";
                    $response = @mysqli_query($dbc, $query);
                    $cat_rs = mysqli_fetch_array($response);
                    echo "<table>
                    <tr>
                            <th><h4>Serial</h4></th>
                            <th><h4>Course Name</h4></th>
                            <th><h4>Course Code</h4></th>
                             </tr>";
                
            
                    do{
                        echo "<tr>";
                        echo "<td>".$cat_rs['Serial']."</td>";
                        echo "<td>".$cat_rs['Course_Name']."</td>";
                        echo "<td>".$cat_rs['Course_Code']."</td>";
                        //echo "<td>".$cat_rs['ID_Students']."</td>";
                        //echo "<td>".$cat_rs['GPA']."</td>";
                        //echo "<td>".$cat_rs['WSN_Faculty']."</td>";
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