<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="text" name="name" placeholder="enter name"><br><br>
    <input type="password" name="passsword" placeholder="enter password"><br><br>
    <input type="submit" name="submit" value="Registor"><br>
</form>
</body>
</html>