

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI-Contact Us</title>
<script src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/etc.css">
	<link rel="stylesheet" type="text/css" href="css/background1.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css"> 
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
		<a href="https://www.vitbifi.com"><img src="images/bifi.png" name="saddler" border="0" id="saddler" style="-moz-border-radius:10px;
	-khtml-border-radius:10px;
	-webkit-border-radius:10px;"  /></a> </td>
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
    <td width="444">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<h1 align="center" style="font-size:30px"><strong>Contact Us </strong></h1>
<h1 align="center" style="font-size:30px"><br />
</h1>
<div align="center">
  <table width="972" height="61" border="0">
    <tr>
      <td width="966" align="left" valign="top"><p> Suggestions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: suggestions@vitbifi.com</p><br>
        <p>Feedback &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  feedback@vitbifi.com</p><br>
        <p>Help/Support/Queries&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : support@vitbifi.com </p>
        <br />
        <br />      </td>
    </tr>
  </table>
</div>
<p align="center"></p>
<p>&nbsp;</p>
</body>
<table width="1280" height="200" border="0" >
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
