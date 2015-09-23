<?php
error_reporting(0);
 		/*	session_start();
			if (!isset($_SESSION['SESSION'])) 
				require ( "../include/session_init.php");
				
			if ($_SESSION['LOGGEDIN'] != true)
			{
				header("Location: https://www.vitbifi.com");
				exit;
			}
			
			if(empty($_REQUEST['product_list']))
			{
				header("Location: https://www.vitbifi.com");
				exit;
			}
					
*/				
			$rest=$_SESSION['m']['rest'];
			
			$alert=0;
			
			function get_time_difference($time1, $time2) 
			{
				$time1 = strtotime("1980-01-01 $time1");
				$time2 = strtotime("1980-01-01 $time2");
				
				if ($time2 < $time1) 
				{
					$time2 += 86400;
				}
				
				return date("h:i  A", strtotime("1980-01-01 00:00:00") + ($time1 - $time2));
			}
			
			function get_time_sum($time1, $time2) 
			{
				$time1 = strtotime("1980-01-01 $time1");
				$time2 = strtotime("1980-01-01 $time2");
				
				return date("h:i  A", strtotime("1980-01-01 00:00:00") + ($time1 + $time2));
			}
			
			function time_to_int($time1) 
			{
				$time1 = strtotime("1980-01-01 $time1");

				return date("hi", strtotime("1980-01-01 00:00:00") + $time1);
			}
			
			
			include ( "../include/data.php");	
					$connect=mysql_connect($host,$us,$ps);
					if($connect)
		{
					 $db='vitbifi';
					mysql_select_db($db);
					}
						
			
									
			$regNo=$_SESSION[REGNO];
			$query="select * from user_details where regNo='$regNo'";
			$result=mysql_query($query);
			$cap=MYSQL_RESULT($result,0,"curCap");	
			$verified=MYSQL_RESULT($result,0,"verified");
						
			
			$sqlQuery4menu="select DISTINCT m.menuId as menuId, m.item as item, m.price as price from menu m where m.id='$rest'";
			$result4menu = MYSQL_QUERY($sqlQuery4menu);
			$numberOfRows4menu= MYSQL_NUM_ROWS($result4menu);
			
			$sqlQuery4avail="select DISTINCT * from delivery_time";
			$result4avail = MYSQL_QUERY($sqlQuery4avail);
			$numberOfRows4avail= MYSQL_NUM_ROWS($result4avail); 
			
			$sqlQuery4qty="select DISTINCT * from quantity;";
			$result4qty = MYSQL_QUERY($sqlQuery4qty);
			$numberOfRows4qty= MYSQL_NUM_ROWS($result4qty);
			
			$sqlQuery4time="select DISTINCT * from order_time;";
			$result4time = MYSQL_QUERY($sqlQuery4time);
			$numberOfRows4time= MYSQL_NUM_ROWS($result4time);
			
			$i=0;  
			while($i < $numberOfRows4qty)
			{
				$menuQty [$i]['link']=MYSQL_RESULT($result4qty,$i,"link");
				$menuQty [$i]['qty']=MYSQL_RESULT($result4qty,$i,"qty");
							
				$i++;
			}
			
			$i=0;  
			while($i < $numberOfRows4time)
			{
				$menuTime [$i]['link']=MYSQL_RESULT($result4time,$i,"link");
				$menuTime [$i]['time']=MYSQL_RESULT($result4time,$i,"time");
							
				$i++;
			}
			
			$i=0;  
			while($i < $numberOfRows4avail)
			{
				$menuAvail [$i]['menuId']=MYSQL_RESULT($result4avail,$i,"menuId");
				$menuAvail [$i]['deliveryTime']=MYSQL_RESULT($result4avail,$i,"time");
				$menuAvail [$i]['deliveryTime1']=$menuAvail [$i]['deliveryTime'];
				$menuAvail [$i]['deliveryTime']=get_time_difference($menuAvail [$i]['deliveryTime'],"00:00:00");
				$menuAvail [$i]['link']=MYSQL_RESULT($result4avail,$i,"link");
				$menuAvail [$i]['deliveryPoint']=MYSQL_RESULT($result4avail,$i,"deliveryPoint");
				
				$i++;
			}
			
			
			$i=0;  
			while($i < $numberOfRows4menu)
			{
				$menu [$i]['menuId']=MYSQL_RESULT($result4menu,$i,"menuId");
				$menu [$i]['item']=MYSQL_RESULT($result4menu,$i,"item");
				$menu [$i]['price']=MYSQL_RESULT($result4menu,$i,"price");
				$i++;
			}
			
			if(!$verified)
			{
				$alert=1;
				?>
					<script type="text/javascript" language="javascript"> 
						alert("You are Not a verified user, verify by opening the link sent to your registered eMail. \n If you have not received the mail yet, wait for 15-20 mins. ");
						setTimeout("top.location.href = 'menu.php?rest=<?php echo $rest; ?>'",0000);
					</script>
				<?php
			}
		
						
			// get the selected product array
			// here we get the selected product_id/quantity combination asa an array
			$product_list = @$_REQUEST['product_list'];
			if(!empty($product_list)) 
			{
				 $sub_total = 0;
					foreach($product_list as $product)
					{
					  $chunks = explode('|',$product);
					  $product_id = $chunks[0];
					  $product_qty = $chunks[1];
					  $product_time = $chunks[2];
					  $product_dp = $chunks[3];
					  $j=0;
					  
					  while($j < $numberOfRows4menu)
					  {
						   if($product_id == $menu [$j]['menuId'])
							break;
							
						$j++;	
					  }
					  $product_name = $menu[$j]['item'];
	  				  $k=$j;
					 
					  $j=0;
					  while($j < $numberOfRows4avail)
					  {
					       if($product_id == $menuAvail [$j]['menuId'] && $product_time == $menuAvail [$j]['deliveryTime'] && $product_dp == $menuAvail [$j]['deliveryPoint'])
						   	break;
							
						$j++;	
					  }
					  if($alert==0 && $j==$numberOfRows4avail)
					  {
					  	$alert=1;
					  	?>
							<script type="text/javascript" language="javascript"> 
								alert("Delivery Time & Delivery Point does not match for <?php echo substr($product_time,0,5);?> <?php echo $product_name;?> .\n Refer to the TABLE beside add to cart button & Re-make your CART.");
								setTimeout("top.location.href = 'menu.php?rest=<?php echo $rest; ?>'",0000);
							</script>
						<?php
					  }
					  $l=$j;
					  
					  $j=0;
					  while($j < $numberOfRows4time)
					  {
					       if($menuTime [$j]['link']==$menuAvail [$l]['link'])
						   	break;
							
						$j++;	
					  }
					  $tLink=$j;
					  
					  $timezone = "Asia/Calcutta";
						if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
						$curTime=date("H:i:s");
					  
						$openTime = '10:00:00';
						
						list($fh, $fm, $fs) = explode(':', $curTime);
						list($sh, $sm, $ss) = explode(':', $openTime);
						
						$fs += ($fm * 60) + ($fh * 3600);
						$ss += ($sm * 60) + ($sh * 3600);
						
					  if($alert==0 && $ss>$fs)
					  {
					  	$alert=1;
					  	?>
							<script type="text/javascript" language="javascript"> 
								alert("Sorry!!! You cannot order before 10:00 AM.");
								setTimeout("top.location.href = 'menu.php?rest=<?php echo $rest; ?>'",0000);
							</script>
						<?php
					  }
					  
					  
					  if($alert==0 && $curTime>$menuTime [$tLink]['time'])
					  {
					  	$alert=1;
					  	?>
							<script type="text/javascript" language="javascript"> 
								alert("Sorry!!! You cannot order <?php echo $product_name;?> for delivery time <?php echo $product_time;?>.\nRe-make your cart.");
								setTimeout("top.location.href = 'menu.php?rest=<?php echo $rest; ?>'",0000);
							</script>
						<?php
					  }
					  
					  $j=0;
					  while($j < $numberOfRows4qty)
					  {
					       if($menuQty [$j]['link']==$menuAvail [$l]['link'])
						   	break;
							
						$j++;	
					  }
					  $link=$j;
					  
					  if($alert==0 && $product_qty > $menuQty [$j]['qty'] && $menuQty [$j]['qty'] != 0)
					  {
					  	$alert=1;
					  	?>
							<script type="text/javascript" language="javascript"> 
								alert("ONLY <?php echo $menuQty [$j]['qty'];?> <?php echo $product_name;?> AVAILABLE!!! \n Re-make your CART.");
								setTimeout("top.location.href = 'menu.php?rest=<?php echo $rest; ?>'",0000);
							</script>
						<?php
					  }
					  else if($alert==0 && $menuQty [$j]['qty'] == 0)
					  {
					  	$alert=1;
					  	?>
							<script type="text/javascript" language="javascript"> 
								alert("<?php echo $product_name;?>IS OUT OF STOCK!!! \n Re-make your CART.");
								setTimeout("top.location.href = 'menu.php?rest=<?php echo $rest; ?>'",0000);
							</script>
						<?php
					  }
					  $product_amount = $menu[$k]['price']*$product_qty;
					  // calculate the subtotal
					  $sub_total = $sub_total + $product_amount;
					 // echo "Product Id: ".$product_id." Quantity: ".$product_qty."<br>";
					 
					 
			
					}
					
					//CONNECTING TO THE DATABASE USER_DATA
							
							
						if($alert==0 && $sub_total>$cap)
						{
							$alert=1;
							?>
							<script type="text/javascript" language="javascript"> 
								alert("TOTAL AMOUNT IS GREATER THAN YOUR CAP !!! \n Read FAQ page to know how to increase your CAP.");
								setTimeout("top.location.href = 'menu.php?rest=<?php echo $rest; ?>'",0000);
							</script>
							<?php
						}
						else
						{
							$cap=$cap-$sub_total;
							//update curCap
							
						}
			}
			else
			{
				$alert=1;
										
							?>
							<script type="text/javascript" language="javascript"> 
								alert("CART EMPTY !!! \n Re-make your CART.");
								setTimeout("top.location.href = 'menu.php?rest=<?php echo $rest; ?>'",0000);
							</script>
							<?php
			}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI-Confirm Order</title>
