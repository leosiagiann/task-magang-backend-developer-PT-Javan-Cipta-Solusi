<?php 

function TimeConvert($num) {

  // code goes here
  $menit = $num%60;
  $jam = floor($num/60);
  return $jam.':'.$menit;
   
}
   
// keep this function call here  
echo TimeConvert(fgets(fopen('php://stdin', 'r')));  

?>
