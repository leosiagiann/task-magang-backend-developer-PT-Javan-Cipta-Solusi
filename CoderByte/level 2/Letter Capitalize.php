<?php 

function LetterCapitalize($str) {
  $cek = 1;
  // code goes here
  for($i = 0 ; $i < strlen($str) ; $i++){
    if($cek == 1 && $str[$i] >= 'a' && $str[$i] <= 'z'){
      $word = ord($str[$i])-32;
      $str[$i] = chr($word);
      $cek=0;
    }
    if($str[$i] == " ")
    $cek=1;
  }
  return $str;
}
   
// keep this function call here  
echo LetterCapitalize(fgets(fopen('php://stdin', 'r')));  

?>
