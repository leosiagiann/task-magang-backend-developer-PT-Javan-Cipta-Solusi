<?php 

function PatternChaser($str) {

  // code goes here
  $panjang = strlen($str)/2;
  $result = "";
  for($i = 2 ; $i <= $panjang ; $i++){
    for($j = 0 ; $j < strlen($str)-($i-1) ; $j++){
      if($j <= strlen($str)-($i*2+1)){
        $string = "";
        for($k = 0 ; $k < $i ; $k++){
          $string .= $str[$j+$k];
        }
        for($k = $j+$i+1 ; $k < strlen($str)-($i-1) ; $k++){
          $banding="";
          for($l = 0 ; $l < $i ; $l++){
            $banding .= $str[$k+$l];
          }
          if($banding == $string){
            $result=$banding;
          }
        }
      }
    }
  }
  if($result=="")return "no null";
  return "yes ".$result;
}
   
// keep this function call here  
echo PatternChaser(fgets(fopen('php://stdin', 'r')));  

?>
