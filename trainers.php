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
                <table class="table table-borderless display nowrap" id="example" style="width:auto;">

                    <tbody>
                        <?php
                        $res = getTraining();
                        while ($row = mysqli_fetch_assoc($res)) {
                        
                            $diff_days = (strtotime($row['end_date']) - strtotime($row['start_date']))/60/60/24;
                            //$row2 = getHisDepartmentProject($row['project_id']);
                            echo "<tr><td>"  . $row['trainer'] . "</td><td>"  . $row['tname'] . "</td><td>" . $row['start_date']. "</td><td>" . $diff_days . " Days </td></tr>";
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