<script src="../jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/etc.css">
	<link rel="stylesheet" type="text/css" media="screen, projection"  href="../css/tweet.css">
		<link rel="stylesheet" type="text/css" href="../css/background1.css">
	<link rel="stylesheet" type="text/css" href="css/style_smartcart_confirm.css" />
	<link rel="stylesheet" type="text/css" href="css/slider.css">
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
		<a href="http://www.vitbifi.com/profile.php" > <img id="saddler" src="../images/bifi.png" style="-moz-border-radius:10px;
	-khtml-border-radius:10px;
	-webkit-border-radius:10px;"  />	
	</a></td>
   <td width="550" align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size:17px;"><div id="accordion">
		
			<!-- accordion header #1 -->
			<img class="current" src="../images/eat.png">
			
			<div style="width: 180px; display: block;">
				<h3><a href="eat.php">EAT</a></h3>
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

       <td width="444" align="right" valign="top">&nbsp;
		<div id="container">
  <div id="topnav" class="topnav">&nbsp;<a  class="signin"><span>
    <?php echo $regNo; ?>
  </span></a></div>
  <fieldset id="signin_menu">
    <form method="get" id="signin" action="../hidden/logout.php">
       <p class="forgot"> <a href="../account.php">Account</a> </p>
             <p class="remember">
        <input name="signin_submit" class="scItemButton scBtn" value="Sign Out" tabindex="6" type="submit">
		
	 </p>
     </form>
  </fieldset>
