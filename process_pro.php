<?php
//print_r($_SESSION);
//include("connection.php");
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
    $_SESSION['status'] = "Project is added Successfuly";
    echo "Success full insertion";

//print_r($result);
//echo $_SESSION['status'];
//header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
echo "There is erros";
}
}