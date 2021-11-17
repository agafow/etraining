<?php
include('header.php');
include('functions.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
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
                                if (isset($_GET['id'])) {
                                    $tid = $_GET['id'];
                                }else {
                                    exit;
                                    $tid="";
                                }
                                $res = getStaff();
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $row2 = getHisDepartment($row['depid']);
                                    echo "<tr><td>" . $row['sid'] . "</td><td>" . $row['sname'] . "</td><td>" . $row['mobile'] . "</td><td>" . $row['email'] . "</td><td>" . $row2 . "</td><td>";
                                       $stat =  isEnrolled($tid, $row['sid']);
                                       if($stat == "No"){
                                    echo "<form method='post' action='process_en.php?tid={$tid}&sid={$row['sid']}'>
                                         <input class='form-check-input' type='checkbox' value='yes' name='enroll' id=''>
                                         <button class='btn btn-primary btn-sm' name='submit'>Enroll</button> 
                                         </form></td></tr>";
                                       } else {
                                           echo "<br>Registered";
                                           /** 
                                    echo "<form method='post' action='process_en.php?tid={$tid}&sid={$row['sid']}'>
                                        <input class='form-check-input' type='checkbox' value='yes' name='enroll' id=''>
                                        <button class='btn btn-primary btn-sm' name='submit'>Enroll</button> 
                                        </form></td></tr>";*/

                                       }
                                }
                                ?>
                    </tbody>

                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php include('footer.php'); ?>