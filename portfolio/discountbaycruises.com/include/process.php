<?php
/*
 * Created on Jan 11, 2005 with the help of Eclipse
 * 
 * Unless stated otherwise, all work Copyright 2005, Matthew Hooker
 * 
 * Borrowed open-source code is the work of its respective author
 */

//require("process.inc");


$vendor = "discountgeoker";
$user = "discountgeoker";
$partner = "gpinc";
$pwd = "hk422j9";


$PFPRO_EXE_PATH = "/home/u4/sfdbc/bin";

putenv("PFPRO_CERT_PATH=/home/u4/sfdbc/certs");
$temp = getenv("LD_LIBRARY_PATH");
putenv("LD_LIBRARY_PATH=/home/u4/sfdbc/lib");
$temp = getenv("PATH");
putenv("PATH=/home/u4/sfdbc/bin:$temp");
//printf("%s<BR>",getenv("PATH"));
//printf("%s<BR>",getenv("LD_LIBRARY_PATH"));

#########################################################
###
### Sample Verisign Transaction Scripts
###
##########################################################
### initialize these variables to the correct values to localize to your system
###

//print "Content-type: text/HTML", "\n\n";

# parse the passed variables and place in contents


$host = "test-payflow.verisign.com";
$port = 443;

	
$street = sprintf("%s %s %s %s",$_REQUEST['street_address'],$_REQUEST['street_address2'],$_REQUEST['city'],$_REQUEST['state']);
$parms = sprintf("TRXTYPE=A&TENDER=C&PWD=$pwd&USER=$user&VENDOR=$vendor&PARTNER=$partner&ACCT=%s&EXPDATE=%s%s&AMT=%s&ZIP=%s&STREET=$street&CUSTREF=%s&comment1=discount bay cruises",$_REQUEST['account_num'],$_REQUEST['ed_mo'],$_REQUEST['ed_year'],retrieve_transaction_value("total", $_SESSION['voucher_num']),$_REQUEST['zip_code'],$_SESSION['voucher_num']);

//echo("$parms<BR>");

$cmd = "/home/u4/sfdbc/bin/pfpro $host $port \"$parms\" 30";	

$status = shell_exec("$cmd");
//echo("$status");

//RESULT=0&PNREF=V64N72018615&RESPMSG=Approved&AUTHCODE=030591&AVSADDR=X&AVSZIP=X&IAVS=X



if (!strcmp($status,"")) {

  die("We're sorry, there was an error, please try again at another time.\n");

}

parse_str($status);

if (!strcmp("$AVSADDR","N") || !strcmp("$AVSZIP","N") || !strcmp("$IAVS","N"))
{
insert_transaction_value("approved","n",$_SESSION['voucher_num']);
	die("Your address was indicated as invalid. Due to security precautions we cannot complete this transaction. Please go back and make sure everything was entered correctley.");
}

if ($RESULT!=0)
{
insert_transaction_value("approved","n",$_SESSION['voucher_num']);
	die("There was an error processing your card, please go back and make sure that your card information was entered correctley");
}


insert_transaction_value("a_PNREF",$PNREF,$_SESSION['voucher_num']);
insert_transaction_value("a_authcode",$AUTHCODE,$_SESSION['voucher_num']);
$cc_len = strlen($_REQUEST['account_num']);
$cc_end = sprintf("%s",$_REQUEST['account_num']);

insert_transaction_value("cc_end",substr($cc_end, ($cc_len-4), 4),$_SESSION['voucher_num']);
//insert_transaction_value("zip_code",$_REQUEST['zip_code'],$_SESSION['voucher_num']);
//insert_transaction_value("email",$_REQUEST['email_address'],$_SESSION['voucher_num']);

include("include/voucher.php");

$parms = sprintf("TRXTYPE=D&TENDER=C&PWD=$pwd&USER=$user&VENDOR=$vendor&PARTNER=$partner&ORIGID=$PNREF");

$cmd = "/home/u4/sfdbc/bin/pfpro $host $port \"$parms\" 30";
$status = shell_exec("$cmd");
//echo("$status");
parse_str($status);
insert_transaction_value("d_PNREF",$PNREF,$_SESSION['voucher_num']);
insert_transaction_value("d_authcode",$AUTHCODE,$_SESSION['voucher_num']);
insert_transaction_value("approved","y",$_SESSION['voucher_num']);

mysql_close($_SESSION['id']);

 unset($_SESSION['voucher_num']);
if (isset($_COOKIE[session_name()])) {
   setcookie(session_name(), '', time()-42000, '/');
}

// Finally, destroy the session.
session_destroy();
?>