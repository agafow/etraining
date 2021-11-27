<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); 


$datas = getTrainers();
$colchart = getTrainersByName();
//$pie_chart = array();
//foreach($datas as $data){
// $pie_chart[] = array($data['trainer'], (int)$data['count(*)']);
//echo $dd['trainer']." ".$dd['count(*)']."<br>";
//}
//$pie_chart = json_encode($pie_chart);
//echo $pie_chart;
//return $pie_chart;
while($row = mysqli_fetch_assoc($colchart)){
echo $row['YEAR(start_date)']." ".$row['trainer'];
}
//$pie_chart = json_encode($colchart);
//print_r($pie_chart);
//echo "<br>";

?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Trainers', 'Courses'],
            <?php  
                while($data = mysqli_fetch_assoc($datas)){
                echo "['".$data['trainer']."',".$data['count(*)']."],";
                
            }
            ?>

        ]);

        var options = {
            title: 'My Daily Activities',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
    </script>

</head>

<body>
    <div id="donutchart" style="width: 600px; height: 300px;"></div>

</body>

</html>