<?php
error_reporting(0);
 		/*	session_start();
		
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
	
		
		if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: https://www.vitbifi.com");
			exit;
	    }						
			
	 */
		$regNo=$_SESSION['REGNO'];
				
		
		include ( "../include/data.php");	
					$connect=mysql_connect($host,$us,$ps);
					if($connect)
		{
					 $db='vitbifi';
					mysql_select_db($db);
					}
						
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
		$filterVege=$filterVeg%2;
		$newSortOrder=$_SESSION['s']['sortOrder'];
		$sortEqual=$_SESSION['s']['equal'];
		
		$query="select distinct category from menu where 1";
		$result=mysql_query($query);
		$rows=mysql_num_rows($result);
		
		$i=0;
		while($i<$rows)
		{
			$category[$i]= mysql_result($result,$i,"category");
			$i++;
		}
		
		$append="";
		if(!empty($_SESSION['f']['name']))
			$append.=" and r.name like '%$filterName%'";
		if(!empty($_SESSION['f']['deliveryPoint']))
			$append.=" and p.deliveryPoint = '$filterDeliveryPoint'";
		if(!empty($filterCategory))
			$append.=" and m.category='$filterCategory'";
		if(!empty($_SESSION['f']['veg']))
			$append.=" and m.veg = '$filterVege'";
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
		
		$query="select * from restaurant_details where 1";
		$result=mysql_query($query);
		$numOfRows4open=mysql_num_rows($result);
		
		$i=0;
		while($i < $numberOfRows4open)
		{
			$rest [$i]['id']=MYSQL_RESULT($result4rest,$i,"id");
			$rest [$i]['open']=	MYSQL_RESULT($result4rest,$i,"open");
			$i++;
		}
		
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VITBIFI-EAT</title>
<script src="../jquery/jquery.js"></script>

<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="../eat/jquery/slider.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/etc.css">
	<link rel="stylesheet" type="text/css" media="screen, projection"  href="../css/tweet.css">
	<link rel="stylesheet" type="text/css" href="../css/background1.css">
	<link rel="stylesheet" type="text/css" href="../css/top.css">
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<link type="text/css" href="css/smoothness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
	<link rel="icon" type="image/x-icon" href="../images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/style_smartcart.css" />
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
    <td width="250" height="81" align="left" valign="top">
	<a href="http://www.vitbifi.com/profile.php" >	<img id="saddler" src="images/bifi.png" style="-moz-border-radius:10px;
	-khtml-border-radius:10px;
	-webkit-border-radius:10px;"  />	</a></td>
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
        <input name="signin_submit" class="scItemButton scBtn" value="Sign Out" tabindex="6" type="submit">
		
	 </p>
     </form>
  </fieldset>
