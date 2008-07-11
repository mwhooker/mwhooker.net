<h4><font face=arial color=000066>Results</font></h4>




<?php
//turn if/else if chain in switch in to one function
//f= 1,2,3,4 vid=voucher num
require("functions.php");
session_start();


function format_date()
{
	$criteria = unserialize($_SESSION['s_criteria']);
	if (!strcmp($criteria[date_type],"preset"))
	{
		$date['today0'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,date("m"),date("j"),date("Y"))),date("YmdHis",mktime(23,59,59,date("m"),date("j"),date("Y"))));
		$date['today1'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,date("m"),(date("j")-1),date("Y"))),date("YmdHis",mktime(23,59,59,date("m"),(date("j")-1),date("Y"))));
		$date['today2'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,date("m"),(date("j")-2),date("Y"))),date("YmdHis",mktime(23,59,59,date("m"),(date("j")-2),date("Y"))));
		$date['today3'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,date("m"),(date("j")-3),date("Y"))),date("YmdHis",mktime(23,59,59,date("m"),(date("j")-3),date("Y"))));
		$date['today4'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,date("m"),(date("j")-4),date("Y"))),date("YmdHis",mktime(23,59,59,date("m"),(date("j")-4),date("Y"))));
		$date['today5'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,date("m"),(date("j")-5),date("Y"))),date("YmdHis",mktime(23,59,59,date("m"),(date("j")-5),date("Y"))));
		$date['week0'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(date("H"),date("i"),date("s"),date("m"),(date("j")-7),date("Y"))),date("YmdHis"));
		$date['month0'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,date("m"),1,date("Y"))),date("YmdHis"));
		$date['month1'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,(date("m")-1),1,date("Y"))),date("YmdHis",mktime(23,59,59,date("m"),0,date("Y"))));
		$date['month2'] = sprintf("AND purchase_date >= %s AND purchase_date <= %s",date("YmdHis",mktime(0,0,0,(date("m")-2),1,date("Y"))),date("YmdHis",mktime(23,59,59,(date("m")-1),0,date("Y"))));
		$date['all'] = "";
		return $date[$criteria[preset_date]];
	}
	else
	{
		$to = sprintf("%s%s%s%s%s%s%s",$criteria['toYear'],$criteria['toMonth'],strlen($criteria['toDay'])==1 ? "0" : "",$criteria['toDay'],$criteria['toHour'],$criteria['toMinute'],$criteria['toSecond']);
		$from = sprintf("%s%s%s%s%s%s%s",$criteria['fromYear'],$criteria['fromMonth'],strlen($criteria['fromDay'])==1 ? "0" : "",$criteria['fromDay'],$criteria['fromHour'],$criteria['fromMinute'],$criteria['fromSecond']);
		$return = sprintf("AND purchase_date >= %s AND purchase_date <= %s",$from,$to);
		return $return;
	}
}


function format_where()
{
	$criteria = unserialize($_SESSION['s_criteria']);
	
	if (!strcmp($criteria['search_by_type'],"approved"))
	{
		if (!strcasecmp($criteria['search_by_criteria'],"yes"))
		{
			$criteria['search_by_criteria'] = "y";
			$_SESSION['s_criteria'] = serialize($criteria);
			$criteria = unserialize($_SESSION['s_criteria']);
		}
		else if (!strcasecmp($criteria['search_by_criteria'],"no"))
		{
			$criteria['search_by_criteria'] = "n";
			$_SESSION['s_criteria'] = serialize($criteria);
			$criteria = unserialize($_SESSION['s_criteria']);
		}
		else if (!strcasecmp($criteria['search_by_criteria'],"incomplete"))
		{
			$criteria['search_by_criteria'] = "i";
			$_SESSION['s_criteria'] = serialize($criteria);
			$criteria = unserialize($_SESSION['s_criteria']);
		}
	}
	
	if (!strcmp($criteria['search_by_type'],"PNREF"))
	{
		$where_case = sprintf("`d_PNREF`=\"%s\" OR `a_PNREF`=\"%s\"",$criteria['search_by_criteria'],$criteria['search_by_criteria']);
	}
	else if (!strcmp($criteria['search_by_type'],"authcode"))
	{
		$where_case = sprintf("`d_authcode`=\"%s\" OR `a_authcode`=\"%s\"",$criteria['search_by_criteria'],$criteria['search_by_criteria']);
	}
	else if ($criteria['search_by_type']==1)
	{
		$where_case = "1";
	}
	else 
	{
		$where_case = sprintf("%s=\"%s\"",$criteria['search_by_type'],$criteria['search_by_criteria']);
	}	
	return $where_case;
}


