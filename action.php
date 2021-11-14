<?php
include('connection.php');
$output = '';

if($_POST["action"] == "Add"){

    $sname  = mysqli_real_escape_string($_POST["sname"]);
    $mobile  = mysqli_real_escape_string($_POST["mobile"]);
    $email  = mysqli_real_escape_string($_POST["email"]);
    $gender  = mysqli_real_escape_string($_POST["gender"]);
    $dob  = mysqli_real_escape_string($_POST["dob"]);
    $depid  = mysqli_real_escape_string($_POST["depid"]);
   

    
    $query = "INSERT INTO staff(sid, sname,mobile,email, gender, dob, depid, rdate)
             VALUES('$sname', '$mobile','$email','$gender','$dob',$depid, NOW());
        mysqli_query($con,$query);
        echo "DATA INSERTED";
                        
}
?>