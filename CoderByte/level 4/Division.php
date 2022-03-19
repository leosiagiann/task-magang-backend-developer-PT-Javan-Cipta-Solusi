<?php 

function Division($num1,$num2) {
  $faktor=0;
  // code goes here
  $min=0;
  ($num1>$num2) ? $min=$num2 : $min=$num1;
  for($i = 1 ; $i <= $min ; $i++)
  if($num1%$i==0&&$num2%$i==0)$faktor=$i;
  
  return $faktor;
}
   
// keep this function call here  
echo Division(fgets(fopen('php://stdin', 'r')));  

?>
