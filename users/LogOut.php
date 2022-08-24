<?php
require_once "conn.php";
$MAC = exec('getmac');
$MAC = strtok($MAC, ' ');
$sql="select * from userip where mac='$MAC'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)!=0)
{
    $sql = "Delete from userip where mac='$MAC'";
    mysqli_query($conn, $sql);
    header("location: http://localhost/AvtoServis/Users/Register.php");
}
else
{
    echo "Qandaydir xatolik sodir bo`ldi";
}
?>