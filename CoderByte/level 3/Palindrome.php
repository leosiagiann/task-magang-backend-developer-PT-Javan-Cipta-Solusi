<?php 

function Palindrome($str) {
  $str = str_replace(' ','',$str);
  // code goes here
  $reverse = strrev($str);
  if($str==$reverse)return "true";
  return "false";
}
   
// keep this function call here  
echo Palindrome(fgets(fopen('php://stdin', 'r')));  

?>
