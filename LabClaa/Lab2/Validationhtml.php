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
        BirthDate<span class="span1">*</span>: <input type="text" name="b_date"><br><br>
        Gender<span class="span1">*</span>:<br>
        Female<input type="radio" name="gender" value="male" >
        Male<input type="radio" name="gender" value="female"><br><br>
        Country: <input type="text" name="country"><br><br>
        Email<span class="span1">*</span>: <input type="email" name="email"><br><br>
        Biography:<br>
        <textarea name="bio" id="bio" cols="30" rows="10"></textarea><br>
        <input type="submit" name="submit">
        <input type="reset" value="Reset">

        
        </form>
    </div>
</body>
</html>