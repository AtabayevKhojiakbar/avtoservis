<?php
require_once "../users/connection.php";
include 'connect.php';

if (isset($_POST['submit'])){
    $fio = $_POST['FIO'];
    $phone=$_POST['tel'];
    $address =$_POST['address'];
    $passport = $_POST['passport'];
    $sana = $_POST['sana'];


    $branch_id = $_POST['branch_id'];

    $sql = "insert into `employees`(fio,phone,address,passport,sana ,branch_id) values ('$fio','$phone','$address','$passport','$sana','$branch_id')";
    $result = mysqli_query($con,$sql);
    if ($result){
//         echo 'yuborildi';
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
    <title>Ishchi qo'shish</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>

<div class="container my-5">
    <form  method = "POST">

        <div class="mb-3">
            <label>FIO:</label>
            <input type="text" class="form-control" placeholder="FIO" name="FIO" autocomplete = "off">
        </div>

        <div class="mb-3">
            <label>Phone:</label>
            <input type = "number" class ="form-control" placeholder="Phone" name="tel" autocomplete = "off">

        </div>

        <div class="mb-3">
            <label>Address:</label>
            <input type="text" class="form-control" placeholder="address" name="address" autocomplete = "off">

        </div>

        <div class="mb-3">
            <label>passport:</label>
            <input type="text" class="form-control" placeholder="passport" name="passport" autocomplete = "off">

        </div>

        <div class="mb-3">
            <label>Sana:</label>
            <input type="date" class="form-control" name="sana" autocomplete = "off">

        </div>
        <div class="mb-3">
            <label>branch_id:</label>
            <input type="number" class="form-control" name="branch_id" autocomplete = "off">

        </div>


        <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
    </form>
</div>

</body>



</html>