<?php
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
<?php include "../nav.php";?>
    <div  style="border: solid 3px black; width: 400px; height: 350px; border-radius: 10px; margin-left: 500px; margin-top: 50px">
        <h3 style="padding-left: 45px; padding-top: 10px;">
            <form action="search.php" method="post">
                <label style="padding-right: 30px">ID ni kiriting:</label><br>
                <input type="text" name="id" class="form-control">
                <button type="submit"  class="btn btn-success" style="margin-left: 75%">Qidiruv</button>
            </form>
        </h3>
    </div>

?>
</body>
</html>
