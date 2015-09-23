<?php
error_reporting(0);
 		session_start();
		
		if (!isset($_SESSION['SESSION'])) 
			require ( "../../include/session_init.php");

			$_SESSION['fm']['name']=NULL;
			$_SESSION['fm']['rating']=NULL;
			$_SESSION['fm']['deliveryPoint']=NULL;
			$_SESSION['fm']['deliveryTime']=NULL;
			$_SESSION['fm']['category']=NULL;
			$_SESSION['fm']['veg']=NULL;
			
			
		
		$rest=$_SESSION['m']['rest'];
		header("Location: ../menu.php?rest=$rest");
		exit;
		
?>