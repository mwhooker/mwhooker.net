<html>

<?php

 	require "functions.php";

?>

<head>
<title>Amount Purchased</title>
</head>

<body>

<p>
<img border="0" src="../images/whitelogo.gif" width="780" height="139"></p>
<table border="1" cellpadding="0" cellspacing="0" width="36%" id="AutoNumber1" style="border: .75pt solid navy" fpstyle="13,011111100">
  <tr>
    <td width="15%" style="font-weight: bold; color: white; border-style: none; background-color: navy">&nbsp;</td>
    <td width="50%" style="font-weight: bold; color: white; border-style: none; background-color: navy">
    Tickets Purchased</td>
    <td width="85%" style="font-weight: bold; color: white; border-style: none; background-color: navy">
    Income</td>
  </tr>
  <tr>
    <td width="15%" style="font-weight: normal; color: black">Adult</td>
    <td width="50%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: silver">
    <?php printf ("%d",add_total("adult")); ?></td>
    <td width="85%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: #E5E5E5">
    <?php printf ("$%d.00",get_price_total("adult"));?>
</td>
  </tr>
  <tr>
    <td width="15%" style="font-weight: normal; color: black">Senior</td>
    <td width="50%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: silver">
    <?php printf ("%d",add_total("senior")); ?></td>
    <td width="85%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: #E5E5E5">
    <?php printf ("$%d.00",get_price_total("senior"));?>
</td>
  </tr>
  <tr>
    <td width="15%" style="font-weight: normal; color: black">Teen</td>
    <td width="50%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: silver">
    <?php printf ("%d",add_total("teen")); ?></td>
    <td width="85%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: #E5E5E5">
    <?php printf ("$%d.00",get_price_total("teen"));?>
</td>
  </tr>
  <tr>
    <td width="15%" style="font-weight: normal; color: black">Child</td>
    <td width="50%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: silver">
    <?php printf ("%d",add_total("child")); ?></td>
    <td width="85%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: #E5E5E5">
    <?php printf ("$%d.00",get_price_total("child"));?>
</td>
  </tr>
  <tr>
    <td width="15%" style="font-weight: normal; color: black"><b>Total</b></td>
    <td width="50%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: silver">
    <?php printf ("%d",add_total("adult")+add_total("teen")+add_total("senior")+add_total("child"));?>
    <td width="85%" style="font-weight: bold; color: black; border-left-style: none; border-right: .75pt solid navy; border-top-style: none; border-bottom-style: none; background-color: #E5E5E5">
    <?php printf ("$%d.00",(get_price_total("adult")+get_price_total("senior")+get_price_total("teen")+get_price_total("child")));?>
</td
  </tr>
</table>

</body>
<?php
$today = date("F j, Y, g:ia");
echo "Report formatted on $today";
?>

</html>
