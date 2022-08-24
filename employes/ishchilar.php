<?php
require_once "../users/connection.php";
include '../nav.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avtoservis Ishchilar ro'yxati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <button class = "btn btn-primary my-5 "><a href="employes.php" class = "text-light" style="text-decoration: none;">Ishchi qo'shish</a></button>
    <table class="table">



        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Fio</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Passport</th>
            <th scope="col">Sana</th>
            <th scope="col">Amallar</th>

        </tr>
        </thead>

        <tbody>
        <?php

        $sql = "Select * from `employees`";
        $result = mysqli_query($connection,$sql);

        if ($result){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $fio = $row['fio'];
                $phone=$row['phone'];
                $address =$row['address'];
                $passport = $row['passport'];
                $sana = $row['sana'];

                echo '<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$fio.'</td>
                        <td>'.$phone.'</td>
                        <td>'.$address.'</td>
                        <td>'.$passport.'</td>
                        <td>'.$sana.'</td>
                       
                        
                        <td>
                        <button class = "btn btn-primary" ><a href="update.php?updateid='.$id.'" class = "text-light" style="text-decoration: none;">Update</a></button>
                        <button class = "btn btn-danger" ><a href="delete.php?deleteid='.$id.'" class = "text-light" style="text-decoration: none;">Delete</a></button>
                     
                        </td>
                        </tr> ';




            }

        }


        ?>


        </tbody>
    </table>

</div>



</body>
</html>