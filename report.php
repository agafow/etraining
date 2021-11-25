<?php
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>


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

    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Element', 'Density', {
                role: 'style'
            }],

            <?php  
                while($data1 = mysqli_fetch_assoc($colchart)){
                echo "['".$data1['trainer']."','".$data1['YEAR(start_date)']."','Golden'], ";
                
            }
            ?>
        ]);



        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Density of Precious Metals, in g/cm^3",
            width: 600,
            height: 400,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
    </script>
</head>

<body>
    <div id="donutchart" style="width: 600px; height: 300px;"></div>
    <div id="barchart_values" style="width: 600px; height: 300px;"></div>
</body>

</html>