<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Lookup Transactions</title>
</head>

<body>
<p align="center">
<img src="../images/whitelogo.gif"> </p>
<form method="POST" action="transactions.php">
<input type="hidden" value="1" name="f">
<p align="center"><b><font size="4">Search for Records</font></b></p>
<table border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFFF00" width="100%" id="AutoNumber1" height="75" bgcolor="#103E45">
  <tr>
    <td width="4%" height="19" bgcolor="#FFCC00" bordercolor="#000000">
    &nbsp;</td>
    <td width="16%" height="19" bgcolor="#FFCC00" bordercolor="#000000">
    <font size="4"><b>Criteria:</b></font></td>
    <td width="87%" height="19" bgcolor="#FFCC00" bordercolor="#000000">&nbsp;</td>
  </tr>
  <tr>
    <td width="4%" height="19" bordercolor="#144E56">
    <font color="#FFFFFF">
    <input type="radio" name="date_type" value="preset" checked></font></td>
    <td width="16%" height="19" bordercolor="#144E56"><font color="#FFFFFF">Preset Date:</font></td>
    <td width="87%" height="19" bordercolor="#144E56"><font color="#FFFFFF"><select name="preset_date">
		<option value="today0"> Today (<?echo(date("D M j, Y"));?>)
		<option value="today1"> <?echo(date("D M j, Y",mktime(0,0,0,date("m"),(date("j")-1),date("Y"))));?>
		<option value="today2"> <?echo(date("D M j, Y",mktime(0,0,0,date("m"),(date("j")-2),date("Y"))));?>
        <option value="today3"> <?echo(date("D M j, Y",mktime(0,0,0,date("m"),(date("j")-3),date("Y"))));?>
        <option value="today4"> <?echo(date("D M j, Y",mktime(0,0,0,date("m"),(date("j")-4),date("Y"))));?>
        <option value="today5"> <?echo(date("D M j, Y",mktime(0,0,0,date("m"),(date("j")-5),date("Y"))));?>
        <option value="week0"> This Week (<?echo(date("D M j, Y",mktime(0,0,0,date("m"),(date("j")-7),date("Y"))));?> - <?echo(date("D M j, Y"));?>)
        <option value="month0"> This Month (<?php echo(date("F, Y"));?>)
        <option value="month1"> <?php echo(date("F, Y",mktime(0,0,0,date("m")-1,1,date("Y"))));?>
        <option value="month2"> <?php echo(date("F, Y",mktime(0,0,0,date("m")-2,1,date("Y"))));?>
        <option value="all"> All Dates
    </font></td>
  </tr>
  <tr>
    <td width="4%" height="18" bordercolor="#144E56">
    <font color="#FFFFFF">
    <input type="radio" name="date_type" value="custom"></font></td>
    <td width="16%" height="18" bordercolor="#144E56"><font color="#FFFFFF">Custom Date:</font></td>
    <td width="87%" height="18" bordercolor="#144E56">
<Table width="100%" style="border-collapse: collapse" bordercolor="#111111" cellpadding="0" cellspacing="0">
	<tr><td align="right" width="10%">
      <p align="left"><font color="#FFFFFF">To:</font></td><td>
		<font color="#FFFFFF">
		<select name="fromMonth">
	<?php
		for ($i = 1; $i<=12; $i++)
		printf ("<option %svalue=\"%s\">%s</option>",$i==date("m") ? "selected " : "", date("m", mktime(0, 0, 0, $i, 1, date("Y"))),date("F", mktime(0, 0, 0, $i, 1, date("Y"))));
	?>
		</select>

	<input type="text" name="fromDay" value="<?php printf("%s",date("j")); ?>" size="2" maxlength="2">
	<select NAME="fromYear" size="1">	
	<?php
		for ($i = 2005; $i<=(date("Y")+1); $i++)
		printf ("<option %svalue=\"$i\">%s</option>",$i==date("Y") ? "selected " : "", date("Y", mktime(0, 0, 0, 1, 1, $i)));
	?>
	</select>
