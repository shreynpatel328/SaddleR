<?php
error_reporting(0);
 		/*	session_start();
		
		if (!isset($_SESSION['SESSION'])) 
			require ( "/include/session_init.php");
		 
	 	if($_SESSION['comingFromEat'])
		{
			$_SESSION['comingFromEat']=FALSE;
			unset($_SESSION['f']);
			unset($_SESSION['s']);
		}
		
		if(!isset($_SESSION['fm']))
		{
			$_SESSION['fm']['name']=NULL;
			$_SESSION['fm']['rating']=NULL; 
			$_SESSION['fm']['deliveryTime']=NULL;
			$_SESSION['fm']['category']=NULL;
			$_SESSION['fm']['veg']=NULL;
			$_SESSION['fm']['deliveryPoint']=NULL;
			
		}
		
		$_SESSION['m']['rest']=$_REQUEST['rest'];
		@session_register('m');
		$rest=$_SESSION['m']['rest'];
			
	
		if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: https://www.vitbifi.com");
			exit;
	    }	
			*/
			include ( "../include/data.php");	
					$connect=mysql_connect($host,$us,$ps);
					 $db='vitbifi';
					 mysql_select_db($db, $connect);
					
		$regNo=$_SESSION['REGNO'];
		
				
		if(!isset($_SESSION['fm']['rating']))
		{
			$filterRatingL=" ";
			$filterRatingH=NULL;
		}
		else
		{
			$filterRatingL=substr($_SESSION['fm']['rating'],0,1);
			$filterRatingH=substr($_SESSION['fm']['rating'],4,5);
		}
		
		if(!isset($_SESSION['fm']['deliveryTime']))
		{
		$filterDeliveryTimeL=NULL;
		$filterDeliveryTimeH=NULL;
		}
		else
		{	
			$position=strpos($_SESSION['fm']['deliveryTime']," to ");		
			$filterDeliveryTimeL=substr($_SESSION['fm']['deliveryTime'],0,$position);
			$filterDeliveryTimeH=substr($_SESSION['fm']['deliveryTime'],$position+4);
		}
		
		
				
		
		$sqlQuery4menu="select DISTINCT m.menuId as menuId, m.category as category, m.veg as veg, m.item as item, m.price as price, m.rating as rating, m.orderTime as orderTime from menu m, delivery_time t where m.id='$rest' and m.menuId=t.menuId";
		
		$sqlQuery4menuDrop="select DISTINCT m.menuId as menuId, m.item as item, m.orderTime as orderTime, m.rating as rating, t.time as deliveryTime from menu m, delivery_time t where m.id='$rest' and m.menuId=t.menuId";
		
		$sqlQuery4avail="select DISTINCT * from delivery_time";
		
		$sqlQuery4qty="select DISTINCT * from quantity;";
		
		$filterName=$_SESSION['fm']['name'];	
		$filterPoint=$_SESSION['fm']['deliveryPoint'];
		$filterCategory=$_SESSION['fm']['category'];
		$filterVeg=$_SESSION['fm']['veg'];
		$filterVege=$filterVeg%2;
		
		
		
		$append="";
		if(!empty($_SESSION['fm']['name']))
			$append.=" and m.item like '%$filterName%'";
		if(!empty($filterCategory))
			$append.=" and m.category='$filterCategory'";
		if(!empty($_SESSION['fm']['veg']))
			$append.=" and m.veg = '$filterVege'";
		if(!empty($filterDeliveryTimeL))
			$append.=" and t.time >= '$filterDeliveryTimeL'";	
		if(!empty($filterDeliveryTimeH))
			$append.=" and t.time <= '$filterDeliveryTimeH'";
		if($filterRatingL!=" ")
		{	
			$append.=" and m.rating >= '$filterRatingL'";
			$append.=" and m.rating <= '$filterRatingH'";
		}
		if(!empty($_SESSION['fm']['deliveryPoint']))
			$append.=" and t.deliveryPoint = '$filterPoint'";	
		
		$sqlQuery4menu .= $append;
		$result4menu = MYSQL_QUERY($sqlQuery4menu);
		$numberOfRows4menu= MYSQL_NUM_ROWS($result4menu);
		
		$sqlQuery4menuDrop .= $append;
		$result4menuDrop = MYSQL_QUERY($sqlQuery4menuDrop);
		$numberOfRows4menuDrop= MYSQL_NUM_ROWS($result4menuDrop);
		  
		$result4avail = MYSQL_QUERY($sqlQuery4avail);
		$numberOfRows4avail= MYSQL_NUM_ROWS($result4avail);
		
		 
		$result4qty = MYSQL_QUERY($sqlQuery4qty);
		$numberOfRows4qty= MYSQL_NUM_ROWS($result4qty);
		
		$query="select distinct category from menu where id='$rest'";
		$result=mysql_query($query);
		$rows4cat=mysql_num_rows($result);
		
		$i=0;
		while($i<$rows4cat)
		{
			$category4filter[$i]= mysql_result($result,$i,"category");
			$i++;
		}
		print_r($category);
		  
		$i=0;  
		while($i < $numberOfRows4menu)
		{
			$menu [$i]['menuId']=MYSQL_RESULT($result4menu,$i,"menuId");
			$menu [$i]['category']=MYSQL_RESULT($result4menu,$i,"category");
			$menu [$i]['item']=MYSQL_RESULT($result4menu,$i,"item");
			$menu [$i]['price']=MYSQL_RESULT($result4menu,$i,"price");
			$menu [$i]['veg']=MYSQL_RESULT($result4menu,$i,"veg");
			$menu [$i]['rating']=MYSQL_RESULT($result4menu,$i,"rating");
			$menu [$i]['orderTime']=MYSQL_RESULT($result4menu,$i,"orderTime");
	
			$i++;
		}
		
		// Obtain a list of columns
		foreach ($menu as $key => $row) {
			$category[$key]  = $row['category'];
		}
		
		// Add $data as the last parameter, to sort by the common key
		array_multisort($category, SORT_ASC, $menu);

		
		$i=0;  
		while($i < $numberOfRows4menuDrop)
		{
			$menuDrop [$i]['menuId']=MYSQL_RESULT($result4menuDrop,$i,"menuId");
			$menuDrop [$i]['orderTime']=MYSQL_RESULT($result4menuDrop,$i,"orderTime");
			$menuDrop [$i]['deliveryTime']=MYSQL_RESULT($result4menuDrop,$i,"deliveryTime");
			$menuDrop [$i]['rating']=MYSQL_RESULT($result4menuDrop,$i,"rating");
			
			$i++;
		}
		
		$i=0;  
		while($i < $numberOfRows4avail)
		{
			$menuAvail [$i]['menuId']=MYSQL_RESULT($result4avail,$i,"menuId");
			$menuAvail [$i]['deliveryTime']=MYSQL_RESULT($result4avail,$i,"time");
			$menuAvail [$i]['link']=MYSQL_RESULT($result4avail,$i,"link");
			$menuAvail [$i]['deliveryPoint']=MYSQL_RESULT($result4avail,$i,"deliveryPoint");
			
			$i++;
		}
		
		
		// Obtain a list of columns
		foreach ($menuAvail as $key => $row) {
			$link[$key]  = $row['link'];
		}
		
		// Add $data as the last parameter, to sort by the common key
		array_multisort($link, SORT_ASC, $menuAvail);
		
		$i=0;  
		while($i < $numberOfRows4qty)
		{
			$menuQty [$i]['link']=MYSQL_RESULT($result4qty,$i,"link");
			$menuQty [$i]['qty']=MYSQL_RESULT($result4qty,$i,"qty");
						
			$i++;
		}
		
		$query4dp="select deliveryPoint from delivery_point where id='$rest'";
			$result4dp=mysql_query($query4dp);
			
		$numberOfRows4dp= MYSQL_NUM_ROWS($result4dp); 
		
		  
		$i=0;  
		while($i < $numberOfRows4dp)
		{
			$dp[$i]=MYSQL_RESULT($result4dp,$i,"deliveryPoint");
			$i++;
		}	
	
		//TIME DIFFERENCE
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
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI-MENU</title>
<script src="../jquery/jquery.js"></script>
	