</div>
	   
</table><br />
<br />
<table width="946" height="388" border="0">
  <tr>
    <td width="936" align="center" valign="top">
	<div id="sc_cart" class="scCart">
		<!-- Selected Product ID/Quantity are stored on the <select> element below -->
              <select id="product_list" name="product_list[]" style="display:none;" multiple="multiple">
              </select>               
               <div class="scCartListHead">
                   <table width="100%">
				   <tr>
                   			  <td width="174" align="center">&nbsp;&nbsp;Product</td>
                   			  <td width="85" align="center">Qty</td>
					 			<td width="175" align="center">Time</td>
					 			<td width="262" align="center">Delivery Point</td>
                     			<td width="166" align="center">Amount (<span class="WebRupee">Rs.</span>)</td>
                    			
                   </tr>
				   </table>
  </div>
				   <div id="sc_cartlist" class="scCartList">
				   <?php
  $i=0;
  	foreach($product_list as $product)
	{
	  $chunks = explode('|',$product);
	  $product_id = $chunks[0];
	  $product_time = $chunks[2];
	  $product_dp = $chunks[3];
	  $product_qty = $chunks[1];
	  $j=0;
	  while($j < $numberOfRows4menu)
	  {
		   if($product_id == $menu [$j]['menuId'])
		   	{
				break;
			}
		$j++;	
	  }
	  $product_name = $menu[$j]['item'];
	  $product_amount = $menu[$j]['price']*$product_qty;
	  ?>
	  <table>
	  <tr>
		  <td width="200" align="center"><?php echo $product_name;?></td>
		  <td width="100" align="center"><?php echo $product_qty;?></td>
		  <td width="200" align="center"><?php echo $product_time;?></td>
		  <td width="300" align="center"><?php echo $product_dp;?></td>
		  <td width="200" align="center"><?php echo $product_amount;?></td>
	  </tr>
	  </table>
	  <?php
	  $cart[$i]['id']=$product_id;
	  $cart[$i]['item']=$product_name;
	  $cart[$i]['qty']=$product_qty;
	  $cart[$i]['dp']=$product_dp;
	  $cart[$i]['time']=$product_time;
	  
	  $i++;
	} 
   ?>	
		</div>		   
			
       	  
		 
