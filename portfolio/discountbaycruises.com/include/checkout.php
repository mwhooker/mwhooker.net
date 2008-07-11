<html>

<head>
<title>Checkout</title>
</head>

<body>

</body>
</html>
    <img border="0" src="images/whitelogo.gif" width="776" height="139"><html><body><table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">
  <tr>
    <td>

<form method="POST" action="purchase.php">
  <div align="left">
    &nbsp;<table border="0" width="100%" height="%100">
    <tr>
      <td width="126" height="30">First Name<font color="#FF0000">*</font>: </td>
      <td width="326" height="30"><input name="first_name" size="35" ></td>
    </tr>
    <tr>
      <td width="126" height="30">Last Name<font color="#FF0000">*</font>:</td>
      <td width="326" height="30"><input name="last_name" size="35"></td>
    </tr>
    <tr>
      <td width="126" height="30">Email Address<font color="#FF0000">*</font>:&nbsp; </td>
      <td width="326" height="30"><input name="email_address" size="35" ></td>
    </tr>
    <tr>
      <td width="126" height="30">Street Address<font color="#FF0000">*</font>:&nbsp; </td>
      <td width="326" height="30"><input name="street_address" size="35" ></td>
    </tr>
        <tr>
      <td width="126" height="30">Address2 (optional): </td>
      <td width="326" height="30"><input name="street_address2" size="35" ></td>
    </tr>
        <tr>
      <td width="126" height="30">City<font color="#FF0000">*</font>:&nbsp; </td>
      <td width="326" height="30"><input name="city" size="35" ></td>
    </tr>
        <tr>
      <td width="126" height="30">State<font color="#FF0000">*</font>:&nbsp; </td>
      <td width="326" height="30"><input name="state" size="35" ></td>
    </tr>
        <tr>
      <td width="126" height="30">Zip Code<font color="#FF0000">*</font>:&nbsp; </td>
      <td width="326" height="30"><input name="zip_code" size="35" ></td>
    </tr>
  </table>
  </div>
  <p>Card Information:<BR>
  We accept:
Visa, Mastercard, AmericanExpress, and&nbsp;JBC.</p>
<P>
<TABLE height="%100" width="%100" border=0>

  <TR>
    <TD width=126 height=30>Card Type<font color="#FF0000">*</font>:&nbsp; </TD>
    <TD width=326 height=30><SELECT name="card_type">
    <option selected>Visa</option>
    <option>Mastercard</option>
    <option>AmericanExpress</option>
    <option>JBC</option>
    </SELECT></TD></TR>
  <TR>
    <TD width=126 height=30>Card Number<font color="#FF0000">*</font>:&nbsp; </TD>
    <TD width=326 height=30><INPUT size=35 name=account_num></TD></TR>
  <TR>
    <TD width=126 height=30>Expiration Date<font color="#FF0000">*</font>:&nbsp; </TD>
    <TD width=326 height=30><select size="1" name="ed_mo">
    <option selected>MM</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    </select>/<select size="1" name="ed_year">
    <option selected>YY</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    </select></TD></TR>
  </TABLE>
  <p>Note: a red asterisk (<font color="#FF0000">*</font>) denotes a required 
  field.</p>
  <input type="hidden" name="submitted" value="2">

<P><input type="submit" value="Process" name="B1"></P>

</form>
    <p>&nbsp;</td>
    <td>
    Tickets in Shopping Cart:<table border="0" width="150" height="%100" cellpadding="0" cellspacing="0" style="border-collapse: collapse">
      <tr>
        <td width="75">Adult:</td>
        <td width="75"><?php printf("$%d",retrieve_last_fare("bay", "adult", "update")*retrieve_transaction_value("adult",$_SESSION['voucher_num']));?></td>
      </tr>
      <tr>
        <td width="75">Senior:</td>
        <td width="75"><?php printf("$%d",retrieve_last_fare("bay", "senior", "update")*retrieve_transaction_value("senior",$_SESSION['voucher_num']));?></td>
      </tr>
      <tr>
        <td width="75">Teen:</td>
        <td width="75"><?php printf("$%d",retrieve_last_fare("bay", "teen", "update")*retrieve_transaction_value("teen",$_SESSION['voucher_num']));?></td>
      </tr>
      <tr>
        <td width="75">Child:</td>
        <td width="75"><?php printf("$%d",retrieve_last_fare("bay", "child", "update")*retrieve_transaction_value("child",$_SESSION['voucher_num']));?></td>
      </tr>
      </table>
      <img border="0" src="images/bar.jpg" width="136" height="2"><br>
      <table border="0" width="150" height="%100" cellpadding="0" cellspacing="0" style="border-collapse: collapse">
      <tr>
        <td width="75" bordercolor="#FF0000"><b>Total:</b></td>
        <td width="75" bordercolor="#FF0000"><?php printf("$%d.00",$total/*retrieve_transaction_value("total",$_SESSION['voucher_num'])*/);?></td>
      </tr>
    </table>
    If this is not correct, or to modify<br>your shopping cart, click 
    <a href="purchase.php">here</a>.<p><img border="0" src="images/step2.gif" width="216" height="144"></td>
  </tr>
</table>
</body>
</html>