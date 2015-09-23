<?php
			if( $_GET["bifi"]=="biffii")			
			{
				header("Location: ../ind.php");
				exit;
			}
			else if( $_GET["bifi"]=="ordertime")
			{
				//header("Location: ../databaseSet/orderTime.php");
				exit;
			}
			else
			{
				header("Location: https://www.vitbifi.com");
				exit;
			}
?>		