</div>
	
	
	&nbsp;
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>
	<table width="218" border="0">
  <tr>
    <td width="208" height="19" style="font-size:20px">TOTAL : Rs. <?php echo $sub_total; $_SESSION['CART']=$cart; $_SESSION['TOTAL']=$sub_total;?> </td>
  </tr>
</table>
 <?php
  if($alert==0)
  {
  ?>
   <input style="width:200px;height:35px;float:right;cursor:pointer" type="submit" class="scBtn" onClick="document.location.href='cartConfirmed.php'" value="Confirm Your Order"> 
  
	<?php	
	}
	?>  
	  
	
	
  </tr><tr>
<td align="right">
  <p><br>
    * <span class="style1">Do not refresh</span> or hit back button after confirming.</p>
  <p>Depending on your internet speed, it will take some time.</p>
  <p>VOLSBB users wait for 1-2 mins (or more). </p></td>
</tr>
</table>


</body>
<table width="1280" height="60" border="0" >
</table>
<table width="1280" height="80" border="0" >
  <tr>
  	 <td width="200" align="left" ><div id="footer"></div></td>
    <td width="70" align="left"  ><div id="footer"><a id="footer" href="../toc.php" style="text-decoration:none;">Terms And Conditions</a></div></td>
    <td width="30"><div id="footer" ><a id="footer" href="../aboutus.php" style="text-decoration:none;">  About Us</a></div></td>
    <td  width="20"><div id="footer"><a id="footer" href="../faq.php" style="text-decoration:none;">FAQ</div></td>
	<td  width="40"><div id="footer"><a id="footer" href="../contact.php" style="text-decoration:none;">Contact Us</div></td>
	<td  width="40"><div id="footer"><a id="footer" href="../privacypol.php" style="text-decoration:none;">Privacy Policy</div></td>
  </tr>
</table>
</html>
