<?php
if($_SERVER["REQUEST_METHOD"]=="POST"&& isset($_POST["submit"])){
    $name=trim($_POST["name"]);
    
    $birthDate=strtotime($_POST["b_date"]);
//     $dateary = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
// );
// if (in_array($birthDate, $arrayName)) {
  
// } else {
   
// }
    $gender = isset($_POST["gender"])?trim($_POST["gender"]):"";
    $country=$_POST["country"];
    $email=trim($_POST["email"]);
    $bio = trim($_POST["bio"]);
    if(empty($name)|| empty($birthDate)|| empty($gender)||empty($email)){
        echo "<div style='background-color:rgb(120,240,255);position:absolute;top:5%;left:5%;width:50%; color:red'>";
        echo "<p>Required fields must be filled First</p>";
        echo "</div>";
    
    }else{
     $errors=array();
    $countrypattern="/^[A-Za-z\s]*$/";
    $namepattern="/^[A-Za-z\s]+$/";
    $emailpattern="/[A-Za-z\-0-9.%_]+@[A-Za-z\-0-9_]+\.[A-Za-z\-_]{2,}/";
    // $datepattern = "/^(19|20)\d\d-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/";

    
    // if(!preg_match($datepattern,$birthDate)){
    //    $errors[]="Invalid Date Format";
    // }else{
    if((time()-strtotime($birthDate)/60/60/24/365)<18){
        $errors[]="Not Allowed. Age below 18";
    }
    
    if(!preg_match($namepattern,$name)){
       $errors[]="Invalid name Format";
    }
    if(!preg_match($countrypattern,$country)){
       $errors[]="Invalid Country Format";
    }
    if(!preg_match("/[\w]*/",$bio)){
       $errors[]="Invalid Biography Format";
    }
    if(!preg_match($emailpattern,$email)){//|| !filter_var($email.FILTER_VALIDATE_EMAIL)
       $errors[]="Invalid Email Format";
    }

    

    if(!empty($errors )){
        echo "<div style='background-color:rgb(230,240,255);padding:10px;color:green;width:50%;font-size:20px;position:absolute;top:30%;'>";
        foreach($errors as $error){
            echo "<p>".$error."</p>";
        }
        echo "</div>";
    }else{
        echo "<div style='background-color:grey;width:50%;font-size:20px;color:white;position:absolute;top:30%;'>";
        echo "Submitted successfully";
        echo "</div>";
        echo "<div style='background-color:grey;width:50%;font-size:20px;color:white;position:absolute;top:30%;'>";
        echo "<h2>Your Data Are:<br></h2>";
        echo "<br>Name:   ".$name."<br>Gender:   ".$gender."<br>Email:  ".$email."<br>BirthDay:  ".round((time()-$birthDate)/60/60/24/365)."<br>Biography:  ".($bio!=null?$bio:"Not set")."<br>Country:  ".($country!=null?$country:"Not set");

        echo "</div>";}

       
        
        //  $sql="create database if not exists Lab2";
        //  $stmt=$con->prepare($sql);
        //  $stmt->execute();
        
        try{
            // require("./DatabaseConnect.php");

            // $conn=new mysqli("localhost","tewuhbo","password","PracticeDB");
            // if($conn->connect_error){
            //     die("connection fialed ".$conn->connect_error);
            // }
            
            // // Create database if not exists
            // $sql = "CREATE DATABASE IF NOT EXISTS Lab22";
            // if ($con->query($sql) === TRUE) {
            //     echo "Database created successfully";
            // } else {
            //     echo "Error creating database: " . $con->error;
            // }
            
           include("./databasetest.php");
            // Create table
        
            
            // Close connection
            $con->close();
            
        }catch(Exception $e){
            echo $e->getMessage();
        }

         if($stmt->affected_rows>0){
            echo "entered succeessfully";
         

         }else{
            echo "not connected";
         }
        }
    }
    


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
</head>
<body>
    <div class="c1" style="border: 3px solid ; padding:10px;width:300px; position:absolute; top:0.5%;right:0.5%;align-items:right;" >
     <form action="<?php echo  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <style>
        .span1{
            color: red;
        }
    </style>
        <h2>User Registration</h2>
        <span class="span1">*</span> required<br>
        Full Name <span class="span1">*</span>: <input type="text" name="name" ><br><br>
        BirthDate<span class="span1">*</span>: <input type="text" placeholder="yyyy-mm-yy" name="b_date"><br><br>
        Password: <input type="password" name="password"><br>
        Gender<span class="span1">*</span>:<br>
        Female<input type="radio" name="gender" value="male" >
        Male<input type="radio" name="gender" value="female"><br><br>
        Country: <input type="text" name="country"><br><br>
        Email<span class="span1">*</span>: <input type="email" name="email"><br><br>
        Biography:<br>
        <textarea name="bio" id="bio" cols="30" rows="10"></textarea><br>
        <input type="file" name="file"><input type="button" name="photo" value="Upload"><br>
        <input type="submit" name="submit">
        <input type="reset" value="Reset">
        
        
        </form>
    </div>
    <script>

    </script>
</body>
</html>