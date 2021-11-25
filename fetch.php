<?php
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>
function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
$data = filter_var($data, FILTER_SANITIZE_STRING);
return $data;
}


if (isset($_POST['submit'])) {

echo "
<pre>";
    print_r($_POST);
    echo "</pre>";
$sname1 = $mobile1 = $email1 = $gender1 = $dob = $depid = "";


$sname = mysqli_real_escape_string($con, $_POST["sname"]);
$mobile = mysqli_real_escape_string($con, $_POST["mobile"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$gender = mysqli_real_escape_string($con, $_POST["gender"]);
$dob = mysqli_real_escape_string($con, $_POST["dob"]);
$depid = mysqli_real_escape_string($con, $_POST["depid"]);

$sname1 = test_input($sname);
$mobile1 = test_input($mobile);
$gender1 = test_input($gender);
$dob1 = test_input($dob);
$depid1 = test_input($depid);


$query = "INSERT INTO staff(sid, sname, mobile, email, gender, dob, depid, rdate)
VALUES(NULL, '$sname1', $mobile1,'$email','$gender1','$dob1',$depid1, NOW()) ";
$result = mysqli_query($con, $query);
echo $query;
if ($result) {
print_r($result);
echo "<br>";
echo json_encode($result);
} else {
echo "There is erros";
}

//echo json_encode($result);
}