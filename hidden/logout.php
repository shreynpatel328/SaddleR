<?php
error_reporting(0);

        header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	    header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
		
		@session_start();
	   
	    if (!isset($_SESSION['SESSION'])) 
	   		@require ( "../include/session_init.php");
      
	    @session_destroy();
			
		@setcookie("remem","",time()-60,"/",'vitbifi.com');
		@setcookie("regNo","",time()-60,"/",'vitbifi.com');
		
		header("Location: https://www.vitbifi.com");
			exit;
		
?>