<?php

		include ( "include/data.php");	
		$connect=mysql_connect($host,$us,$ps);
		$db='vitbifi';
		mysql_select_db($db, $connect);

		$query="select * from orders_vit where 1";
		$result=mysql_query($query);
		$rows=mysql_num_rows($result);
		
		$i=0;  
		while($i < $rows)
		{
			$order [$i]['orderId']=MYSQL_RESULT($result,$i,"num");
			$order [$i]['amt']=MYSQL_RESULT($result,$i,"amount");
			$order [$i]['date']=MYSQL_RESULT($result,$i,"date");
			$order [$i]['time']=MYSQL_RESULT($result,$i,"time");
			$order [$i]['suc']=MYSQL_RESULT($result,$i,"success");
	
			$i++;
		}
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
<tr>
<td>
<?php echo ' OrderId ';?>
</td>
<td width="150" align="center">
<?php echo '         Date       ';?>
</td>
<td width="150" align="center">
<?php echo '         Time       ';?>
</td>
<td width="60" align="center">
<?php echo '    Amt    ';?>
</td>
<td>
<?php echo ' Success ';?>
</td>
</tr>
<?php
$i=0;
while($i<$rows)
{
?>
<tr>
<td align="center">
<?php echo $order [$i]['orderId'];?>
</td>
<td align="center">
<?php echo $order [$i]['date'];?>
</td>
<td align="center">
<?php echo $order [$i]['time'];?>
</td>
<td align="center">
<?php echo $order [$i]['amt'];?>
</td>
<td align="center">
<?php echo $order [$i]['suc'];?>
</td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>
