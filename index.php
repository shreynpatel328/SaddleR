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

		
		if (isset($_COOKIE['remem']))
		{
			$_SESSION['LOGGEDIN'] = true;
			$_SESSION['REGNO'] = $_COOKIE['regNo'];
			header("Location: profile.php");
			exit;
	    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI</title>
<script src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/etc.css">
	<link rel="stylesheet" type="text/css" href="css/background.css">
	<link rel="stylesheet" type="text/css" href="css/forgotpassword.css">
	<link rel="stylesheet" type="text/css" href="css/formTitles.css">
	<link rel="stylesheet" type="text/css" href="css/tooltipForm.css">
	<link rel="stylesheet" type="text/css" href="css/signinsignup.css"> 
	<link rel="stylesheet" type="text/css" href="css/footer.css"> 
	<link href="css/demo_style_ind.css" rel="stylesheet" type="text/css">
<link href="css/smart_tab_ind.css" rel="stylesheet" type="text/css">
<link rel="icon" type="image/x-icon" href="images/favicon.ico" />


<!--[if IE]>
<script src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/background.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/formTitles_internet.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/signinsignup_internet.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/etc_internet.css" media="screen" />
<![endif]-->


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
	<script>
	$(function() {
    $( "#categories" ).accordion({
        collapsible: true,
        autoHeight: false,
        animated: false,
        active: -1,
        change: function(event, ui)
            {
            $("#categories").bind("accordionchange", function(event, ui)
                {

                if($('.my_accordion').parent('h3').hasClass('ui-state-active')) {

//$("#categories").animate({scrollTop: 0}, 100, 'swing', function(){}).stop;
//$("#categories").animate({scrollTop: $(ui.newHeader).offset().top
$('#categories').scrollTo($(ui.newHeader),0,{easing:'swing'});
//document.getElementById(ui.newHeader).scrollIntoView(true);
 //ui.newHeader.scrollIntoView(true);

                                                                                }
                });
             },
                                   });

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
						
	<script type="text/javascript">
				//formTitles
			$(document).ready(function() 
			{
				$('.username-label, .password-label, .regno-label, .forgot-label, .mob-label, .pass2-label, .email-label, .name1-label').animate({ opacity: "0.4" })
				.click(function()
			    {
						var thisFor	= $(this).attr('for');
						$('.'+thisFor).focus();
				});
					
				$('.username').focus(function() 
				{
						$('.username-label').animate({ opacity: "0" }, "fast");
						if($(this).val() == "username")
						$(this).val() == "";
				
				}).blur(function()
				 {
						if($(this).val() == "") 
						{
								$(this).val() == "username";
								$('.username-label').animate({ opacity: "0.4" }, "fast");
					    }
				  });
					
				$('.password').focus(function()
				 {
						
							$('.password-label').animate({ opacity: "0" }, "fast");
						
								if($(this).val() == "password") {
									$(this).val() == "";
								}
							}).blur(function() {
						
								if($(this).val() == "") {
									$(this).val() == "password";
									$('.password-label').animate({ opacity: "0.4" }, "fast");
								}
						});
						$('.regno').focus(function() {
						
							$('.regno-label').animate({ opacity: "0" }, "fast");
						
								if($(this).val() == "regno") {
									$(this).val() == "";
								}
							}).blur(function() {
						
								if($(this).val() == "") {
									$(this).val() == "regno";
									$('.regno-label').animate({ opacity: "0.4" }, "fast");
								}
						});
						$('.mob').focus(function() {
						
							$('.mob-label').animate({ opacity: "0" }, "fast");
						
								if($(this).val() == "mob") {
									$(this).val() == "";
								}
							}).blur(function() {
						
								if($(this).val() == "") {
									$(this).val() == "mob";
									$('.mob-label').animate({ opacity: "0.4" }, "fast");
								}
						});
						$('.forgot').focus(function() {
						
							$('.forgot-label').animate({ opacity: "0" }, "fast");
						
								if($(this).val() == "forgot") {
									$(this).val() == "";
								}
							}).blur(function() {
						
								if($(this).val() == "") {
									$(this).val() == "forgot";
									$('.forgot-label').animate({ opacity: "0.4" }, "fast");
								}
						});
						$('.email').focus(function() {
						
							$('.email-label').animate({ opacity: "0" }, "fast");
						
								if($(this).val() == "email") {
									$(this).val() == "";
								}
							}).blur(function() {
						
								if($(this).val() == "") {
									$(this).val() == "email";
									$('.email-label').animate({ opacity: "0.4" }, "fast");
								}
						});
						$('.name1').focus(function() {
						
							$('.name1-label').animate({ opacity: "0" }, "fast");
						
								if($(this).val() == "name1") {
									$(this).val() == "";
								}
							}).blur(function() {
						
								if($(this).val() == "") {
									$(this).val() == "name1";
									$('.name1-label').animate({ opacity: "0.4" }, "fast");
								}
						});
						$('.pass2').focus(function() {
						
							$('.pass2-label').animate({ opacity: "0" }, "fast");
						
		
								if($(this).val() == "pass2") {
									$(this).val() == "";
								}
							}).blur(function() {
						
								if($(this).val() == "") {
									$(this).val() == "pass2";
									$('.pass2-label').animate({ opacity: "0.4" }, "fast");
								}
						});
						
						
					});
					
	</script>
	<!-- the sign in sign up tab gets over -->
	
	<script type="text/javascript" language="javascript"> 
							<!--
							// javascript validation of signup
							function validateMyForm() 
							{ 
								/*var isValid = true;
								if ( document.signUpForm.name.value == "" ) 
								{ 
								alert ( "Please Enter your NAME...!!!" ); 
								isValid = false;
								} 
								else if ( document.signUpForm.regNo.value.length < 8 || document.signUpForm.regNo.value.length > 9) 
								{ 
										alert ( "Invalid Registration Number...!!!" ); 
										isValid = false;
								} 
								else if ( document.signUpForm.gender.value == "Gender") 
								{ 
										alert ( "Select your Gender lol...!!!"); 
										isValid = false;
								} 
								else if ( document.signUpForm.eMail.value == "" ) 
								{ 
										alert ( "Invalid e-mail Id...!!!"); 
										isValid = false;
								} 
								else if ( isNaN(document.signUpForm.mobile.value) || document.signUpForm.mobile.value.length < 10 || document.signUpForm.mobile.value.length > 10  ) 
								{ 
										alert ( "Invalid Mobile Number...!!!" ); 
										isValid = false;
								} 
								else if ( document.signUpForm.pass.value.length < 8 ) 
								{ 
										alert ( "Password should be greater than 7 characters...!!!" ); 
										isValid = false;
								} 
								else if ( document.signUpForm.regNo.value != (document.signUpForm.year.value.toString()+document.signUpForm.branch.value.toString()+document.signUpForm.no.value.toString()) and  document.signUpForm.regNo.value != (document.signUpForm.year.value.toString()+document.signUpForm.branch.value.toString()+"0"+document.signUpForm.no.value.toString())) 
								{ 
									alert ( "Registration numbers doesn't Match...!!!" ); 
								isValid = false;
								}
								*/
								return isValid;
							}
						//-->
	</script> 
						
	<script type="text/javascript" language="javascript"> 
							<!--
							// javascript validation of signin
							function validateMyFormSignIn() { 
								var isValid = true;
								//if ( document.signInForm.regNo.value.length < 8 || document.signInForm.regNo.value.length > 9 ) { 
								//alert ( "Please Enter valid Registration Number...!!!" ); 
								//isValid = false;
								//} else if ( document.signInForm.pass.value.length < 8 ) { 
								//		alert ( "Invalid Password...!!!" ); 
								//		isValid = false;
								//} 
								return isValid;
							}
							//-->
	</script>
				
	<script type="text/javascript" language="javascript"> 
							<!--
							// javascript validation of signup
							function validateMyFormSignUp() { 
								var isValid = true;
								/*if ( document.signUpForm.name.value.length == 0) { 
								alert ( "Please Enter Your Name...!!!" ); 
								isValid = false;
								}
								else if ( document.signUpForm.regNo.value.length < 8 || document.signUpForm.regNo.value.length > 9) 
								{ 
										alert ( "Invalid Registration Number...!!!" ); 
										isValid = false;
								}
								else if ( document.signUpForm.gender.value == "Gender") 
								{ 
										alert ( "Select your Gender lol...!!!"); 
										isValid = false;
								}
								else if ( document.signUpForm.eMail.value == "" ) 
								{ 
										alert ( "Invalid e-mail Id...!!!"); 
										isValid = false;
								} 
								else if ( isNaN(document.signUpForm.mobile.value) || document.signUpForm.mobile.value.length < 10 || document.signUpForm.mobile.value.length > 10  ) 
								{ 
										alert ( "Invalid Mobile Number...!!!" ); 
										isValid = false;
								} 
								else if ( document.signUpForm.pass.value.length < 8 ) 
								{ 
										alert ( "Password should be greater than 7 characters...!!!" ); 
										isValid = false;
								} 
								else if ( (document.signUpForm.regNo.value.toString().toUpperCase() != (document.signUpForm.year.value.toString()+document.signUpForm.branch.value.toString()+document.signUpForm.no.value.toString())) && (document.signUpForm.regNo.value.toString().toUpperCase() != (document.signUpForm.year.value.toString()+document.signUpForm.branch.value.toString()+"0"+document.signUpForm.no.value.toString()))) 
								{ 
										alert ("Registration number does not match...!!!"); 
										isValid = false;
								}
								else  
								{ 
										if ( document.signUpForm.year.value < 10)
										{
										if ( document.signUpForm.regNo.value.toUpperCase() != (document.signUpForm.year.value.toString()+document.signUpForm.branch.value.toString()+document.signUpForm.no.value.toString()))
										{
										alert ( "Reg. No. as it appears on your Id-Card...!!!" ); 
										isValid = false;
										}
										}
										else
										{
											 if (document.signUpForm.regNo.value.toUpperCase() != (document.signUpForm.year.value.toString()+document.signUpForm.branch.value.toString()+"0"+document.signUpForm.no.value.toString()))
											 {
											 alert ( "Reg. No. as it appears on your Id-Card...!!!" ); 
											isValid = false;
											}
										}
								}*/
								return isValid;
							}
							//-->
	</script>
						
	<script>
		
		// this is for the tabs used in the sign up .
		$(function() {
			// setup ul.tabs to work as tabs for each div directly under div.panes
			$("ul.tabs").tabs("div.panes > div");
		});
	</script>
	
	
		
	<script>
		/*   the function used is to call the  sign in sign upwhole thing*/
		$(function() { 
		$("#accordion1").tabs("#accordion1 div.pane", {tabs: 'h2', effect: 'slide', initialIndex: 1});
		});
	</script>
	
<script type="text/javascript">
   
    $(document).ready(function(){
    	// Smart Tab    	
  		$('#tabs').smartTab({autoProgress: true,stopOnFocus:true,transitionEffect:'slide'});

		});
</script>
<style type="text/css">
<!--
.style1 {
	font-family: "Lucida Handwriting";
	font-weight: bold;
	color: #990000;
}
.style3 {font-family: Forte; font-size: 18px;}
-->
</style>

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
		<img id="saddler" src="images/bifi.png" style="-moz-border-radius:10px;
	-khtml-border-radius:10px;
	-webkit-border-radius:10px;"  />	</td>
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
<table width="1280" border="0">
  <tr>
    <td width="547" align="center" valign="top">
	  <p>
	    <?php 
			if(@$_SESSION['VER']==true)
			{
				?>
	    <span style="color:#FFFFFF">Registration Number & Password does not match..!!!</span><br />
	    <?php
				$_SESSION['VER']=false;
			}
			if(@$_SESSION['EXST']==true)
			{
				?>
	    <span style="color:#FFFFFF">An Account With Registration No.: <b><?php echo $_SESSION['REGNO'];?></b> Already Exists..!!!<br />
	      <a href="complain.php" style="color:#FFFFFF; text-decoration:underline">If This is your Reg. no. avail it back here</a></span>
	    <?php
				$_SESSION['EXST']=false;
			}					
	?>
	        <!-- the div functions is for the the sign in sing up tab -->		
     <br />
	  <div id="accordion1">
		
			<h2 class="current">Sign In</h2>
			 
			<div class="pane" style="display:block">
			
							  <ul class="tabs">
							<li><a href="#" class="textstyle">Login</a></li>
							<li><a href="#" class="textstyle">Forgot Password</a></li>
							
						      </ul>
						
						<!-- tab "panes" -->
						<div class="panes">
							<div style="display: block;">
							<form name="signInForm" method="POST" action="hidden/login.php">
							<p>
								<label for="regNo"  class="username-label style6">Registration Number</label>
								<input type="text" name="regNo" title="Enter your Registration Number." class="username"/><br />
							</p>
							<p>
								<label for="pass" class="password-label style6">Password</label>
								<input type="password" name="pass" title="Enter Password." class="password"/>
							</p>
						
						  <p>
							<label>
								<input name="remem" type="checkbox" id="remem" title="Check to remain Signed in." value="true" />
								<span style="color:#000000">Stay signed in</span> </label>
		</p>
							<p><br />
							<a>
								<input name="login" type="submit" id="button" title="Click to LogIn." class="scItemButton scBtn" value="Sign In" onClick="javascript:return validateMyFormSignIn();"> 
		</a>
							</p>
		
		
						</form>
							</div>
							<div style="display: none;">
							
						<form name="forgotForm" method="POST" action="hidden/forgotpass.php">
		
							<p>
								<label for="eMail" class="forgot-label style6">Registration Number</label>
								<input type="text" name="regNo" title="Enter your Registration Number." class="forgot"/><br />
							</p>
		
							<p>
								<input name="login" type="submit" id="button" class="scItemButton scBtn" title="Click to Receive the password to your eMail-Id" value="Submit" onClick="javascript:return validateMyFormforgot();"> 
		
		
							</p>
		
						</form>
							</div>
							
						</div>
						
		
						
			
				<p>&nbsp;</p>
		</div>
			<h2>Sign Up</h2>
			
			<div class="pane">
			
			<form name="signUpForm" id="signUpForm" method="post" action="hidden/verification.php">
		 
		  <p>
				<label class="name1-label" for="name">Full Name</label>
				<input type="text" name="name" title="Enter your Full Name." class="name1"/><br />
			</p>
			 <label>
			   <select name="year" title="Enter Year Of Registration." size="1" class="NormalTextStyle">
				 <option>05</option>
				 <option>06</option>
				 <option>07</option>
				 <option>08</option>
				 <option>09</option>
				 <option>10</option>
				 <option selected="selected">11</option>
			   </select>
		      </label>
			  <?php
			  		include ( "include/data.php");	
					$connect=mysql_connect($host,$us,$ps);
					 $db='vitbifi';
					 mysql_select_db($db, $connect);
					 
					 $query="select * from branch where 1";
					 $result=mysql_query($query);
					 $rows=mysql_num_rows($result);
					 
					 $i=0;
					 while($i<$rows)
					 {
					 	$branch[$i]=MYSQL_RESULT($result,$i,"branch");
						$i++;
					 }
			  ?>
			   <label>
			   <select name="branch" size="1" title="Select Branch." class="NormalTextStyle">
				<?php
				$i=0;
				while($i<$rows)
				{
				?>
				 <option><?php echo $branch[$i];?></option>
				 <?php
				 $i++;
				 }
				 ?>
			   </select>
		      </label>
			   <label>
			   <select name="no" title="Select Registration Number." class="NormalTextStyle">
			   <?php
			   	$i=1001;
				while($i<1800)	
				{
				?>
				 <option><?php echo substr($i,1,4);?></option>
				 <?php
				 $i++;
				 }
				 
				?>
			   </select>
			   </label>
				<p>
				<label class="regno-label" for="regNo">Registration Number</label>
				<input type="text" name="regNo" title="Enter the Registration Number as it appears on your VIT Id-card." class="regno"/>
				<div id="blink">as it appears on your VIT Id-card</div>
			</p>
			 <label>
				<select name="gender" size="1" title="Select your Gender." class="NormalTextStyle">
				  <option selected>Gender</option>
				  <option>Male</option>
				  <option>Female</option>
				</select>
			  </label>
				 <p>
						<label class="email-label" for="eMail">eMail</label>
					  <input type="text" name="eMail" title="Enter your VIT Student eMail-Id." class="email"/><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@vit.ac.in
			</p>
			 <p>
						<label class="mob-label" for="mobile">Mobile</label>
					  <input name="mobile" type="text" title="Enter your Mobile Number." maxlength="10" class="mob"/>
			</p>
			 <p>
						<label class="pass2-label" for="pass">Password</label>
					  <input type="password" name="pass" title="Password length should be more than 7 character." class="pass2"/>
			</p>
			<p>	
			<br />
			
				By clicking Sign Up, you agree to our Terms and that you have read and understand our Data Use Policy. 
			<br />
			</p>
		  <p>
		  <br />
		  <a>
		  <input name="signup" type="submit" id="button" class="scItemButton scBtn"    title="Recheck the form & Submit to SIGN UP."  value="Submit" onClick="javascript:return validateMyFormSignUp();"> 
		  </a>
		  <br />
		  </p>
		  
		  </form>
		  </div>
	  </div>
		  
		
	
	
	</td>
    <td width="723" align="center"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	  <table width="495" height="49" border="0">
        <tr>
          <td width="489" align="center" valign="middle"><h2 class="style1"  style="font-size:24px">&nbsp;VITBIFI Is Online Food Portal To Cater To The Needs Of VITians</h2></td>
        </tr>
      </table>   
	  <p>&nbsp;</p>
	  <p class="style3">Let  the clickathon begin !!!</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <table border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td valign="top">

<!-- Tabs -->
<div id="tabs" class="stContainer">
  <ul>
    <li><a href="#tabs-1">
      <h2 style="font: 'Times New Roman', Times, serif; font-size:17px">HOW IT WORKS<br />
      </h2>
    </a></li>
    <li><a href="#tabs-2">
      <h2 style="font: 'Times New Roman', Times, serif; font-size:17px">ORDERS<br />
      </h2>
    </a></li>
    <li><a href="#tabs-3">
      <h2 style="font: 'Times New Roman', Times, serif; font-size:17px">SLIDE SHOW <br />
      </h2>
    </a></li>
  </ul>
  <div id="tabs-1">
    <p>1>  	Choose the item and select the delivery time & place.<br />
	  2>    Confirm the Order.<br />
      3>	Reach the selected delivery place at the delivery time.<br />
      4>	Don’t forget to bring your <strong>id-card</strong> along with you. <br />
      5>	Pay the amount and collect your order. (Cash On Delivery) <br />
	  6>	Plz. bring appropriate <strong>change</strong> if possible.
	  <br />
      7>	You need to make the <strong>CAP</strong> to order the food. <br />
      8>	You can make the CAP at ‘<strong>Hot Eggs</strong>’ between 16:00 to 21:00 and thus increase your order limit.</p>
    <p align="right"><a href="eat/faq.php">more</a>...</p>
    <p>&nbsp;</p>
  </div>
  <div id="tabs-2">
     <h3>MAX ORDERS</h3>
	<br>
	1> Veg Cheese Stick<br />
	2> Chapati <br />
	3> Cheese Omelette 
	<br>
	<br>
	<h3>FASTEST ORDERS</h3><br>
	1> 09.67 secs<br />
	2> 12.43 secs<br />
	3> 14.29 secs
  </div>
  <div id="tabs-3">
  <SCRIPT TYPE="text/javascript">
<!--

/*==================================================*
 $Id: slideshow.js,v 1.16 2003/10/14 12:39:00 pat Exp $
 Copyright 2000-2003 Patrick Fitzgerald
 http://slideshow.barelyfitz.com/

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *==================================================*/

// There are two objects defined in this file:
// "slide" - contains all the information for a single slide
// "slideshow" - consists of multiple slide objects and runs the slideshow

//==================================================
// slide object
//==================================================
function slide(src,link,text,target,attr) {
  // This is the constructor function for the slide object.
  // It is called automatically when you create a new slide object.
  // For example:
  // s = new slide();

  // Image URL
  this.src = src;

  // Link URL
  this.link = link;

  // Text to display
  this.text = text;

  // Name of the target window ("_blank")
  this.target = target;

  // Custom duration for the slide, in milliseconds.
  // This is an optional parameter.
  // this.timeout = 3000

  // Attributes for the target window:
  // width=n,height=n,resizable=yes or no,scrollbars=yes or no,
  // toolbar=yes or no,location=yes or no,directories=yes or no,
  // status=yes or no,menubar=yes or no,copyhistory=yes or no
  // Example: "width=200,height=300"
  this.attr = attr;

  // Create an image object for the slide
  if (document.images) {
    this.image = new Image();
  }

  // Flag to tell when load() has already been called
  this.loaded = false;

  //--------------------------------------------------
  this.load = function() {
    // This method loads the image for the slide

    if (!document.images) { return; }

    if (!this.loaded) {
      this.image.src = this.src;
      this.loaded = true;
    }
  }

  //--------------------------------------------------
  this.hotlink = function() {
    // This method jumps to the slide's link.
    // If a window was specified for the slide, then it opens a new window.

    var mywindow;

    // If this slide does not have a link, do nothing
    if (!this.link) return;

    // Open the link in a separate window?
    if (this.target) {

      // If window attributes are specified,
      // use them to open the new window
      if (this.attr) {
        mywindow = window.open(this.link, this.target, this.attr);
  
      } else {
        // If window attributes are not specified, do not use them
        // (this will copy the attributes from the originating window)
        mywindow = window.open(this.link, this.target);
      }

      // Pop the window to the front
      if (mywindow && mywindow.focus) mywindow.focus();

    } else {
      // Open the link in the current window
      location.href = this.link;
    }
  }
}

//==================================================
// slideshow object
//==================================================
function slideshow( slideshowname ) {
  // This is the constructor function for the slideshow object.
  // It is called automatically when you create a new object.
  // For example:
  // ss = new slideshow("ss");

  // Name of this object
  // (required if you want your slideshow to auto-play)
  // For example, "SLIDES1"
  this.name = slideshowname;

  // When we reach the last slide, should we loop around to start the
  // slideshow again?
  this.repeat = true;

  // Number of images to pre-fetch.
  // -1 = preload all images.
  //  0 = load each image is it is used.
  //  n = pre-fetch n images ahead of the current image.
  // I recommend preloading all images unless you have large
  // images, or a large amount of images.
  this.prefetch = -1;

  // IMAGE element on your HTML page.
  // For example, document.images.SLIDES1IMG
  this.image;

  // ID of a DIV element on your HTML page that will contain the text.
  // For example, "slides2text"
  // Note: after you set this variable, you should call
  // the update() method to update the slideshow display.
  this.textid;

  // TEXTAREA element on your HTML page.
  // For example, document.SLIDES1FORM.SLIDES1TEXT
  // This is a depracated method for displaying the text,
  // but you might want to supply it for older browsers.
  this.textarea;

  // Milliseconds to pause between slides.
  // Individual slides can override this.
  this.timeout = 3000;

  // Hook functions to be called before and after updating the slide
  // this.pre_update_hook = function() { }
  // this.post_update_hook = function() { }

  // These are private variables
  this.slides = new Array();
  this.current = 0;
  this.timeoutid = 0;

  //--------------------------------------------------
  // Public methods
  //--------------------------------------------------
  this.add_slide = function(slide) {
    // Add a slide to the slideshow.
    // For example:
    // SLIDES1.add_slide(new slide("s1.jpg", "link.html"))
  
    var i = this.slides.length;
  
    // Prefetch the slide image if necessary
    if (this.prefetch == -1) {
      slide.load();
    }

    this.slides[i] = slide;
  }

  //--------------------------------------------------
  this.play = function(timeout) {
    // This method implements the automatically running slideshow.
    // If you specify the "timeout" argument, then a new default
    // timeout will be set for the slideshow.
  
    // Make sure we're not already playing
    this.pause();
  
    // If the timeout argument was specified (optional)
    // then make it the new default
    if (timeout) {
      this.timeout = timeout;
    }
  
    // If the current slide has a custom timeout, use it;
    // otherwise use the default timeout
    if (typeof this.slides[ this.current ].timeout != 'undefined') {
      timeout = this.slides[ this.current ].timeout;
    } else {
      timeout = this.timeout;
    }

    // After the timeout, call this.loop()
    this.timeoutid = setTimeout( this.name + ".loop()", timeout);
  }

  //--------------------------------------------------
  this.pause = function() {
    // This method stops the slideshow if it is automatically running.
  
    if (this.timeoutid != 0) {

      clearTimeout(this.timeoutid);
      this.timeoutid = 0;

    }
  }

  //--------------------------------------------------
  this.update = function() {
    // This method updates the slideshow image on the page

    // Make sure the slideshow has been initialized correctly
    if (! this.valid_image()) { return; }
  
    // Call the pre-update hook function if one was specified
    if (typeof this.pre_update_hook == 'function') {
      this.pre_update_hook();
    }

    // Convenience variable for the current slide
    var slide = this.slides[ this.current ];

    // Determine if the browser supports filters
    var dofilter = false;
    if (this.image &&
        typeof this.image.filters != 'undefined' &&
        typeof this.image.filters[0] != 'undefined') {

      dofilter = true;

    }

    // Load the slide image if necessary
    slide.load();
  
    // Apply the filters for the image transition
    if (dofilter) {

      // If the user has specified a custom filter for this slide,
      // then set it now
      if (slide.filter &&
          this.image.style &&
          this.image.style.filter) {

        this.image.style.filter = slide.filter;

      }
      this.image.filters[0].Apply();
    }

    // Update the image.
    this.image.src = slide.image.src;

    // Play the image transition filters
    if (dofilter) {
      this.image.filters[0].Play();
    }

    // Update the text
    this.display_text();

    // Call the post-update hook function if one was specified
    if (typeof this.post_update_hook == 'function') {
      this.post_update_hook();
    }

    // Do we need to pre-fetch images?
    if (this.prefetch > 0) {

      var next, prev, count;

      // Pre-fetch the next slide image(s)
      next = this.current;
      prev = this.current;
      count = 0;
      do {

        // Get the next and previous slide number
        // Loop past the ends of the slideshow if necessary
        if (++next >= this.slides.length) next = 0;
        if (--prev < 0) prev = this.slides.length - 1;

        // Preload the slide image
        this.slides[next].load();
        this.slides[prev].load();

        // Keep going until we have fetched
        // the designated number of slides

      } while (++count < this.prefetch);
    }
  }

  //--------------------------------------------------
  this.goto_slide = function(n) {
    // This method jumpts to the slide number you specify.
    // If you use slide number -1, then it jumps to the last slide.
    // You can use this to make links that go to a specific slide,
    // or to go to the beginning or end of the slideshow.
    // Examples:
    // onClick="myslides.goto_slide(0)"
    // onClick="myslides.goto_slide(-1)"
    // onClick="myslides.goto_slide(5)"
  
    if (n == -1) {
      n = this.slides.length - 1;
    }
  
    if (n < this.slides.length && n >= 0) {
      this.current = n;
    }
  
    this.update();
  }


  //--------------------------------------------------
  this.goto_random_slide = function(include_current) {
    // Picks a random slide (other than the current slide) and
    // displays it.
    // If the include_current parameter is true,
    // then 
    // See also: shuffle()

    var i;

    // Make sure there is more than one slide
    if (this.slides.length > 1) {

      // Generate a random slide number,
      // but make sure it is not the current slide
      do {
        i = Math.floor(Math.random()*this.slides.length);
      } while (i == this.current);
 
      // Display the slide
      this.goto_slide(i);
    }
  }


  //--------------------------------------------------
  this.next = function() {
    // This method advances to the next slide.

    // Increment the image number
    if (this.current < this.slides.length - 1) {
      this.current++;
    } else if (this.repeat) {
      this.current = 0;
    }

    this.update();
  }


  //--------------------------------------------------
  this.previous = function() {
    // This method goes to the previous slide.
  
    // Decrement the image number
    if (this.current > 0) {
      this.current--;
    } else if (this.repeat) {
      this.current = this.slides.length - 1;
    }
  
    this.update();
  }


  //--------------------------------------------------
  this.shuffle = function() {
    // This method randomly shuffles the order of the slides.

    var i, i2, slides_copy, slides_randomized;

    // Create a copy of the array containing the slides
    // in sequential order
    slides_copy = new Array();
    for (i = 0; i < this.slides.length; i++) {
      slides_copy[i] = this.slides[i];
    }

    // Create a new array to contain the slides in random order
    slides_randomized = new Array();

    // To populate the new array of slides in random order,
    // loop through the existing slides, picking a random
    // slide, removing it from the ordered list and adding it to
    // the random list.

    do {

      // Pick a random slide from those that remain
      i = Math.floor(Math.random()*slides_copy.length);

      // Add the slide to the end of the randomized array
      slides_randomized[ slides_randomized.length ] =
        slides_copy[i];

      // Remove the slide from the sequential array,
      // so it cannot be chosen again
      for (i2 = i + 1; i2 < slides_copy.length; i2++) {
        slides_copy[i2 - 1] = slides_copy[i2];
      }
      slides_copy.length--;

      // Keep going until we have removed all the slides

    } while (slides_copy.length);

    // Now set the slides to the randomized array
    this.slides = slides_randomized;
  }


  //--------------------------------------------------
  this.get_text = function() {
    // This method returns the text of the current slide
  
    return(this.slides[ this.current ].text);
  }


  //--------------------------------------------------
  this.get_all_text = function(before_slide, after_slide) {
    // Return the text for all of the slides.
    // For the text of each slide, add "before_slide" in front of the
    // text, and "after_slide" after the text.
    // For example:
    // document.write("<ul>");
    // document.write(s.get_all_text("<li>","\n"));
    // document.write("<\/ul>");
  
    all_text = "";
  
    // Loop through all the slides in the slideshow
    for (i=0; i < this.slides.length; i++) {
  
      slide = this.slides[i];
    
      if (slide.text) {
        all_text += before_slide + slide.text + after_slide;
      }
  
    }
  
    return(all_text);
  }


  //--------------------------------------------------
  this.display_text = function(text) {
    // Display the text for the current slide
  
    // If the "text" arg was not supplied (usually it isn't),
    // get the text from the slideshow
    if (!text) {
      text = this.slides[ this.current ].text;
    }
  
    // If a textarea has been specified,
    // then change the text displayed in it
    if (this.textarea && typeof this.textarea.value != 'undefined') {
      this.textarea.value = text;
    }

    // If a text id has been specified,
    // then change the contents of the HTML element
    if (this.textid) {

      r = this.getElementById(this.textid);
      if (!r) { return false; }
      if (typeof r.innerHTML == 'undefined') { return false; }

      // Update the text
      r.innerHTML = text;
    }
  }


  //--------------------------------------------------
  this.hotlink = function() {
    // This method calls the hotlink() method for the current slide.
  
    this.slides[ this.current ].hotlink();
  }


  //--------------------------------------------------
  this.save_position = function(cookiename) {
    // Saves the position of the slideshow in a cookie,
    // so when you return to this page, the position in the slideshow
    // won't be lost.
  
    if (!cookiename) {
      cookiename = this.name + '_slideshow';
    }
  
    document.cookie = cookiename + '=' + this.current;
  }


  //--------------------------------------------------
  this.restore_position = function(cookiename) {
  // If you previously called slideshow_save_position(),
  // returns the slideshow to the previous state.
  
    //Get cookie code by Shelley Powers
  
    if (!cookiename) {
      cookiename = this.name + '_slideshow';
    }
  
    var search = cookiename + "=";
  
    if (document.cookie.length > 0) {
      offset = document.cookie.indexOf(search);
      // if cookie exists
      if (offset != -1) { 
        offset += search.length;
        // set index of beginning of value
        end = document.cookie.indexOf(";", offset);
        // set index of end of cookie value
        if (end == -1) end = document.cookie.length;
        this.current = parseInt(unescape(document.cookie.substring(offset, end)));
        }
     }
  }


  //--------------------------------------------------
  this.noscript = function() {
    // This method is not for use as part of your slideshow,
    // but you can call it to get a plain HTML version of the slideshow
    // images and text.
    // You should copy the HTML and put it within a NOSCRIPT element, to
    // give non-javascript browsers access to your slideshow information.
    // This also ensures that your slideshow text and images are indexed
    // by search engines.
  
    $html = "\n";
  
    // Loop through all the slides in the slideshow
    for (i=0; i < this.slides.length; i++) {
  
      slide = this.slides[i];
  
      $html += '<P>';
  
      if (slide.link) {
        $html += '<a href="' + slide.link + '">';
      }
  
      $html += '<img src="' + slide.src + '" ALT="slideshow image">';
  
      if (slide.link) {
        $html += "<\/a>";
      }
  
      if (slide.text) {
        $html += "<BR>\n" + slide.text;
      }
  
      $html += "<\/P>" + "\n\n";
    }
  
    // Make the HTML browser-safe
    $html = $html.replace(/\&/g, "&amp;" );
    $html = $html.replace(/</g, "&lt;" );
    $html = $html.replace(/>/g, "&gt;" );
  
    return('<pre>' + $html + '</pre>');
  }


  //==================================================
  // Private methods
  //==================================================

  //--------------------------------------------------
  this.loop = function() {
    // This method is for internal use only.
    // This method gets called automatically by a JavaScript timeout.
    // It advances to the next slide, then sets the next timeout.
    // If the next slide image has not completed loading yet,
    // then do not advance to the next slide yet.

    // Make sure the next slide image has finished loading
    if (this.current < this.slides.length - 1) {
      next_slide = this.slides[this.current + 1];
      if (next_slide.image.complete == null || next_slide.image.complete) {
        this.next();
      }
    } else { // we're at the last slide
      this.next();
    }
    
    // Keep playing the slideshow
    this.play( );
  }


  //--------------------------------------------------
  this.valid_image = function() {
    // Returns 1 if a valid image has been set for the slideshow
  
    if (!this.image)
    {
      return false;
    }
    else {
      return true;
    }
  }

  //--------------------------------------------------
  this.getElementById = function(element_id) {
    // This method returns the element corresponding to the id

    if (document.getElementById) {
      return document.getElementById(element_id);
    }
    else if (document.all) {
      return document.all[element_id];
    }
    else if (document.layers) {
      return document.layers[element_id];
    } else {
      return undefined;
    }
  }
  

  //==================================================
  // Deprecated methods
  // I don't recommend the use of the following methods,
  // but they are included for backward compatibility.
  // You can delete them if you don't need them.
  //==================================================

  //--------------------------------------------------
  this.set_image = function(imageobject) {
    // This method is deprecated; you should use
    // the following code instead:
    // s.image = document.images.myimagename;
    // s.update();

    if (!document.images)
      return;
    this.image = imageobject;
  }

  //--------------------------------------------------
  this.set_textarea = function(textareaobject) {
    // This method is deprecated; you should use
    // the following code instead:
    // s.textarea = document.form.textareaname;
    // s.update();

    this.textarea = textareaobject;
    this.display_text();
  }

  //--------------------------------------------------
  this.set_textid = function(textidstr) {
    // This method is deprecated; you should use
    // the following code instead:
    // s.textid = "mytextid";
    // s.update();

    this.textid = textidstr;
    this.display_text();
  }
}

//-->
</SCRIPT>

<SCRIPT TYPE="text/javascript">
<!--

SLIDES = new slideshow("SLIDES");
SLIDES.timeout = 10000;
SLIDES.prefetch = -1;
SLIDES.repeat = true;

s = new slide();
s.src =  "https://www.vitbifi.com/images/slide/1.png";
s.text = unescape("That%u2019s%20what%20B.%20Tech%2C%20M.%20Tech%2C%20PHD%20do%20to%20us%21%21");
s.link = "https://www.vitbifi.com/";
s.target = "";
s.attr = "";
s.filter = "";
SLIDES.add_slide(s);

s = new slide();
s.src =  "https://www.vitbifi.com/images/slide/2.png";
s.text = unescape("That%u2019s%20what%20mess%20food%2C%20late%20orders%20and%20ignorant%20waiters%20at%20restaurants%20do%20to%20us%21%21");
s.link = "https://www.vitbifi.com/";
s.target = "";
s.attr = "";
s.filter = "";
SLIDES.add_slide(s);

s = new slide();
s.src =  "https://www.vitbifi.com/images/slide/3.png";
s.text = unescape("That%u2019s%20what%20VIT%20BIFI%20does%20to%20us%u2026%u2026..just%20click%20and%20savour%20the%20taste%20without%20the%20wait%21");
s.link = "https://www.vitbifi.com/";
s.target = "";
s.attr = "";
s.filter = "";
SLIDES.add_slide(s);



if (false) SLIDES.shuffle();

//-->
</SCRIPT>
<P>
<STRONG><A HREF="javascript:SLIDES.previous()">&lt;previous</A></STRONG>

<STRONG><A HREF="javascript:SLIDES.next()">next&gt;</A></STRONG>






<P>
<DIV ID="SLIDESTEXT">

<SCRIPT type="text/javascript">
<!--
// For browsers that cannot change the HTML on the page,
// display all of the text from the slideshow.
// I place this within the DIV, so browers won't see it
// if they can change the DIV.
nodivtext = SLIDES.get_all_text("<li>", "<p>\n");
if (nodivtext) {
  document.write("<UL>\n" + nodivtext + "\n</UL>");
}
//-->
</SCRIPT>

</DIV>

<P>
<a href="javascript:SLIDES.hotlink()"><img name="SLIDESIMG"
src="https://www.vitbifi.com/images/slide/1.png" STYLE="filter:progid:DXImageTransform.Microsoft.Fade()" BORDER=0 alt="Slideshow image"></A>

<SCRIPT type="text/javascript">
<!--
if (document.images) {
  SLIDES.image = document.images.SLIDESIMG;
  SLIDES.textid = "SLIDESTEXT";
  SLIDES.update();
  SLIDES.play();
}
//-->
</SCRIPT>

<BR CLEAR=all>

<NOSCRIPT>
<HR>
Since your web browser does not support JavaScript,
here is a non-JavaScript version of the image slideshow:
<P>
<P>
<IMG SRC="https://www.vitbifi.com/images/slide/1.png" ALT="slideshow image"><BR>
<p>That’s what B. Tech, M. Tech, PHD do to us!!</p>
</P>
<HR>
<P>
<IMG SRC="https://www.vitbifi.com/images/slide/2.png" ALT="slideshow image"><BR>
That’s what mess food, late orders and ignorant waiters at restaurants do to us!!
</P>
<HR>
<P>
<IMG SRC="https://www.vitbifi.com/images/slide/3.png" ALT="slideshow image"><BR>
That’s what VIT BIFI does to us……..just click and savour the taste without the wait!
</P>
<HR>

</NOSCRIPT>

  </div>
</div></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>
      <p align="center">&nbsp;</p>
    </p></td>
  </tr>
</table>
</body>
<table width="1280" height="60" border="0" >
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      