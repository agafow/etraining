<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>


<div class="container-fluid mt-5 mb-3">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <h1 class="text-center"> Incoming Training </h1>
            <h2> <a href="addTraining.php">Add a new training </a></h2>
            <!-- Table -->

            <div class="table-responsive">
                <table class="table table-borderless display nowrap table-sm  table-hover" id="example"
                    style="width:100%">
                    <thead>
                        <tr>

                            <th>Trainer </th>
                            <th>Training Name</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Takes</th>

                            <th>Enroll </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res =  getTraining();
                        while ($row = mysqli_fetch_assoc($res)) {
                        
                            $diff_days = (strtotime($row['end_date']) - strtotime($row['start_date']))/60/60/24;
                            $row2 = getHisDepartmentProject($row['project_id']);
                            echo "<tr><td>"  . $row['trainer'] . "</td><td>"  . $row['tname'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $diff_days . " Days </td><td><a href='enroll.php?id={$row['tid']}'>Enroll</a></td></tr>";
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