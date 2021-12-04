<?php
include('includes/header.php');
include('includes/functions.php');
$trainer = getTrainers();
$trainer2 = getTrainers();
$trainType = getCourseType();
$gender = getGender();
$trainType2 = getCourseType();
?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load Charts and the corechart and barchart packages.
        google.charts.load('current', {
            'packages': ['corechart']
        });

        // Draw the pie chart and bar chart when Charts is loaded.
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php
                while ($data = mysqli_fetch_assoc($trainer)) {
                    echo "['" . $data['trainer'] . "'," . $data['count(*)'] . "],";
                }
                ?>
            ]);

            var piechart_options = {
                title: 'Pie Chart : Here are Trainers  ',
                width: 400,
                height: 300
            };
            var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
            piechart.draw(data, piechart_options);

            var barchart_options = {
                title: 'Barchart:  Here are Trainers',
                width: 400,
                height: 300,
                legend: 'none'
            };
            var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
            barchart.draw(data, barchart_options);




        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php
                while ($data2 = mysqli_fetch_assoc($trainer2)) {
                    echo "['" . $data2['trainer'] . "'," . $data2['count(*)'] . "],";
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
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Face2Face', 'Virtual'],
                <?php
                while ($data = mysqli_fetch_assoc($trainType)) {
                    echo "['" . $data['year'] . "'," . $data['Face2Face'] . "," . $data['Virtual'] . "],";
                }
                ?>

            ]);

            var options = {
                title: 'Training Type',
                hAxis: {
                    title: 'Year',
                    titleTextStyle: {
                        color: '#333'
                    }
                },
                vAxis: {
                    title: 'Number of training',
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <!-- Colum chart start here-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Female', 'Male'],
                <?php
                while ($data3 = mysqli_fetch_assoc($gender)) {
                    echo "['" . $data3['year'] . "'," . $data3['female'] . "," . $data3['male'] . "],";
                }
                ?>
            ]);

            var options = {
                chart: {
                    title: 'Gender plance ',
                    subtitle: 'Staff training : 2017 - 2021 ',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Face2Face', 'Virtual'],
                <?php
                while ($data = mysqli_fetch_assoc($trainType2)) {
                    echo "['" . $data['year'] . "'," . $data['Face2Face'] . "," . $data['Virtual'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Training by type',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>



</head>

<body>
    <!--Table and divs that hold the pie charts-->
    <div class="container-fluid m-3 mt-5 ">
        <div class="row">
            <div class="col-md-4">
                <div id="piechart_div" style="border: 1px dotted #ccc"></div>
            </div>
            <div class="col-md-4">
                <div id="barchart_div" style="border: 1px dotted #ccc"></div>
            </div>
            <div class="col-md-4">
                <div id="donutchart" style="width: 400px; height: 300px;"></div>

            </div>
            <div class="col-md-4">
                <div id="chart_div" style="width: 100%; height: 300px;"></div>
            </div>
            <div class="col-md-4">
                <div id="columnchart_material" style="width: 100%; height: 300px;"></div>

            </div>
            <div class="col-md-4">
                <div id="curve_chart" style="width: 100%; height: 300px"></div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>