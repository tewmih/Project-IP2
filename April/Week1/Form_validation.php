<?php
$name=$email=$gender=$password="";

if($_SERVER["REQUEST_METHOD"]=='POST') {
    if(empty($_POST["name"])){
        $name="Name is required";
    }else{
      $name=$_POST["name"];
    }
    if(empty($_POST["email"])){
        $email="Email is required";
    }else{
        $email=$_POST["email"];
    }
    if(empty($_POST["password"])){
        $password="Password is required";
    }else{
        $password=$_POST["password"];
    }
    if(empty($_POST["gender"])){
        $gender="Gender is required";
    }else{
        $gender=$_POST["gender"];
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
     Name: <input type="text" name="name"><br>
     Email: <input type="email" name="email"><br>
     Password: <input type="password" name="password" placeholder="enter the password"><br><br>
     Gender:<br>
     <input type="radio" name="gender" value="male">Male
     <input type="radio" name="gender" value="female">Female
     <input type="radio" name="gender" value="other">Other<span><br>
     <input type="submit">
     <div style="background-color:lightgreen;font-size:xx-large;border-radius:10px;width:500px;height:300px;color:red;text-align:center;">
      <?php
      echo "Name:  ".$name ."<br><br>";
      echo "Email:  ".$email."<br><br>";
      echo "Password: ".$password ."<br><br>";
      echo "Gender: ".$gender
      ?>
</div>
    ?>
</form>
</body>
</html>
