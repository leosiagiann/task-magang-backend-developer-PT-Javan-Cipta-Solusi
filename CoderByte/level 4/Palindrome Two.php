<?php 

function PalindromeTwo($str) {
  $str = preg_replace("/[^a-zA-Z]/","",$str);
  $str = strtolower($str);
  $reverse = strrev($str);
  // code goes here
  if($str==$reverse)return "true";
  return "false";
}
   
// keep this function call here  
echo PalindromeTwo(fgets(fopen('php://stdin', 'r')));  

?>
