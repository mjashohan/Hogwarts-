<?php 
	require_once("config.php");
	require_once("database.php");
	require_once("users.php");

	if (isset($_POST["whoisonline"])) {
		session_start();
		$arr=$user->onLineUsers();
		
		$haha="";
		if (empty($arr)) {
		$haha="<span>No one is online</span>";
			echo $haha;
		}
		else{
			for ($i=0; $i < count($arr); $i++) { 
				$haha.="<li tabindex=\"0\" class=\"icon-dashboard\"><span>".$arr[$i]."</span></li>";
			}
			echo $haha;
		}
		
	}


 ?>