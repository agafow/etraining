<?php
include('header.php');
include('functions.php');
include('validate.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="container">
            <div class="row">

                <div class="col-md-1"></div>
                <div class="col-md-9">
                    <h1 class="text-center"> Incoming Training </h1>
                    <!-- Table -->

                    <div class="table-responsive">
                        <table class="table table-borderless display nowrap" id="example" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Proje t ID</th>
                                    <th>Training Name</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Students</th>
                                    <th>Project</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res =  getTraining();
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $row2 = getHisDepartmentProject($row['project_id']);
                                    echo "<tr><td>" . $row['project_id'] . "</td><td>" . $row['tname'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['nstudents'] . "</td><td>" .$row2 ."</td></tr>";
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>