function print_transactions_main($result)
{
	
	$num_cols = mysql_num_fields($result);
	$num_rows = mysql_num_rows($result);
	if ($num_rows>0)
	{
		printf("<span style='font-family: verdana; color: 000066; font-size: 8pt; font-weight: bold;'>%d Result$s</span>",$num_rows, $num_rows==1 ? "" : "s");
		echo"<table cellspacing=0 cellpadding=0 height=7><tr><td></td></tr></table>"; //wtf?
		echo "<table style='font-family: verdana; font-size: 8pt; color: 000066;' cellpadding=5 cellspacing=1 bgcolor=CACAD2 width=500>";
		$header = "<tr bgcolor=EFEFEF>";
		$body = "";
	
		$field = array("Date of Purchase","Voucher Number","Last Name","Tickets purchased","Approved","cc#");
	
		for ($i = 0; $i<$num_cols; $i++)
		{
			//$field = mysql_fetch_field($result, $i);
			$header .= "<td><b>$field[$i]</b></td>";
		}
		$header .= "</tr>";
	}
	
	while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
	{
		$vid = $row['voucher_num'];
		$body .= "<tr bgcolor=FFFFFF>";
		$body .= "<td>$row[purchase_date]</td>";
		$body .= "<td><a href=\"transactions.php?f=2&vid=$vid\">$vid</a></td>";
		$body .= "<td><a href=\"transactions.php?f=3&vid=$vid\">$row[last_name]</a></td>";
		$body .= "<td><a href=\"transactions.php?f=4&vid=$vid\">$row[total_tickets]</a></td>";
		if (!strcmp($row[approved],'y')) $body .= "<td>yes</td>";
		else if (!strcmp($row[approved],'n')) $body .= "<td>no</td>";
		else if (!strcmp($row[approved],'i')) $body .= "<td>incomplete</td>";
		$body .= "<td>$row[cc_end]</td>";
		$body .= "</tr>";
	}
	
	
	echo $header;
	echo $body;
	
	echo "</table>";
	echo"<table cellspacing=0 cellpadding=0 height=7><tr><td></td></tr></table>"; //wtf?
	if ($num_rows>0)
		printf("<span style='font-family: verdana; color: 000066; font-size: 8pt; font-weight: bold;'>%d Result$s</span>",$num_rows, $num_rows==1 ? "" : "s");
	else
		print("<span style='font-family: verdana; color: 000066; font-size: 8pt; font-weight: bold;'>No Results</span>");
	mysql_free_result($result);
}



function print_customer_information($result)
{
	$num_cols = mysql_num_fields($result);
	$num_rows = mysql_num_rows($result);
	
	echo "<table style='font-family: verdana; font-size: 8pt; color: 000066;' cellpadding=5 cellspacing=1 bgcolor=CACAD2 width=500>";
	$header = "<tr bgcolor=EFEFEF>";
	$body = "";

	$field[] = "Last Name";
	$field[] = "First Name";
	$field[] = "CC#";
	$field[] = "Zip Code";
	$field[] = "Email Address";
	$field[] = "IP Address";

	for ($i = 0; $i<$num_cols; $i++)
	{
		//$field = mysql_fetch_field($result, $i);
		$header .= "<td><b>$field[$i]</b></td>";
	}
	$header .= "</tr>";

	
	while ($row = mysql_fetch_row($result))
	{
		$body .= "<tr bgcolor=FFFFFF>";
		for ($i=0; $i<$num_cols; $i++)
		{
			$body .= "<td>$row[$i]</td>";
		}
		$body .= "</tr>";
	}
	
	
	echo $header;
	echo $body;
	
	echo "</table>";

	mysql_free_result($result);
	echo "<BR><A HREf=\"transactions.php?f=5\">Go Back</A>";	
}




function print_verisign_transactions($result)
{
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	printf("<table style='font-family: verdana; font-size: 8pt; color: 000066;' cellpadding=5 cellspacing=1 bgcolor=CACAD2 width=500>
	<tr bgcolor=EFEFEF>" .
		"<td><b>v# %d</b></td>" .
		"<td><B>PNREF</b></td>" .
		"<td><b>Authcode</b></td>" .
	"</tr><tr bgcolor=FFFFFF>" .
		"<td bgcolor=EFEFEF><b>Authorize</b></td>" .
		"<td>%s</td>" .
		"<td>%s</td>" .
	"</tr><tr bgcolor=FFFFFF>" .
		"<td bgcolor=EFEFEF><b>Delayed Capture</b></td>" .
		"<td>%s</td>" .
		"<td>%s</td>" .
	"</tr></table>",$_GET['vid'],$row['a_PNREF'],$row['a_authcode'],$row['d_PNREF'],$row['d_authcode']);
	echo "<BR><A HREf=\"transactions.php?f=5\">Go Back</A>";
	mysql_free_result($result);
}



