<?php
 			session_start();
		
		if(!isset($_SESSION['SESSION'])) 
			require ( "../include/session_init.php");
		 
	   	if(!isset($_SESSION['f']))
		{
			$_SESSION['f']['name']=NULL;
			$_SESSION['f']['rating']=NULL;
			$_SESSION['f']['deliveryPoint']=NULL;
			$_SESSION['f']['deliveryTime']=NULL;
			$_SESSION['f']['category']=NULL;
			$_SESSION['f']['veg']=NULL;
			$_SESSION['s']['sortBy']=NULL;
			$_SESSION['s']['sortOrder']=NULL;
			$_SESSION['s']['equal']=NULL;
		}
		
		$_SESSION['comingFromEat']=TRUE;	
		
	
		include ( "../include/data.php");	
					$connect=mysql_connect($host,$us,$ps);
					if($connect)
		{
					 $db='vitbifi';
					mysql_select_db($db);
					}
						
		if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: https://www.vitbifi.com");
			exit;
	    }						
		
		$regNo=$_SESSION['REGNO'];
				
		
		
		if(!isset($_SESSION['f']['rating']))
		{
			$filterRatingL=" ";
			$filterRatingH=NULL;
		}
		else
		{
			$filterRatingL=substr($_SESSION['f']['rating'],0,1);
			$filterRatingH=substr($_SESSION['f']['rating'],4,5);
		}
		
		if(!isset($_SESSION['f']['deliveryTime']))
		{
		$filterDeliveryTimeL=NULL;
		$filterDeliveryTimeH=NULL;
		}
		else
		{	
			$position=strpos($_SESSION['f']['deliveryTime']," to ");		
			$filterDeliveryTimeL=substr($_SESSION['f']['deliveryTime'],0,$position);
			$filterDeliveryTimeH=substr($_SESSION['f']['deliveryTime'],$position+4);
		}
		
		
				
		
		$sqlQuery4rest="select distinct r.id as id, r.name as name, r.rating as rating from restaurant_details r, menu m, delivery_point p, delivery_time t where r.id=m.id and r.id=p.id and m.menuId=t.menuId";
		
		$filterName=$_SESSION['f']['name'];
		$filterDeliveryPoint=$_SESSION['f']['deliveryPoint'];
		$filterCategory=$_SESSION['f']['category'];
		$filterVeg=$_SESSION['f']['veg'];
		$newSortOrder=$_SESSION['s']['sortOrder'];
		$sortEqual=$_SESSION['s']['equal'];
		
		
		
		$append="";
		if(!empty($_SESSION['f']['name']))
			$append.=" and r.name like '%$filterName%'";
		if(!empty($_SESSION['f']['deliveryPoint']))
			$append.=" and p.deliveryPoint = '$filterDeliveryPoint'";
		if(!empty($filterCategory))
			$append.=" and m.category='$filterCategory'";
		if(!empty($_SESSION['f']['veg']))
			$append.=" and m.veg = '$filterVeg'";
		if(!empty($filterDeliveryTimeL))
			$append.=" and t.time >= '$filterDeliveryTimeL'";	
		if(!empty($filterDeliveryTimeH))
			$append.=" and t.time <= '$filterDeliveryTimeH'";
		if($filterRatingL!=" ")
		{	
			$append.=" and r.rating >= '$filterRatingL'";
			$append.=" and r.rating <= '$filterRatingH'";
		}	
		
		$sqlQuery4rest .= $append;	
			
		if ($_SESSION['s']['sortBy'] == "") 
			 $_SESSION['s']['sortBy'] = "rating";
								
		if ($_SESSION['s']['sortOrder']==$_SESSION['s']['sortBy'] and $_SESSION['s']['equal']==1)
		{
			$newSortOrder=$_SESSION['s']['sortBy'];
			$sqlQuery4rest .= " order by $newSortOrder";
			$_SESSION['s']['equal']=0;
		}
		else
		{   
			$newSortOrder=$_SESSION['s']['sortBy'];
			$sqlQuery4rest .= " order by $newSortOrder desc ";
			$sortEqual=1;
		}
		
		
		$result4rest = MYSQL_QUERY($sqlQuery4rest);
		
		$numberOfRows4rest= MYSQL_NUM_ROWS($result4rest);
		
		  
		$i=0;  
		while($i < $numberOfRows4rest)
		{
			$menu [$i]['id']=MYSQL_RESULT($result4rest,$i,"id");
			$menu [$i]['name']=MYSQL_RESULT($result4rest,$i,"name");
			$menu [$i]['rating']=	MYSQL_RESULT($result4rest,$i,"rating");
			$i++;
		}
		
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="../jquery/jquery.js"></script>