<script src="../eat/jquery/slider.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script>
<script type="text/javascript" src="js/SmartCart.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style_smartcart.css" />

	<script>
		var $j = jQuery.noConflict();
		// Use jQuery via $j(...)
		$j(document).ready(function(){
		});
	</script>


	
	<script type="text/javascript">

		$j(document).ready(function() {
			jQuery.noConflict();
		  // call the cart function
			$j("#sc_cart").smartCart();
		}); 
	</script>

<link rel="stylesheet" type="text/css" href="../css/etc.css">
<link rel="stylesheet" type="text/css" media="screen, projection"  href="../css/tweet.css">
<link rel="stylesheet" type="text/css" href="../css/background1.css">
<link rel="stylesheet" type="text/css" href="css/slider.css">
<link type="text/css" href="css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/menutable.css">	
<link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="../css/footer.css"> 


<!--<link rel="stylesheet" type="text/css" href="http://webrupee.com/font">-->
<!--  JAVASCRIPT -->

	
	<script>
	<!--
	/* this if for the side ways scroll for the eat travel compete function call   */
		$j(function()
		{
			$j("#accordion").tabs("#accordion div",
			{
				tabs: 'img', 
				effect: 'horizontal'
			});
		});
	-->
	/*  the function ends here for the side ways scroll */
	</script>
	
	<script>
		
		// this is for the tabs used in the sign up .
		$j(function() {
			// setup ul.tabs to work as tabs for each div directly under div.panes
			$j("ul.tabs").tabs("div.panes > div");
		});
	</script>
	
	
	
	<script>
		/*   the function used is to call the  sign in sign upwhole thing*/
		$j(function() { 
		$j("#accordion1").tabs("#accordion1 div.pane", {tabs: 'h2', effect: 'slide', initialIndex: 99999});
		});
	</script>

	<script type="text/javascript">
        $j(document).ready(function() {

            $j(".signin").click(function(e) {          
				e.preventDefault();
                $j("fieldset#signin_menu").toggle();
				$j(".signin").toggleClass("menu-open");
            });
			
			$j("fieldset#signin_menu").mouseup(function() {
				return false
			});
			$j(document).mouseup(function(e) {
				if($j(e.target).parent("a.signin").length==0) {
					$j(".signin").removeClass("menu-open");
					$j("fieldset#signin_menu").hide();
				}
			});			
			
        });
