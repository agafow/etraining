<?php

include("header.php");
include("validate_tr.php");
include("functions.php");
//print_r($_SESSION);
if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
    echo $_SESSION['status'];
echo "YES YES YESY ";
    }
?>
<h1 class="text-center"> Add training </h1>
<!-- Table -->
<form method="post" action="validate_tr.php">
    <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> -->
    <!-- <form action="fetch.php" method="post"> -->
    <div class="container p-4">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Enter Course name" name="tname" , id="tname"
                    value="<?php echo $set_tName; ?>">
                <p class=" err-msg">
                    <?php if ($tnameEr != 1) {
                        echo $tnameEr;
                    } ?>
                </p>
            </div>
            <div class=" col">
                <input type="text" class="form-control" name="nstudents" placeholder="Number of students" id="nstudents"
                    value="<?php echo $set_nstudents; ?>">
                <p class="err-msg">
                    <?php if ($nstudentsEr != 1) {
                        echo $nstudentsEr;
                    } ?>
                </p>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date"
                        value="<?php echo $set_start_date; ?>">
                    <p class="err-msg">
                        <?php if ($start_dateEr != 1) {
                            echo $start_dateEr;
                        } ?>
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date"
                        value="<?php echo $set_end_date; ?>">
                    <p class="err-msg">
                        <?php if ($end_dateEr != 1) {
                            echo $end_dateEr;
                        } ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="form-row">

            <div class=" col">
                <input type="text" class="form-control" name="notes" placeholder="Write Notes here " id="notes"
                    value="<?php echo $set_notes; ?>">
                <p class="err-msg">
                    <?php if ($notesEr != 1) {
                        echo $notesEr;
                    } ?>
                </p>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Project </label>
                    </div>
                    <select class="custom-select" name="project_id" id="project_id">
                        <?php
                        $res = getProject();
                        echo "<option value=''>.....</option>";
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<option value=" . $row['pid'] . ">" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <p class="err-msg">
                        <?php if ($project_idEr != 1) {
                            echo $project_idEr;
                        } ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <button class="btn btn-primary btn-sm" name="submit">Submit</button>
                <button class="btn btn-primary btn-sm" type="reset">Reset</button>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>