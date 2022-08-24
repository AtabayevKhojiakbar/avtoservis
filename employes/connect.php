<?php
$con = new mysqli('localhost','root','','avtoservis');

if (!$con){
    die(mysqli_error($con));
}

?>