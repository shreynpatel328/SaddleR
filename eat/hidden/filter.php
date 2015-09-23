<?php
error_reporting(0);
 			session_start();
		
		if (!isset($_SESSION['SESSION'])) 
			require ( "../../include/session_init.php");

		while(list($key,$value)=each($_REQUEST))
			$_SESSION['f'][$key]=$value;
		
		header("Location: ../eat.php");
		exit;
		
?>