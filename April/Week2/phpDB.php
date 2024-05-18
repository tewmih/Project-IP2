<?php
$serverName="localhost";
$dbName="PhpDB";
$userName="tewuhbo";
$password="DB_password";

try {
    $pdo=new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // $sql1="alter table personaldata modify column id int auto_increment ";
    // $sql2="alter table personaldata add email varchar(20)";
    // $sql2="alter table personaldata add password varchar(15)";
    // $sql2="alter table personaldata drop አድድረ";
    // $sql2="insert into personaldata(name,id,email,password) values(\"tewuhbo\",1,\"tewuhbomihret1992@gmail.com\",\"password\")";
    // $sql3="alter table personaldata modify column name VARCHAR(20)";
    // $sql3="insert into personaldata values(\"Abebe\",2,\"abebe@gmail.com\",\"abebe@123\")";
    // $sql3="alter table personaldata ";
    // $sql1="delete from personaldata where id=1";
    // $sql1="insert into personaldata values(\"kebede\",null,\"kebede@gmail.com\",\"kebede@123\"),(\"aster\",5,\"aster@gmail.com\",\"aster@123\")";
    // $sql1="delete from personaldata where id=4";
    // $sql1="select * from personaldata where id=5";
    $sql1="create database if not exists PracticeDB ";

    $pdo->exec($sql1);
    echo "<br>". "DB connected successfully";
} catch (PDOException $e) {
    echo "error ".$e->getMessage();
}
$pdo=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Database Test</title>
</head>
<body>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?> method="post">
     <h2>Form page</h2>
     Name: <input type="text"><br>
     Password: <input type="password" placeholder="entr the password"><br>
     Email: <input type="email" placeholder="enter the email"><br>
     <input type="submit" value="login">
</form>
</body>
</html>