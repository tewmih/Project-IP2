<?php
if(isset($_POST["submit"])&& $_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $number=$_POST["number"];
    //file writing

$fp=fopen("text1.txt",'w');
if(file_exists("text1.txt")){
    fwrite("text1.txt","hello world");
    echo "file written successfully";
    fclose($fp);
// reopen for  
   $fr=fopen("text1.txt",'r');
   $txt=fread($fr,strlen($fr));

   echo $txt;
   fclose($fr);


}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Handling</title>
</head>
<body>
    <form action="File1.php" method="post">
        Name: <input type="text" name="name" ><br>
        Age: <input type="number" name="number" ><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>