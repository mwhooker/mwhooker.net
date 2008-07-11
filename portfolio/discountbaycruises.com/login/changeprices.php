<html>

<head>
<title>edit prices</title>
</head>

<body>
<p>
<img border="0" src="../images/whitelogo.gif" width="780" height="139"></p>
<?php
  	require("functions.php");

if ($_POST['done'] == 'changed')
{
	$fare= array("adult" => $_POST['adult'], "senior" => $_POST['senior'], "teen" => $_POST['teen'], "child" => $_POST['child']);
	
	$fare_old = array("adult" => $_POST['adult_old'], "senior" => $_POST['senior_old'], "teen" => $_POST['teen_old'], "child" => $_POST['child_old']);

	if (canIUpdate($fare))
	{
		foreach ($fare as $num) {
			if (!is_numeric($num))
				die("Updated Fares must be numbers! Please go back and try again");
		}
	} 
	$query = sprintf("INSERT INTO periodic_fares (adult, senior, teen, child, tour_type, status, date_of_update) VALUES (%s, %s, %s, %s, \"bay\", \"update\", NOW());",$fare['adult'], $fare['senior'], $fare['teen'], $fare['child']);

	execute_mysql_query($query);


//is_array_numeric($fare_old) or die("Updated Old Fares must be numbers! Please go back and try again");
foreach ($fare_old as $num => $val) {
	if (!is_numeric($val))
		die("Updated Fares must be numbers! Please go back and try again");
}
foreach ($fare_old as $type => $value) {
$udquery = "UPDATE periodic_fares SET $type=$value WHERE id=1;";
execute_mysql_query($udquery);

}
}
?>
Note that these prices will be reflected on the main page so please make sure everything is correct.<br>
Also please make sure that the numbers entered are infact numbers, or you will get errors.


<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="251" id="AutoNumber1">
  <tr>
    <th width="0" nowrap bgcolor="#99CCFF" bordercolor="#008000"><b>
    <font size="4">Fare Type</font></b></th>
    <th width="0" nowrap bgcolor="#99CCFF" bordercolor="#008000">
    <font face="Times New Roman" size="4"><b>Old Fares</b></font></th>
    <th width="0" nowrap bgcolor="#99CCFF" bordercolor="#008000"><b>
    <font size="4">Fares</font></b></th>
  </tr>
  <tr>
    <td width="0">Adult</td>
    <td width="0">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">

      <input type="text" name="adult_old" size="10" value="<?php printf ("%d",retrieve_last_fare("bay", "adult","old"));?>">
    </td>
    <td width="0">

      <input type="text" name="adult" size="10" value="<?php printf ("%d",retrieve_last_fare("bay", "adult","update"));?>"></td>
  </tr>
  <tr>
    <td width="0">Senior</td>
    <td width="0">
    <input type="text" name="senior_old" size="10" value="<?php printf ("%d",retrieve_last_fare("bay", "senior","old"));?>">
    </td>
    <td width="0">

      <input type="text" name="senior" size="10" value="<?php printf ("%d",retrieve_last_fare("bay", "senior","update"));?>"></td>
  </tr>
  <tr>
    <td width="0">Teen</td>
    <td width="0">

      <input type="text" name="teen_old" size="10" value="<?php printf ("%d",retrieve_last_fare("bay", "teen","old"));?>"></td>
    <td width="0">

      <input type="text" name="teen" size="10" value="<?php printf ("%d",retrieve_last_fare("bay", "teen","update"));?>"></td>
  </tr>
  <tr>
    <td width="0">Child</td>
    <td width="0">

      <input type="text" name="child_old" size="10" value="<?php printf ("%d",retrieve_last_fare("bay", "child","old"));?>"></td>
    <td width="0">

      <input type="text" name="child" size="10" value="<?php printf ("%d",retrieve_last_fare("bay", "child","update"));?>"></td>
  </tr>
  </table>
  <input type="hidden" name="done" value="changed">
  <input type="submit" value="Submit Changes">
</form>
</body>

</html>

