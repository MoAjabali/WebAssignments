<?php

echo date("Y-m-d H:i:s");
echo "<br>";
echo "---------------------------------";
echo "<br>";

echo date("l");
echo "<br>";
echo "---------------------------------";
echo "<br>";

$date = date_create("2023-01-01");
echo date_format($date, "Y/m/d");
echo "<br>";
echo "---------------------------------";
echo "<br>";

date_add($date, date_interval_create_from_date_string("1 year"));
echo date_format($date, "Y-m-d");
echo "<br>";
echo "---------------------------------";
echo "<br>";

date_add($date, date_interval_create_from_date_string("10 days"));
echo date_format($date, "Y-m-d");
echo "<br>";
echo "---------------------------------";
echo "<br>";

$date1 = date_create("2023-01-01");
$date2 = date_create("2024-01-01");
$diff = date_diff($date1, $date2);
echo $diff->format("%R%a days");
echo "<br>";
echo "---------------------------------";
echo "<br>";

?>
