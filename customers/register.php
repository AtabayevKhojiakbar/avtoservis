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

    header('location:index.php');

?>

