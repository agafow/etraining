<?php
include('functions.php');
$datas = getTrainers();
$pie_chart = array();
foreach($datas as $data){
    $pie_chart[] = array($data['trainer'], (int)$data['count(*)']);
    //echo $dd['trainer']." ".$dd['count(*)']."<br>";
}
$pie_chart = json_encode($pie_chart);
//echo $pie_chart;
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

        var data = google.visualization.arrayToDataTable([
            ["Trainers", "Counts", "Years"],
            ["CRATES", 2018, 4],
            ["IMF", 2019, 9],
            ["OECD-BRITACOM ", 2020, 1],
            ["World Bank", 2021, 2]
        ]);

        var options = {
            title: 'Fertility rate vs life expectancy in selected countries (2010).' +
                ' X=Life Expectancy, Y=Fertility, Bubble size=Population, Bubble color=Region',
            hAxis: {
                title: 'Life Expectancy'
            },
            vAxis: {
                title: 'Fertility Rate'
            },
            bubble: {
                textStyle: {
                    fontSize: 11
                }
            }
        };

        var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div id="series_chart_div" style="width: 900px; height: 500px;"></div>
</body>

</html>