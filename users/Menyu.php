<?php
require_once "connection.php";

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
$user=mysqli_fetch_assoc($result);
$id=$user['id'];
if(mysqli_num_rows($result)==0)
{
    header("location: Register.php");
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
    <title>Menyu</title>
</head>
<body>
<br>
    <div align="end" class="container">
        <a href="Logout.php?id=<?php echo $id; ?>" class="btn btn-danger">
            Log out
        </a>
    </div>
</body>
</html>