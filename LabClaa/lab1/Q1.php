<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        echo "<br><br>"."Question 1:"."<br>";
        echo "<h2>hello world</h2>";


        echo "<br><br>"."Question 2:"."<br>";
        $age=15;
        if($age<18){
            echo "access denied"."<br>";
        }else{
            echo "registration successful"."<br>";
        }

        ?>
        <?php

        echo "<br><br>"."Question 3:"."<br>";
        for($i=50;$i>0;$i--){
           echo $i." ";
        }
        
        echo "<br><br>"."Question 4:"."<br>";

        function welcome(){
            echo "welcometo the php world"."<br>";
        }
        welcome();
    //  random
    echo "<br><br>"."Question 5:"."<br>";
  function random($arg){
    $ary=[];
    for($i=0;$i<10;$i++){
        $ary[$i]=rand(1,100);
        echo $ary[$i]." ";
    }
    $value=0;
    switch($arg){
        case "max":
            $value=max($ary);
            break;
        case "min":
            $value=min($ary);
            break;
        default:
        echo "invalid input";

    }
    return $value;

  }
  echo "<br>the minimum is " .random("min");

//   arthemetic operator
echo "<br><br>"."Question 6:"."<br>";
function Arthemethic($num1,$num2,$operator){
    $result=0;
    switch($operator){
        case '+':
            $result=$num1+$num2;
            break;
        case '-':
            $result=$num1-$num2;
            break;
        case '*':
            $result=$num1*$num2;
            break;
        case '/':
            $result=$num1/$num2;
            break;
        default:
        echo "invalid operator";

    }
    return $result;
}
echo "the result is ". Arthemethic(2,3,'+');
//   Color display

echo "<br><br>"."Question 7:"."<br>";
$colorList=array("color1"=>"red","color2"=>"green","color3"=>"blue",
"color4"=>"grey","color5"=>"yellow","color6"=>"white");
foreach($colorList as $key=>$value){
    // switch($key){
    //     case "color1":
    //         echo "<div style=\"background-color:red; width:100px;height:100px;\"></div>";
    //         break;
    //     case "color2":
    //         echo "<div style=\"background-color:green; width:100px;height:100px;\"></div>";
    //         break;
    //     case "color3":
    //         echo "<div style=\"background-color:blue; width:100px;height:100px;\"></div>";
    //         break;
    //     case "color4":
    //         echo "<div style=\"background-color:grey; width:100px;height:100px;\"></div>";
    //         break;
    //     case "color5":
    //         echo "<div style=\"background-color:yellow; width:100px;height:100px;\"></div>";
    //         break;
    //     case "color6":
    //         echo "<div style=\"background-color:white; width:100px;height:100px;\"></div>";
    //         break;
    // }
    echo "<br>".$key." is ".$value." <br>";
}
//   
echo "<br><br>"."Question 8:"."<br>"."see the color of the body";
function bodycolor($value){
    echo "<body style=\"background-color:$value;\"></body>";
}
$value=$colorList[array_rand($colorList)];
bodycolor($value);


        ?>
</body>
</html>