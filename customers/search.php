<?php
    require_once "../users/connection.php";
    $message='';
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "select prices.price, customers.car_number, employees.fio, customers.sale, customers.payedsum from customers,employees,prices  where customers.id='$id' ";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $payedsum = $row['payedsum'];
        if($payedsum>0){
            $is=false;
            $message = "To'lov qilingan";
        }
        else {
            $is=true;
            $message="To'lov qilinmagan";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php include "../nav.php";
?>
<div  style="border: solid 3px black; width: 600px; height: 600px; border-radius: 10px; margin-left: 500px; margin-top: 50px">
    <form action="tolov.php" method="post">
        <h3 style="padding-left: 45px; padding-top: 35px">
            <label style="padding-right: 30px">ID raqamingiz:</label>
            <input type="text" align="center" name="idd" style="border: solid 0px;" value="<?php echo $id; ?>"></h3>
        <h3 style="padding-left: 45px; padding-top: 10px">
            <label style="padding-right: 30px">Mashinangiz raqami:</label>
            <label><?php echo $row['car_number']; ?></label>
        </h3>
        <h3 style="padding-left: 45px; padding-top: 10px">
            <label style="padding-right: 30px">Servis xizmatchi:</label>
            <label><?php echo $row['fio']; ?></label>
        </h3>
        <h3 style="padding-left: 45px; padding-top: 10px;">
            <label style="padding-right: 30px">Servis narxi:</label>
            <label><?php echo $row['price']; ?></label>
        </h3>
        <h3 style="padding-left: 45px; padding-top: 10px;">
            <label style="padding-right: 30px">Chegirma:</label>
            <label><?php echo $row['sale']; ?></label>
        </h3>
        <h3 style="padding-left: 45px; padding-top: 10px;">
            <label style="padding-right: 30px">Servis narxi chegirma bilan:</label>
            <input style="border: solid 0px;" name="tolov" value="<?php echo $row['price']-$row['price']*$row['sale']/100; ?>">
        </h3>
        <h3 style="padding-left: 45px; padding-top: 10px;">
            <label style="padding-right: 30px">Holat:</label>
            <?php echo $message; ?>
        </h3>
        <?php if($is){?>
        <h3 style="padding-left: 45px; padding-top: 10px;">
                <label style="padding-right: 30px">To`lash:</label>
                <br>
                <input type="text" name="payed" class="form-control">
                <button type="submit" name="paysum" class="btn btn-success" style="margin-left: 80%; width: 100px">To'lov qilish</button>
            </form>
        </h3>
    <?php }?>
</div>


</body>
</html>


