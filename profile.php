<?php
error_reporting(0); 
	    /*session_start();
	   
	    if (!isset($_SESSION['SESSION'])) 
	   		require ( "/include/session_init.php");
	   
	    if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: https://www.vitbifi.com");
			exit;
	    }
		*/
		
		$regNo=$_SESSION['REGNO'];
		
		$_SESSION['LOGGEDIN']=true;
		
		//@session_register('LOGGEDIN','REGNO');
		
		//CONNECTING TO THE DATABASE USER_DATA
				
	
		include ( "include/data.php");	
		$connect=mysql_connect($host,$us,$ps);
			
		if($connect)
		{
			$db='vitbifi';
			mysql_select_db($db);
			
			$query="select points,name,curCap from user_details where regNo='$regNo'";
			$result=mysql_query($query);
			$points =  MYSQL_RESULT($result,0,"points");
			$name =    MYSQL_RESULT($result,0,"name");
			$curCap =    MYSQL_RESULT($result,0,"curCap");
			

			$queryforreset="select * from reset where 1";
			$resultforreset=mysql_query($queryforreset);
			$qtyDate =  MYSQL_RESULT($resultforreset,0,"qtyDate");
			$timezone = "Asia/Calcutta";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$curQtyDate=date("Y-m-d");
			if($curQtyDate!=$qtyDate)
			{
				
				
				$queryinsert="update reset set qtyDate = '$curQtyDate' where 1";
				$resultinsert=mysql_query($queryinsert);
				
				$query="update quantity set qty = qtyLimit where 1";
				$result=mysql_query($query);
			}
			
			$query="select capDate from user_details where regNo='$regNo'";
			$result=mysql_query($query);
			$capDate =  MYSQL_RESULT($result,0,"capDate");
			if($curQtyDate!=$capDate)
			{
				$queryinsert="update user_details set capDate = '$curQtyDate', curCap = cap where regNo='$regNo'";
				$resultinsert=mysql_query($queryinsert);
			}
		
		}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI-Profile</title>
