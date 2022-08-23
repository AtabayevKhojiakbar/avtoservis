<?php

include "../nav.php";
require_once "../users/connection.php";
$sql = "select * from prices";
$result = mysqli_query($connection,$sql);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>


<div class="card">
    <h1 align="center" class="text text-primary">Narxlar ro'yhati</h1>
</div>
<br>
<div class="container w-50">
    <table class="table table-bordered boredr-1">
        <tr>
            <th>#</th>
            <th>Ism</th>
            <th>Narxi</th>
        </tr>

        <?php
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)){

        ?>

        <tr>
            <td> <?php echo $row['id'] ?> </td>
            <td> <?php echo $row['name'] ?> </td>
            <td> <?php echo $row['price'] ?> </td>
        </tr>

        <?php
            }
        }
        ?>

    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
