<?php
error_reporting(0);
				
				session_start();
				if (!isset($_SESSION['SESSION'])) 
	   				require ( "../include/session_init.php");
				
				if ($_SESSION['LOGGEDIN'] == true)
				{
					header("Location: ../profile.php");
					exit;
				}
			
				$name = addslashes( $_POST["name"]);
				$year = addslashes($_POST["year"]);
				$branch = addslashes($_POST["branch"]);
				$no =addslashes($_POST["no"]);
				$gender = addslashes($_POST["gender"]);
				$eMail = addslashes($_POST["eMail"]);
				$mobile= addslashes($_POST["mobile"]);
				$regNo = strtoupper(addslashes($_POST["regNo"]));
				$pass = addslashes($_POST["pass"]);
				
				
				//////VALIDATING NAME & EMAIL ////////////
				
					if(preg_match("/^[a-zA-Z][a-zA-Z ]+$/",$name)==0)
					{	
								$alert=1;
								?>
									<script type="text/javascript" language="javascript"> 
										alert("Invalid Name!");
										window.location = "https://www.vitbifi.com"
									</script>
								<?php
								exit;
					}
					else if(preg_match("/^[a-zA-Z0-9_.]+$/", $eMail) == 0)
					{	
								$alert=1;
								?>
									<script type="text/javascript" language="javascript"> 
										alert("Invalid Email Id!");
										window.location = "https://www.vitbifi.com"
									</script>
								<?php
								exit;
					}	
							
				//////CHECKING FOR UNIQUE REGNO ////////////
				  
					/* include ( "../include/data.php");	
					 $connect=mysql_connect($host,$us,$ps);
					 */
						if($alert==0 && $connect)
						{	
							$db='vitbifi';
							mysql_select_db($db);
							
							$query="select * from user_details where regNo='$regNo' and eMail = '$eMail' and verified = 0";
							$result=mysql_num_rows(mysql_query($query));
							if($result>0)
							{	
								$alert=1;
								?>
									<script type="text/javascript" language="javascript"> 
										alert("Account with same Reg. no. & Email Id already exists. Verify to continue.");
										window.location = "https://www.vitbifi.com"
									</script>
								<?php
								exit;
							}
							else
							{
								$query="select * from user_details where eMail = '$eMail' and verified = 1";
								$result=mysql_num_rows(mysql_query($query));
								if($result>0)
								{
									$alert=1;
									?>
										<script type="text/javascript" language="javascript"> 
											alert("Account with same Email Id already exists.\nYou cannot make more than one account on VITBIFI !");
											window.location = "https://www.vitbifi.com"
										</script>
									<?php
									exit;
								}
								else
								{
								$query="select * from user_details where regNo='$regNo' and verified = 0";
								$result=mysql_num_rows(mysql_query($query));
								if($result>0)
								{
									$query="delete from user_details where regNo='$regNo'";
									$result=mysql_query($query);
									
									$query="delete from user_details where email='$eMail'";
									$result=mysql_query($query);
									
									$query="insert into user_details values('$name','$year','$branch','$no','$gender','$eMail','$mobile','$regNo','$pass','0','0','0','0','0','2010-2-11')";
									$result=mysql_query($query);
									$ver=intval($no).$branch.intval($year);
									// ENCRYPT HERE
									
									
									 
									$ver = md5($ver);
									//$ver= rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
 
 
									
									
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
									
									
									$_SESSION['LOGGEDIN']=true;
									$_SESSION['REGNO']=$regNo;
									@session_register('LOGGEDIN','REGNO');
									
								}
								else
								{
								$query="select * from user_details where regNo='$regNo' and verified = 1";
								$result=mysql_num_rows(mysql_query($query));
								
								
								
								if($result>0)
								{
									$_SESSION['EXST']=true;
									$_SESSION['REGNO']=$regNo;
									session_register('EXST','REGNO');
									header("Location: https://www.vitbifi.com");
									exit;
								}
								else
								{
								
								$query="delete from user_details where email='$eMail'";
								$result=mysql_query($query);
								
								$query="insert into user_details values('$name','$year','$branch','$no','$gender','$eMail','$mobile','$regNo','$pass','0','0','0','0','0','2010-2-11')";
								$result=mysql_query($query);
								$ver=intval($no).$branch.intval($year);
								// ENCRYPT HERE
								
								
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
								
								
								$_SESSION['LOGGEDIN']=true;
								$_SESSION['REGNO']=$regNo;
								@session_register('LOGGEDIN','REGNO');
								
								}
								}
								}
							}	
						}
						else if($alert==0)
						{ 
						 	$alert=1;
								?>
									<script type="text/javascript" language="javascript"> 
										alert("Unabale to connect to database. Try Later !");
										window.location = "https://www.vitbifi.com"
									</script>
								<?php
								exit;
						 }
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if($alert==0)
{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI-Verification</title>
<script src="../jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/etc.css">
		<link rel="stylesheet" type="text/css" href="../css/background1.css">
	<link rel="stylesheet" type="text/css" href="../css/top.css">
	<link rel="stylesheet" type="text/css" href="../css/forgotpassword.css">
	<link rel="stylesheet" type="text/css" href="../css/formTitles.css">
	<link rel="stylesheet" type="text/css" href="../css/tooltipForm.css">
	<link rel="stylesheet" type="text/css" href="../css/signinsignup.css"> 
	<link rel="stylesheet" type="text/css" href="../css/footer.css"> 
	<link href="../css/demo_style_ind.css" rel="stylesheet" type="text/css">
<link href="../css/smart_tab_ind.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../eat/css/style_smartcart.css" />
<style type="text/css">
<!--
.style7 {font-size: 16px}
.style14 {
	font-size: 24px;
	font-weight: bold;
	font-style: italic;
}
.RememberPasswordStyle {
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	font-weight: lighter;
}
.SignUpButtonStyles {
	font-size: 30px;
	font-style: normal;
	line-height: normal;
	font-family: Arial, Helvetica, sans-serif;
	text-decoration: none;
	font-weight: normal;
}
.NormalTextStyle {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-style: normal;
	text-decoration: none;
}
.AcceptBoldStyles {font-size: 16px; font-weight: bold; font-style: normal; }
.SignInButtonStyle {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-style: normal;
	line-height: normal;
	text-decoration: none;
}
.SearchButtonStyle {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-style: normal;
	line-height: normal;
	text-decoration: none;
}
.style27 {font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-style: normal; text-decoration: none; font-weight: bold; }
.style30 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; text-decoration: none; }
-->
</style>
<script type="text/javascript" src="jquery/gvn1.js"></script>
	<!--  JAVASCRIPT -->
	<script>
	<!--
	/* this if for the side ways scroll for the eat travel compete function call   */
		$(function()
		{
			$("#accordion").tabs("#accordion div",
			{
				tabs: 'img', 
				effect: 'horizontal'
			});
		});
	-->
	/*  the function ends here for the side ways scroll */
	</script>	
	
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31050811-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	
</head>
<body>
<div align="center">
<table width="1280" height="87" border="0">
  <tr>
    <td width="250" height="81" align="left" valign="top">
		<img id="saddler" src="../images/bifi.png" style="-moz-border-radius:10px;
	-khtml-border-radius:10px;
	-webkit-border-radius:10px;"  />	</td>
   <td width="550" align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size:17px;"><div id="accordion">
		
			<!-- accordion header #1 -->
			<img class="current" src="../images/eat.png">
			
			<div style="width: 180px; display: block;">
				<h3><a href="eat/eat.php">EAT</a></h3>
				<p>
					Order Your Fav Delicacies From Around The Campus Online.		</p>
			</div>
			
			<img src="../images/travel.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Coming Soon.		</p>
			</div>
		
			<img src="../images/compete.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Coming Soon.		</p>
			</div>	
		
		</div>
	</td>
    

    <td width="444" align="right" valign="top"></td>
    
