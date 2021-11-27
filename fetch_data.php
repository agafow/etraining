<?php
include('includes/connection.php');


if(isset($_POST["id"])){
    $output = array();
    $procedure = "CREATE PROCEDURE whereUser(IN user_id int(11)) 
                BEGIN
                SELECT * FROM users WHERE id = user_id;
                END; ";
    if(mysqli_query($con, "DROP PROCEDURE IF EXIST whereUser")){
        if(mysqli_query($con, $procedure)){
            $query = "CALL whereUser(".$_POST["id"].")";
            $result = mysqli_query($con, $query);
            while($row = mysql_fetch_array($result)){
                $output['fisrt_name'] = $row["first_name"];
                $output['last_name'] = $row["last_name"];
            }
            echo json_encode($output);
        }
    }
}