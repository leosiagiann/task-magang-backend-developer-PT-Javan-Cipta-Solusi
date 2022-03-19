<?php 

function ExOh($str) {
  $o = 0;
  $x = 0;
  // code goes here
  for($i = 0 ; $i < strlen($str) ; $i++){
    if($str[$i] == "x" || $str[$i] == "X")$x++;
    if($str[$i] == "o" || $str[$i] == "O")$o++; 
  }
  if($x==$o)return "true";
  return "false";
}
   
// keep this function call here  
echo ExOh(fgets(fopen('php://stdin', 'r')));  

?>
