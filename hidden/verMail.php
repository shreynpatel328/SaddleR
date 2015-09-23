<?php
error_reporting(0);			
				session_start();
				if (!isset($_SESSION['SESSION'])) 
	   				require ( "../include/session_init.php");
				
				if ($_SESSION['LOGGEDIN'] != true)
				{
					header("Location: https://www.vitbifi.com");
					exit;
				}
				
				$regNo=$_SESSION['REGNO'];
				
				include ( "../include/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 
				$db='vitbifi';
				mysql_select_db($db);
							
				$query="select * from user_details where regNo='$regNo'";
				$result=mysql_query($query);
				$no =  MYSQL_RESULT($result,0,"no");
				$eMail =  MYSQL_RESULT($result,0,"email");
				$branch =  MYSQL_RESULT($result,0,"branch");	
				$year = MYSQL_RESULT($result,0,"year");
				
				$ver=intval($no).$branch.intval($year);
				$ver = md5($ver);
				
				$link="https://www.vitbifi.com/verify.php?regNo=".$regNo."&ver=".$ver;
				mysql_close($connect);
				
				$to = $eMail.'@vit.ac.in';
									$subject = "VITBIFI Verification Mail";
									$message = "VITBIFI Verification Mail :
-----------------------------------------------------------
CONFIRM BY VISITING THE LINK BELOW:
	
".$link."
	
Click the link above to give us permission to send you
information.  It's fast and easy!  If you cannot click the
full URL above, please copy and paste it into your web
browser.

-----------------------------------------------------------
If you have not registered, simply ignore this message.

Thank you,
VITBIFI 


".date("H:i:s ")."
URL: http://www.vitbifi.com";
									$from = "VITBIFI_Verification@vitbifi.com";
									$headers = "From:" . $from;
							mail($to,$subject,$message,$headers);
?>
<script type="text/javascript" language="javascript"> 
										alert("Verification mail has been sent to your eMail account. If you do not receive the mail, please wait for few minutes or click on the link to resend the mail.");
										window.location = "https://www.vitbifi.com"
</script>

<?php
exit;
?>