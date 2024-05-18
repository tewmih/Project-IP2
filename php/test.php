<?php
/*$x=array(
  "kenya"=>"nirobi",
  "ethiopia"=>"addis Ababa",
  "sudan"=>"kartum"

);
foreach($x as $key=> $value){
  // echo "the keys are:"."<br>";
  echo $key."'s capital is ".$value."\n";
}*/

// $x=31;
// $y=40;
// // define("CONSTT", "25", true);

// function Test(){
//   global $x;
//   static $z=30;
//   $z++;
//   // echo $z.CONSTT;
//   $value=$x<=>$z;
//   echo "this is ",$value, " is the value";
 

//  # echo $x+$GLOBALS["y"];
// }
// Test();
// Test();
// // echo $z;
// Test();


$string="hello this is wolo. lo you can came tolo and you go hylo. because of TOLO";
// echo str_word_count($string)."<br>";
// print_r(str_word_count($string)."<br>") ;
// printf(str_word_count($string)."<br>") ;
// var_dump(str_word_count($string)."<br>") ;
// $x = 1.9e411;
// $pattern="/\w*lo\b/i";
// $pattern2="/[^(l)(o)]/";
// var_dump($x)."<br><br>";

// echo preg_match($pattern,$string)."<br>";

// if (preg_match_all($pattern2, $string, $matches)) {
//   foreach ($matches as $match) {
//     foreach($match as $submatch){
//       echo $submatch . "<br>";
//     }
      
//   }
  // $final_string=preg_replace($pattern,"placed",$string);
  // echo$final_string."<br>";
  // echo preg_match_all($pattern,$string);
// }
?>
<?php
// $pattern1="/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)([a-zA-Z0-9]){8-20}/";
// $p1="/[89][0-9]{9}/";
// $p2="/(?=.*[a-z])(?=.*[0-9]/)[A-Z][a-z0-9]";
// $number = "1780-12-32";

// $patterndate="/[1[789]\d|2[0]]{2}\-0[1-9]|1[0-2]\-[0][1-9]|[12][0-9]|[3][01]/";
// if (preg_match($patterndate, $number)) {
//     echo "correct";
// } else {
//     echo "Not corecr.";
// }


$i=10;
function test($i){
  $i+=2;
  GLOBAL $i;
  echo $i+$i;

}
echo $i;
GLOBAL $i;
test($i);
echo $i;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
  <input type="text" name="text"><span></span><br>
  <input type="submit" name="submit">

</form>
</body>
</html>