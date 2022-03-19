<?php 



function FirstFactorial($num) {
  $start = 1;
  // code goes here
  for($i = 2 ; $i <= $num ; $i++){
    $start*=$i;
  }
  return $start;
}
   
// keep this function call here  
echo FirstFactorial(fgets(fopen('php://stdin', 'r')));  

?>
