<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>
<div class="container-fluid mt-5 pb-4">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <h1 class="text-center">Staff at the Ministery</h1>
            <!-- Table -->

            <div class="table-responsive">
                <table class="table table-borderless display nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>

                            <th>Email</th>

                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res = getStaff();
                        while ($row = mysqli_fetch_assoc($res)) {
                            $row2 = getHisDepartment($row['depid']);
                            echo "<tr><td><a href='info_emp.php?id={$row['sid']}'>" . $row['sid'] . "</a></td><td>" . $row['sname'] . "</td><td>" . $row['email'] . "</td><td>" . $row2 . "</td></tr>";
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

<?php include('includes/footer.php'); ?>