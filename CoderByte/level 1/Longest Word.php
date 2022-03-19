<?php 

function LongestWord($sen) {
  $word = explode(" ", $sen);
  $no = 0;
  $index = 0;
  $length = 0;
  foreach($word as $w){
    $w = preg_replace("/[^a-zA-Z]/", "", $w);
    if($length < strlen($w)){
      $index = $no;
      $length = strlen($w);
    }
    $no++;
  }
  return $word[$index];
}
   
// keep this function call here  
echo LongestWord(fgets(fopen('php://stdin', 'r')));  

?>
