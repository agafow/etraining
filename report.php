<?php
include('includes/functions.php');
include('includes/header.php');

$trainer = getTrainers();
echo "<br>";
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
                while ($data = mysqli_fetch_assoc($trainer)) {
                    echo "['" . $data['trainer'] . "'," . $data['count(*)'] . "],";
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
    <div id="donutchart" style="width: 900px; height: 500px;"></div>

    <br>
    <br>

    <?php include('includes/footer.php'); ?>

</body>

</html>