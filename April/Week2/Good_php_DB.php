<?php
  function filter_data($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
  }
  $name=$password=$id=$email=$favorite=$image="";
if($_SERVER["REQUEST_METHOD"]=="POST"&& isset($_POST["submit1"]) ){
    $name=filter_data($_POST["name"]);
    $password=filter_data($_POST["password"]);
    $confirm=filter_data($_POST["confirm"]);
    $id=filter_data($_POST["id"]);
    $email=filter_data($_POST["email"]);
    $favorite=filter_data($_POST["favorite"]);
    $image=file_get_contents($_FILES['image']['tmp_name']);


$conn=new mysqli("localhost","tewuhbo","password","PracticeDB");
if($conn->connect_error){
    die("connection fialed ".$conn->connect_error);
}

// $sql="update table1 set Images=? where id=?";
// $stmt=$conn->prepare($sql);
// $stmt->bind_param("si",$image,$ImageID);
// $ImageID=13;
// $stmt->execute();

// if($stmt->affected_rows>0){
//     echo "photo uploaded";
// }else{
//     echo "Photo not uploaded";
// }

// $update1="alter table table1 modify column  name varchar(20)";
// $update1="alter table table1 modify column  email varchar(40)";
// $update1="update table1 set email='tewuhbomihret1992@gmail.com' where id=1";
// $sql="alter table table1 add column Images BLOB ";

//  $update="update table1 set name='tewuhbo',password='tew123' where id=1;";
// if($conn->query($sql)){
//     echo "Updated successfully";
// }else{
//     echo "fial to update";
// }// $sql="create table if not exists Table1(//     name varchar(20) not null,//     id int  primary key,
//     email varchar(20),
//     password varchar(20),
//     favorite varchar(20)
// );";
// if($conn->query($sql)){
//     echo "created successfully";
// }else{
//   echo "fialed to create ".$conn->error;
// }


$doublecheck=0;
$db_id="select id from table1";
$result=$conn->query($db_id);
for($i=0;$i<$result->num_rows;$i++){
    $row=$result->fetch_assoc();
    if($row["id"]==$id){
        ++$doublecheck;
    }
}
if(empty($name)||empty($id)||empty($email)||empty($password)||empty($favorite)||empty($image)){
    echo "<br>Fill all the fiellds FIRST please";
    // return;
}else if($doublecheck!=0){
    echo "<div style='background-color:rgb(200,230,300);text-align:center;padding:10px;border:1px solid green; border-radius:5px;'><br>ID $id is has taken. please change the ID</div>";
   
}else{
    if($password!==$confirm){
        echo "<div style='background-color:rgb(200,230,300);text-align:center;width:150px;position:absolute;top:300px;right:20px;padding:3px;border:1px solid green; border-radius:5px;'>Confirmation failed!</div>";
        
    }else{
    $sqlValues="insert into table1 (name,id,email,password,favorite,Images) values
    ( ?,?,?,?,?,?);";
    $stmt2=$conn->prepare($sqlValues);
    $stmt2->bind_param("sissss",$name,$id,$email,$password,$favorite,$image);
    $stmt2->execute();
    if($stmt2->num_rows()>0){
        echo "<div style='background-color:rgb(200,230,300);text-align:center;padding:10px;border:1px solid green; border-radius:5px;'>New Record entered successfully</div>";
    }else{
        echo "<div style='background-color:rgb(200,230,300);text-align:center;padding:10px;border:1px solid green;color:red; border-radius:5px;'>error ".'$conn->error'."</div>";
    }
}
}
$conn->close();
}


try{
$conn2=new mysqli("localhost","tewuhbo","password","PracticeDB");
if($conn2->connect_error){
    echo "Fialed to connect due to ".$conn2->connect_error;
}else{
    if(isset($_POST["submit2"])){
        $search=$_POST["search"];

        $query="select * from table1 where name=? or id=? or email=? or password=? or favorite=? or Images=?";
        $stmt=$conn2->prepare($query);
        $stmt->bind_param("ssssss",$search,$search,$search,$search,$search,$search);
        $stmt->execute();
        $result=$stmt->get_result();

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "
                <div style='background-color: rgb(240,240,240);
                border-radius:5px; border: 1px solid green;
                 color: green; font-size: 20px;position:fixed;bottom:0px;left:45%;'>
                <img src='data:image/jpeg;base64," . base64_encode($row['Images']) . "' style=\"width:100%;height:150px;border-radius:60px;\" /><br>
                Name: ".$row['name']."<br>
                ID: ".$row['id']."<br>
                Email: ".$row['email']."<br>
                Password: ".$row['password']."<br>
                Favorit: ".$row['favorite']."<br>
                </div>
                ";

            }
        }else{
            echo "
            <div style='border-radius:5px;background-color: rgb(200, 200, 200);padding:10px ;
            text-align:center;font-size:35px; border: 1px solid grey; color: red;
            position:fixed;bottom:10px;right:50%;'>
               No such Data!
            </div>
            ";
        }
    }
    
}}catch(Exception $e){
    // System.out.println($e.getMessage());

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
</head>
<body>
    <h2>Fill the Form</h2>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="border-radius:10px;border: 1px solid green;background-color:azure;display:flex;flex-direction:column;width:200px;padding:0px 100px;" enctype="multipart/form-data">
    <b>Name:</b> <input type="text" name="name" placeholder="Enter Name">
     <b>ID:</b> <input type="text"   name="id">
     <b>Email:</b> <input type="email" name="email">
     <b>Password:</b> <input type="password" name="password">
     <b>Confirm Password:</b> <input type="password" name="confirm">
     <b>Favorite Food:</b>
     <select name="favorite" >
        <option value="mango">Mango</option>
        <option value="papaya">Papaya</option>
        <option value="orange">Orange</option>
        <option value="ananus">Ananus</option>
        <option value="banana">Banana</option>
     </select>
     <b>Photo:</b> <input type="file" name="image"  accept="image/*"><br><br>
     <input type="submit" name="submit1" style="width: 100px; ">
</form>
 <h2>Type the Data you want to search</h2>
 <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
 <b>Search <input type="text" name="search" placeholder="search what you want" style="font-size: X-large; color:blue;border-radius:5px;">
 <input type="submit" name="submit2">
 </form>
</body>
</html>