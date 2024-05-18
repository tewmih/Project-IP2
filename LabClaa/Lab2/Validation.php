<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $name = trim($_POST["name"]);
    $b_date = strtotime(trim($_POST["b_date"]));
    $country = trim($_POST["country"]);
    $email = trim($_POST["email"]);
    $bio = trim($_POST["bio"]);
    // $gender = isset($_POST["gender"])?trim($_POST["gender"]):"";
    $gender=$_POST["gender"]??"";
   if(empty($name) || empty($b_date) || empty($gender) || empty($email)){
        // header("location:Validation.php");
        include("./Validationhtml.php");
        echo "<div style='background-color:rgb(120,240,255);position:absolute;top:5%;left:5%;width:50%; color:red'>";
        echo "<p>Required fields must be filled First</p>";
        echo "</div>";
        exit;
    }else{
        $errors=array();
        if(!preg_match("/^[a-zA-Z\s]+$/",$name)){
              $errors[]="The name doesn't match the format";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            
            # echo "<div style='background-color:grey;width:50%;font-size:25px;position:absolute;top:10%;'>";
            // echo "The Email doesn't match the format";
            // echo "</div>";
            $errors[]= "The Email doesn't match the format";
        }
        if(!preg_match("/^[a-zA-Z\s]+$/",$country)){
            
            /*echo "<div style='background-color:grey;width:50%;font-size:25px;position:absolute;top:20%;'>";
            echo "The Country doesn't match the format";
            echo "</div>";
            */
             $errors[]="The Country doesn't match the format";
        }
        if(((time()-$b_date)/60/60/24/365)<18){
            
            // echo "<div style='background-color:grey;width:50%;font-size:20px;color:white;position:absolute;top:30%;'>";
            // echo "Your age is bellow Allowed";
            // echo "</div>";
            $errors[]="Your age is bellow Allowed";
        }
        if(!empty($errors)){
            echo "<div style='background-color:grey;width:50%;font-size:20px;color:white;position:absolute;top:30%;'>";
            foreach($errors as $error){
                echo "<p>$error</p>";

            }
            echo "</div>";

        }else{
            
           echo "Submitted successfully";
            echo "</div>";

        }
    }
   }
?>
<?php
include("./Validationhtml.php");
?>

