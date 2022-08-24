<?php
require_once "../users/connection.php";

if (isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "delete from `employees` where id = $id";
    $result = mysqli_query($connection,$sql);
    if ($result){
        header('location:ishchilar.php');
    }else{
        die(mysqli_error($connection));
    }

}


?>