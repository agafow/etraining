<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>


<div class="container-fluid mt-5 mb-3">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1 class="text-center"> Here are Trainers</h1>

            <!-- Table -->

            <div class="table-responsive">
                <table class="table table-borderless display nowrap table-sm table-hover" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Number</th>
                            <th>Trainers</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Type </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res = getTrainingByYear();
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<tr><td>" . $row['YEAR(start_date)'] . "</td><td>"  . $row['count(*)'] . "</td></tr>";
                            $rest = getTrainersThisYear($row['YEAR(start_date)']);
                            while ($row2 = mysqli_fetch_assoc($rest)) {
                                echo "<tr><td> </td><td> </td><td>"  . $row2['trainer'] . "</td><td>"  . $row2['tname'] . "</td><td>"  . $row2['location'] . "</td><td>"  . $row2['type'] . "</td></tr>";
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-1"></div>
<br><br>
<?php include('includes/footer.php'); ?>