&nbsp; </font> 

	<font size="1" color="#FFFFFF" face="verdana,tahoma,helvetica">Time:

	<input type="text" name="fromHour" value="00" size="2" maxlength="2"> <b>:</b>

	<input type="text" name="fromMinute" value="00" size="2" maxlength="2"> <b>:</b>

	<input type="text" name="fromSecond" value="00" size="2" maxlength="2">

</font>
</td></tr></table>
    </td>
  </tr>
  <tr>
    <td width="4%" height="19" bordercolor="#144E56">&nbsp;</td>
    <td width="16%" height="19" bordercolor="#144E56">&nbsp;</td>
    <td width="87%" height="19" bordercolor="#144E56">
<Table width="100%" style="border-collapse: collapse" bordercolor="#111111" cellpadding="0" cellspacing="0">
	<tr>
<td align="right" width="10%">
      <p align="left"><font color="#FFFFFF">From:</font></td>
<td width="181%">
	
	<font color="#FFFFFF">
	
	<select name="toMonth">
	<?php
		for ($i = 1; $i<=12; $i++)
		printf ("<option %svalue=\"%s\">%s</option>",$i==date("m") ? "selected " : "", date("m", mktime(0, 0, 0, $i, 1, date("Y"))),date("F", mktime(0, 0, 0, $i, 1, date("Y"))));
	?>
	</select>

	<input type="text"name="toDay" value="<?php printf("%s",date("j")); ?>" size="2" maxlength="2">
	<select NAME="toYear" size="1">
	<?php
		for ($i = 2005; $i<=(date("Y")+1); $i++)
		printf ("<option %svalue=\"$i\">%s</option>",$i==date("Y") ? "selected " : "", date("Y", mktime(0, 0, 0, 1, 1, $i)));
	?>
	</select>
&nbsp; </font> 

	<font size="1" color="#FFFFFF" face="verdana,tahoma,helvetica">Time:
	
	<input type="text" name="toHour" value="23" size="2" maxlength="2"> <b>:</b>

	<input type="text" name="toMinute" value="59" size="2" maxlength="2"> <b>:</b>
	
	<input type="text" name="toSecond" value="59" size="2" maxlength="2"></font><font color="#FFFFFF">
    </font>
</td></tr></table>
    </td>
  </tr>
  <tr>
    <td width="4%" height="19" bordercolor="#144E56">&nbsp;</td>
    <td width="16%" height="19" bordercolor="#144E56"><font color="#FFFFFF">Sort By:</font></td>
    <td width="87%" height="19" bordercolor="#144E56">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber2">
      <tr>
        <td><select name="sort_by_type">
        <option value="purchase_date" selected>Date</option>
        <option value="voucher_num">Voucher Number</option>
        <option value="last_name">Last Name</option>
        <option value="total_tickets">Tickets Purchased</option>
        <option value="approved">Approved</option>
        <option value="cc_end">Credit Card #</option>
        </select></td>
        <td><select name="sort_by_order">
        <option value="ASC" selected>Ascending</option>
        <option value="DESC">Descending</option>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width="4%" height="19" bordercolor="#144E56">&nbsp;</td>
    <td width="16%" height="19" bordercolor="#144E56"><font color="#FFFFFF">Search By:</font></td>
    <td width="87%" height="19" bordercolor="#144E56">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber3">
      <tr>
        <td><select name="search_by_type">
        <option value="1" selected>Search by...</option>
        <option value="voucher_num">Voucher Number</option>
        <option value="zip_code">Zip Code</option>
        <option value="PNREF">PNREF</option>
        <option value="authcode">authcode</option>
        <option value="last_name">Last Name</option>
        <option value="total_tickets">Tickets Purchased</option>
        <option value="approved">Approved</option>
        <option value="cc_end">Credit Card #</option>
		</select></td>
        <td><input name="search_by_criteria" type="text" size="20"></td>
      </tr>
    </table>
    </td>
  </tr>
</table>
<p><hr size=1 noshade></p>
<p>&nbsp;<input type="submit" name="Submit Query"></p>
</form>
</body>

</html>