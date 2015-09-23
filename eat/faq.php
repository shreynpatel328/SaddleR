

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI-FAQ</title>
<script src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/etc.css">
	<link rel="stylesheet" type="text/css" href="../css/background1.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css"> 
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
				<h3><a href="eat.php">EAT</a></h3>
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
<p>
<p>
<p>
<br /><br /><br /><br />
<h1 style="font-size:30px;">Frequently Asked Questions</h1>
<table width="1000" border="0">
  <tr>
    <td width="1000"><br />
      <br /><br /><p><strong>Q. What if I am  late and not able to reach the delivery point at the delivery time?</strong><br />
At the delivery time a person from the  restaurant will be standing there with the order and will wait for around 7  minutes. If you fail to collect your order during this time then you can avail  your order from the restaurant within 1 hour from the delivery time. Even if then you fail to collect your order then your order stands as cancelled and no refunds shall be made.
</p>
      <p>&nbsp;</p>
      <p><br />
</p>
      <p><strong>Q. What is CAP?</strong></p>
      <p>CAP is a initial security deposit that determines the maximum order that a person can make in a single day. For example, if you want to order food for Rs. 500, you need to have Rs. 500 or more in your CAP to place the order. You can order until your CAP is not empty. </p>
      <p>&nbsp;</p>
      <p><strong>Q. How can I increase or make the CAP?</strong></p>
      <p>To increase or make the CAP, you need to pay the CAP amount at 'HOT EGGS' (opposite 7ELEVEN restaurant/ beside Saleem Restaurant) between 16:00 to 21:00. You will get a receipt for the amount paid by you. </p>
      <p><br />
      </p>
      <p><strong>Q. Why am I  required to make the CAP?</strong><br />
        CAP is for the security of the restaurant owner. In case you  do not come to collect the order, the amount will be deducted from the CAP. Moreover the CAP will be the maximum limit up to which you  can order online after the first week. </p>
   	  <br>
      <p><strong>Q. Is the  CAP refundable?</strong><br />
        No the CAP is not refundable. However you can order from the CAP amount when such a facility is introduced.<br />
      </p>
        <br />
        <strong>Q. What if I do not create the CAP?</strong><br />
        If you do not create the CAP, you will  not be able to order food from the site.
        </p>
      </p>
      <p>&nbsp;</p>
      <p><br />
        <strong>Q. Is it possible to cancel the Order?</strong><br />
No it is not possible to cancel the order for  now. However in future provisions will be made for the same.</p>
      <p>&nbsp;</p>
      <p><strong>Q.What if I do not pick up the order? </strong></p>
      <p>The amount equal to the ordered amount will be deducted from your CAP. </p>
      <p><br />
        <br />
    </td>
  </tr>
</table>
<br /><br />
<br />
<br />
<br />
</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
<table width="1280" height="60" border="0" >
</table>
<table width="1280" height="80" border="0" >
  <tr>
  	 <td width="200" align="left" ><div id="footer"></div></td>
    <td width="70" align="left"  ><div id="footer"><a id="footer" href="../toc.php" style="text-decoration:none;">Terms And Conditions</a></div></td>
    <td width="30"><div id="footer" ><a id="footer" href="../aboutus.php" style="text-decoration:none;">  About Us</a></div></td>
    <td  width="20"><div id="footer"><a id="footer" href="../faq.php" style="text-decoration:none;">FAQ</div></td>
	<td  width="40"><div id="footer"><a  id="footer" href="../contact.php" style="text-decoration:none;">Contact Us</div></td>
	<td  width="40"><div id="footer"><a  id="footer" href="../privacypol.php" style="text-decoration:none;">Privacy Policy</div></td>
  </tr>
</table>


</html>
