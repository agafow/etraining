<?php

$con = mysqli_connect('localhost','root','','training');
if(mysqli_connect_errno()){
    echo "_Database connection error! ";
    exit;
}else {
    echo "Connection was Ok";
}
?>