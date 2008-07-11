<html>

<head>
<meta http-equiv="CoFntent-Type" content="text/html; charset=windows-1252">
<title>DiscountBayCruises.com - Purchase Voucher</title>
<style>

.bot{
	color: FFCC00;
	font-size: 11px;
	font-family: tahoma,verdana,arial;
}
.bot:hover{color: red;}

TD{
font-size: 11px;
FONT-FAMILY: tahoma,verdana,arial;
color: BDBDBD;
}
</style>
<script language="JavaScript1.2" src="mm_functions.js"></script>
</head>

<body LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH="0" MARGINHEIGHT="0" onLoad="MM_preloadImages('images/but1.gif','images/but2.gif','images/but3.gif','images/but4.gif','images/but5.gif','images/but6.gif','images/but1_2.gif','images/but2_2.gif','images/but3_2.gif','images/but4_2.gif')">

<script language="JavaScript1.2">mmLoadMenus();</script>

<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" bgcolor="#FFFFFF" style="border-collapse: collapse" bordercolor="#111111">
  <tr>
    <td colspan="3" width="830" background="images/fon3.gif" height="442">
    <img border="0" src="images/master-MP_01.gif" width="611" height="24"><img border="0" src="images/master-MP_02.gif" width="165" height="24"><br>
			<img border="0" src="images/purchase_05.gif" width="55" height="24"><A HREF="http://www.discountbaycruises.com/"><img border="0" src="images/purchase_06.gif" width="45" height="24"></A><A HREF="http://www.discountbaycruises.com/links.htm"><img border="0" src="images/purchase_07.gif" width="47" height="24"></A><A HREF="http://www.discountbaycruises.com/services.php"><img border="0" src="images/purchase_08.gif" width="66" height="24"></A><A HREF="http://www.discountbaycruises.com/vtour.htm"><img border="0" src="images/purchase_09.gif" width="85" height="24"></A><A HREF="mailto:webmaster@discountbaycruises.com"><img border="0" src="images/purchase_10.gif" width="77" height="24"></A><img border="0" src="images/purchase_11.gif" width="236" height="24"><img border="0" src="images/t5.gif" width="17" height="24"><a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image13','','images/but1_2.gif',1)" href="http://www.discountbaycruises.com/index.php"><img src="images/but1.gif" name="Image13" border="0" width="21" height="24"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_showMenu(window.mm_menu_0201175758_0,650,45,null,'links');MM_swapImage('Image14','','images/but2_2.gif',1)"><img src="images/but2.gif" name="Image14" border="0" width="21" height="24"></a><!----<a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','images/but3.gif',1)" href="voucher.php">--><img src="images/but3_2.gif" name="Image15" border="0" width="19" height="24"></a><a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image16','','images/but4_2.gif',1)" href="mailto:webmaster@discountbaycruises.com"><img src="images/but4.gif" name="Image16" border="0" width="21" height="24"></a><img border="0" src="images/services_17.gif" width="66" height="24"><br>
    <img border="0" src="images/services_18.gif" width="776" height="139"><br>
    <img border="0" src="images/purchase_20.gif" width="287" height="39"><img border="0" src="images/purchase_21.jpg" width="119" height="39"><table border="0" width="800" height="216" cellspacing="0" cellpadding="0" background="images/purchase_24.jpg">
        <tr>
          <td valign="top" style="padding-left: 50; padding-right: 16" width="321" height="216">

          <p align="justify"><font face="Tahoma">The Discount Bay Cruises
          Service  </font></p>
          </td>
          <td valign="top" width="125" height="216">
          	</td>
          <td valign="top" style="padding-left: 0; padding-right: 0" width="262" height="216">
         <font face="Myriad Roman" color="#FFFFFF" size="2">How many tickets would you like to&nbsp; 
          buy?</font><br><?php if ($_REQUEST['submitted']=='1') echo("<b><u><font color=\"red\">Please select at least one ticket!</font></b></u>"); ?>
          <form method="POST" action="purchase.php" name="purchasing">
          <table border="2" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#BDBDBD" id="AutoNumber1" height="105" width="282" bgcolor="#124951" bordercolorlight="#BDBDBD" bordercolordark="#BDBDBD">
            <tr>
              <td height="39" width="94" bordercolordark="#BDBDBD"><b><font face="Tahoma" color="#FFFFFF">Adult:</font></b></td>
              <td height="39" width="69" align="center"><select size="1" name="adult">
                        <option selected value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>                        
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        </select>
              </td>
              <td height="39" width="119"><?php printf ("$%d.00",retrieve_last_fare("bay", "adult","update")); ?> </td>
            </tr>
            <tr>
              <td height="39" width="94"><font face="Tahoma" color="#FFFFFF"><b>Senior (60+):</b></font</td>
              <td height="39" width="69" align="center"><select size="1" name="senior">
                        <option selected value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>                        
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        </select>
          </td>
              <td height="39" width="119"><?php printf ("$%d.00",retrieve_last_fare("bay", "senior","update"));?></td>
            </tr>
            <tr>
              <td height="39" width="94"><b><font face="Tahoma" color="#FFFFFF">Teen (12-18):</font></b></td>
              <td height="39" width="69" align="center"><select size="1" name="teen">
                        <option selected value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>                        
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                                  </select></td>
              <td height="39" width="119"><?php printf ("$%d.00",retrieve_last_fare("bay", "teen","update"));?></td>
            </tr>
            <tr>
              <td height="39" width="94"><b><font face="Tahoma" color="#FFFFFF">
              Child (5-11):</font></b></td>
              <td height="39" width="69" align="center"><select size="1" name="child">
              <option selected value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>                        
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>          </select></td>
              <td height="39" width="119"> <?php  printf ("$%d.00",retrieve_last_fare("bay", "child","update"));?></td>
            </tr>
          </table>
          </td>
          <input type="hidden" name="submitted" value="1">

         </td>
        </tr>
      </table></td>
    <td width="162" background="images/fon3.gif" height="442"></td>
  </tr>
  <tr>
    <td background="images/fon1.gif" valign="top" width="463" height="216">
    <p align="center"><br>
    <img border="0" src="images/flag1.jpg" width="320" height="240"></td>
    <td valign="top" bgcolor="#0A292D" width="1" height="216">
    <img border="0" src="images/line.gif" width="1" height="39"></td>
    <td background="images/fon1.gif" valign="top" width="366" height="216">

    <table border="0" cellpadding="5" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber2" align="right" width="348">
      <tr>
        <td width="112">
        &nbsp;</td>
        <td width="216">
        <p align="center">&nbsp;</td>
      </tr>
      <tr>
        <td width="112">
        <input type="submit" value="Checkout" name="submit"></form></td>
        <td width="216">
        <p align="center"></td>
      </tr>
      <tr>
        <td width="112"></td>
        <td width="216"><img border="0" src="images/step1.gif" width="216" height="144"></td>
      </tr>
      <tr>
        <td width="112">&nbsp;</td>
        <td width="216">&nbsp;</td>
      </tr>
    </table>
    <p align="center">&nbsp;</td>

    <td width="162" background="images/fon1.gif" height="216"></td>
  </tr>
  <tr>
    <td background="images/fon2.gif" height="14" width="463">&nbsp;</td>
    <td background="images/fon2.gif" height="14" width="1"></td>
    <td background="images/fon2.gif" height="14" width="366"></td>
    <td width="162" background="images/fon2.gif" height="14"></td>
  </tr>
  <tr>

    <td style="padding-left: 0" bgcolor="#103E45" height="39" width="463"><font color="#FFFFFF">
    2004-2005 (c) Copyright DiscountBayCruises.com. All rights reserved.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></td>
    <td style="padding-right: 0" bgcolor="#103E45" height="39" colspan="2" align="right" width="367">
    <p align="center"><font color="#FFFFFF">&nbsp;<a class="bot" href="http://www.discountbaycruises.com/index.php">home</a>&nbsp; |&nbsp;
    <a class="bot" href="http://www.discountbaycruises.com/links.htm">links</a>&nbsp;
      |&nbsp;<a class="bot" href="http://www.discountbaycruises.com/services.php">services</a>&nbsp; |&nbsp;

    <a class="bot" href="http://www.discountbaycruises.com/vtour.htm">virtual tour</a>&nbsp;
      |&nbsp; <a href="mailto:webmaster@discountbaycruises.com" class="bot">contact us</a></font></td>
    <td width="162" bgcolor="#103E45" height="39"></td>
  </tr>
</table>

</body>
</html>