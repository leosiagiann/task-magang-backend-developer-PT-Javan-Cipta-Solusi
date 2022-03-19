<?php 

function primeOrNot($num){
  $prima = 0;
  for($i = 2 ; $i <= $num ; $i++){
    if($num%$i==0)$prima++;
  }
  if($prima==1)return true;
  return false;
}

function PrimeMover($num) {
  $start = 2;
  // code goes here
  for($i = 1 ; $i <= $num ; $i++){
    while(1){
      if(primeOrNot($start)){
        $start++;
        break;
      };
      $start++;
    }
  }
  return $start-1;
}
   
// keep this function call here  
echo PrimeMover(fgets(fopen('php://stdin', 'r')));  

?>
