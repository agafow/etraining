<?php
include('connection.php');
if (isset($_POST['submit'])) {


function legal_input($value){
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}


        $enroll = legal_input($_POST['enroll']);
        $tid = legal_input($_GET['tid']);
        $sid = legal_input($_GET['sid']);
        echo "<br>";
        /** 
        if($enroll) { echo "Yes"; } else { echo "Nooo"; }
        echo "<br>";
        echo $enroll." -enroll <br> ";
        echo $tid." -tid <br> ";
        echo $sid."  -sid <br>";
        */
        $query_check = "SELECT * FROM enrollment WHERE tid= {$tid} AND sid = {$sid} ";
        $result_check = mysqli_query($con, $query_check);
        if(!$result_check) {
            $query = "INSERT INTO enrollment(eid,tid,sid, enrol_date )
            VALUES(NULL, '$tid', $sid,   NOW()) ";
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
        } else {
            echo "You have allready Enrolled ";  
        }

   
    }