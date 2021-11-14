<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);
include('connection.php');


function getDepartment(){
    global $con;
    $query = "SELECT * FROM departments ";
    $result = mysqli_query($con,$query);
    if($result){
        return $result;
    }else {
        echo "There is erros";
    }

}

function getHisDepartment($id){
    global $con;
    $query = "SELECT * FROM departments WHERE did = $id ";
    $result = mysqli_query($con,$query);
    if($result){
        $res = mysqli_fetch_assoc($result);
        return $res['dname'];
    }else {
        echo "There is erros";
    }

}

function getHisDepartmentProject($pid){
    global $con;
    $query = "SELECT d.dname  FROM project as p, department as d WHERE p.dep_id = d.did AND d.did = $pid  LIMIT 1";
    $result = mysqli_query($con,$query);
    echo $query;
    if($result){
        $res = mysqli_fetch_assoc($result);
        return $res['d.dname'];
    }else {
        echo "There is erros is";
    }

}


function getProject(){
    global $con;
    $query = "SELECT * FROM projects ";
    $result = mysqli_query($con,$query);
    if($result){
        return $result;
    }else {
        echo "There is erros";
    }

}
function getTraining(){
    global $con;
    $query = "SELECT * FROM training ";
    $result = mysqli_query($con,$query);
    if($result){
        return $result;
    }else {
        echo "There is erros";
    }

}
function getStaff(){
    global $con;
    $query = "SELECT * FROM staff ";
    $result = mysqli_query($con,$query);
    if($result){
        return $result;
    }else {
        echo "There is erros";
    }
    
}
?>