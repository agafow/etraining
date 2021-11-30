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
                <table class="table table display nowrap table-sm table-hover" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>Trainers</th>
                            <th>Training Name</th>
                            <th>Location</th>
                            <th>Type </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res = getAllTraining();
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<tr><th>" . $row['trainer'] . "</th><th>"  . $row['tname'] . "</th><th>"  . $row['location'] . "</th><th>"  . $row['type'] . "</th></tr> <td colspan='4'>";
                            $rest = getTinformation($row['tid']);
                            echo "<table class='table'>";

                            while ($row2 = mysqli_fetch_assoc($rest)) {
                                echo "<tr><td></td><td></td><td>"  . $row2['sname'] . "</td><td>"  . $row2['email'] . "</td><td>"  . $row2['dname'] . "</td></tr>";
                            }
                            echo "</table></td>";
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