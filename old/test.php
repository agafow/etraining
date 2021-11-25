<?php

$todays = date('Y-m-d');

$conv = strtotime($todays);
echo date("l jS \of F Y ",$conv)."<br><br>";


$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}
?>