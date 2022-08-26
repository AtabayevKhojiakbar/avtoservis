<?php

require_once "../users/connection.php";

//$ishladi = false;
//$message = '';
if(isset($_POST['xizmat'])){
    $id = $_POST['id'];
    $name = $_POST['xizmat'];
    $price = $_POST['narxi'];
    $sql = "UPDATE prices SET name='$name',price='$price' where id='$id'";
    $result = mysqli_query($connection,$sql);
    if($result){
//        $ishladi = true;
//        $message = "Tahrirlandi";
        header("location:index.php");
    }
}

//$sql = "select * from prices where id='$id'";
//$result = mysqli_query($connection,$sql);
//$jadval = mysqli_fetch_assoc($result);
//
//?>
<!---->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Tahrirlash</title>-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">-->
<!--</head>-->
<!--<body>-->
<!--<div class="card">-->
<!--    <h1 class="text text-primary text-center">Tahrirlash</h1>-->
<!--    <div class="container">-->
<!--        <a href="index.php" class="btn btn-primary">Orqaga</a>-->
<!--        <form action="" method="post" class="w-50">-->
<!---->
<!--            <div class="mb-3">-->
<!--                <label  class="form-label">Nomi</label>-->
<!--                <input type="text" value="--><?php //echo $jadval['name']; ?><!--" class="form-control" required name="name" >-->
<!--            </div>-->
<!---->
<!--            <div class="mb-3">-->
<!--                <label  class="form-label">Narxi</label>-->
<!--                <input type="text" value="--><?php //echo $jadval['price']; ?><!--" class="form-control" required name="price" >-->
<!--            </div>-->
<!---->
<!--            <button type="submit" class="btn btn-primary">Tahrirlash</button>-->
<!---->
<!--        </form>-->
<!---->
<!--        --><?php
//        if($ishladi){
//        ?>
<!--        <h3 class="text">--><?php //echo  $message ?><!--</h3>-->
<!--        --><?php
//        }
//        ?>
<!---->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->
