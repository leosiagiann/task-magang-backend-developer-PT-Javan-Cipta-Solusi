<?php 

function WordCount($str) {
  $count = 1;
  // code goes here
  for($i = 0 ; $i < strlen($str) ; $i++)
  if($str[$i] == " ")$count++;
  return $count;
}
   
// keep this function call here  
echo WordCount(fgets(fopen('php://stdin', 'r')));  

?>