</script>
	<!--slider concept for rating -->
<script>
	$j(function() {
		$j( "#slider-range1" ).slider({
			range: true,
			min: 0,
			max: 5,
			values: [ 3, 5 ],
			slide: function( event, ui ) {
				$j( "#ratingRange" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		}); 
		$j( "#ratingRange" ).val($j( "#slider-range1" ).slider( "values", 0 ) + " - " + $j( "#slider-range1" ).slider( "values", 1 ) );
	});
</script>
<script>
					
	$j(function() {
		$j( "#slider-dTime" ).slider({
			range: true,
			min: 0,
			max: 24,
			values: [ 10, 21 ],
			slide: function( event, ui ) {
$j( "#deliveryTimeRange" ).val(ui.values[ 0 ] + " to " + ui.values[ 1 ] );
}
			
		});
		$j( "#deliveryTimeRange" ).val($j( "#slider-dTime" ).slider( "values", 0 ) + " to " + $j( "#slider-dTime" ).slider( "values", 1 ) );
	});
</script>

	
<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #000000;
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

<body onload="slider.init('slider',1)">

	<div align="center">
<table width="1280" height="87" border="0">
  <tr>
    <td width="250" height="81" align="left" valign="top">
		<a href="http://www.vitbifi.com/profile.php" ><img id="saddler" src="images/bifi.png" style="-moz-border-radius:10px;
	-khtml-border-radius:10px;
	-webkit-border-radius:10px;"  /></a>	</td>
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
    

    <td width="444" align="right" valign="top">&nbsp;
		<div id="container">
  <div id="topnav" class="topnav">&nbsp;<a  class="signin"><span>
    <?php echo $regNo; ?>
  </span></a></div>
  <fieldset id="signin_menu">
    <form method="get" id="signin" action="../hidden/logout.php">
       <p class="forgot"> <a href="../account.php">Account</a> </p>
             <p class="remember">
        <input name="signin_submit" class="scItemButton1 scBtn" value="Sign Out" tabindex="6" type="submit">
		
	 </p>
     </form>
  </fieldset>
</div>
	   
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>


<table width="1280" height="428" border="0">

  <tr>
    <td  height="29" align="center" valign="middle" style=" font-size:20px; text-decoration:none; color: #990033" >Filter By : </td>
   
    <td  align="center" valign="middle" class="tipsy"  style=" font-size:20px; text-decoration:none; color: #990033">
	<table>
	<tr>
	<td width="164" height="27"><table border="0" bordercolor="#666666">
      <tr>
        <td onClick="document.location.href='eat.php'" width="30"><a href="eat.php"><span class="style1">BACK</span></a></td>
      </tr>
    </table></td>
	<td width="429">
	<?php
	          //printing the restaurant name  
	   			$id1 = @$_REQUEST['rest'];
				$i=0;
	            $sqlQuery1  = "select name from restaurant_details where id=$id1";
				$result1 = MYSQL_QUERY($sqlQuery1);
				$thisname1 = MYSQL_RESULT($result1,$i,"name");
				 ?>Restaurant : <?php echo $thisname1;
  	     
	  ?>	  </td>
	  </tr>
	  </table></td>
    <td align="center" valign="middle">CART</td>
  </tr>
  <tr>
	<td width="193" height="389" align="left" valign="top">
	
	<div id="slider">
<br />
		<div class="header" id="one-header">Name : <?php echo $filterName; ?></div>
					  <div class="content" id="one-content">
		<br />
					  
						<form name="filterName" method="get" action="hidden/filter_menu.php">
						<div align="center">
			<p>
			
				<input type="text" name="name" id="filterNameField" size="14px" style="border:1; color:#f6931f;" />
				<br />	
			<br />	
				
				<input name="filterNameButton" type="submit" id="filerNameButton"  title="Filter By Name"  value="Submit"> 
			</p>
					     </div>
						</form>
		</div>
		<div class="header" id="two-header">Delivery Point : <?php echo $filterDeliveryPoint; ?></div>
			  <div class="content" id="two-content">
				<div>
				
            <ul>  
				<br /> 
			  <li style="color:#000000"><a style="color:#000000;" href="hidden/filter_menu.php?deliveryPoint=Main Gate"> Main Gate</a>			 			 				</li>
			 <br />
			  <li>
              <a style="color:#000000;" href="hidden/filter_menu.php?&deliveryPoint=Gate 3"> Gate 3</a>			  </li>
			  <li><br />
			  <a style="color:#000000;" href="hidden/filter_menu.php?&deliveryPoint=AllMart Gate"> AllMart Gate</a>			  </li>
			  <li><br />
			  <a style="color:#000000;" href="hidden/filter_menu.php?&deliveryPoint=Hostel Gate"> Boys Hostel Gate</a>			  </li>
			<br /></ul>
              </div>
		</div>
		<div class="header" id="three-header">Category : <?php echo $filterCategory; ?></div>
			  <div class="content" id="three-content">
				<div>
            <ul>
			<?php 
			$y=0;
				while($y<$rows4cat)
				{
			?>  
			  <li><a style="color:#000000;" href="hidden/filter_menu.php?&category=<?php echo $category4filter[$y];?>"><?php echo $category4filter[$y];?></a></li><br/>
			  <?php
			  		$y++;
			  	}
			  ?>
			 </ul>
              </div>
		</div>
		
		 <div class="header" id="four-header">Veg/Non-Veg :  <?php if($filterVeg==1) echo "Veg"; else if($filterVeg==2) echo "Non-Veg";?></div>
			  <div class="content" id="four-content">
				<div>
				
            <ul type="disc">  
				
				 <br />
			  <li  ><a style="color:#000000;" href="hidden/filter_menu.php?&veg=1">Veg</a>			  </li>
			  <li><br />
              <a style="color:#000000;" href="hidden/filter_menu.php?&veg=2">Non-Veg</a></li>
			  <br /></ul>
              </div>
		</div>
	</div>
	<br />
		<br />
		<br />
		
		
		<p>
		<a href="hidden/clearfilter_menu.php" style="text-decoration:none; border: thick; margin-left:20px; font-size:18px;">Clear Filters</a>
		</p>
		
	
	
			
</td>

<form action="cartConfirm.php" method="post">

	<td width="400" align="left" valign="top">
		
				
	&nbsp;
	<div id="sc_productlist" class="scProductList">
	<table width="632" height="251" border="0"style="border-left:thin; border-left-color: #999999; border-left-style:solid; border-left-width:thin; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin;">
      <tr>
        <td width="798" align="center" valign="top">
		<!-- the div functions is for the the menu table -->		
		<div id="accordion1">
			<?php
				$currentTime=time();
				$i=0;
				while($i<$numberOfRows4menu)
				{
			?>	
			<div class="scProductListItem">
			<?php
			if(($i==0 || $menu[$i]['category'] != $menu[($i-1)]['category']) && $menu[$i]['category']!=NULL)
			{
			?>
			<h1 class="current">
				<table width="756" border="0">
				  <tr>
					<td><?php echo $menu[$i]['category']; ?></td>
				  </tr>
				</table>
			</h1>
			<?php
			}
			?>
			<h2 class="current">
				<table width="575" border="0">
				  <tr>
					<td width="30"><?php if($menu[$i]['veg']==1) {?><img src="../images/veg.png"><?php } else {?><img src="../images/nveg.png"><?php }?></td>
					<td width="650" ><span id="prod_name<?php echo $menu[$i]['menuId']; ?>"><?php echo $menu[$i]['item']; ?>
					</span></td>
					 <td width="100" align="right">
					 <p>Rs. 
					<span id="prod_price<?php echo $menu[$i]['menuId']; ?>"><?php echo $menu[$i]['price']; ?></span></td>
					</p>
				  </tr>
				</table>
			</h2>
			 
			<div class="pane">
			<table border="0">
			  <tr>
				<td width="450">	  
					<p><a style="font-size:14px;">Select Delivery Time</a> :  
					<select style=" min-width:40px; padding-left:2px" id="prod_time<?php echo $menu[$i]['menuId']; ?>" onclick="lob<?php echo $i;?>(this,<?php echo $i;?>)">
						<?php
							$j=0;
							while($j<$numberOfRows4menuDrop)
							{
								if($menu[$i]['menuId']==$menuDrop[$j]['menuId'])
								{
						?>					
									<option><?php echo get_time_difference($menuDrop[$j]['deliveryTime'],"00:00:00");?></option>
						<?php	
								}
								$j++;	
							}	
						?>
						
				<!--MENU DROP concept -->
		<script>
			function lob<?php echo $i;?>(objDropDown,x)
			{
				var objHidden = document.getElementById("lob"+x);
				objHidden.value = (objDropDown.value-<?php echo $menu[$i]['orderTime'] ?>);
			}
		</script>		
			
					</select>
					</p>
					<br/>
					<p><a style="font-size:14px;">Select Delivery Point</a> :
					<select style=" min-width:40px; padding-left:2px;" id="prod_dp<?php echo $menu[$i]['menuId']; ?>">	
					<?php
							$j=0;
							while($j<$numberOfRows4dp)
							{
					?>					
									<option><?php echo $dp[$j];?></option>
					<?php	
								$j++;	
							}	
					?>
					
					</select>
					</p>  
					<p><br /></p>      
					<p style="font-size:14px;">Quantity :
					  <select style=" min-width:40px; padding-left:2px;" id="prod_qty<?php echo $menu[$i]['menuId']; ?>">	
					<?php
							$j=1;
							while($j<11)
							{
					?>					
									<option value="<?php echo $j;?>"><?php echo $j;?></option>
					<?php	
								$j++;	
							}	
					?>
					
					</select>
					  </p>	
					<br />
					<p><input type="button" rel="<?php echo $menu[$i]['menuId']; ?>" class="scItemButton scBtn"  value="Add To Cart" ></p>
				 
				 					
				</td>
				<td>
				 
					<table id="time" align="center" width="350" border="0" style=" border-bottom:thin; border-color:#999999; border-bottom-style:solid; border-left:thin; border-left-color: #999999; border-left-style:solid; border-left-width:thin; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-top-color:#99999; border-top-style:solid; border-top-width:thin;">
					  <tr>
						<td align="center" style="font-size:14px; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-bottom-color:#99999; border-bottom-style:solid; border-bottom-width:thin;">Delivery Time</td>
						<td align="center" style="font-size:14px; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-bottom-color:#99999; border-bottom-style:solid; border-bottom-width:thin;">Delivery Point</td>
						<td align="center" style="font-size:14px; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-bottom-color:#99999; border-bottom-style:solid; border-bottom-width:thin;">Order By</td>
						<td align="center" style="font-size:14px; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-bottom-color:#99999; border-bottom-style:solid; border-bottom-width:thin;">Available</td>
					  </tr>
					  <?php 
					  	$f=0;
						while($f<$numberOfRows4avail)
						{
							if($menu[$i]['menuId'] == $menuAvail[$f]['menuId'])	
							{
								if($f==0 || $menuAvail[$f]['link'] != $menuAvail[($f-1)]['link'])
									$border=1;
								else
									$border=0;	
						?>			
					  	<tr>
						<td align="center" <?php if($border==1){echo "style=\"border-top-color:#999999; border-top-style:dotted; border-top-width:thin;\"";}?>><?php echo get_time_difference($menuAvail[$f]['deliveryTime'],"00:00:00");?></td>
						<td align="center" <?php if($border==1){echo "style=\"border-top-color:#999999; border-top-style:dotted; border-top-width:thin;\"";}?>><?php echo $menuAvail[$f]['deliveryPoint'];?></td>
						<?php
							if($f==0 || $menuAvail[$f]['link'] != $menuAvail[($f-1)]['link'])
							{
								 $j=0;
									  while($j < $numberOfRows4qty)
									  {
										   if($menuAvail[$f]['link'] == $menuQty [$j]['link'])
											break;
											
										$j++;	
									  }

						?>
						<td align="center" style="border-top-color:#999999; border-top-style:dotted; border-top-width:thin;"><?php echo get_time_difference($menuAvail[$f]['deliveryTime'],$menu[$i]['orderTime']);?></td>
						<td align="center" style="border-top-color:#999999; border-top-style:dotted; border-top-width:thin;"><?php echo $menuQty[$j]['qty'];?></td>
						<?php
							}
						?>
					  </tr>
					  <?php
					  		}
							$f++;
						} 
					  ?>
					</table>

				</td>
			  </tr>
			</table>

	
		    </div>
			</div>
			<?php 
					$i++;
				}
			?>
	  </div>
		&nbsp;</td>
      </tr>
    </table>
	</div>
	</td>
	<td width="286" align="center" valign="top">
	<p>&nbsp;</p>
	<div id="sc_cart" class="scCart">
		<!-- Selected Product ID/Quantity are stored on the <select> element below -->
              <select id="product_list" name="product_list[]" style="display:none;" multiple="multiple">
              </select>               
               <div class="scCartListHead">
                   <table width="100%"><tr>
                     <td width="69" align="center">&nbsp;&nbsp;Product</td>
                     <td width="21" align="center">Qty</td>
					 <td width="79" align="center">Time</td>
					 <td width="102" align="center">Delivery Point</td>
                     <td width="99" align="center">Amount (<span class="WebRupee">Rs.</span>)</td>
                     <td width="15">&nbsp;</td>
                   </tr></table>
       	  </div>
            	 <!-- Cart List: Selected Products are listed inside div below -->
               <div id="sc_cartlist" class="scCartList"></div>
               
               <div class="scCartListHead">
                   <table width='100%'><tr>
                     <td>
                        <!-- Message Label -->
                        <span id="sc_message"></span></td>
                     <td width='100px'>Subtotal : <span class="WebRupee">Rs.</span></td>
                     <td width='50px'> 
                        <!-- Sub Total Label -->
                        <span id="sc_subtotal"></span>
                     </td>
                   </tr></table>
            	 </div>
               <br>
          <input style="width:200px;height:35px;float:right;" type="submit" class="scBtn" value="Checkout >>">  	 
	</div>
	</td>
	</div>
	</form>
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
	<td  width="40"><div id="footer"><a  id="footer" href="../contact.php" style="text-decoration:none;">Contact Us</div></td>
	<td  width="40"><div id="footer"><a  id="footer" href="../privacypol.php" style="text-decoration:none;">Privacy Policy</div></td>
  </tr>
</table>


</html>
