<?php 

function ABCheck($str) {

  // code goes here
  for($i = 4 ; $i < strlen($str) ; $i++){
    if($str[$i] == 'a'){
      if($str[$i-4] == 'b') return 'true';
    }
    if($str[$i] == 'b'){
      if($str[$i-4] == 'a') return 'true';
    }
  }
  return 'false';
}
   
// keep this function call here  
echo ABCheck(fgets(fopen('php://stdin', 'r')));  

?>
