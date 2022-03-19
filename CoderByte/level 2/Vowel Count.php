<?php 

function vokal($param){
  if($param == 'a' || $param == 'i' ||
  $param == 'u' || $param == 'e' || $param == 'o')
  return true;
  return false;
}

function VowelCount($str) {

  // code goes here
  $jumlah=0;
  for($i = 0 ; $i < strlen($str) ; $i++)
  if(vokal($str[$i])) $jumlah++;
  return $jumlah;
}
   
// keep this function call here  
echo VowelCount(fgets(fopen('php://stdin', 'r')));  

?>
