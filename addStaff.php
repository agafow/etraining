<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php include("validate.php"); ?>
<?php confirm_logged_in(); ?>

<div class="container-fluid mt-5 p-4">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1 class="text-center"> Add a new Staff</h1>
            <!-- Table -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- <form action="fetch.php" method="post"> -->

                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter name" name="sname" , id="sname" value="<?php echo $set_sName; ?>">
                        <p class=" err-msg">
                            <?php if ($snameEr != 1) {
                                echo $snameEr;
                            } ?>
                        </p>
                    </div>
                    <div class=" col">
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile number" id="mobile" value="<?php echo $set_mobile; ?>">
                        <p class="err-msg">
                            <?php if ($mobileEr != 1) {
                                echo $mobileEr;
                            } ?>
                        </p>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $set_email; ?>">
                        <p class="err-msg">
                            <?php if ($emailEr != 1) {
                                echo $emailEr;
                            } ?>
                        </p>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="dob" name="dob" placeholder="Start Date" value="<?php echo $set_dob; ?>">
                            <p class="err-msg">
                                <?php if ($dobEr != 1) {
                                    echo $dobEr;
                                } ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-row">

                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                            <label class="form-check-label" for="inlineRadio1">Female</label>
                        </div>
                        <p class="err-msg">
                            <?php if ($genderEr != 1) {
                                echo $genderEr;
                            } ?>
                        </p>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Department</label>
                            </div>
                            <select class="custom-select" name="depid" id="depid">
                                <?php
                                $res = getDepartment();
                                echo "<option value=''>.....</option>";
                                while ($row = mysqli_fetch_assoc($res)) {
                                    echo "<option value=" . $row['did'] . ">" . $row['dname'] . "</option>";
                                }
                                ?>
                            </select>
                            <p class="err-msg">
                                <?php if ($depidEr != 1) {
                                    echo $depidEr;
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
    </div>
    </form>
</div>
</div>
<?php include('includes/footer.php'); ?>