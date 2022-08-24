<?php

require_once "../users/connection.php";


if(isset($_POST['name'])){
    $ishladi = true;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sql = "INSERT INTO prices(name,price) values ('$name','$price')";
    $result = mysqli_query($connection,$sql);
    if($result){
        header("location:index.php");
    }
    else{
        echo mysqli_error();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<br>
<div class="">
    <h1 class="text text-primary " align="center">Ma'lumot qo'shish</h1><br>
    <div class="container">
        <a href="index.php" class="btn btn-primary">Orqaga</a>
            <form action="" method="post" class="w-50">

                <div class="mb-3">
                    <label  class="form-label">Nomi</label>
                    <input type="text" class="form-control" required name="name" >
                </div>

                <div class="mb-3">
                    <label  class="form-label">Narxi</label>
                    <input type="text" class="form-control" required name="price" >
                </div>

                <button type="submit" class="btn btn-primary">Ma'lumot qo'shish</button>

            </form>



    </div>
</div>

</body>
</html>
