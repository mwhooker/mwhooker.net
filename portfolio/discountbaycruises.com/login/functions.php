   <?php
$host = "jaguar.gerpok.com";
$sqluser = "mattweb";
$sqlpass = "asdr43fsa3";

function execute_mysql_query($query)
{
$link = mysql_connect($GLOBALS['host'], $GLOBALS['sqluser'], $GLOBALS['sqlpass'])
   or die("Could not connect : " . mysql_error());
mysql_select_db("mwhooker") or die("Could not select database");

$result = mysql_query($query) or die("Query failed : " . mysql_error());

mysql_close($link);
return $result;
}

function add_total($col)
{
$query = "SELECT $col FROM transactions WHERE $col!=\"0\" AND approved=\"y\";";
$result = execute_mysql_query($query);
while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
{
$total += $line["$col"];
}
mysql_free_result($result);
//printf ("%d", $total);
return $total;
}

function get_price_total($col)
{
//find appropriate price for each record
$total = 0;
$querys = "SELECT $col, id FROM periodic_fares WHERE status=\"update\";";
$results = execute_mysql_query($querys);
while ($row = mysql_fetch_array($results, MYSQL_ASSOC))
{
$query = sprintf("SELECT %s FROM transactions WHERE fare_id=%d AND approved=\"y\";",$col,$row["id"]);
$result = execute_mysql_query($query);
$col_total = 0;
while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
$col_total += $line["$col"];
$total += $col_total*$row["$col"];
}
mysql_free_result($results);
mysql_free_result($result);

return $total;
}

function retrieve_last_fare($tour, $column, $update)
{
$query = "SELECT $column FROM periodic_fares WHERE tour_type=\"$tour\" AND status=\"$update\" ORDER BY date_of_update DESC;";
$result = execute_mysql_query($query);
$line = mysql_fetch_array($result, MYSQL_ASSOC);
mysql_free_result($result);
return $line["$column"];
}

function retrieve_fare_by_id($tour, $column, $id)
{
$query = "SELECT $column FROM periodic_fares WHERE tour_type=\"$tour\" AND id=$id";
$result = execute_mysql_query($query);
$line = mysql_fetch_array($result, MYSQL_ASSOC);
mysql_free_result($result);
return $line["$column"];
}

function canIUpdate($a_fares)
{
//retrieve_last_fare($tour, $column)
$canI = 0;
foreach($a_fares as $column => $value)
{
list ($fare, $id) = retrieve_last_fare("bay", "$column", "update");
if ($fare!=$value)
$canI++;
}
if ($canI)
return 1;
else
return 0;

}

?>