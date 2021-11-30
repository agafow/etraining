<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?> header.php"); ?>
<?php confirm_logged_in(); ?>
<?php
// by default, error messages are empty
$valid = $snameEr = $mobileEr = $emailEr = $genderEr = $dobEr = $depidEr = '';
// by default,set input values are empty
$set_sName = $set_mobile = $set_email = $set_dob = '';
extract($_POST);
if (isset($_POST['submit'])) {

    //input fields are Validated with regular expression
    $validName = "/^[a-zA-Z ]*$/";
    $validMobile = "/^[0-9]*$/";
    $validEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    $uppercasePassword = "/(?=.*?[A-Z])/";
    $lowercasePassword = "/(?=.*?[a-z])/";
    $digitPassword = "/(?=.*?[0-9])/";
    $spacesPassword = "/^$|\s+/";
    $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
    $minEightPassword = "/.{8,}/";
    // First Name Validation
    if (empty($sname)) {
        $snameEr = "Full Name is Required";
    } else if (!preg_match($validName, $sname)) {
        $snameEr = "Digits are not allowed";
    } else {
        $snameEr = true;
    }


    // Last Name Validation
    if (empty($mobile)) {
        $mobileEr = "Last Name is Required";
    } else if (!preg_match($validMobile, $mobile)) {
        $mobileEr = "Only Digits are allowed";
    } else {
        $mobileEr = true;
    }
    //Email Address Validation
    if (empty($email)) {
        $emailEr = "Email is Required";
    } else if (!preg_match($validEmail, $email)) {
        $emailEr = "Invalid Email Address";
    } else {
        $emailEr = true;
    }


    if (empty($dob)) {
        $dobEr = "Date of birth is Required";
    } else {
        $dobEr = true;
    }

    if (empty($gender)) {
        $genderEr = "Gender is Required";
    } else {
        $genderEr = true;
    }

    if (empty($depid)) {
        $depidEr = "Department is Required";
    } else {
        $depidEr = true;
    }
    // check all fields are valid or not
    if ($snameEr == 1 && $mobileEr == 1 && $emailEr == 1) {
        $valid = "All fields are validated successfully";

        //legal input values
        $sname = legal_input($sname);
        $mobile = legal_input($mobile);
        $email = legal_input($email);
        $dob = legal_input($dob);


        $query = "INSERT INTO staff(sid, sname, mobile, email, gender, dob, depid, rdate)
VALUES(NULL, '$sname', $mobile,'$email','$gender','$dob',$depid, NOW()) ";
        $result = mysqli_query($con, $query);
        echo $query;
        if ($result) {
            print_r($result);
            echo "<br>";
            echo json_encode($result);
        } else {
            echo "There is erros";
        }

        echo "<script>
alert('message sent succesfully');
window.history.go(-1);
</script>";
        header("Location: {$_SERVER["HTTP_REFERER"]}");

        // here you can write Sql Query to insert user data into database table
    } else {
        // set input values is empty until input field is invalid
        $set_sName = $sname;
        $set_mobile = $mobile;
        $set_email = $email;
    }

    // convert illegal input value to ligal value formate
    function legal_input($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }
}
?>