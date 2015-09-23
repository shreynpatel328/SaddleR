<?php
error_reporting(0);
	include ("include/data.php");	
		$connect=mysql_connect($host,$us,$ps);
		$db='vitbifi';
		mysql_select_db($db);
			
	$ver=$_REQUEST['ver'];
	$regNo=$_REQUEST['regNo'];
		
	$query="select * from user_details where regNo='$regNo'";
	$result=mysql_query($query);
	$verified=MYSQL_RESULT($result,0,"no");
	$verified.=MYSQL_RESULT($result,0,"branch");
	$verified.=MYSQL_RESULT($result,0,"year");
	//ENCRYPT HERE

	 
	$verified = md5($verified);
	
	if($ver==$verified)
	{
		$query="update user_details set verified = 1 where regNo='$regNo'";
		$result=mysql_query($query);
	}	
	
	header("Location: https://www.vitbifi.com");
	exit;
?>