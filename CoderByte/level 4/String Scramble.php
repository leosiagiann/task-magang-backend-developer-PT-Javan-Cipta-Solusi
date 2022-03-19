<?php 

function StringScramble($str1,$str2) {
  $notSame = 0;
  // code goes here
  for($i = 0 ; $i < strlen($str2) ; $i++){
    if($str2[$i] >= 'a' && $str2[$i] <= 'z'){
      // str2
      for($j = 0 ; $j < strlen($str1) ; $j++){
        if($str2[$i] == $str1[$j]){
          $notSame = 0;
          $str1[$j] = '0';
          break;
        }
        else{
          $notSame = 1;
        }
      }
    }
    if($notSame==1)return "false";
  }
  return "true";
}
   
// keep this function call here  
echo StringScramble(fgets(fopen('php://stdin', 'r')));  

?>
