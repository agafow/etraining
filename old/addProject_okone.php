<?php


//print_r($_SESSION);

include("header.php");
include("functions.php");
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


if (isset($_POST['submit'])) {
    session_start();

    $_SESSION['status'] = "";
    // convert illegal input value to ligal value formate
    function legal_input($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    $pname = legal_input($_POST["pname"]);
    $depid = legal_input($_POST["depid"]);

    $query = "INSERT INTO projects(pid, name, dep_id, start_date)
VALUES(NULL, '$pname',$depid, NOW()) ";
    $result = mysqli_query($con, $query);
     if ($result) { 
        $_SESSION['status']  = "Project is added Successfuly";
        //print_r($result);
        echo $_SESSION['status'];
        header("Location: {$_SERVER['PHP_SELF']}");
    } else {
        echo "There is erros";
    }
}
else {
?>
<h1 class="text-center"> Add Porject </h1>
<h2>
    <?php 
    //echo$_SESSION['status'] ;
if(isset($_SESSION['status']) && $_SESSION['status'] != "" ){
    echo $_SESSION['status'];
echo "YES YES YESY ";
    }
?></h2>
<!-- Table -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- <form action="fetch.php" method="post"> -->
    <div class="container p-4">
        <div class="col-md-3"></div>
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
<?php include('footer.php'); ?>
<?php }; ?>