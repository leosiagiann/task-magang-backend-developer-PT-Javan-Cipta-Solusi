<?php 

function vokalOrNot($param){
  if($param=='a'|| $param=='i'|| $param=='u'|| 
  $param =='e'|| $param=='o'){
    return true;
  }
  return false;
}

function LetterChanges($str) {

  // code goes here
  for($i = 0 ; $i < strlen($str) ; $i++){
    if($str[$i] >= 'a' && $str[$i] <= 'z'){
      $word = ord($str[$i])+1;
      $str[$i] = chr($word);
      if(vokalOrNot($str[$i])){
        $word = ord($str[$i])-32;
        $str[$i] = chr($word);
      }
    }
  }
  return $str;
}
   
// keep this function call here  
echo LetterChanges(fgets(fopen('php://stdin', 'r')));  

?>
