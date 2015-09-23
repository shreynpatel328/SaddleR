<?php
 
	    session_start();
	   
	    if (!isset($_SESSION['SESSION'])) 
	   		require ( "../include/session_init.php");
			
			
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
		
		
		session_destroy();
	   
?>