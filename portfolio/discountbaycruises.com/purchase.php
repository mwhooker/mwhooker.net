<?php
/*
 * Created on Jan 7, 2005
 *-form validation
 *-response validation
 *-email voucher 
 *-respone->db insertion
 *
 *  To change the template for this generated file go to
 *Window - Preferences - PHPeclipse - PHP - Code Templates
 */
session_start();
//mysql_close($_SESSION['id']);

header("Cache-control: private");
//include_once "login/functions.php";


if ($_SESSION['id']=='')
{
	$_SESSION['id']=$link = mysql_connect("localhost", "sfdbc", "102486")
   		or die("We're sorry, there was an error. Please contact the <a href=\"webmaster@discountbaycruises.com\">webmaster</a> and it will be fixed as soon as possible.");
	mysql_select_db("sfdbc") 
		or die("We're sorry, there was an error. Please contact the <a href=\"webmaster@discountbaycruises.com\">webmaster</a> and it will be fixed as soon as possible.");
}

function retrieve_last_fare_id()
{
	$query = "SELECT id FROM periodic_fares WHERE tour_type=\"bay\" AND status=\"update\" ORDER BY date_of_update DESC;";
	//echo"$query";
	$result = mysql_query($query);
	$line = mysql_fetch_array($result, MYSQL_ASSOC);
	mysql_free_result($result);
	return $line["id"];
}

function initialize_row()
{
	$query = "DELETE FROM transactions WHERE purchase_date<NOW() AND approved='i';";
	mysql_query($query) or die(mysql_error());
	$query = sprintf("INSERT INTO transactions (tour_type, purchase_date, fare_id) VALUES ('bay', NOW(), %d);",retrieve_last_fare_id());
	
	mysql_query($query);
	$query = "SELECT voucher_num FROM transactions ORDER BY purchase_date DESC;";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	mysql_free_result($result);
	$_SESSION['voucher_num'] = $row['voucher_num'];	
}


function retrieve_last_fare($tour, $column, $update)
{
	$query = "SELECT $column FROM periodic_fares WHERE tour_type=\"$tour\" AND status=\"$update\" ORDER BY date_of_update DESC;";
	$result = mysql_query($query);
	$line = mysql_fetch_array($result, MYSQL_ASSOC);
	mysql_free_result($result);
	return $line["$column"];
}



function retrieve_transaction_value($field, $id)
{
	$query = sprintf("SELECT $field FROM transactions WHERE voucher_num=%d AND tour_type='bay';",$_SESSION['voucher_num']);
	//echo"$query\n";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	mysql_free_result($result);
	return $row[0];
}


function insert_transaction_value($field, $value, $id)
{
	$query = sprintf("UPDATE transactions SET $field=\"%s\" WHERE voucher_num=%d;",$value,$_SESSION['voucher_num']);
	mysql_query($query);
}



 $includes = array(
                    'purchase'               => 'purchase.php',
                    'checkout'                 => 'checkout.php',
                    'process'				=>	'process.php'                    
                );
                
//printf("%d",$_SESSION['voucher_num']);
 if (isset($_REQUEST["submitted"]) || !empty($_REQUEST["submitted"]))
 {
 	if (!strcmp($_REQUEST["submitted"],"1"))
 	{
 		if (!$_REQUEST["adult"] && !$_REQUEST["child"] && !$_REQUEST["teen"] && !$_REQUEST["senior"])
 		{
 			//initialize_row();
 			$action = 'purchase';
 		}
 		else
 		{
			insert_transaction_value("adult",$_REQUEST['adult'],$_SESSION['voucher_num']);
			insert_transaction_value("teen",$_REQUEST['teen'],$_SESSION['voucher_num']);
			insert_transaction_value("child",$_REQUEST['child'],$_SESSION['voucher_num']);
			insert_transaction_value("senior",$_REQUEST['senior'],$_SESSION['voucher_num']);
			
			$total = (retrieve_last_fare("bay", "child", "update")*retrieve_transaction_value("child",$_SESSION['voucher_num'])) +
				(retrieve_last_fare("bay", "adult", "update")*retrieve_transaction_value("adult",$_SESSION['voucher_num'])) +
				(retrieve_last_fare("bay", "senior", "update")*retrieve_transaction_value("senior",$_SESSION['voucher_num'])) +
				(retrieve_last_fare("bay", "teen", "update")*retrieve_transaction_value("teen",$_SESSION['voucher_num'])
				);
			insert_transaction_value("total","$total");

insert_transaction_value("total_tickets",($_REQUEST['adult']+$_REQUEST['senior']+$_REQUEST['teen']+$_REQUEST['child']));

 			$action = 'checkout';
 		}
 	}
 	if (!strcmp($_REQUEST["submitted"],"2"))
 	{
 		insert_transaction_value("first_name",$_REQUEST['first_name'],$_SESSION['voucher_num']);
 		insert_transaction_value("last_name",$_REQUEST['last_name'],$_SESSION['voucher_num']);
 		insert_transaction_value("email",$_REQUEST['email_address'],$_SESSION['voucher_num']);
 		insert_transaction_value("zip_code",$_REQUEST['zip_code'],$_SESSION['voucher_num']);
 		insert_transaction_value("ip_address",$_SERVER['REMOTE_ADDR'],$_SESSION['voucher_num']);
 		
 	

		$action = 'process';
 		//$action = 'voucher';
 	}
 }
 else
 {
 	initialize_row();
 	$action = 'purchase';
 }
 //$action = 'voucher';
 require( 'include/' . $includes[$action]);

?>
