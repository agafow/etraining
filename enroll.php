<?php
include('header.php');
include('functions.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="container p-3">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Staff at the Ministery</h1>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless display nowrap" id="example" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>

                                    <th>Department</th>
                                    <th>Enroll</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['tid'])) {
                                    $tid = $_GET['tid'];
                                }
                                $res = getStaff();
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $row2 = getHisDepartment($row['depid']);
                                    echo "<tr><td>" . $row['sid'] . "</td><td>" . $row['sname'] . "</td><td>" . $row['mobile'] . "</td><td>" . $row['email'] . "</td><td>" . $row2 . "</td><td>     <form method='post' action=''><input class='form-check-input' type='checkbox' value='' id=''> <button class='btn btn-primary btn-sm' name='submit'>Enroll</button> </form></td><td></td></tr>";
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