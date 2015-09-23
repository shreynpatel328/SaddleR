<?php  
error_reporting(0);
session_start();
	   
	    if (!isset($_SESSION['SESSION'])) 
	   		require ( "include/session_init.php");
	   
	    if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: https://www.vitbifi.com");
			exit;
	    }
		
		$regNo=$_SESSION['REGNO'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI-Account</title>
<script src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/etc.css">
	<link rel="stylesheet" type="text/css" href="css/background1.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css"> 
	<link rel="stylesheet" type="text/css" media="screen, projection"  href="css/tweet.css">
	<link rel="stylesheet" type="text/css" href="../eat/css/style_smartcart.css" />
	
	<link rel="stylesheet" type="text/css" href="../eat/css/slider.css">

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
        $(document).ready(function() {

            $(".signin").click(function(e) {          
				e.preventDefault();
                $("fieldset#signin_menu").toggle();
				$(".signin").toggleClass("menu-open");
            });
			
			$("fieldset#signin_menu").mouseup(function() {
				return false
			});
			$(document).mouseup(function(e) {
				if($(e.target).parent("a.signin").length==0) {
					$(".signin").removeClass("menu-open");
					$("fieldset#signin_menu").hide();
				}
			});			
			
        });
</script>
	
	<script>
			// Displaying tooltips for text fields
						
			$("#demo img[title]").tooltip();
							
	</script>
		
		
	<script>
			// execute your scripts when the DOM is ready. this is a good habit
			$(function() 
			{
					// select all desired input fields and attach tooltips to them
					$("#myform :input").tooltip(
					{
					
						// place tooltip on the right edge
						position: "center right",
					
						// a little tweaking of the position
						offset: [-2, 10],
					
						// use the built-in fadeIn/fadeOut effect
						effect: "fade",
					
						// custom opacity setting
						opacity: 0.7
					
					});
			});
	</script>
						
	
						
	<script type="text/javascript" language="javascript"> 
							<!--
							// javascript validation of signin
							function validateMyFormSignIn ( ) { 
								var isValid = true;
								if ( document.signInForm.regNo.value.length < 8 || document.signInForm.regNo.value.length > 9 ) { 
								alert ( "Please Enter valid Registration Number...!!!" ); 
								isValid = false;
								} else if ( document.signInForm.pass.value.length < 8 ) { 
										alert ( "Invalid Password...!!!" ); 
										isValid = false;
								} 
								return isValid;
							}
							-->
	</script>
						
	<script>
		
		// this is for the tabs used in the sign up .
		$(function() {
			// setup ul.tabs to work as tabs for each div directly under div.panes
			$("ul.tabs").tabs("div.panes > div");
		});
	</script>
	
						
	</script>  
		
	<script>
		/*   the function used is to call the  sign in sign upwhole thing*/
		$(function() { 
		
		$("#accordion1").tabs("#accordion1 div.pane", {tabs: 'h2', effect: 'slide', initialIndex: 1});
		});
	</script>
    <style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
-->
    </style>
</head>

<body>
<div align="center">
<table width="1280" height="87" border="0">
  <tr>
    <td width="250" height="81" align="left" valign="top">
		<a href="http://www.vitbifi.com/profile.php" ><img id="saddler" src="images/bifi.png" style="-moz-border-radius:10px;
	-khtml-border-radius:10px;
	-webkit-border-radius:10px;"  />	</a></td>
   <td width="550" align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size:17px;"><div id="accordion">
		
			<!-- accordion header #1 -->
			<img class="current" src="images/eat.png">
			
			<div style="width: 180px; display: block;">
				<h3><a href="eat/eat.php">EAT</a></h3>
				<p>
					Order Your Fav Delicacies From Around The Campus Online.		</p>
			</div>
			
			<img src="images/travel.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Coming Soon.		</p>
			</div>
		
			<img src="images/compete.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Coming Soon.		</p>
			</div>	
		
		</div>
	</td>
    

    <td width="444" align="right" valign="top">&nbsp;
		<div id="container">
  <div id="topnav" class="topnav">&nbsp;<a  class="signin"><span>
    <?php echo $regNo; ?>
  </span></a></div>
  <fieldset id="signin_menu">
    <form method="get" id="signin" action="hidden/logout.php">
       <p class="forgot"> <a href="account.php">Account</a> </p>
             <p class="remember">
        <input name="signin_submit" class="scItemButton scBtn" value="Sign Out" tabindex="6" type="submit">
		
	 </p>
     </form>
  </fieldset>
</div>
	   
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="style1">Change Name</p>
<p>&nbsp;</p>
<table width="545" height="32" border="0">
	<form  name="changeName" method="POST" action="hidden/accountchange.php">
		  <tr>
    			<td width="196"> Enter Name </td>
    			<td width="173"><label>
      				<input type="text"  name="namechange" class="namechange" />
    				</label>
			</td>
    			<td width="154">
					<label>
    				<input type="submit"  value="Change"  />
    				</label>
			</td>
  		</tr>
  	</form>
</table>
<p>&nbsp; </p>
<p>
  <label></label>
</p>
<p class="style1">&nbsp; </p>
<p class="style1">Change Password</p>
<p class="style1">&nbsp; </p><p class="style1">&nbsp; </p>
<p>
  <label></label>
</p>
<table width="547" height="75" border="0">
  <form name="changePass" method="POST" action="hidden/accountchange.php">
  <tr>
   
   <td width="200" height="22"><p>Enter Current  Password :</p> </td>
    <td width="173"><input name="passchangeold" class="passchangeold" type="password" /></td>
    <td width="160">&nbsp;</td>
  </tr>
  <tr>
    <td height="23"><p>Enter New Password :</p>    </td>
    <td><input type="password" name="passchangenew" class="passchangenew"  /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="22">Confirm New Password : </td>
    <td><input type="password"name="passchangenew1" class="passchangenew1" /></td>
    <td><input type="submit"  value="Change"   /></td>
  </tr></form>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="style1">Change Mobile No.</p>
<p>&nbsp;</p>
<table width="552" border="0">
 <form name="changeMobile" method="POST" action="hidden/accountchange.php"> 
 <tr>
    <td width="196"><p>Enter The Mobile No.
        <label></label>
    </p>    </td>
	
    <td width="175"><input name="mobchange" type="text" id="mobchange" maxlength="10" /></td>
    <td width="167"><label>
      <input name="mobsubmit" type="submit"  class="mobchange" id="mobsubmit" value="Change" />
    </label></td>
	
  </tr></form>
</table>

</body>
<table width="1280" height="100" border="0" >
</table>
<table width="1280" height="80" border="0" >
  <tr>
  	 <td width="200" align="left" ><div id="footer"></div></td>
    <td width="70" align="left"  ><div id="footer"><a id="footer" href="toc.php" style="text-decoration:none;">Terms And Conditions</a></div></td>
    <td width="30"><div id="footer" ><a id="footer" href="aboutus.php" style="text-decoration:none;">  About Us</a></div></td>
    <td  width="20"><div id="footer"><a id="footer" href="faq.php" style="text-decoration:none;">FAQ</div></td>
	<td  width="40"><div id="footer"><a  id="footer" href="contact.php" style="text-decoration:none;">Contact Us</div></td>
	<td  width="40"><div id="footer"><a  id="footer" href="privacypol.php" style="text-decoration:none;">Privacy Policy</div></td>
  </tr>
</table>

</html>
