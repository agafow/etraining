<?php
include('functions.php');
$datas = getTrainers();
$pie_chart = array();
foreach($datas as $data){
    $pie_chart[] = array($data['trainer'], (int)$data['count(*)']);
    //echo $dd['trainer']." ".$dd['count(*)']."<br>";
}
$pie_chart = json_encode($pie_chart);
echo $pie_chart;
return $pie_chart;
?>