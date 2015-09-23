<?php
error_reporting(0);
		session_start();
		if (!isset($_SESSION['SESSION'])) 
			require ( "../include/session_init.php");
			
		if ($_SESSION['LOGGEDIN'] != true)
		{
			header("Location: https://www.vitbifi.com");
			exit;
		}
		
		$rest=$_SESSION['m']['rest'];
		
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
		
		function create_slug($string)
		{
		   $string = preg_replace( '/[«»""!?,.!@£$%^&*{};:()]+/', '', $string );
		   $string = strtolower($string);
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
		}
		 
		
		//UPDATING QUANTITY AVAILABLE
		include ( "../include/data.php");	
					$connect=mysql_connect($host,$us,$ps);
					if($connect)
		{
					 $db='vitbifi';
					mysql_select_db($db);
					}
						
		
		$sqlQuery4avail="select DISTINCT * from delivery_time";
		$result4avail = MYSQL_QUERY($sqlQuery4avail);
		$numberOfRows4avail= MYSQL_NUM_ROWS($result4avail); 
		
		$i=0;  
		while($i < $numberOfRows4avail)
		{
			$menuAvail [$i]['menuId']=MYSQL_RESULT($result4avail,$i,"menuId");
			$menuAvail [$i]['deliveryTime']=MYSQL_RESULT($result4avail,$i,"time");
			$menuAvail [$i]['deliveryTime']=get_time_difference($menuAvail [$i]['deliveryTime'],"00:00:00");
			$menuAvail [$i]['link']=MYSQL_RESULT($result4avail,$i,"link");
			$menuAvail [$i]['deliveryPoint']=MYSQL_RESULT($result4avail,$i,"deliveryPoint");
				
			$i++;
		}
		
		$sqlQuery4qty="select DISTINCT * from quantity";
		$result4qty = MYSQL_QUERY($sqlQuery4qty);
		$numberOfRows4qty= MYSQL_NUM_ROWS($result4qty); 
		
		$i=0;  
		while($i < $numberOfRows4qty)
		{
			$menuQty [$i]['link']=MYSQL_RESULT($result4qty,$i,"link");
			$menuQty [$i]['qty']=MYSQL_RESULT($result4qty,$i,"qty");
			
			$i++;
		}
		
		$cart=$_SESSION['CART'];
		 
		 foreach($cart as $key => $row)
		{	
			$menuId=$cart[$key]['id'];
			$qty=$cart[$key]['qty'];
			$query="update menu set orders = (orders + $qty)  where menuId=$menuId";
			$result=mysql_query($query);
		}
		
		  
		  
		foreach($cart as $key => $row)
		{	
			
			$j=0;
			while($j < $numberOfRows4avail)
			{
				if($cart[$key]['time']==$menuAvail [$j]['deliveryTime'] && $cart[$key]['dp']==$menuAvail [$j]['deliveryPoint'] && $cart[$key]['id']==$menuAvail [$j]['menuId'])
				{
					$k=0;
					while($k < $numberOfRows4qty)
					{
						if($menuAvail [$j]['link']==$menuQty [$k]['link'])
							break;
						
						$k++;	
					}
					$menuQty[$k]['qty']-=$cart[$key]['qty'];
					break;
				}
				$j++;			
			}
		}
		$j=0;
		while($j < $numberOfRows4qty)
		{
			$qty=$menuQty[$j]['qty'];
			$link=$menuQty[$j]['link'];
			$sqlQuery="update quantity set qty = '$qty' where link = '$link'";
			$result = MYSQL_QUERY($sqlQuery);
			$j++;			
		}
		
		//CONNECTING TO THE DATABASE USER_DATA

			
			$regNo=$_SESSION[REGNO];
			$query="select * from user_details where regNo='$regNo'";
			$result=mysql_query($query);
			$cap=MYSQL_RESULT($result,0,"curCap");
			$mobile=MYSQL_RESULT($result,0,"mobile");
			$eMail=MYSQL_RESULT($result,0,"email");
			
			$query="select * from restaurant_details where id='$rest'";
			$result=mysql_query($query);
			$mobileR=MYSQL_RESULT($result,0,"mobile");

		
		$cap-=$_SESSION['TOTAL'];
		$regNo=$_SESSION['REGNO'];
		$query="update user_details set curCap = '$cap' where regNo = '$regNo'";
		$result=mysql_query($query);
		
		$amount=$_SESSION['TOTAL'];
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$date=date('Y-m-d');
		$time=date("H:i:s");
		
		$cartMail="";
		
		foreach($cart as $key => $row)
		{	
			$cartMail.=($key+1)."> ".$cart[$key]['qty']."   ".$cart[$key]['item']."   ".$cart[$key]['time']."   ".$cart[$key]['dp'].".\r\n";
		}
		
		$query="insert into orders values(null,'$regNo','$rest','$amount','$date','$time',0)";
		$result=mysql_query($query);
		
		$query="select num from orders where rest = '$rest' and date = '$date' and time = '$time' and user = '$regNo'";
		$result=mysql_query($query);
		$orderNo=mysql_result($result,0,"num");
		
		$query="insert into orders_rest$rest values('$orderNo','$amount','$cartMail','$regNo')";
		$result=mysql_query($query);
	
		
				
		$usersms="Your order with VITBIFI is confirmed.\nTotal Amount: Rs.".$_SESSION['TOTAL']."\nYou still can order for Rs.".$cap.".";
		$restsms="Order No:".$orderNo."\nReg. No:".$regNo."\nMob:".$mobile."\n".$cartMail."\nTotal: Rs.".$_SESSION['TOTAL'];
		
		$usersms=urlencode($usersms);
		$restsms=urlencode($restsms);
		
		
		// create curl resource 
    $ch = curl_init();
	$linkRest="http://BULKSMS.POWEREDSMS.COM/send.php?usr=23431&pwd=bifismsbifi&ph=".$mobileR."&sndr=vitbifi&text=".$restsms;

    // set url 
    curl_setopt($ch, CURLOPT_URL, $linkRest); 

    //return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // close curl resource to free up system resources 
    curl_close($ch);
    // $output now contains the response from poweredsms.com

		
		
		
		// create curl resource 
    $ch = curl_init(); 
	$linkUser="http://BULKSMS.POWEREDSMS.COM/send.php?usr=23431&pwd=bifismsbifi&ph=".$mobile."&sndr=vitbifi&text=".$usersms;
