<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>


<div class="container-fluid mt-5 pb-4">
    <div class="row">
        <div class="col-md-4">
            <h1 class="text-center">Graph</h1>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">

                <h5 class="card-title">Pie chart</h5>
                <div class="card-body">
                    <div class="chart-container pie-chart">

                        <canvas id="pie_chart"></canvas>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">xx</div>
    </div>
</div>

<script>
makechart();

function makechart() {
    $.ajax({
        url: "data.php",
        method: "POST",
        data: {
            action: 'fetch'
        },
        dataType: "JSON",
        success: function(data) {
            var trainer = [];
            var total = [];
            var color = [];
            for (var count = 0; count < data.length; count++) {
                trainer.push(data[count].trainer);
                total.push(data[count].total);
                color.push(data[count].color);
            }
            var chart_data = {
                labels: trainer,
                datasets: [{
                    label: 'Vote',
                    backgroundColor: color,
                    color: '#fff',
                    data: total
                }]
            };
            var options = {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0
                        }
                    }]
                }
            };
            var group_chart1 = $('#pie_chart');
            var graph1 = new chart(group_chart1, {
                type: "pie",
                data: chart_data
            });
            var group_chart2 = $('#doughnut_chart');
            var graph2 = new chart(group_chart2, {
                type: "doughnut",
                data: chart_data
            });
            var group_chart3 = $('#bar_chart');
            var graph3 = new chart(group_chart3, {
                type: "bar",
                data: chart_data,
                options: options
            });
        }
    })
}
</script>


<?php require_once("includes/footer.php"); ?>