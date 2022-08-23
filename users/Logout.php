<?php
require_once "connection.php";
$id=$_GET['id'];
$sql="Delete from userip where id='$id'";
mysqli_query($connection,$sql);
header("location: Register.php");
?>