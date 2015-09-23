<?php
error_reporting(0);
 			session_start();
		
		if (!isset($_SESSION['SESSION'])) 
			require ( "../../include/session_init.php");

		while(list($key,$value)=each($_REQUEST))
			$_SESSION['fm'][$key]=$value;
		$rest=$_SESSION['m']['rest'];
		header("Location: ../menu.php?rest=$rest");
		exit;
		
?>