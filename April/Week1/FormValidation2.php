<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function filter_data($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Check if all fields are set
    if (
        isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["email"]) &&
        isset($_POST["id"]) && isset($_POST["comment"]) && isset($_POST["gender"]) &&
        isset($_POST["food"]) && isset($_POST["phone"])
    ) {
        // User Data
        $name = filter_data($_POST["name"]);
        $password = filter_data($_POST["password"]);
        $email = filter_data($_POST["email"]);
        $id = filter_data($_POST["id"]);
        $comment = filter_data($_POST["comment"]);
        $gender = filter_data($_POST["gender"]);
        $food = filter_data($_POST["food"]);
        $phone = filter_data($_POST["phone"]);

        //empty validation
        $empty_error = "";
        if (empty($name) || empty($password) || empty($email) || empty($phone) || empty($comment) || empty($gender) || empty($food)) {
            $empty_error = "Fill all the fields";
        }
        
        // format validation regex
        $Nformat_error = '';
        $Eformat_error = '';
        $Pformat_error = '';
        $Iformat_error = '';
        $Phoformat_error = '';

        if (!preg_match("/[A-Za-z\s]*/", $name)) {
            $Nformat_error = "Enter appropriate name characters";
        }
        if (!preg_match("/\w+@\w+\.\w+/", $email)) {
            $Eformat_error = "Fill appropriate Email";
        }
        if (!preg_match("/[a-zA-Z0-9#$%&*\.]+/", $password)) {
            $Pformat_error = "fill the appropriate password";
        }
        if (!preg_match("/[A-Z]{3}[0-9]{4}\/[0-9]{2}/", $id)) {
            $Iformat_error = "Please enter the AASTU Id Format";
        }
        if (!preg_match("/\+[0-9]{1,3}\-[0-9]{4}\-[0-9]{5}/", $phone)) {
            $Phoformat_error = "invalid phone format";
        }

        // length validation
        $Nlength_error = "";
        $Plength_error = '';
        $Ilength_error = "";
        $Pholength_error = "";
        if (strlen($name) < 2 || strlen($name) > 20) {
            $Nlength_error = "Invalid name length";
        }
        if (strlen($password) < 8 || strlen($password) > 20) {
            $Plength_error = "invalid password length";
        }
        if (strlen($id) != 10) {
            $Ilength_error = "invalid Id length";
        }
        if (strlen($phone) != 15) {
            $Pholength_error = "Invalid phone length";
        }
    } else {
        $set_error = "the Fields are not set";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form validation</title>
</head>

<body>
    <h2>Personal Data</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="Guest" name="name"><br><br>
        Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email"><br><br>
        Password: &nbsp;&nbsp;&nbsp;<input type="text" name="password"><br><br>
        AASTU ID:&nbsp;<input type="text" name="id"><br><br>
        Comment: &nbsp;&nbsp;&nbsp;<textarea name="comment" id="comment" cols="30" rows="10">enter a comment</textarea><br><br>
        Phone: <input type="tel" name="phone" placeholder="+251-9480-36117"><br><br>
        Gender: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="male" name="gender">male
        <input type="radio" name="gender" value="female">female
        <input type="radio" name="gender" value="other">Other <br><br>
        Favorite Food:&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="food" id="selection">
            <option value="Pizza">Pizza</option>
            <option value="Berger">Berger</option>
            <option value="Mango">Mango</option>
            <option value="Banana">Banana</option>
        </select><br><br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Send">

    </form>
    <div style="background-color:grey;border:1px solid green; height:400px;color:white;">
        <?php
        if(isset($set_error)) {
            echo $set_error;
        } else if($empty_error||$Nformat_error||$Plength_error||$Pformat_error||$Eformat_error||$Ilength_error||$Pholength_error||$Phoformat_error) {
            echo $empty_error."<br>". $Nformat_error."<br> ".$Plength_error."<br> ".$Pformat_error." <br>".$Eformat_error." <br>".$Ilength_error."<br> ".$Iformat_error."<br> ".$Pholength_error."<br> ".$Phoformat_error;
        }else{
            echo "You fill correctly. Thank you for your petient";
        }
        ?>
    </div>
</body>

</html>
