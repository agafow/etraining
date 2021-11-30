<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h2 class="text-center">Information about Employee </h2>
            <div class="table-responsive">
                <table class="table table-borderless display nowrap" id="example" style="width:70%">
                    </tbody>
                    <?php
                    if (isset($_GET['id'])) {
                        $tid = $_GET['id'];
                        $restr = getInfoEmployee($tid);
                        $row =  mysqli_fetch_array($restr);

                        echo "<tr><td class='rep'>Name :</td><td>" . $row['sname'] .  "</td></tr>";
                        echo "<tr><td class='rep'>Mobile : </td><td>" . $row['mobile'] .  "</td></tr>";
                        echo "<tr><td class='rep'>Email : </td><td>" . $row['email'] .  "</td></tr>";
                        echo "<tr><td class='rep'>Department :</td><td>" . $row['dname'] .  "</td></tr>";
                        echo "<tr><td  class='rep'>Couses takes </td><td></tr>";
                        echo "<tr><td>" . $row['tname'] .  "</td><td>" . $row['start_date'] .  "</td><td>" . $row['end_date'] .  "</td><td>" . $row['location'] .  "</td></tr>";
                        if (mysqli_num_rows($restr) > 1) {
                            while ($row = mysqli_fetch_array($restr)) {
                                echo "<tr><td>" . $row['tname'] .  "</td><td>" . $row['start_date'] .  "</td><td>" . $row['end_date'] .  "</td><td>" . $row['location'] .  "</td></tr>";
                            }
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1">

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>