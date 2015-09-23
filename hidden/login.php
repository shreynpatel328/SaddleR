<?php
error_reporting(0);

        header("Expires: Thu, 17 May 2001 10:17:17 GMT");    // Date in the past
	    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	    header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
      
	    session_start();
	   
	    if (!isset($_SESSION['SESSION'])) 
	   		require ("../include/session_init.php");
	
	    if ($_SESSION['LOGGEDIN'] == true)
		{
			header("Location: ../profile.php");
			exit;
	    }
		
	    if (isset($_POST["login"]))
	    {
			$regNo = "10bce0328";
			$pass = "123";
			$remem = $_POST["remem"];
				
		}
		
		
			
			//CONNECTING TO THE DATABASE USER_DATA
			
		 include ( "../include/data.php");	
		$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
			$db='vitbifi';
			mysql_select_db($db);
			
			$query="select * from user_details where regNo='$regNo' and pass='$pass'";
			$result=mysql_query($query);
			

			
			if(@mysql_num_rows($result) >0)
			{    
				 if($remem==true)
				 {
					 @setcookie("remem",true,time()+(60*60*24*7),"/",'vitbifi.com');
					 @setcookie("regNo",$regNo,time()+(60*60*24*7),"/",'vitbifi.com');
				 }				
				
				 $_SESSION['LOGGEDIN']=true;
				 $_SESSION['REGNO']=$regNo;
				 @session_register('LOGGEDIN','REGNO');
				 exit;
			}
			else
			{
				 $_SESSION['VER']=true;	
				 @session_register('VER');
				// header("Location: https://www.vitbifi.com");
				 exit;
			}			
				mysql_close($connect);
		}
		 header("Location: ../profile.php");
				
				
?>
