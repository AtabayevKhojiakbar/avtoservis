<?php
    require_once "../users/connection.php";
// narx tolash
    if(isset($_POST['id'])) {
        $a=$_POST['id'];
        if ($_POST['summa'] >= $_POST['narx']) {
            $id = $_POST['id'];
            $summa = $_POST['summa'];
            $sql = "update customers set status=1 where id='$id'";
            $natija = mysqli_query($connection, $sql);
            $bool = true;
            $message="To'landi!";
        } else {
            $bool = false;
            $message="Yetarli summa kiritilmadi!";
        }
    }
    //avto raqam ozgartirish
    if(isset($_POST['id_edit'])){
        $edit_id=$_POST['id_edit'];
        $edit_name=$_POST['name_edit'];
        $sql = "update customers set car_number='$edit_name' where id='$edit_id';";
        $result = mysqli_query($connection,$sql);
        $xabar = "Avto raqam yangilandi!";
        $bl = true;
    }
    else{
        $xabar = "Xatolik!";
        $bl = false;
    }


    $sql = "select customers.*,employees.fio,prices.name 
    from customers inner join employees on 
        customers.employee_id=employees.id 
        INNER JOIN prices on prices.id=customers.price_id; ";
    $result = mysqli_query($connection, $sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Avto servis</title>
</head>
<body>
<?php
include "../nav.php";
?>
<div class="container card pt-3 mt-4" style="box-shadow: 0px 0px 10px 10px #9e9e9e">
    <h2 class="text text-info text-center">Buyurtmalar ro'yhati</h2>
    <div class="d-flex justify-content-end">
        <div class="">
            <button  class="btn btn-success" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                Qo`shish
            </button>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="register.php" method="post" class="w-100" style="">

                        <div class="mb-3" class="container">
                            <div class="mb-3">
                                <label class="container">Car number</label>
                                <input type="text" class="form-control"  required name="car_number">
                            </div>
                            <div class="mb-3">
                                <label class="container">
                                    Servis Ishchilari
                                </label>
                                <select name="employee" class="form-control" required >
                                    <?php
                                    $sql = "select * from employees;";
                                    $ishchi = mysqli_query($connection,$sql);
                                    while ($row=mysqli_fetch_assoc($ishchi)){
                                        ?>
                                        <option ><?php echo $row['fio']; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="container">
                                Servis Xizmatlar
                            </label>
                            <select name="price" class="form-control" required >
                                <?php
                                $sql = "select * from prices;";
                                $ishchi = mysqli_query($connection,$sql);
                                while ($row=mysqli_fetch_assoc($ishchi)){
                                    ?>
                                    <option ><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" name="submit">
                                Ro`yxatga olish
                            </button>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="" method="post">
                        <label style="padding-right: 30px">Summani kiriting</label><br>
                        <input type="text" name="summa" class="form-control">
                        <input type="hidden"  id="nani_idsi" name="id"  class="form-control">
                        <input type="hidden" id="narx" name="narx" class="form-control"><br>
                        <button type="submit"  class="btn btn-success" style="margin-left: 88%" >Yuborish</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mashina raqami</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_edit" id="edit_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">AvtoRaqam</label>
                            <input type="text" name="name_edit" class="form-control" id="name_edit" >
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered border-1 table-striped table-hover ">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mashina raqami</th>
            <th scope="col">Xodim</th>
            <th scope="col">Xizmat turi</th>
            <th scope="col">Narxi</th>
            <th scope="col">Chegirma</th>
            <th scope="col">To'langan</th>
            <th scope="col">Status</th>
            <th scope="col">Holat</th>
            <th scope="col">Sana</th>
            <th scope="col">Amal</th>

        </tr>
        <?php if ($result->num_rows > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $usersArray[$rows['id']]=(object)$rows;
                ?>
                <tr>
                    <th><?php echo $rows['id']; ?></th>
                    <th><?php echo $rows['car_number']; ?></th>
                    <th><?php echo $rows['fio']; ?></th>
                    <th><?php echo $rows['name']; ?></th>
                    <th><?php echo number_format($rows['paysum'], 0, '.', ' ') . " so'm"; ?></th>
                    <th><?php echo $rows['sale']; ?></th>
                    <th><?php echo $rows['payedsum']; ?></th>
                    <th><?php echo $rows['status']; ?></th>
                    <th><?php if($rows['status']==1){echo "To'langan";}
                                else echo "To'lanmagan";    ?>
                    </th>
                    <th><?php echo $rows['date']; ?></th>
                    <?php $rs=mysqli_fetch_array($result) ?>
                    <th>
                        <button onclick="edit(<?php echo $rows['id'] ?>)"  class="btn btn-warning" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                        </button>
                        <button onclick="idniYubor(<?php echo $rows['id'];?>)"  class="btn btn-primary" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                            </svg>
                        </button>
                    </th>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
    var a=<?php echo json_encode($usersArray)?>;
    function idniYubor(id){
        document.getElementById('nani_idsi').value=id;
        document.getElementById('narx').value=a[id]['payedsum'];
    }
    function click(id){
        document.getElementById('m_id').value=id;
        document.getElementById('raqam_m').value=a[id]['car_number'];
    }
    function edit(id){
        document.getElementById('edit_id').value=id;
        document.getElementById('name_edit').value=a[id]['car_number'];
    }
</script>
<?php
if(isset($a)){
    if($bool){ ?>
        <script>alert("Xizmat narxi to'landi!");</script>
    <?php   }
    else{ ?>
        <script>alert("Yetarli summa kiritilmadi!");</script>
        <?php
    }
}
if(isset($edit_id)){
    if ($bl){
        ?>
        <script>alert(<?php echo $xabar;?>);</script>
<?php
    }
    else{
        ?>
        <script>alert(<?=$xabar?>);</script>
<?php
    }
}
?>
</body>
</html>