function print_payment_information($result)
{
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$adult_fare  = retrieve_fare_by_id("bay", "adult", $row['fare_id']);
	$senior_fare  = retrieve_fare_by_id("bay", "senior", $row['fare_id']);
	$teen_fare  = retrieve_fare_by_id("bay", "teen", $row['fare_id']);
	$child_fare  = retrieve_fare_by_id("bay", "child", $row['fare_id']);
	
	printf("<table style='font-family: verdana; font-size: 8pt; color: 000066;' cellpadding=5 cellspacing=1 bgcolor=CACAD2 width=500>
	<tr bgcolor=EFEFEF>" .
		"<td><b>v# %d</b></td>" .		
		"<td><B>Sale Price</b></td>" .			
		"<td><B>Purchased</b></td>" .
		"<td><b>Amount Spent</b></td>" .
	"</tr><tr bgcolor=FFFFFF>" .
		"<td bgcolor=EFEFEF><b>Adult</b></td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
	"</tr><tr bgcolor=FFFFFF>" .
		"<td bgcolor=EFEFEF><b>Senior</b></td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
	"</tr><tr bgcolor=FFFFFF>" .
		"<td bgcolor=EFEFEF><b>Teen</b></td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
	"</tr><tr bgcolor=FFFFFF>" .
		"<td bgcolor=EFEFEF><b>Child</b></td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
	"</tr><tr bgcolor=FFFFFF>" .
		"<td bgcolor=EFEFEF><b>Total</b></td>" .
		"<td></td>" .
		"<td>%d</td>" .
		"<td>%d</td>" .
	"</tr></table>",$_GET['vid'],
	$adult_fare, $row['adult'],($row['adult']*$adult_fare),
	$senior_fare, $row['senior'],($row['senior']*$senior_fare),
	$teen_fare, $row['teen'],($row['teen']*$teen_fare),
	$child_fare, $row['child'],($row['child']*$child_fare),
	$row['total_tickets'],$row['total']);
	echo "<BR><A HREf=\"transactions.php?f=5\">Go Back</A>";
	mysql_free_result($result);
}



switch ($_REQUEST['f']) {
case 1:
	$_SESSION['s_criteria'] = serialize($_POST);
	$order_by = sprintf("%s %s",$_REQUEST['sort_by_type'],$_REQUEST['sort_by_order']);
	$query = sprintf("SELECT purchase_date, voucher_num, last_name, total_tickets, approved, cc_end FROM transactions WHERE %s %s ORDER BY $order_by;",format_where(),format_date());
	print_transactions_main(execute_mysql_query("$query"));
	break;
case 2:
	$query = sprintf("SELECT a_authcode, d_authcode, a_PNREF, d_PNREF FROM transactions WHERE voucher_num=%d",$_REQUEST['vid']);
	print_verisign_transactions(execute_mysql_query($query));
	break;
case 3:
	$query = sprintf("SELECT last_name, first_name, cc_end, zip_code, email, ip_address FROM transactions WHERE voucher_num=%s;",$_REQUEST[vid]);
	print_customer_information(execute_mysql_query($query));
	break;
case 4:
	$query = sprintf("SELECT fare_id, adult, senior, child, teen, total, total_tickets FROM transactions WHERE voucher_num=%d",$_GET['vid']);
	print_payment_information(execute_mysql_query($query));
	break;
case 5:
	$us_criteria = unserialize($_SESSION['s_criteria']);
	$order_by = sprintf("%s %s",$us_criteria['sort_by_type'],$us_criteria['sort_by_order']);
	$query = sprintf("SELECT purchase_date, voucher_num, last_name, total_tickets, approved, cc_end FROM transactions WHERE %s %s ORDER BY $order_by;",format_where(),format_date());
	print_transactions_main(execute_mysql_query("$query"));
break;
default:
	header("Location: lookup.php");
	break;
}



print("<p><A HREF=\"lookup.php\"><span style='font-family: verdana; color: 000066; font-size: 8pt; font-weight: bold;'>New Search</span></a></p>");
echo "<p><hr size=1 noshade>";
$today = date("F j, Y, g:ia");
echo "Report formatted on $today";
?>