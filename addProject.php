<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>

<h1 class="text-center"> Add Porject </h1>
<form method="post" action="process_pro.php">
    <!-- <form action="fetch.php" method="post"> -->
    <div class="container p-4">
        <div class="col-md-3">
            <h1 class="text-center"> Add Porject </h1>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter Project name" name="pname" , id="pname" required>

            <br>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Department</label>
                </div>
                <select class="custom-select" name="depid" id="depid" required>
                    <?php
                    $res = getDepartment();
                    echo "<option value=''>.....</option>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<option value=" . $row['did'] . ">" . $row['dname'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary btn-sm" name="submit">Submit</button>
            <button class="btn btn-primary btn-sm" type="reset">Reset</button>
        </div>
    </div>
    </div>
    <div class="col-md-3"></div>
</form>
</div>
<?php include('includes/footer.php'); ?>