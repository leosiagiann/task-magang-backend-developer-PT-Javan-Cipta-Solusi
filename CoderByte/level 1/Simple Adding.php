<?php 

function SimpleAdding($num) {

  // code goes here
  return (($num*($num+1))/2);
}
   
// keep this function call here  
echo SimpleAdding(fgets(fopen('php://stdin', 'r')));  

?>
