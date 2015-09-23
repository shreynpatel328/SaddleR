<?php
			if( $_GET["bifi"]=="bifii")			
			{
				header("Location: ../ind.php");
				exit;
			}
			else if( $_GET["bifi"]=="ordertime")
			{
				header("Location: ../databaseSet/order_time.php");
				exit;
			}
			else
			{
				header("Location: https://www.vitbifi.com");
				exit;
			}
?>		