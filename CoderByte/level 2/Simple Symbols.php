<?php 

function SimpleSymbols($str) {
  $cek = false;
  // code goes here
  for($i = 0 ; $i < strlen($str) ; $i++){
    if($str[$i] >= 'a' && $str[$i] <= 'z' 
    || $str[$i] >= 'A' && $str[$i] <= 'Z')
    {
      if($i == 0)return 'false';
      if($str[$i-1] != '+' || $str[$i+1] != '+')
        $cek = true;
    }
    if($cek)return 'false';
  }
  return 'true';
}
   
// keep this function call here  
echo SimpleSymbols(fgets(fopen('php://stdin', 'r')));  

?>
