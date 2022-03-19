<?php 

function PrimeTime($num) {
  $prima=0;
  // code goes here
  for($i = 2 ; $i <= $num ; $i++){
    if($num%$i==0)$prima++;
  }
  if($prima==1)return "true";
  return "false";
}
   
// keep this function call here  
echo PrimeTime(fgets(fopen('php://stdin', 'r')));  

?>
