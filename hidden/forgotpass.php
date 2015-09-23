<?php
error_reporting(0);
 session_start();
 		if(!isset($_SESSION['SESSION']))
			require("/include/session_init.php");
		
		if (@$_SESSION['LOGGEDIN'] == true)
		{
			header("Location: profile.php");
			exit;
	    }
		
		
		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		
		 $pass = '';
		 for ($i = 0; $i < 8; $i++) 
		 {
			  $pass .= $characters[rand(0, strlen($characters) - 1)];
		 }

		$regNo = strtoupper(addslashes($_POST["regNo"]));
		
		include ( "../include/data.php");	
		$connect=mysql_connect($host,$us,$ps);
		
		if($connect)
		{
			$db='vitbifi';
			mysql_select_db($db);
			
			$query="update user_details set pass='$pass' where regNo='$regNo'";
			$result=mysql_query($query);
			
			$query="select * from user_details where regNo='$regNo'";
			$result=mysql_query($query);
			if(mysql_num_rows($result)>0)
			$email=mysql_result($result,0,"email");
			
			$to = $email.'@vit.ac.in';
								$subject = "VITBIFI Password Forgot";
								$message = "VITBIFI Password Forgot Help :
-----------------------------------------------------------
Your new password:
	
".$pass."

-----------------------------------------------------------

Thank you,
VITBIFI 


".date("H:i:s ")."
URL: http://www.vitbifi.com";
								$from = "VITBIFI_support@vitbifi.com";
								$headers = "From:" . $from;
								mail($to,$subject,$message,$headers);
			
		}	
		else
		{
			?>
				<script type="text/javascript" language="javascript"> 
					alert("Could not connect to the database. Try again Later !");
					window.location = "https://www.vitbifi.com"
				</script>
			<?php	
		}
		

?>
		<script type="text/javascript" language="javascript"> 
			alert("Password will be sent to your registered eMail-id.");
			window.location = "https://www.vitbifi.com"
		</script>
<?php	
		
?>