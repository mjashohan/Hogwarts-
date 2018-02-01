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
              <div id="main">
                  
                  <?php
                    $query = "Select a.House, b.Course_Code, b.gpa from current_students a inner join courses b on a.ID=b.ID_Students where Name like '%".$_POST['std_name']."%'";
                    $response = @mysqli_query($dbc, $query);
                    $cat_rs = mysqli_fetch_array($response);
                    $query1 = "Select Avg(b.GPA) from current_students a inner join courses b on a.ID=b.ID_Students where Name like '%".$_POST['std_name']."%'";
                    $response1 = @mysqli_query($dbc, $query1);
                    $dog_rs = mysqli_fetch_array($response1);
                    echo "<h1>"."".$_POST['std_name'].":"."</h1>";
                    echo "<table>
                    <tr>
                           
                            
                            
                          
                            
                            <th><h4>Course Code</h4></th>
                            <th><h4>GPA</h4></th>
                            </tr>";
                
            
                    do{
                        echo "<tr>";
                       // echo "<td>".$cat_rs['ID']."</td>";
                        //echo "<td>".$cat_rs['Name']."</td>";
                        //echo "<td>".$cat_rs['Gender']."</td>";
                       // echo "<td>".$cat_rs['House']."</td>";
                        //echo "<td>".$cat_rs['Joining_Date']."</td>";
                        //echo "<td>".$cat_rs['Grad_Expectancy']."</td>";
                        //echo "<td>".$cat_rs['Contact_No,']."</td>";
                        echo "<td>".$cat_rs['Course_Code']."</td>"; 
                        echo "<td>".$cat_rs['gpa']."</td>"; 
                        echo "</tr>";
                    }
                while ($cat_rs = mysqli_fetch_array($response));
                    echo "</table>";
                    echo "<h1>"."CGPA: ".$dog_rs['Avg(b.GPA)']."</h1>";
                        ?>
                <a href="TheNewWizards.php" id="goback">< Go Back</a>
                    
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