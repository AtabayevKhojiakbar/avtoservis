<?php
require_once "../users/connection.php";
    $message="Yetarli summa kiritilmadi, qaytdan kiriting!";
    if(isset($_POST['id']) and $_POST['summa']>=$_POST['narx']){
        $id = $_POST['id'];
        $summa = $_POST['summa'];
        $sql = "update customers set status=1 where id='$id'";
        $natija=mysqli_query($connection,$sql);
        $message="Xizmat narxi to`landi!";
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div align="center" class="container w-70 mt-3">
    <div align="center" class="w-50 alert alert-info " >
        <strong><?php echo $message; ?></strong>
        <a href="index.php" class="btn btn-primary">Qaytish</a>
    </div>
</div>
</body>
        </html>
<?php


//$message = false;
//if(isset($_POST['paysum'])  and $_POST['payed']==$_POST['tolov']){
//    $pay = $_POST['payed'];
//    $idd = $_POST['idd'];
//    $sql = "update customers set payedsum='$pay', status=2 where id='$idd';";
//    $natija = mysqli_query($connection,$sql);
//}
//elseif(isset($_POST['paysum'])  and $_POST['payed']>$_POST['tolov']){
//    $bonus = $_POST['payed'] - $_POST['tolov'];
//    $pay = $_POST['payed'];
//    $idd = $_POST['idd'];
//    $sql = "update customers set payedsum='$pay', status=2, bonus='$bonus' where id='$idd';";
//    $result = mysqli_query($connection,$sql);
//}
//else{
//    $message=true;
//}
//?>
<!---->
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title></title>-->
<!--</head>-->
<!--<body>-->
<?php
//if($message){?>
<!--<script>-->
<!--    alert("Yetarli summa kiritilmadi!;");-->
<!--</script>-->
<?php
//header("location: search.php");
//}
//else{
//    ?>
<!--<script>-->
<!--    alert("To'lov amalga oshirildi!;");-->
<!--</script>-->
<?php
//    header("location: index.php");
//}
//?>
<!---->
<!--</body>-->
<!--</html>-->
