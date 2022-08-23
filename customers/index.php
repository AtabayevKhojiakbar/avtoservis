<?php
    require_once "../users/connection.php";
    $sql = "select * from customers";
    $result=mysqli_query($connection, $sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Avto servis</title>
</head>
<body>
<?php
include "../nav.php";
?>
<table class="table caption-top">
    <caption>Ro`yxat</caption>
    <tr>
        <th scope="col">#</th>
        <th scope="col">car_number</th>
        <th scope="col">employee_id</th>
        <th scope="col">price_id</th>
        <th scope="col">paysum</th>
        <th scope="col">sale</th>
        <th scope="col">payedsum</th>
        <th scope="col">status</th>
        <th scope="col">date</th>
        <th scope="col"><a href="register.php" class="btn btn-success">Qo`shish</a></th>
    </tr>
    <?php  if($result->num_rows>0){
        while ($rows=mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <th><?php echo $rows['id']; ?></th>
        <th><?php echo $rows['car_number']; ?></th>
        <th><?php echo $rows['employee_id']; ?></th>
        <th><?php echo $rows['price_id']; ?></th>
        <th><?php echo $rows['paysum']; ?></th>
        <th><?php echo $rows['sale']; ?></th>
        <th><?php echo $rows['payedsum']; ?></th>
        <th><?php echo $rows['status']; ?></th>
        <th><?php echo $rows['date']; ?></th>
    </tr>
    <?php
        }
    }
    ?>
</table>


</body>
</html>
