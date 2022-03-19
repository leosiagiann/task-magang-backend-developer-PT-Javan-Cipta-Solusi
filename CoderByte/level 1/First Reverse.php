<?php 

function FirstReverse($str) {

  $last = "";
  // code goes here
  for($i = strlen($str)-1 ; $i >= 0  ; $i--){
    $last .= $str[$i];
  }
  return $last;
}
   
// keep this function call here  
echo FirstReverse(fgets(fopen('php://stdin', 'r')));  

?>
