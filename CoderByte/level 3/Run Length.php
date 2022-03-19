<?php 

function RunLength($str) {
  $jumlah=1;
  $hasil="";
  $length=strlen($str);
  // code goes here
  for($i = 1 ; $i < $length ; $i++){
    if($str[$i] != $str[$i-1]){
      $hasil .= $jumlah;
      $hasil .= $str[$i-1];
      $jumlah = 1;
    }
    else{
      $jumlah++;
    }
    if($i == $length - 1){
      $hasil .= $jumlah;
      $hasil .= $str[$i];
    }
  }
  if($length==1) $hasil= '1'.$str;
  return $hasil;
}
   
// keep this function call here  
echo RunLength(fgets(fopen('php://stdin', 'r')));  

?>
