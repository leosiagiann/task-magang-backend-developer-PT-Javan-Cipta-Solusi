<?php 

function CheckNums($num1,$num2) {

  // code goes here
  if($num1==$num2)return '-1';
  if($num1>$num2)return 'false';
  if($num1<$num2)return 'true';
}
   
// keep this function call here  
echo CheckNums(fgets(fopen('php://stdin', 'r')));  

?>
