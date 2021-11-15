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


                <div class="col-md-12">
                    <h1 class="text-center"> Incoming Training </h1>
                    <h2> <a href="addTraining.php">Add a new training </a></h2>
                    <!-- Table -->

                    <div class="table-responsive">
                        <table class="table table-borderless display nowrap" id="example" style="width:100%">
                            <thead>
                                <tr>


                                    <th>Training Name</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Students</th>
                                    <th>Department</th>
                                    <th>Enroll </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res =  getTraining();
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $row2 = getHisDepartmentProject($row['project_id']);
                                    echo "<tr><td>"  . $row['tname'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['nstudents'] . "</td><td>" .$row2 ."</td><td><a href=''>Enroll</a></td></tr>";
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