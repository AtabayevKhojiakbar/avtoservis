<?php
require_once "../users/connection.php";
include 'connect.php';

if (isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "delete from `employees` where id = $id";
    $result = mysqli_query($con,$sql);
    if ($result){
        header('location:ishchilar.php');
    }else{
        die(mysqli_error($con));
    }

}


?>