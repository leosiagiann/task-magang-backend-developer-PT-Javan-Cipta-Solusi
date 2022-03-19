<?php 

function AlphabetSoup($str) {

  // code goes here
  $length = strlen($str);
  for($i = 0 ; $i < $length ; $i++){
    for($j = $i ; $j < $length ; $j++){
      if($str[$i] > $str[$j]){
        $temp = $str[$i];
        $str[$i] = $str[$j];
        $str[$j] = $temp;
      }
    }
  }
  return $str;
}
   
// keep this function call here  
echo AlphabetSoup(fgets(fopen('php://stdin', 'r')));  

?>
