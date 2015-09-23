<?php
			
			function get_time_difference($time1, $time2) 
			{
				$time1 = strtotime("1980-01-01 $time1");
				$time2 = strtotime("1980-01-01 $time2");
				
				
				return date("H:i:s", strtotime("1980-01-01 00:00:00") + ($time1 - $time2));
			}
			
			
			include ( "../include/data.php");	
					$connect=mysql_connect($host,$us,$ps);
					if($connect)
		{
					 $db='vitbifi';
					mysql_select_db($db);
					}
						
			
									
			$sqlQuery4menu="select DISTINCT m.menuId as menuId, m.orderTime as orderTime from menu m where 1";
			$result4menu = MYSQL_QUERY($sqlQuery4menu);
			$numberOfRows4menu= MYSQL_NUM_ROWS($result4menu);
			
			$sqlQuery4avail="select DISTINCT menuId, time, link from delivery_time";
			$result4avail = MYSQL_QUERY($sqlQuery4avail);
			$numberOfRows4avail= MYSQL_NUM_ROWS($result4avail); 
			
			$sqlQuery4qty="select DISTINCT link from quantity;";
			$result4qty = MYSQL_QUERY($sqlQuery4qty);
			$numberOfRows4qty= MYSQL_NUM_ROWS($result4qty);
			
			$i=0;  
			while($i < $numberOfRows4qty)
			{
				$menuQty [$i]['link']=MYSQL_RESULT($result4qty,$i,"link");
							
				$i++;
			}
			
			$i=0;  
			while($i < $numberOfRows4avail)
			{
				$menuAvail [$i]['menuId']=MYSQL_RESULT($result4avail,$i,"menuId");
				$menuAvail [$i]['deliveryTime']=MYSQL_RESULT($result4avail,$i,"time");
				$menuAvail [$i]['link']=MYSQL_RESULT($result4avail,$i,"link");
				
				$i++;
			}
			
			$i=0;  
			while($i < $numberOfRows4menu)
			{
				$menu [$i]['menuId']=MYSQL_RESULT($result4menu,$i,"menuId");
				$menu [$i]['orderTime']=MYSQL_RESULT($result4menu,$i,"orderTime");
			
				$i++;
			}
			
			// Obtain a list of columns
			foreach ($menuAvail as $key => $row) 
			{
				$link[$key]  = $row['link'];
				$delTime[$key]  = $row['deliveryTime'];
			}
			
			// Add $data as the last parameter, to sort by the common key
			array_multisort($link, SORT_ASC, $delTime, SORT_ASC, $menuAvail);
			
			$link=0;
			
			$i=0;
			while($i < $numberOfRows4avail)
			{
				if($i==0 || $menuAvail[$i]['link'] != $menuAvail[($i-1)]['link'])
				{
						$link=$menuAvail[$i]['link'];
						$dTime=$menuAvail[$i]['deliveryTime'];
						$j=0;
						while($j < $numberOfRows4menu)
						{
							 if($menuAvail[$i]['menuId']==$menu[$i]['menuId'])
							 {
							 	  $oTime=$menu[$i]['orderTime'];
								  $timeDiff=get_time_difference($dTime, $oTime);
								  $query="insert into order_time (link,time) values ($link,$timeDiff)";
								  $result=mysql_query($query);
								  break;
							 }
						}
				}		
								
			}
			
			header("Location: http://www.google.com");
			exit;
					
?>