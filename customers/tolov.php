<?php
require_once "../users/connection.php";
$message = false;
if(isset($_POST['paysum'])  and $_POST['payed']==$_POST['tolov']){
    $pay = $_POST['payed'];
    $idd = $_POST['idd'];
    $sql = "update customers set payedsum='$pay', status=2 where id='$idd';";
    $natija = mysqli_query($connection,$sql);
}
elseif(isset($_POST['paysum'])  and $_POST['payed']>$_POST['tolov']){
    $bonus = $_POST['payed'] - $_POST['tolov'];
    $pay = $_POST['payed'];
    $idd = $_POST['idd'];
    $sql = "update customers set payedsum='$pay', status=2, bonus='$bonus' where id='$idd';";
    $result = mysqli_query($connection,$sql);
}
else{
    $message=true;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<?php
if($message){?>
<script>
    alert("Yetarli summa kiritilmadi!;");
</script>
<?php
header("location: search.php");
}
else{
    ?>
<script>
    alert("To'lov amalga oshirildi!;");
</script>
<?php
    header("location: index.php");
}
?>

</body>
</html>
