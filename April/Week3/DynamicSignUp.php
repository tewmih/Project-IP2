<?php
include("/material3_2/Code3_2/WebBased/April/database.php");
$globalid=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $name = trim($_POST["name"]);
        $password = trim($_POST["password"]);

        $query = "select * from LoginTable";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $control = 0;
            if( $name==""|| $password==''){
                echo "<div style='text-align:center;font-size:25px;background-color:rgb(200,300,255);border-radius:5px;color:red; border:1px solid green;'>First fill all the fields</div>";

            }else{

            while ($row = $result->fetch_assoc()) {
                if (($password == $row["Password"]) && ($name == $row["name"])) {
                    ++$control;
               }
            }
            if ($control != 0) {
                echo "<div style='text-align:center;font-size:25px;background-color:rgb(200,300,148);border-radius:5px;color:green; border:1px solid green;'>You loged in correctly</div>";
            } else {
                echo "<div style='background-color:rgb(200,200,255);color:red;border-radius:5px; border:1px solid green;font-size:25px;text-align:center;'>Incorrect name or password <br>Or sign up</div>";
            
                echo "<form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>
                        <p style='position:absolute; top:35%;left:10%;'> Forget password? <input type='submit' value='Reset password' style='border: none;background-color:white;color:blue;cursor:pointer;' name='resett'></p>
                      </form>";}

            }
            
        }
    }
}
$conn->close();

try{

    if(isset($_POST["resett"])){
        echo "<form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>
        <h2>Reset your password</h2>
        Email:<br><input type='email' name='sendremail'><br>
        ID:<br><input type='number' name='sendrid'><br>
        <input type='submit' name='sendreset' value='Send'>
      </form>";
      $sendremail='';
      $sendrid=0;
        if($_POST["sendremail"]==''|| $_POST["sendrid"]==''){
            echo "Not Filled";
        }else if(isset($_POST['sendreset'])){

            $sendremail = trim($_POST['sendremail']);
            $globalid= $sendrid = trim($_POST['sendrid']);
            include("/material3_2/Code3_2/WebBased/April/database.php");
            $querycheck = "SELECT email, id FROM LoginTable";
            $stmtcheck = $conn->prepare($querycheck);
            $stmtcheck->execute();
            $resultcheck = $stmtcheck->get_result();
            $check = 0;

            while($rowcheck = $resultcheck->fetch_assoc()){
                if($sendremail == $rowcheck["email"] && $sendrid == $rowcheck['id']){
                    ++$check;
                }
            }

            $conn->close();

            if($check > 0){
                echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='post'>
                        <h3>Enter the new password</h2>
                        <input type='password' name='resetedpass'><br>
                        <input type='password' name='confirm'><br>
                        <input type='submit' name='resetedsubmit' value='Reset'>
                      </form>";
                        }else{
                echo "<div style='background-color:rgb(200,200,255);color:red;border-radius:5px; border:1px solid green;font-size:25px;text-align:center;'>Not Found</div>";
            }
        }
        if(isset($_POST['resetedsubmit'])){
            $password1 = $_POST['resetedpass'];
            $password2 = $_POST['confirm'];
            include("/material3_2/Code3_2/WebBased/April/database.php");

            if($password1 == $password2){
                $querystore = "UPDATE LoginTable SET password=? WHERE email=?";
                $stmtfinal = $conn->prepare($querystore);
                $stmtfinal->bind_param("si", $password1, $sendremail);

                if($stmtfinal->execute()){
                    echo "<div style='background-color:rgb(200,200,255);color:green;border-radius:5px; border:1px solid green;font-size:25px;text-align:center;'>Updated successfully</div>";
                }else{
                    echo "<div style='background-color:rgb(200,200,255);color:red;border-radius:5px; border:1px solid green;font-size:25px;text-align:center;'>Not Updated successfully</div>";
                }
            }else{
                echo "<div style='background-color:rgb(200,200,255);color:red;border-radius:5px; border:1px solid green;font-size:25px;text-align:center;'>Not the same password</div>";
            }
        }
    }
  }catch(SQLite3Exception $e){
        echo $e->getMessage();
    }

if(isset($_POST["signup"])){
    echo '
         <form action="'. htmlspecialchars($_SERVER["PHP_SELF"]).'" method="POST" style="position:absolute;bottom:100px;right:45%;>
         <br>Name: <br><input type="text" name="sname"><br>
         <br>Name: <br><input type="text" name="sname"><br>
         ID: <br> <input type="number" name="sid"><br>
         Password<br><input type="password" name="spassword"><br>
         Email:<br> <input type="email" name="semail"><br><br>
         <input type="submit" value="Registor" name="registor">
    </form>
    ';
}
try{
    function passwordCharacter($pass){
        $Upper=preg_match("/[A-Z]/",$pass);
        $chars = preg_match('/[!@#\$%\^&*()_+\-{}[\]|:;"\'<,.>?\/]/', $pass);

        return $Upper&&$chars;
    }
if(isset($_POST["registor"])){
    $sname=$_POST['sname'];
    $sid=$_POST["sid"];
    $spassword=$_POST["spassword"];
    $semail=$_POST["semail"];
    include("/material3_2/Code3_2/WebBased/April/database.php");
    $query2="insert into LoginTable(name,id,password,email) values(?,?,?,?);";
    $stmt2=$conn->prepare($query2);
    $stmt2->bind_param("siss",$sname,$sid,$spassword,$semail);

    if(passwordCharacter($spassword)){
        echo "<div style='background-color:rgb(200,200,255);color:green;border-radius:5px; border:1px solid green;font-size:25px;position:absolute;right:10px;text-align:center;'>Not included either Upper case or special characters</div>"; 
    }
    if( $stmt2->execute()>0&& passwordCharacter($spassword)==true){
        echo "<div style='background-color:rgb(200,200,255);color:green;border-radius:5px; border:1px solid green;font-size:25px;text-align:center;'>Inserted successfully</div>"; 
    }else{
        echo "<div style='background-color:rgb(200,200,255);color:red;border-radius:5px; border:1px solid green;font-size:25px;text-align:center;'>Not inserted</div>";
    }
    isset($_POST["signup"])=="";

}
}catch(SQLite3Exception $e){
     echo $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST["back"])) {
        header("location: ./File_date.php");
        exit; // Add exit after header to prevent further execution
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registor Page</title>
    <link rel="stylesheet" href="DynamicSignUp.css">
</head>
<body>
    <h2>Register</h2>
    <form action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    Name: <br><input type="text" name="name"><br>
    <div class="pass">
         <div class="line"></div>
        <img src="../../Media/show.png"alt="show">
       
    Password: <br><input type="password" name="password" style="height: 21px;" oninput="changehandler()"><span class="strength"></span>
    <span  style="position:absolute; left:310px;"><input class="range" type="range" value=0 style="font-size: smaller;height:5px;"></span><br>
    <input type="checkbox" class="checkboxofpassword">Show password<br>
    </div>
    <input type="submit" name="login" value="Login" style="border: none;background-color:white;color:blue;cursor:pointer;"><br><br>
    <br><p>if you didn't log in please <button style="border: none;background-color:white;color:blue;cursor:pointer;" name="signup">sign up</button></p>
</form>

<form action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
   <input type="submit" name="back" value="Back"><br>
</form>
<script src="./DynamicSignUp.js"></script>
</body>
</html>