<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="../eat/jquery/slider.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/etc.css">
	<link rel="stylesheet" type="text/css" media="screen, projection"  href="../css/tweet.css">
	<link rel="stylesheet" type="text/css" href="../css/background1.css">
	<link rel="stylesheet" type="text/css" href="../css/top.css">
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<link type="text/css" href="css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
				
			


	
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
/*   the function used is to call the  sign in sign upwhole thing*/
$(function() { 

$("#accordion1").tabs("#accordion1 div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
});
</script>
<!--slider concept for rating -->
<script>
	$(function() {
		$( "#slider-range1" ).slider({
			range: true,
			min: 0,
			max: 5,
			values: [ 3, 5 ],
			slide: function( event, ui ) {
				$( "#ratingRange" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			}
		}); 
		$( "#ratingRange" ).val($( "#slider-range1" ).slider( "values", 0 ) + " - " + $( "#slider-range1" ).slider( "values", 1 ) );
	});
</script>
<script>
					
	$(function() {
		$( "#slider-dTime" ).slider({
			range: true,
			min: 0,
			max: 24,
			values: [ 10, 21 ],
			slide: function( event, ui ) {
$( "#deliveryTimeRange" ).val(ui.values[ 0 ] + " to " + ui.values[ 1 ] );
}
			
		});
		$( "#deliveryTimeRange" ).val($( "#slider-dTime" ).slider( "values", 0 ) + " to " + $( "#slider-dTime" ).slider( "values", 1 ) );
	});
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

<script src="jquery/jquery.tipsy.js" type="text/javascript"></script>
<script type='text/javascript'>
    $(function() {
	  $('#forgot_username_link').tipsy({gravity: 'w'});   
    });
  </script>	
</head>
<!-- this is for the alternate colour in the restaurant name  -->
<style type="text/css">
table.sample td.d0 {
	background-color: #FCF6CF;
}
table.sample td.d1 {
	background-color: #FEFEF2;
}
</style>
<style type="text/css">
  b {width: 200px}
  b a {display: block; height:100%; width:100%;}
  b a:hover {background-color: yellow;}
</style>


<body onload="slider.init('slider',1)">
<div align="center">
<table width="1280" height="87" border="0">
  <tr>
  <a style="color:#000000; text-decoration:none" ></a>
    <td width="250" height="81" align="left" valign="top">
		<img id="saddler" src="../images/bifi.png" style="-moz-border-radius:10px;
	-khtml-border-radius:10px;
	-webkit-border-radius:10px;"  />	</td>
   <td width="550" align="left" valign="top"><div id="accordion">
		
			<!-- accordion header #1 -->
			<img class="current" src="../images/eat.png">
			
			<div style="width: 180px; display: block;">
				<h3><a href="eat/eat.php">EAT</a></h3>
				<p>
					Consectetur adipiscing elit. Praesent bibendum eros ac nulla. Integer vel lacus ac neque viverra.		</p>
			</div>
			
			<img src="../images/travel.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Cras diam. Donec dolor lacus, vestibulum at, varius in, mollis id, dolor. Aliquam erat volutpat.		</p>
			</div>
		
			<img src="../images/compete.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Non lectus lacinia egestas. Nulla hendrerit, felis quis elementum viverra, purus felis egestas magna.		</p>
			</div>	
		
		</div>
  </td>
    <td width="444" align="right" valign="top" class="complete">&nbsp;
		<div id="container">
  <div id="topnav" class="topnav">&nbsp;<a class="signin"><span>
    <?php echo $regNo; ?>
  </span></a></div>
  <fieldset id="signin_menu">
    <form method="get" id="signin" action="../hidden/logout.php">
       <p class="forgot"> <a href="../user/account.php">Account</a> </p>
       <p class="forgot"> <a href="../user/settings.php">Settings</a> </p>
      <p class="remember">
        <input name="signin_submit" value="Sign Out" tabindex="6" type="submit">
	 </p>
    </form>
  </fieldset>
</div>
	    /td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1230" height="916" border="0">
		 
  <tr>
    <td height="29" align="left" valign="top" style=" font-size:20px; text-decoration:none; color: #990033" >Filter By : </td>
    <td align="center" valign="top" style=" font-size:20px; text-decoration:none; color: #990033">Restaurants</td>
    <td align="center" valign="middle" style=" font-size:20px; text-decoration:none; color: #990033">TOP </td>
  </tr>
  <tr>
	<td width="193" height="881" align="left" valign="top">

<div id="slider">
<br />
		<div class="header" id="one-header">Name : <?php echo $filterName; ?></div>
					  <div class="content" id="one-content">
		<br />
					  
						<form name="filterName" method="get" action="hidden/filter.php">
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
		
		<div class="header" id="two-header">Delivery Time : <?php echo  $_SESSION['f']['deliveryTime']; ?></div>
			  <div class="content" id="two-content">
			  <form name="filterDeliveryTime" method="get"  action="hidden/filter.php">
	
		<label for="deliveryTimeRange"></label>
		<table width="180" border="0">
          <tr>
		  <br />
            <td width="44"><label for="deliveryTimeRange">Range:</label></td>
          
			<td width="52"><input type="text" width="2cm"  name="deliveryTime" id="deliveryTimeRange" style="border:0; color:#f6931f; font-weight:bold;" /></td>
            </tr>
        </table>
		<div id="slider-dTime"></div>
		<br />
		<input name="filterDeliveryTime" type="submit" id="filterDeliveryTime" title="Filter By deliveryTime"  value="Filter" />
		
				</form>
  	    </div>
		
		
		<div class="header" id="three-header">Delivery Point : <?php echo $filterDeliveryPoint; ?></div>
			  <div class="content" id="three-content">
				<div>
				
            <ul>  
				<br /> 
			  <li style="color:#000000"><a style="color:#000000;" href="hidden/filter.php?deliveryPoint=gate1"> Main Gate</a>			 			 				</li>
			 <br />
			  <li>
              <a style="color:#000000;" href="hidden/filter.php?&deliveryPoint=gate2"> Gate 2</a>			  </li>
			  <li><br />
			  <a style="color:#000000;" href="hidden/filter.php?&deliveryPoint=AllMart Gate"> AllMart Gate</a>			  </li>
			  <li><br />
			  <a style="color:#000000;" href="hidden/filter.php?&deliveryPoint=Boys Hostel Gate"> Boys Hostel Gate</a>			  </li>
			<br /></ul>
              </div>
		</div>
		
			  
			  
			   <div class="header" id="five-header">Category : <?php echo $filterCategory; ?></div>
			  <div class="content" id="five-content">
				<div>
				
            <ul>  
				<br /> 
			  <li><a style="color:#000000;" href="hidden/filter.php?&category=chinese">Chinese</a>			  </li>
			  <li><br />
              <a style="color:#000000;" href="hidden/filter.php?&category=indian">Indian</a>			  </li>
			  <li><br />
			  <a  style="color:#000000;" href="hidden/filter.php?&category=gujarati">Gujarati</a>			  </li>
			<br /></ul>
              </div>
		</div>
		
		 <div class="header" id="six-header">Veg/Non-Veg :  <?php if($filterVeg==1) echo "Veg"; else if($filterVeg==2) echo "Non-Veg";?></div>
			  <div class="content" id="six-content">
				<div>
				
            <ul type="disc">  
				
				 <br />
			  <li  ><a style="color:#000000;" href="hidden/filter.php?&veg=1">Veg</a>			  </li>
			  <li><br />
              <a style="color:#000000;" href="hidden/filter.php?&veg=2">Non-Veg</a></li>
			  <br /></ul>
              </div>
		</div>
	</div>
	 	<br />
		<br />
		<br />
		
		
		<p>
		<a href="hidden/clearfilter.php" style="text-decoration:none; border: thick; margin-left:20px; font-size:18px;">Clear Filter</a>
		</p>
		
	</td>
	
	<td width="690" align="center" valign="top">
				  <table width="642" height="394" border="0" style="border-left:thin; border-left-color: #999999; border-left-style:solid; border-left-width:thin; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin;" >
                    <tr>
                      <td width="632" align="center" valign="top"><table class="sample" width="600" height="54" border="0" >
					  <tbody>
					  
                  <tr>
                    
                    <td width="301"><br />
                      <div align="center"><a href="hidden/sort.php?sortBy=r.name&sortOrder=<?php echo $_SESSION['s']['sortBy']; ?>&equal=<?php echo $sortEqual; ?>">Name</a>
			  </div><br /></td>
                    
                    <td width="161"><br />
                    <div align="center" style=" color:rgb(157, 28, 28);">Add To Fav </div><br /></td>
                  </tr>
                  <?php 				
						$i=0;
									while ($i<3)
									{
										$thisname = MYSQL_RESULT($result4rest,$i,"name");
										
									
						
                  if($i%2==0){?> 
				 <tr>
                   
						   <b> <td class="d0" onClick="document.location.href='menu.php?rest=<?php echo $thisid ?>';" style="cursor:pointer;" nowrap><br /><div style="bcolor:#000000;" align="center"><a href="menu.php?rest=<?php echo $thisid ?>" style="text-decoration:none;  color:#000000;"><?php echo $thisname; ?></a></div><br /></td>
                   
                    <td class="d0" nowrap><br /><div style=" color:#000000;" align="center">FAV</div><br /></td></br>
						 <?php 
						 }
						 else
						 {
						 ?>
						 <div ></div>
						                 <td width="46" nowrap class="d1" style="cursor:pointer;" onClick="document.location.href='menu.php?rest=<?php echo $thisid ?>';"><br />
                   <div align="center" style=" color:#000000;" ><a href="menu.php?rest=<?php echo $thisid ?>" style="text-decoration:none;  color:#000000;"><?php echo $thisname; ?></a></div><br /></td>
                   
                    <td width="74" nowrap class="d1"><br />
                   <div style=" color:#000000; " align="center">FAV</div><br /></td>
						 <?php } ?>
						  
    
        </tr>
                  <?php 
									  $i++;
							   }
						?>
   </tbody> </table>&nbsp;<div id="red"></div>
				<div id="green"></div>
				<div id="blue"></div>
				
				<div id="swatch" class="ui-widget-content ui-corner-all"></div></td>
                    </tr>
    </table></td>
    <td width="333" align="center" valign="top">
	<div id="accordion1">


	 <h2 class="current" style="font:Arial, Helvetica, sans-serif medium; font-size: 22px " >Restaurants</h2>
	
	
	
	<div class="pane" style="display:block">
	<table width="221" border="0" style="border-left:thin; border-left-color: #999999; border-left-style:solid; border-left-width:thin; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-top-color:#99999; border-top-style:solid; border-top-width:thin;">
	 <tr>
		<td width="94" align="center" style="font:Arial, Helvetica, sans-serif medium; font-size: 26px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#99999"> Name</td>
	  </tr>	
		<?php
					include ( "../include/data.php");	
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
							
						
							
							?>
							
							  <tr>
								<td colspan="2" align="left" style="font:Arial, Helvetica, sans-serif medium; font-size: 22px">&nbsp; <?php echo $i+1;?>  .    <?php echo $thisname;?>&nbsp;</td>
							  </tr>
							
							<?php
							
					}
		?>			
	</table>
				
		
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	
	<p>&nbsp;</p>
	</div>
	 <h2 style="font:Arial, Helvetica, sans-serif medium; font-size: 22px ">Items</h2>
	 <div class="pane">   
	 <table width="200" border="0" style="border-left:thin; border-left-color: #999999; border-left-style:solid; border-left-width:thin; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-top-color:#99999; border-top-style:solid; border-top-width:thin;">
      <tr>
        <td style="font:Arial, Helvetica, sans-serif medium; font-size: 26px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#99999">Name</td>
        <td style="font:Arial, Helvetica, sans-serif medium; font-size: 26px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#99999">Item</td>
        
      </tr>
	  <?php 
	  for($i=0;$i<3;$i++)
					{	
						
								
							$thisname4items = MYSQL_RESULT($result4items,$i,"name");
							$thisitem = MYSQL_RESULT($result4items,$i,"item");
						
							
							?>
      <tr>
        <td style="font:Arial, Helvetica, sans-serif medium; font-size: 22px">&nbsp;<?php echo $i+1;?>  .    <?php echo $thisname4items;?></td>
        <td style="font:Arial, Helvetica, sans-serif medium; font-size: 22px">&nbsp;<?php echo $thisitem;?></td>
       
      </tr>
	  <?php
							
					}
		?>
    </table>
	 
	   </div>
	 <h2 style="font:Arial, Helvetica, sans-serif medium; font-size: 22px ">History</h2>
	 <div class="pane">     </div>
  </div> </td>
  </tr>
</table>
<p>&nbsp;</p>
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
