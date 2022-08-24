<?php
$server='localhost';
$user="root";
$password="";
$DataBase="avtoservis";
$connection=mysqli_connect("$server","$user","$password","$DataBase");
if(!$connection)
{
    die("Xatolik".mysqli_connect_error());
}
$MAC = exec('getmac');
$MAC = strtok($MAC, ' ');
$sql="Select * from userip where mac='$MAC'";
$result=mysqli_query($connection,$sql);
if(mysqli_num_rows($result)==0)
{
    header("location: http://localhost/AvtoServis/Users/Register.php");
}
?>