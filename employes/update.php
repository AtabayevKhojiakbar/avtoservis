<?php
require_once "../users/connection.php";
include 'connect.php';
$id = $_GET['updateid'];
$sql = "Select * from `employees` where id =$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$fio = $row['fio'];
$phone=$row['phone'];
$address =$row['address'];
$passport = $row['passport'];
$sana = $row['sana'];
$branch_id = $row['branch_id'];

if (isset($_POST['submit'])){
    $fio = $_POST['FIO'];
    $phone=$_POST['tel'];
    $address =$_POST['address'];
    $passport = $_POST['passport'];
    $sana = $_POST['sana'];
    $branch_id = $_POST['branch_id'];

    $sql = "update `employees` set id=$id,fio ='$fio',phone = '$phone',address='$address',passport = '$passport',sana='$sana' where id=$id";
    $result = mysqli_query($con,$sql);
    if ($result){
        // echo 'yuborildi';
        header('location:ishchilar.php');

    }
    else{
        die(mysqli_error($con));
    }
}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tahrirlash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
<div class="container my-5">
    <form  method = "POST">

        <div class="mb-3">
            <label>FIO:</label>
            <input type="text" class="form-control" placeholder="FIO" name="FIO" autocomplete = "off" value="<?php echo $fio ?>">
        </div>

        <div class="mb-3">
            <label>Phone:</label>
            <input type = "number" class ="form-control" placeholder="Phone" name="tel" autocomplete = "off" value="<?php echo $phone ?>">

        </div>

        <div class="mb-3">
            <label>Address:</label>
            <input type="text" class="form-control" placeholder="address" name="address" autocomplete = "off" value="<?php echo $address ?>">

        </div>

        <div class="mb-3">
            <label>passport:</label>
            <input type="text" class="form-control" placeholder="passport" name="passport" autocomplete = "off" value="<?php echo $passport ?>">

        </div>

        <div class="mb-3">
            <label>Sana:</label>
            <input type="date" class="form-control" name="sana" autocomplete = "off" value="<?php echo $sana ?>">

        </div>
        <div class="mb-3">
            <label>branch_id:</label>
            <input type="number" class="form-control" name="branch_id" autocomplete = "off" value="<?php echo $branch_id?>">

        </div>


        <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
    </form>
</div>

</body>



</html>