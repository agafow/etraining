<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>

<?php
$trs = getTrainers();
$numtrs = mysqli_num_rows($trs);

$tr = getTraining();
$numtr = mysqli_num_rows($tr);

$st = getStaff();
$numts = mysqli_num_rows($st);



?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2">

            <div class="card m-2" style="width:11rem;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-3 text-muted"> <i class="fas fa-2x fa-graduation-cap"></i><span class="btit"> <?php echo $numtr; ?> Training
                        </span> </h6>


                    <a href="training.php" class="card-link">Link training</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">

            <div class="card m-2" style="width:11rem;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-3 text-muted"><i class="fas fa-2x fa-chalkboard-teacher"></i>
                        <span class="btit"><?php echo $numts; ?> Staffs </span>
                    </h6>

                    <a href="index.php" class="card-link">Link staff</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">

            <div class="card m-2" style="width:11rem;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-3 text-muted"> <i class="fas fa-2x fa-school"></i>
                        <span class="btit">
                            <?php echo $numtrs; ?> Trainers </span>
                    </h6>

                    <a href="trainers1.php" class="card-link">Link of trainers</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card m-2" style="width:12rem;">
                <div class="card-body">

                    <h6 class="card-subtitle mb-2 text-muted"> <i class="fas fa-2x fa-award"></i> <span class="btit">
                            <?php echo $numts; ?> Certificates </span> </h6>

                    <a href="infoTraining.php" class="card-link">List of certificates</a>

                </div>
            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>


<?php require_once("includes/footer.php"); ?>