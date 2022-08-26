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
    <title>Servis xizmati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>


<div class="">
    <h1 align="center" class="text text-primary">Servis xizmati</h1>
</div>
<br>
<div class="container w-75 card" style="box-shadow: 0px 0px 10px 10px #9e9e9e">

    <div class="d-flex justify-content-end">
<!--        <a href="add.php" class="btn btn-success" style="margin-bottom: 3px">Ma'lumot qo'shish</a>-->
        <button  class="btn btn-success" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ma'lumot qo`shish
        </button>
    </div>

<!--    //modal: malumot qoshish-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="add.php" method="post">
                        <label style="padding-right: 30px">Xizmat turi</label><br>
                        <input type="text" name="xizmat" class="form-control">
                        <label style="padding-right: 30px">Narxi</label>
                        <input type="text" name="narxi" class="form-control">
                        <button type="submit" name="submit"  class="btn btn-success" style="margin-left:88%;margin-top:5px;margin-bottom: -15px" >Qo'shish</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- modal: edit-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="edit.php" method="post">
                        <label style="padding-right: 30px">Xizmat turi</label><br>
                        <input type="text" name="xizmat" id="id_xizmat" class="form-control">
                        <label style="padding-right: 30px">Narxi</label>
                        <input type="text" name="narxi" id="narxi_xizmat" class="form-control">
                        <input type="hidden" name="id" id="idd">
                        <button type="submit" name="submit"  class="btn btn-success" style="margin-left:88%;margin-top:5px;margin-bottom: -15px" >Tahrirlash</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered boredr-1 table-striped table-hover" >
        <tr align="center">
            <th>#</th>
            <th>Xizmat turi</th>
            <th>Narxi</th>
            <th>Amallar</th>
        </tr>

        <?php
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_assoc($result)){
                $usersArray[$row['id']]=(object)$row;
        ?>

        <tr >
            <td align="center"> <?php echo $row['id']; $idsi=$row['id']; ?> </td>
            <td> <?php echo $row['name'] ?> </td>
            <td align="center"> <?php echo number_format($row['price'],0,' ',' ')." so'm" ?> </td>
            <td align="center">

                <button onclick="edit(<?php echo $row['id'] ?>)"  class="btn btn-warning" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                </button>
                <a href="delete.php?id=<?php echo $idsi ?>" class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                </a>

            </td>
        </tr>

        <?php
            }
        }


        ?>

    </table>
</div>
<script>
    var a=<?php echo json_encode($usersArray)?>;
    function edit(id){
        document.getElementById('idd').value=id;
        document.getElementById('id_xizmat').value=a[id]['name'];
        document.getElementById('narxi_xizmat').value=a[id]['price'];
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
