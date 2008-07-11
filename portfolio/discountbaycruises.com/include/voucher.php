<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Discount Bay Cruise Voucher</title>
</head>

<body>

<p align="center">
    <img border="0" src="images/whitelogo.gif" width="776" height="139"></p>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFFFFF" width="96%" id="AutoNumber2">
  <tr>
    <td width="25%" valign="bottom"><font size="2">Voucher #<?php printf("%d",$_SESSION['voucher_num']);?> </font>
    </td>
    <td width="57%">

<p align="center">

<b><font size="6">Bay Cruise Voucher</font></b></p>

    </td>
    <td width="18%"><font size="2">
    <img border="0" src="images/barcode.gif" width="85" height="54" align="left"></font></td>
  </tr>
</table>
<hr>
<p align="left">Dear <?php printf("%s %s",retrieve_transaction_value("first_name", $_SESSION['voucher_num']),retrieve_transaction_value("last_name", $_SESSIOM['voucher_num']));?>,</p>
<p align="left">Thank you for your order and your interest in Discount Bay 
Cruises.</p>
Print this voucher as it is your proof of purchase and boarding 
pass.
This voucher expires three months after its date of purchase and 
is valid only for tours on the Red and White Fleet.<!--- We will also email you a 
copy of the voucher for safe keeping.--><p>If your voucher is lost or stolen, you must visit the ticket office in person 
the day you plan to take the tour. Be prepared to 
present a valid photo ID and the last four digits of the credit card used to 
purchase your ticket. </p>
<p>This voucher is valid only for the amount of tickets purchased.</p>
<p>For questions, email <a href="mailto:refunds@discountbaycruises.com">
questions@discountbaycruises.com</a>&nbsp; </p>
<hr>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5">
  <tr>
    <td width="50%">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber6" width="448">
      <tr>
        <td width="144"><b><font size="4">Customer Name:</font></b></td>
        <td width="304"><?php printf("%s %s",retrieve_transaction_value("first_name", $_SESSION['voucher_num']),retrieve_transaction_value("last_name", $_SESSIOM['voucher_num']));?></td>
      </tr>
      <tr>
        <td width="144"><b><font size="4">Date of Purchase:</font></b></td>
        <td width="304"><?php printf("%s",date("F j, Y"));?></td>
      </tr>
      <tr>
        <td width="144"><b><font size="4">Tour:</font></b></td>
        <td width="304">Bay Cruise</td>
      </tr>
      <tr>
        <td width="144"><font size="4"><b>Valid Through:</b></font></td>
        <td width="304"><?php printf("%s",date("F j, Y",mktime(0, 0, 0, date("m")+3  , date("j"), date("Y"))));?></td>
      </tr>
      <tr>
        <td width="144"><font size="4"><b>Tickets purchased</b></font><b><font size="4">:</font></b></td>
        <td width="304">&nbsp;&nbsp; <?php printf("S: %d; A: %d; T: %d; C: %d",
			retrieve_transaction_value("senior",$_SESSION['voucher_num']),
			retrieve_transaction_value("adult",$_SESSION['voucher_num']),
			retrieve_transaction_value("teen",$_SESSION['voucher_num']),
			retrieve_transaction_value("child",$_SESSION['voucher_num'])
			);?></td>
      </tr>
            <tr>
        <td width="144"><font size="4"><b>Total: </b></font><b><font size="4">:</font></b></td>
        <td width="304">&nbsp;&nbsp; <?php printf("$%s.00",
			retrieve_transaction_value("total",$_SESSION['voucher_num']));?></td>
      </tr>
    </table>
    </td>
    <td width="50%">
    <p align="center"><img border="0" src="images/step3.gif" width="216" height="144"></td>
  </tr>
</table>
<b>
<font size="4"><br>X________________________________________________/__________</font>
</b>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
  <tr>
    <td width="8%">&nbsp;</td>
    <td width="37%"><b>Signature</b></td>
    <td width="105%"><b>Date</b></td>
  </tr>

</table>
<br>By signing above you agree to pay the total amount according to the card issuer's agreement.
<hr>
<p align="left"><b><font size="4">Helpful Information:</font></b></p>
<ul>
  <li>
  All tours depart from Pier 43<sup>1/2</sup> on Fisherman's 
Wharf.
  </li>
  <li>
  We have an open-seating policy on all tours.
  </li>
  <li>
  Passengers should arrive at least fifteen minutes prior to the tour's scheduled departure time.
  </li>
  <li>
  It gets rather windy on the bay -  outerwear is strongly 
recommended.
  </li>
  <li>
Don't forget to bring your camera to capture the picturesque 
sights of the San Francisco Bay.&nbsp;
  </li>
  <li>
Schedule information can be found at http://www.discountbaycruises.com/services.php</li>
</ul>

</body>

</html>
