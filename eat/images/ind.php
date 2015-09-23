<?php
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
								var isValid = true;
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
								return isValid;
							}
						//-->
	</script> 
						
	<script type="text/javascript" language="javascript"> 
							<!--
							// javascript validation of signin
							function validateMyFormSignIn() { 
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
							//-->
	</script>
				
	<script type="text/javascript" language="javascript"> 
							<!--
							// javascript validation of signup
							function validateMyFormSignUp() { 
								alert ( "FUCK SIGN UP" );
								var isValid = true;
								if ( document.signUpForm.name.value.length == 0) { 
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
								else if ( document.signUpForm.regNo.value != (document.signUpForm.year.value.toString()+document.signUpForm.branch.value.toString()+document.signUpForm.no.value.toString()) && document.signUpForm.regNo.value != (document.signUpForm.year.value.toString()+document.signUpForm.branch.value.toString()+"0"+document.signUpForm.no.value.toString())) 
								{ 
										alert ( "Registration numbers doesn't Match...!!!" ); 
										isValid = false;
								}
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
					Consectetur adipiscing elit. Praesent bibendum eros ac nulla. Integer vel lacus ac neque viverra.		</p>
			</div>
			
			<img src="images/travel.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Cras diam. Donec dolor lacus, vestibulum at, varius in, mollis id, dolor. Aliquam erat volutpat.		</p>
			</div>
		
			<img src="images/compete.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Non lectus lacinia egestas. Nulla hendrerit, felis quis elementum viverra, purus felis egestas magna.		</p>
			</div>	
		
		</div>
	</td>
    <td width="444">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1280" border="0">
  <tr>
    <td width="547" align="center">
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
				<span style="color:#FFFFFF">An Account With Registration No.: <b><?php echo $_SESSION['REGNO'];?></b> Already Exists..!!!<br /><a href="complain.php" style="color:#FFFFFF; text-decoration:underline">If This is your Reg. no. avail it back here</a></span><br />
				<?php
				$_SESSION['EXST']=false;
			}					
	?>
			<!-- the div functions is for the the sign in sing up tab -->		
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
							
						<form id="forgot" name="forgot" class="account">
		
							<p>
								<label for="eMail" class="forgot-label style6">eMail</label>
								<input type="text" name="eMail" title="Enter the Registered eMail-Id." class="forgot"/><br />
							</p>
		
							<p>
								<input name="login" type="submit" id="button" class="scItemButton scBtn" title="Click to Receive the password to your eMail-Id" value="Submit" onClick="javascript:return validateMyFormSignIn();"> 
		
		
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
				 <option>08</option>
				 <option>09</option>
				 <option>10</option>
				 <option>11</option>
			   </select>
		      </label>
			   <label>
			   <select name="branch" size="1" title="Select Branch." class="NormalTextStyle">
				 <option>BCE</option>
				 <option>BEC</option>
				 <option>BME</option>
				 <option>BIT</option>
				 <option>BEI</option>
				 <option>BEE</option>
				 <option>BST</option>
				 <option>MSC</option>
			   </select>
		      </label>
			   <label>
			   <select name="no" title="Select Registration Number." class="NormalTextStyle">
				 <option>328</option>
				 <option>323</option>
				 <option>234</option>
				 <option>243</option>
				 <option>354</option>
				 <option>654</option>
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
    <td width="723">
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <table border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td height="450px" valign="top">

<!-- Tabs -->
  		<div id="tabs" class="stContainer">
  			<ul>
  				<li><a href="#tabs-1">
                
                <h2 style="font: 'Times New Roman', Times, serif; font-size:22px">Eat<br />
                </h2>

            </a></li>
  				<li><a href="#tabs-2">
               
                <h2 style="font: 'Times New Roman', Times, serif; font-size:22px">Coming Soon<br />
                </h2>
            </a></li>
  				<li><a href="#tabs-3">
                

                <h2 style="font: 'Times New Roman', Times, serif; font-size:22px">Coming Soon<br />
                </h2>
             </a></li>
  				
  			</ul>
			
			
			
  			<div id="tabs-1">
			<h2>Tab 3 Content</h2>	
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            </p>
                         				          
            
			  
		
        </div>
  			<div id="tabs-2">
            <h2> UNDER CONSTRUCTION	</h2>	
            
                     
        </div>                      
  			<div id="tabs-3">
            <h2>UNDER CONSTRUCTION</h2>	
           
                         				          
        </div>
  			
  		</div>
	
</td></tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>&nbsp;</td>
  </tr>
</table>
</body>
<br />

<table width="1280" height="40" border="0">
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
