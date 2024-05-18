<?php
// $current=date("y/m/d/l");
// $current=time()/24/60/60;
// $current=date("h:i:s A");

// $current=strtotime("10:30pm march 12 2024");
// $current=strtotime("10:30pm march ");
// $current=date("y-m-d h:i:s A",$current);

// echo $current;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        
        echo "<div style='background-color:rgb(10,230,20);border-radius:3px;'>
        The selected day is: ".date("l, F jS, Y", strtotime('next. $_POST["day"]'))."
        </div>";
        header("location:./DynamicSignUp.php");
        exit;
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Select the day you want to do:</h3>
   <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])  ?>" method="post">
      <select name="day">
        <option value="monday">Mondoy</option>
        <option value="tusday">Tusday</option>
        <option value="wednsday">Wednsday</option>
        <option value="thursday">Thursday</option>
        <option value="friday">Friday</option>
        <option value="saturrday">Saturday</option>
        <option value="sunday">Sunday</option>
    </select>
    <input type="submit" value="Send" name="submit">
  </form>
   
</body>
</html>