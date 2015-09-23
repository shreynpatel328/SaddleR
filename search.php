<?php
 session_start();
	   
	    if (!isset($_SESSION['SESSION'])) 
	   		require ( "include/session_init.php");
	   
	    if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: https://www.vitbifi.com");
			exit;
	    }
		
		$regNo=$_SESSION['REGNO'];
		$connect=mysql_connect('localhost','root');
			$db='USER_DATA';
			mysql_select_db($db);



?>
<?php
$thisKeyword = $_REQUEST['keyword'];
?>
<?php



$sqlQuery = "select * from user_details where name like '%$thisKeyword%'  OR year like '%$thisKeyword%'  
		OR branch like '%$thisKeyword%'  OR no like '%$thisKeyword%'  OR email like '%$thisKeyword%'  
		";

		// ORDER BY $newSortOrder ";
		
		
		
		
$result = MYSQL_QUERY($sqlQuery);
$numberOfRows = MYSQL_NUM_ROWS($result);



?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Smart Tab - a javascript jQuery tab control</title>
<link href="css/demo_style.css" rel="stylesheet" type="text/css">
<link href="css/smart_tab.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="eat/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jquery/gvn1.js"></script>
<link rel="stylesheet" type="text/css" href="css/etc.css">
	<link rel="stylesheet" type="text/css" media="screen, projection"  href="css/tweet.css">
	<link rel="stylesheet" type="text/css" href="css/background1.css">
	<link rel="stylesheet" type="text/css" href="css/top.css">
	



<link href="css/smart_tab_vertical.css" rel="stylesheet" type="text/css">
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




<script type="text/javascript">
   
    $(document).ready(function(){
    	// Smart Tab    	
  		$('#tabs').smartTab({autoProgress: true,stopOnFocus:true,transitionEffect:'slide'});

		});
</script>






</head><body>
<div align="center">
<table width="1280" height="87" border="0">
  <tr>
    <td width="250" height="81" align="left" valign="top">
		<img id="saddler" src="images/saddler.jpg" border="2"/>	</td>
   <td width="550" align="left" valign="top"><div id="accordion">
		
			<!-- accordion header #1 -->
			<img class="current" src="images/streaminge.png">
			
			<div style="width: 180px; display: block;">
				<h3><a href="eat/eat.php">EAT</a></h3>
				<p>
					Consectetur adipiscing elit. Praesent bibendum eros ac nulla. Integer vel lacus ac neque viverra.		</p>
			</div>
			
			<img src="images/flash.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Cras diam. Donec dolor lacus, vestibulum at, varius in, mollis id, dolor. Aliquam erat volutpat.		</p>
			</div>
		
			<img src="images/streaming.png">
			
			<div>
				<h3>Coming Soon</h3>
				<p>
					Non lectus lacinia egestas. Nulla hendrerit, felis quis elementum viverra, purus felis egestas magna.		</p>
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
       <p class="forgot"> <a href="user/account.php">Account</a> </p>
       <p class="forgot"> <a href="user/settings.php">Settings</a> </p>
      <p class="remember">
        <input name="signin_submit" value="Sign Out" tabindex="6" type="submit">
	 </p>
     </form>
  </fieldset>
</div>
	    <label><p></br></p>
		<form name="customersPowerSearchForm" method="POST" action="search.php">
	    <input type="text" name="keyword" value="" /><input id="search" name="Submit"
 value="Search" type="submit">
    </label>
</table>

<table width="1280" height="403" border="0">
  <tr>
    <td width="194">&nbsp;</td>
    <td width="963" align="left" valign="middle"><p>    
    <p>
	<br />
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<?php
if ($numberOfRows==0) {  
?>

 Sorry. No records found !!

<?php
}
else if ($numberOfRows>0) {

	$i=0;
?>
            <table border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td height="450px" valign="top">

<!-- Tabs -->
  		<div id="tabs" class="stContainer">
  			<ul>
  				<li><a href="#tabs-1">
                
                <h2>User<br />
                </h2>

            </a></li>
  				<li><a href="#tabs-2">
               
                <h2>dsfsd<br />
                </h2>
            </a></li>
  				<li><a href="#tabs-3">
                

                <h2>Tab 3<br />
                </h2>
             </a></li>
  				
  			</ul>
			
			
			
  			<div id="tabs-1">
            
			  
			  <table width="890" border="0">
                <tr>
                  <td width="184"><strong>Name</strong></td>
                  <td width="264"><strong>year</strong></td>
                  <td width="249"><strong>branch</strong></td>
                  <td width="165"><strong>email</strong></td>
                </tr>
                
				<?php
 

	while ($i<$numberOfRows)
	{

		
	$thisname = MYSQL_RESULT($result,$i,"name");
	$thisyear = MYSQL_RESULT($result,$i,"year");
	$thisbranch = MYSQL_RESULT($result,$i,"branch");
	$thisno = MYSQL_RESULT($result,$i,"no");
	$thisemail = MYSQL_RESULT($result,$i,"email");
	
?><tr>
                  <td><?php echo $thisname; ?>&nbsp;</td>
                  <td><?php echo $thisyear; ?>&nbsp;</td>
                  <td><?php echo $thisbranch; ?>&nbsp;</td>
                  <td><?php echo $thisemail; ?>&nbsp;</td>
                </tr>
				<?php
		$i++;

	} // end while loop
?>
              </table>		
        </div>
  			<div id="tabs-2">
            <h2>Tab 2 Content</h2>	
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            </p>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            </p>
            <p>

            Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            </p> 
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            </p>          
        </div>                      
  			<div id="tabs-3">
            <h2>Tab 3 Content</h2>	
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            </p>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            </p>

            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            </p>                				          
        </div>
  			
  		</div>
	
</td></tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>

	
	
	<?php
} // end of if numberOfRows > 0 
 ?>
	
	&nbsp;</p></td>
    <td width="109">&nbsp;</td>
  </tr>

</table>
</body>
</html>