</table>
<table style="text-align: left; width: 1072px; height: 139px;" border="0" cellpadding="2" cellspacing="2">
<tr>
	<td><p>&nbsp;</p>
      <table width="1074" height="222" border="0">
        <tr>
          <td height="90">
		  <table width="100%" border="0">
            <tr>
              <td width="20" height="66">&nbsp;</td>
              <td width="750"><span class="style27">Verify your account by clicking on the link which has been sent to your gmail account !
                </span></td>
              <td width="100">
			  <form method="link" action="https://www.gmail.com"><a href="https://www.gmail.com"></a>    </label>
	            <input name="signin_submit" class="scItemButton scBtn" value="Click Here" tabindex="6" type="submit" />
			  </form>			  </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="118"><p>&nbsp;</p>
            <table width="100%" border="0">
              <tr>
                <td width="20" height="25">&nbsp;</td>
                <td width="750"><span class="style27">Continue using VITBIFI in unverified mode ... 
                  
                </span></td>
                <td width="100"> 
				<form method="get" action="../profile.php"><a href="profile.php"></a>   
				  <input name="signin_submit2" class="scItemButton scBtn" value="Click Here" tabindex="6" type="submit" />
				</form> 
				</label>  </td>
              </tr>
              <tr>
                <td height="23">&nbsp;</td>
                <td colspan="2">*Note: All the services provided on VITBIFI will not be accessible in unverfied mode! </td>
              </tr>
            </table></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="1006" height="227" border="0">
        <tr>
          <td width="335">&nbsp;</td>
          <td width="335">&nbsp;</td>
          <td width="322">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
	  
	  </td>
	  
	  
	  </body>
	  <br />

<table width="1280" height="80" border="0" align="bottom">
  <tr>
  	 <td width="200" align="left" ><div id="footer"></div></td>
    <td width="70" align="left" ><div id="footer"><a  href="toc.php" style="text-decoration:none;">Terms Of Conditions</a></div></td>
    <td width="30"><div id="footer" >  About Us</a></div></td>
    <td  width="20"><div id="footer">FAQ</div></td>
	<td  width="40"><div id="footer">Contact Us</div></td>
	<td  width="40"><div id="footer">Privacy Policy</div></td>
  </tr>
</table>


	  </html>
<?php
}
?>	  