<script src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/etc.css">
	<link rel="stylesheet" type="text/css" media="screen, projection"  href="css/tweet.css">
	<link rel="stylesheet" type="text/css" href="css/background1.css">
	<link rel="stylesheet" type="text/css" href="css/top.css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../eat/css/style_smartcart.css" />
	<link rel="stylesheet" type="text/css" href="css/footer.css"> 
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
/*   the function used is to call the  sign in sign upwhole thing*/
$(function() { 

$("#accordion1").tabs("#accordion1 div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
});
</script>
<script src="jquery/jquery.tipsy.js" type="text/javascript"></script>
<script type='text/javascript'>
    $(function() {
	  $('#forgot_username_link').tipsy({gravity: 'w'});   
    });
  </script>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {
	font-size: larger;
	font-weight: bold;
}
.style3 {
	color: #990000;
	font-size: 18;
}
.style4 {color: #99FF00}
.style5 {color: #339933}
.style6 {color: #000000}
.style7 {color: #990000}
.style8 {
	font-size: 24px;
	font-weight: bold;
}
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
<table width="1280" height="250" border="0">
    <tr>
      <td width="368" height="111" style="font-size:16px;">Welcome<strong> <?php echo $name; ?>&nbsp;,</strong><br><br>You have a current CAP of Rs. <Strong><?php echo $curCap;?></strong>.</td>
      <td width="440" style="font-size:16px;">
	    <p>
	    <?php
		if($_SESSION['CARTED'])
		{	
			$_SESSION['CARTED']=false;
			?>
		<span class="style3">Your order has been <span style="text-decoration:blink; class="style2"><span class="style8">confirmed</span>.</span> Bring your <strong>VIT ID-Card</strong> & appropriate <strong>change</strong>.</span></p>
	    <p><br>
        </p>
	    <p><span class="style4"><span class="style5"><em>Delivery point Details</em>:</span></span></p>
	    <p class="style5"> <span class="style6">Main Gate</span> - left side of the Main Gate, near bus stop.</p>
	    <p class="style5"><span class="style6">Hostel Gate</span> - gate 
        near small subway.</p>
	    <p class="style5"><span class="style6">Gate 3</span> - gate near Hexagon/SMV.</p>
	    <p class="style5"><span class="style6">AllMart Gate</span> - gate near AllMart.</p>
	    <p>*<span class="style7">Delivery will be <strong>outside the gates</strong></span>.

	      <?php
		} 
	   ?>
  &nbsp;</p></td>
      <td width="458" rowspan="4" align="center" valign="baseline">
        <div id="accordion1">
          
          
          <h2 class="current" style="font:Arial, Helvetica, sans-serif medium; font-size: 22px " >Top Restaurants</h2>
	  
	
	  
	<div class="pane" style="display:block">
	  <!-- <table width="221" border="0" style="border-left:thin; border-left-color: #999999; border-left-style:solid; border-left-width:thin; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-top-color:#99999; border-top-style:solid; border-top-width:thin;">
	 <tr>
		<td width="94" align="center" style="font:Arial, Helvetica, sans-serif medium; font-size: 26px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#99999"> Name</td>
	  </tr>	
		<?php
				/*	include ( "include/data.php");	
					$connect=mysql_connect($host,$us,$ps);
					 
						$db='vitbifi';
			
					mysql_select_db($db, $connect);
		
					$sqlQuery = "select * from restaurant_details order by rating desc";
					$result = MYSQL_QUERY($sqlQuery);
					
					$sqlQuery4items = "select * from menu m,restaurant_details r where r.id=m.id  order by m.rating desc";
					$result4items = MYSQL_QUERY($sqlQuery4items);
					
					
					
					
					for($i=0;$i<3;$i++)
					{	
							
							$thisname = MYSQL_RESULT($result,$i,"name");
							
						
							
					*/		?>
							
							  <tr>
								<td colspan="2" align="left" style="font:Arial, Helvetica, sans-serif medium; font-size: 22px">&nbsp; <?php //echo $i+1;?>  .    <?php //echo $thisname;?>&nbsp;</td>
							  </tr>
							
							<?php
							
	//				}
		?>			
	</table>
		 -->		
	  
	  <p style="font-size:16px;">Coming Soon</p>
	  <p>&nbsp;</p>
	  
	<p>&nbsp;</p>
	  </div>
	   <h2 style="font:Arial, Helvetica, sans-serif medium; font-size: 22px ">Top Items</h2>
	   <div class="pane">  
	     <p style="font-size:16px;">Coming Soon</p> 
	   <!--
	 <table width="200" border="0" style="border-left:thin; border-left-color: #999999; border-left-style:solid; border-left-width:thin; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-top-color:#99999; border-top-style:solid; border-top-width:thin;">
      <tr>
        <td style="font:Arial, Helvetica, sans-serif medium; font-size: 26px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#99999">Name</td>
        <td style="font:Arial, Helvetica, sans-serif medium; font-size: 26px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#99999">Item</td>
        
      </tr>
	  <?php 
	/*  for($i=0;$i<3;$i++)
					{	
						
								
							$thisname4items = MYSQL_RESULT($result4items,$i,"name");
							$thisitem = MYSQL_RESULT($result4items,$i,"item");
						
		*/					
							?>
      <tr>
        <td style="font:Arial, Helvetica, sans-serif medium; font-size: 22px">&nbsp;<?php //echo $i+1;?>  .    <?php // echo $thisname4items;?></td>
        <td style="font:Arial, Helvetica, sans-serif medium; font-size: 22px">&nbsp;<?php //echo $thisitem;?></td>
       
      </tr>
	  <?php
							
				//	}
		?>
    </table>
	 -->
	     </div>
	   <h2 style="font:Arial, Helvetica, sans-serif medium; font-size: 22px ">Most Ordered</h2>
	   <div class="pane">
	     <p style="font-size:16px;">Coming Soon</p>     </div>
    </div>         </td>
    </tr>
  <tr>
    <td height="130" colspan="2">
	<?php
	
	$queryforver="select verified from user_details where regNo='$regNo'";
	$resultforver=mysql_query($queryforver);
	$veri =  MYSQL_RESULT($resultforver,0,"verified");
	if($veri==0)
	{
	?>
	<p style="text-decoration:blink; color:#FF0000">
	<?php 
echo "You have NOT VERIFIED your account.<br>In order to order Food online please Verify your account by clicking on the link sent to your VIT Gmail Id.<br><a href=\"hidden/verMail.php\">Click here to receive a verification mail to your regidtered eMail account.<a/>";
	}
	?>
	<br><br>
      </p>
	<p>*There will be <span class="style2">no messages or calls</span> from VITBIFI once you confirm your order,</p>
	<p>you are expected to be at the delivery point at right time.  <br>
	You will receive a SMS after confirmation of the order if your number is not subscribed to DND service.</p>
	<p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="70" colspan="2" align="right" valign="middle"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To Order The food Please Click The Button Below</p>
      <br />
    <p>
	<a href="eat/eat.php">
	
	
    <input name="submit" type="submit" class="scBtn" style="width:200px;height:35px;float:right;" value="Order Food"/></a>    </p></td>
  </tr>
  <tr>
    <td height="101" colspan="2"><table width="800">
      <tr align="right">
        <td> <p><span class="style1">Since the site is in Beta Stage, there might be some glitches. <br />
          Feel free to contact: suggestions@vitbifi.com</span>&nbsp;</p>
          <p>&nbsp;</p>
          <p align="left">*Unexpectedly, orders at <strong>4 PM</strong> are astonishing, we'll look forward to increase the quantity ! </p>
          </p>          <p>&nbsp; </p></td>
      </tr>
    </table></td>
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
