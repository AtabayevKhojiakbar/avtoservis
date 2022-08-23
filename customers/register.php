<?php
    include "../users/connection.php";
    $bool = false;
    if(isset($_POST['submit'])){
        $car=$_POST['car_number'];
        $employee = $_POST['employee'];
        $price=$_POST['price'];
        $emp_sql="select id from employees where fio='$employee';";
        $emp = mysqli_query($connection,$emp_sql);
        $id_emp = mysqli_fetch_assoc($emp)['id'];
        $prc_sql = "select * from prices where name='$price';";
        $prc = mysqli_query($connection,$prc_sql);
        $prce = mysqli_fetch_assoc($prc);
        $id_prc = $prce['id'];
        $prc_sum = $prce['price'];
        $payed = 0;
        if($id_emp%2==0) {
            $sale = 10;

        }
        else {
            $sale = 5;

        }

        $sql = "insert into customers(car_number, employee_id, price_id, paysum, sale, payedsum) values ('$car', '$id_emp', '$id_prc', '$prc_sum', '$sale', '$payed');";
        $natija = mysqli_query($connection, $sql);
        if($natija) $bool = true;
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php include "../nav.php";?>
<br><br>
<br><br>
<a href="index.php" class="btn btn-success" >Navbatlar ro`yxatiga</a>
<h3 align="center" >

    <form action="" method="post" class="w-50" style="border: solid 3px cornflowerblue; width: 400px; height: 450px; border-radius: 10px;background-color: cyan">

            <div class="mb-3" class="container">
                <div class="mb-3">
                    <label class="container">Car number</label>
                    <input type="text" class="form-control"  name="car_number">
                </div>
                <div class="mb-3">
                    <label class="container">
                        Servis Ishchilari
                    </label>
                    <select name="employee" >
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
                <select name="price" >
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
            <?php if($bool){
                ?>
                <h3 class="text text-success"><b>Ro`yxatga olindi</b></h3>
        <?php  } ?>
    </form>
</h3>>
</body>
</html>
