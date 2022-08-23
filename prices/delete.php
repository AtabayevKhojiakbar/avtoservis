<?php

require_once "../users/connection.php";
$id = $_GET['id'];
$sql = "delete from prices where id='$id'";
$result = mysqli_query($connection,$sql);
if($result){
    header("location:index.php");
}
else{
    echo mysqli_error();
}

?>