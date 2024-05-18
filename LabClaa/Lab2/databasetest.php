<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["upload"])) {
    $name=$_POST["name"];
    $password=$_POST["password"];
    $id=$_POST["id"];
    $email=$_POST["email"];
    require("./DatabaseConnect.php");
    $query2="insert into users(name,id,password,email) values(?,?,?,?);";
    $stmt2=$con->prepare($query2);
    $stmt2->bind_param("siss",$name,$id,$password,$email);
    session_start();
    $sql = "SELECT id, password FROM users WHERE email = '$email'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $row['id'];
            header("Location: profile.php");
            exit();
        }
    }
    // Invalid login
    $error = "Invalid email or password";
  
    
    
    $filename=$_FILES['file']['name'];
    $tempo=explode(".",$filename);
    $extension=strtolower(end($tempo));
    $allowedext=array("png","jpeg","jpg","gif");
    if(in_array($extension,$allowedext)){
        move_uploaded_file($_FILES['file']['name'], "/images/photo/$filename"); // corrected the file path
        echo "photo Uploaded";
    } else {
        echo "photo format not allowed";
    }

    $con->close(); // corrected the variable name
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
     <form action="<?php echo  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <style>
        .span1{
            color: red;
        }
    </style>
        <h2>User Registration</h2>
        <span class="span1">*</span> required<br>
        Full Name <span class="span1">*</span>: <input type="text" name="name" ><br><br>
        ID: <span class="span1">*</span>: <input type="text" name="id" ><br><br>
        <!-- BirthDate<span class="span1">*</span>: <input type="text" placeholder="yyyy-mm-yy" name="b_date"><br><br> -->
        Password: <input type="password" name="password"><br>
        <!-- Gender<span class="span1">*</span>:<br> -->
        <!-- Female<input type="radio" name="gender" value="male" > -->
        <!-- Male<input type="radio" name="gender" value="female"><br><br> -->
        <!-- Country: <input type="text" name="country"><br><br> -->
        Email<span class="span1">*</span>: <input type="email" name="email"><br><br>
        <!-- Biography:<br> -->
        <!-- <textarea name="bio" id="bio" cols="30" rows="10"></textarea><br> -->
        <input type="file" name="file"><input type="submit" name="upload" value="Upload"><br> <!-- corrected button type to submit -->
        <input type="submit" name="submit">
        <!-- <input type="reset" value="Reset"> -->
        
        
        </form>
    </div>
    <script>

    </script>
</body>
</html>
