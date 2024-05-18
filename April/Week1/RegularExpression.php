<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone=$_POST["phone"];
    $Npattern = "/[a-zA-Z]+/i";
    $Epattern = "/^[a-zA-Z0-9]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9]+/i";
    $Ppattern = "/[a-zA-Z0-9]{8,}/";
    // $Phopattern="/^[+]{1}[0-9]{3}\-[0-9]{3}\-[0-9]{4}/";
    $Phopattern="/^\([+]{1}[0-9]{3}\)\-[0-9]{3}\-[0-9]{4}/";
    // https://www.example.com/path/to/page?param1=value1&param2=value2&param3=value3
    // \bhttps?:\/\/[^\s\/]+(?:\/[^\s?#\/]+)*(?:\?(?:[^=&#]+=[^&=#]+(?:&[^=&#]+=[^&=#]+)*)?(?:#[^\s#]*)?\b

    $strongpassword="/[a-zA-Z]+\:\/\/[w]{3}\.[a-zA-Z0-9]\.[a-zA-z0-9][\/[a-zA-z0-9]]+\?[a-zA-z0-9]+[\=[a-zA-z0-9]+]+/";
    $Ncheck = "";
    $Echeck = "";
    $Pcheck = "";
    $Phocheck = "";

    if (preg_match($Npattern, $name, $matches)) {
        $Ncheck = "Pass the regex";
        if(strlen($name)>5&& strlen($name)<20){
           $Ncheck.=" and lenght";
        }else{
            $Ncheck.=" but not the length";
        }
        if(preg_match($Npattern,$name)){
            $Ncheck.=" as well as the type";
           }else{
            $Ncheck.=" but not the type";
           }
        
    } else {
        $Ncheck = "Invalid name format";
    }

    if (preg_match($Epattern, $email, $matches)) {
        $Echeck = "Pass";
    } else {
        $Echeck = "Invalid Email format";
    }

    if (preg_match($Ppattern, $password, $matches)) {
        $Pcheck = "Pass";
    } else {
        $Pcheck = "Invalid password format";
    }
    if(preg_match($Phopattern,$phone)){
        $Phocheck="Pass";
    }else{
      $Phocheck="Invalid Phone format";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regular Expression</title>
</head>
<body>
   <form action="RegularExpression.php" method="POST">
       Name: <input type="text" name="name"><br>
       Email: <input type="email" name="email"><br>
       Password: <input type="password" name="password"><br>
       Phon: <input type="tel" name="phone" placeholder="+251-948-036117"><br>
       <input type="submit">
       <div style="background-color: aqua; font-size:x-large;">
          <?php
          echo "Name check:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$Ncheck . "<br>";
          echo "Email check: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Echeck . "<br>";
          echo "Password check:&nbsp &nbsp; ".$Pcheck . "<br>";
          echo "Phone No check:&nbsp &nbsp; ".$Phocheck . "<br>";
          ?>
       </div>
  </form> 
</body>
</html>