</div>
	   
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1230" height="756" border="0">
		 
  <tr>
    <td height="29" align="left" valign="top" style=" font-size:20px; text-decoration:none; color: #990033" >Filter By : </td>
    <td align="center" valign="top" style=" font-size:20px; text-decoration:none; color: #990033">Restaurants</td>
    <td align="center" valign="middle" style=" font-size:20px; text-decoration:none; color: #990033">TOP </td>
  </tr>
  <tr>
	<td width="193" height="721" align="left" valign="top">

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
		
	
		
		<div class="header" id="three-header">Delivery Point : <?php echo $filterDeliveryPoint; ?></div>
			  <div class="content" id="three-content">
				<div>
				
            <ul>  
				<br /> 
			  <li style="color:#000000"><a style="color:#000000;" href="hidden/filter.php?deliveryPoint=Main Gate"> Main Gate</a>			 			 				</li>
			 <br />
			  <li>
              <a style="color:#000000;" href="hidden/filter.php?&deliveryPoint=Gate 3"> Gate 3</a>			  </li>
			  <li><br />
			  <a style="color:#000000;" href="hidden/filter.php?&deliveryPoint=AllMart Gate"> AllMart Gate</a>			  </li>
			  <li><br />
			  <a style="color:#000000;" href="hidden/filter.php?&deliveryPoint=Hostel Gate"> Boys Hostel Gate</a>			  </li>
			<br /></ul>
              </div>
		</div>
		
			  
			  
			   <div class="header" id="five-header">Category : <?php echo $filterCategory; ?></div>
			  <div class="content" id="five-content">
				<div>
				
            <ul>
			<?php 
			$y=0;
				while($y<$rows)
				{
			?>  
			  <li><a style="color:#000000;" href="hidden/filter.php?&category=<?php echo $category[$y];?>"><?php echo $category[$y];?></a></li><br/>
			  <?php
			  		$y++;
			  	}
			  ?>
			 </ul>
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
		<a href="hidden/clearfilter.php" style="text-decoration:none; border: thick; margin-left:20px; font-size:18px;">Clear Filters</a>
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
                    
                    
                  </tr>
                  <?php 				
						$i=0;
									while ($i<$numberOfRows4rest)
									{
									
										$thisname = MYSQL_RESULT($result4rest,$i,"name");
										$thisid =  MYSQL_RESULT($result4rest,$i,"id");
									
						
                  if($i%2==0)
				  {
				  		$m=0;
				  		while($m<$numOfRows4open)
						{	
							if($thisid==$rest[$m]['id'])
								break;
								$m++;
						}	
						
				  ?> 
				 <tr>
                   
						   <b> 
						   <?php 
						   if(!$rest[$m]['open'])
						{
						?>
							<td class="d0" onClick="document.location.href='menu.php?rest=<?php echo $thisid ?>';" style="cursor:pointer;" nowrap>
						<?php 
						}
						else
						{
						?>
							<td class="d0" nowrap>
						<?php 
						}
						?>
						<br /><div style="bcolor:#000000;" align="center"><a href="menu.php?rest=<?php echo $thisid ?>" style="text-decoration:none;  color:#000000;"><?php echo $thisname; ?></a></div><br /></td>
                   
                   </br>
						 <?php 
						 }
						 else
						 {
						 ?>
						 <div ></div>
						  
						<?php if(!$rest[$m]['open'])
						{
						?>
							<td class="d1" onClick="document.location.href='menu.php?rest=<?php echo $thisid ?>';" style="cursor:pointer;" nowrap>
						<?php 
						}
						else
						{
						?>
							<td class="d1" nowrap>
						<?php 
						}
						?>						                 
						 <br />
                   <div align="center" style=" color:#000000;" ><a href="menu.php?rest=<?php echo $thisid ?>" style="text-decoration:none;  color:#000000;"><?php echo $thisname; ?></a></div><br /></td>
                   
                   
						 <?php } ?>
						  
    
        </tr>
                  <?php 
									  $i++;
							   }
						?>
					<tr>
						<td class="d1" nowrap><br />
                   <div align="center" style=" color:#000000;" ><?php echo "APNA DHABA (Opening Soon)"; ?></div><br /></td>
					</tr>	
					<tr>
						<td class="d0" nowrap><br />
                   <div align="center" style=" color:#000000;" ><?php echo "AMALA's (Opening Soon)"; ?></div><br /></td>
					</tr>	
   </tbody> </table>&nbsp;<div id="red"></div>
				<div id="green"></div>
				<div id="blue"></div>
				
				<div id="swatch" class="ui-widget-content ui-corner-all"></div></td>
                    </tr>
    </table></td>
	
    <td width="333" align="center" valign="top">
	<div id="accordion1">


	 <h2 class="current" style="font:Arial, Helvetica, sans-serif medium; font-size: 22px " >Top Restaurants</h2>
	
	
	
	<div class="pane" style="display:block">
	<!--<table width="221" border="0" style="border-left:thin; border-left-color: #999999; border-left-style:solid; border-left-width:thin; border-right:thin; border-right-color: #999999; border-right-style:solid; border-right-width:thin; border-top-color:#99999; border-top-style:solid; border-top-width:thin;">
	 <tr>
		<td width="94" align="center" style="font:Arial, Helvetica, sans-serif medium; font-size: 26px; border-bottom-style:solid; border-bottom-width:thin; border-bottom-color:#99999"> Name</td>
	  </tr>	
		<?php
				/*	include ( "../include/data.php");	
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
								<td colspan="2" align="left" style="font:Arial, Helvetica, sans-serif medium; font-size: 22px">&nbsp; <?php  // echo $i+1;?>  .    <?php // echo $thisname;?>&nbsp;</td>
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
	 /* for($i=0;$i<3;$i++)
					{	
						
								
							$thisname4items = MYSQL_RESULT($result4items,$i,"name");
							$thisitem = MYSQL_RESULT($result4items,$i,"item");
						
							
		*/					?>
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
	 <p style="font-size:16px;">Coming Soon</p>
	  </div>
  </div> </td>
  </tr>
</table>
</body>
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