;
    // set url 
    curl_setopt($ch, CURLOPT_URL, $linkUser); 

    //return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // close curl resource to free up system resources 
    curl_close($ch);
	
    // $output now contains the response from poweredsms.com
	
	
	


	$to = $eMail.'@vit.ac.in';
	$subject = "VITBIFI Order Details";
	$message = "Thank you for ordering food from VITBIFI.
-------------------------------------------------------------------------

Don't forget to  bring your ID-CARD & apt change with you!
Registration no.: ".$regNo."
Order No.: ".$orderNo."

Your Orders:\r\n".$cartMail."

Total Amount: Rs.".$amount."

Thank you,
VITBIFI.
 	
".date("H:i:s")."
URL: http://www.vitbifi.com";
	

	
	$from = "VITBIFI_ORDERS@vitbifi.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	$_SESSION['CARTED']=true;
	@session_register('CARTED');
	
	unset($_SESSION['fm']);
	unset($_SESSION['m']);
	unset($_SESSION['CART']);
	unset($_SESSION['TOTAL']);
	unset($_SESSION['POINT']);
	
?>
	<script type="text/javascript" language="javascript"> 
						alert("Your Order has been Confirmed.\n NO more CALLS or SMS from VITBIFI \n BE THERE !!!");
						window.location = "../profile.php";
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
	
<?php	
	exit;
?>
