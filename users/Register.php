<?php
require_once "connection.php";
$location='Menyu.php';
function getHostByName6($input)
{
    $temp = dns_get_record($input, DNS_AAAA);
    if (isset($temp[0]['ipv6']))
        return $temp[0]['ipv6'];
    return false;
}
$ip="".getHostByName6('fix6.net') . PHP_EOL;
$sql="select * from userip where ip='$ip'";
$result=mysqli_query($connection,$sql);
if(mysqli_num_rows($result)!=0)
{
    header("location: $location");
}
else
{
    $a=false;
    $name="";
    $email="";
    $pas1="";
    $pas2="";
    $Email="";
    $Password="";
    $messenger="";
    if(isset($_GET['a']))
    {
        $if=$_GET['a'];
        if($if=='Registratsiya')
        {
            $a=true;
            if(isset($_POST['email']))
            {
                $name=$_POST['name'];
                $email = $_POST['email'];
                $pas1 = $_POST['password1'];
                $pas2 = $_POST['password2'];
                $el=strlen($email);
                $e=substr("$email",$el-15,15);
                if($e=="@avtoservis.com")
                {
                    $sql="select * from Users where email='$email'";
                    $result=mysqli_query($connection,$sql);
                    if(mysqli_num_rows($result)==0)
                    {
                        if($pas1==$pas2 and strlen($pas1)>=8)
                        {
                            $sql = "insert into Users(name,email,password) values ('$name','$email','$pas1')";
                            $result = mysqli_query($connection, $sql);
                            $ip="".getHostByName6('fix6.net') . PHP_EOL;
                            $sql="insert into userip(ip) values ('$ip')";
                            mysqli_query($connection,$sql);
                            header("location: $location");
                        }
                        elseif($pas1==$pas2)
                        {
                            $messenger="Parol 8 belgi yoki undan ko`p bo`lishi kerak!";
                        }
                        else
                        {
                            $messenger="Parollar bir biriga mos emas!";
                        }
                    }
                    else
                    {
                        $messenger="Bunday foydalanuvchi mavjud!";
                    }
                }
                else
                {
                    $messenger="Manzil ortida @avtoservis.com yozuvi bo`lishi kerak!";
                }
            }
        }
        else
        {
            if(isset($_POST['Email']))
            {
                $Email=$_POST['Email'];
                $Password=$_POST['Password'];
                $Pass1=md5($Password,false);
                $el=strlen($Email);
                $e=substr("$Email",$el-15,15);
                if($e=="@avtoservis.com")
                {
                    $sql="select * from Users where email='$Email'";
                    $result=mysqli_query($connection,$sql);
                    $user=mysqli_fetch_assoc($result);
                    if(mysqli_num_rows($result)!=0)
                    {
                        $Pass=$user['password'];
                        $Pass2=md5("$Pass",false);
                        if($Pass1==$Pass2)
                        {
                            $ip="".getHostByName6('fix6.net') . PHP_EOL;
                            $sql="insert into userip(ip) values ('$ip')";
                            mysqli_query($connection,$sql);
                            header("location: $location");
                        }
                        else
                        {
                            $messenger="Parol noto`g`ri";
                        }
                    }
                    else
                    {
                        $messenger="Bunday foydalanuvchi mavjud emas!";
                    }
                }
                else
                {
                    $messenger="Manzil ortida @avtoservis.com yozuvi bo`lishi kerak!";
                }
            }
        }
    }
    else
    {
        if(isset($_POST['Email']))
        {
            $Email=$_POST['Email'];
            $Password=$_POST['Password'];
            $Pass1=md5($Password,false);
            $el=strlen($Email);
            $e=substr("$Email",$el-15,15);
            if($e=="@avtoservis.com")
            {
                $sql="select * from Users where email='$Email'";
                $result=mysqli_query($connection,$sql);
                $user=mysqli_fetch_assoc($result);
                $Pass=$user['password'];
                $Pass2=md5("$Pass",false);
                if(mysqli_num_rows($result)!=0)
                {
                    if($Pass1==$Pass2)
                    {
                        $ip="".getHostByName6('fix6.net') . PHP_EOL;
                        $sql="insert into userip(ip) values ('$ip')";
                        mysqli_query($connection,$sql);
                        header("location: $location");
                    }
                    else
                    {
                        $messenger="Parol noto`g`ri";
                    }
                }
                else
                {
                    $messenger="Bunday foydalanuvchi mavjud emas!";
                }
            }
            else
            {
                $messenger="Manzil ortida @avtoservis.com yozuvi bo`lishi kerak!";
            }
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
    <br>
    <h6 class="container">
        <form action="" method="post" class="w-50">
            <?php
            if($a)
            {
                ?>
                <div class="mb-5">
                    <a href="?a=LogIn" class="container">
                        Log In
                    </a>
                    <a href="" type="submit" class="btn btn-primary">
                        Register
                    </a>
                </div>
                <div class="mb-3" class="container">
                    <div class="mb-3">
                        <label class="container">
                            Ismingizni kiriting!
                        </label>
                        <input type="text" class="form-control" value="<?php echo $name; ?>" required name="name">
                    </div>
                    <div class="mb-3">
                        <label class="container">
                            Emailingizni kiriting!(@avtoservis.com)
                        </label>
                        <input type="email" class="form-control" value="<?php echo $email ?>" required name="email">
                    </div>
                    <div class="mb-3">
                        <label class="container">
                            Parolingizni kiriting!
                        </label>
                        <input type="password" class="form-control" value="<?php echo $pas1 ?>" required name="password1">
                    </div>
                    <div class="mb-3">
                        <label class="container">
                            Parolingizni qaytadan kiriting!
                        </label>
                        <input type="password" class="form-control" value="<?php echo $pas2 ?>" required name="password2">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Ro`yhatdan o`tish
                    </button>
                </div>
                <div class="container" style="color: red"><?php echo $messenger ?></div>
                <?php
            }
            else
            {
                ?>
                <div class="mb-5">
                    <a href="" type="submit" class="btn btn-primary">
                        Log In
                    </a>
                    <a href="?a=Registratsiya"class="container">
                        Register
                    </a>
                </div>
                <div class="mb-3" class="container">
                    <div class="mb-3">
                        <label class="container">
                            Emailingizni kiriting!(@avtoservis.com)
                        </label>
                        <input type="email" class="form-control" value="<?php echo $Email; ?>" required name="Email">
                    </div>
                    <div class="mb-3">
                        <label class="container">
                            Parolingizni kiriting!
                        </label>
                        <input type="password" class="form-control" value="<?php echo $Password; ?>" required name="Password">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Kirish
                    </button>
                </div>
                <div class="container" style="color: red"><?php echo $messenger ?></div>
                <?php
            }
            ?>
        </form>
    </h6>
    </body>
    </html>
<?php
}
?>