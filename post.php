<?php
session_start();

if(isset($_SESSION["id"])){

	require_once("../includes/config.php");
    require_once("../includes/database.php");
    require_once("../includes/users.php");
    $user->updateOnlineStatus();
	date_default_timezone_set('Asia/Dhaka');
	$tata= date("g:i a");
    $text = $_POST["text"]; 
    $location=$_POST["location"];
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln' title='".stripslashes(htmlspecialchars($tata))."'><p class='sendUser'>".$user->showMyName()." Says (<span class=location'>from ".$location."</span>):
 </p><p class='msg'>".stripslashes(htmlspecialchars($text))."</p></div>");
    fclose($fp);
}
?>