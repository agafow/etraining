<?php
include('connection.php');
// by default, error messages are empty
$valid = $tnameEr = $nstudentsEr = $start_dateEr = $end_dateEr  = $notesEr = $project_idEr = '';
// by default,set input values are empty
$set_tName = $set_nstudents = $set_notes = $set_start_date = $set_end_date = $set_projectid = '';

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
    //  First Name Validation
    if (empty($tname)) {
        $tnameEr = "Full Name is Required";
    } else if (!preg_match($validName, $tname)) {
        $tnameEr = "Digits are not allowed";
    } else {
        $tnameEr = true;
    }
    //  Last Name Validation
    if (empty($nstudents)) {
        $nstudentsEr = "Number of students is Required";
    } else if (!preg_match($validMobile, $nstudents)) {
        $nstudentsEr = "Only Digits are  allowed";
    } else {
        $nstudentsEr  = true;
    }
    
    if (empty($start_date)) {
        $start_dateEr= "Start date is Required";
    } else {
        $start_dateEr = true;
    }
    if (empty($end_date)) {
        $end_dateEr= "End date is Required";
    } else {
        $end_dateEr = true;
    }

    if (empty($notes)) {
        $notesEr = "Notes is Required";
    } else {
        $notesEr  = true;
    }

    if (empty($project_id)) {
        $project_idEr = "Project id is Required";
    } else {
        $project_idEr  = true;
    }
    // check all fields are valid or not
    if ($tnameEr == 1 && $nstudentsEr == 1 && $start_dateEr == 1 && $end_dateEr == 1 &&  $notesEr == 1 && $project_idEr == 1) {
        $valid = "All fields are validated successfully";

        //legal input values
        $tname = legal_input($tname);
        $nstudents =  legal_input($nstudents);
        $start_date =     legal_input($start_date);
        $end_date =  legal_input($end_date);
        $notes  =  legal_input($notes);
        $project_id =  legal_input($project_id);

        $query = "INSERT INTO training(tid, tname,  project_id, start_date, end_date,  nstudents, notes, rdate, state )
    VALUES(NULL, '$tname', $project_id, '$start_date',  '$end_date',  $nstudents, '$notes',   NOW(), 1 )";
        $result = mysqli_query($con, $query);
        //echo $query;
        if ($result) {
            $_SESSION['state'] = "Adding a new training was success! ";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            //print_r($result);
            echo "<br>";
           // echo json_encode($result);
        } else {
            echo "There is erros";
        }

   

        // here you can write Sql Query to insert user data into database table
    } else {
        // set input values is empty until input field is invalid
        //$set_sName = $sname;
        //$set_mobile = $mobile;
        //$set_email = $email;
    }
}
// convert illegal input value to ligal value formate
function legal_input($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}