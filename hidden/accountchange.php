<?php
error_reporting(0);
				
				session_start();
				if (!isset($_SESSION['SESSION'])) 
	   				require ( "../include/session_init.php");
				$regNo=$_SESSION['REGNO'];
			
				 if ($_SESSION['LOGGEDIN'] != true)
				{
					header("Location: https://www.vitbifi.com");
					exit;
				}
				
				
				
				include ( "../include/data.php");	
				$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
			$db='vitbifi';
			mysql_select_db($db);
			
			if(isset($_POST["namechange"]))
			{
				$namechange = addslashes( $_POST["namechange"]);
				
				if(preg_match("/^[a-zA-Z][a-zA-Z ]+$/",$namechange)==0)
				{	
					$alert=1;
					?>
						<script type="text/javascript" language="javascript"> 
							alert("Invalid Name!");
							window.location = "../account.php"
						</script>
					<?php
					exit;
				}
				else
				{
					$queryfornamechange="update user_details set name='$namechange' where regNo='$regNo'";
					$resultfornamechange=mysql_query($queryfornamechange);
					
					$alert=1;
					?>
						<script type="text/javascript" language="javascript"> 
							alert("Name successfully changed.");
							window.location = "../account.php"
						</script>
					<?php
					exit;
				}
				
			}
			else if(isset ($_POST["mobchange"]))
			{
				$mobchange = addslashes($_POST["mobchange"]);
				
				if(strlen($mobchange)<10 || is_nan($mobchange))
				{	
					$alert=1;
					?>
						<script type="text/javascript" language="javascript"> 
							alert("Invalid Mobile number!<?php echo $mobchange;?>");
							window.location = "../account.php"
						</script>
					<?php
					exit;
				}
				else
				{	$queryformobchange="update user_details set mobile='$mobchange' where regNo='$regNo'";
					$resultformobchange=mysql_query($queryformobchange);
					
					$alert=1;
					?>
						<script type="text/javascript" language="javascript"> 
							alert("Mobile number successfully changed.");
							window.location = "../account.php"
						</script>
					<?php
					exit;
				}
				
				
			}
			else if(isset ($_POST["passchangeold"]))
			{
				
				$passchangeold = addslashes($_POST["passchangeold"]);
				$passchangenew = addslashes($_POST["passchangenew"]);
				$passchangenew1 = addslashes($_POST["passchangenew1"]);
				$queryforpasschang="select pass from user_details where regNo='$regNo'";
				$result=mysql_query($queryforpasschang);
				$pass=mysql_result($result,0,"pass");
				
				if($pass==$passchangeold)
				{
					if($passchangenew==$passchangenew1)
					{
					
							$queryforpasschange="update user_details set pass='$passchangenew' where regNo='$regNo'";
							$resultforpasschange=mysql_query($queryforpasschange);
							?>
								<script type="text/javascript" language="javascript"> 
									alert("Password successfully changed.!");
									window.location = "../account.php"
								</script>
							<?php
					}
					else
					{
						?>
							<script type="text/javascript" language="javascript"> 
								alert("New passwords do not match.");
								window.location = "../account.php"
							</script>
						<?php	
					}
				}	
				else
				{
					?>
						<script type="text/javascript" language="javascript"> 
							alert("Incorrect password !");
							window.location = "../account.php"
						</script>
					<?php	
				}
			}		
			
			
		}
		else
		{
			?>
				<script type="text/javascript" language="javascript"> 
					alert("Could not connect to the database. Try again Later !");
					window.location = "../account.php"
				</script>
			<?php	
		}
			
			
				
?>
