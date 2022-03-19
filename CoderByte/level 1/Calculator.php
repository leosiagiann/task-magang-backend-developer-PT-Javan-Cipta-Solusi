<?php 

function Calculator($str) {

  // code goes here
  for($i = 0 ; $i < strlen($str) ; $i++){
    if($str[$i] == '('){
      $string="";
      $inc=1;
      while(1){
        if($str[$i+$inc]>='0'&&$str[$i+$inc]<='9'){
          $string.=$str[$i+$inc];
        }
        else{
          break;
        }
        $inc++;
      }
      $bil1 = intval($string);
      $operator = $str[$i+$inc];
      $inc2 = $inc+1;
      $string="";
      while(1){
        if($str[$i+$inc2]>='0'&&$str[$i+$inc2]<='9'){
          $string.=$str[$i+$inc2];
        }
        else{
          break;
        }
        $inc2++;
      }
      $bil2 = intval($string);
      if($operator == '/'){
        $bil1=intval($bil1/$bil2);
      }
      if($operator == '*'){
        $bil1=intval($bil1*$bil2);
      }
      if($operator == '+'){
        $bil1=intval($bil1+$bil2);
      }
      if($operator == '-'){
        $bil1=intval($bil1-$bil2);
      }
      $result = strval($bil1);
      $length = strlen($result);
      for($j = 1 ; $j <= strlen($result) ; $j++){
        $str[$i+$j] = $result[$j-1];
      }
      $start = $i+$length;
      $total = ($inc2+1)-$length;
      for($j = $start+1; $j < $start+$total ; $j++){
        $str[$j] = 'x';
      }
      $str[$i]='x';
    }
  }

  for($i = 0 ; $i < strlen($str) ; $i++){
    if($str[$i] == '*'){
      $string="";
      $dec=1;
      $mentok=0;
      $hitloop=1;
      $first=true;
      while(1){
        if(($first==false && $i < $dec) || 
        ($first==false && ($str[$i-$dec] >= '9' || $str[$i-$dec]<='0')))
        break;
        if($str[$i-$dec]>='0'&&$str[$i-$dec]<='9'){
          if($first){
            $mentok=$hitloop;
            $first=false;
          }
          $string.=$str[$i-$dec];
        }
        $dec++;
        $hitloop++;
      }
      $mentok_ = strlen($string);
      $bil1 = intval(strrev($string));
      $string="";
      $inc=1;
      $hitloop_=1;
      $first=true;
      while(1){
        if(($first==false) || 
        ($first==false && ($str[$i+$inc] >= '9' || $str[$i+$inc]<='0')))
        break;
        if($str[$i+$inc]>='0'&&$str[$i+$inc]<='9'){
          if($first){
            $mentok=$hitloop_;
            $first=false;
          }
          $string.=$str[$i+$inc];
        }
        $inc++;
        $hitloop_++;
      }
      $bil2 = intval($string);
      $bil1*=$bil2;
      $result = strval($bil1);
      $len = strlen($result);
      $st=0;
      $index = $i-($hitloop-1);
      for($j = $index ; $j < $index+$len ; $j++){
        $str[$j] = $result[$st];
        $st++;
      }
      $max = $i+($hitloop_-1);
      for($j =  $index+$len; $j <= $max ; $j++){
        $str[$j] = 'x';
      }
    }
    if($str[$i] == '/'){
      $string="";
      $dec=1;
      $mentok=0;
      $hitloop=1;
      $first=true;
      while(1){
        if(($first==false && $i < $dec) || 
        ($first==false && ($str[$i-$dec] >= '9' || $str[$i-$dec]<='0')))
        break;
        if($str[$i-$dec]>='0'&&$str[$i-$dec]<='9'){
          if($first){
            $mentok=$hitloop;
            $first=false;
          }
          $string.=$str[$i-$dec];
        }
        $dec++;
        $hitloop++;
      }
      $mentok_ = strlen($string);
      $bil1 = intval(strrev($string));
      $string="";
      $inc=1;
      $hitloop_=1;
      $first=true;
      while(1){
        if(($first==false) || 
        ($first==false && ($str[$i+$inc] >= '9' || $str[$i+$inc]<='0')))
        break;
        if($str[$i+$inc]>='0'&&$str[$i+$inc]<='9'){
          if($first){
            $mentok=$hitloop_;
            $first=false;
          }
          $string.=$str[$i+$inc];
        }
        $inc++;
        $hitloop_++;
      }
      $bil2 = intval($string);
      $bil1/=$bil2;
      $result = strval($bil1);
      $len = strlen($result);
      $st=0;
      $index = $i-($hitloop-1);
      for($j = $index ; $j < $index+$len ; $j++){
        $str[$j] = $result[$st];
        $st++;
      }
      $max = $i+($hitloop_-1);
      for($j =  $index+$len; $j <= $max ; $j++){
        $str[$j] = 'x';
      }
    }
  }

  for($i = 0 ; $i < strlen($str) ; $i++){
    if($str[$i] == '+'){
      $string="";
      $dec=1;
      $mentok=0;
      $hitloop=1;
      $first=true;
      while(1){
        if(($first==false && $i < $dec) || 
        ($first==false && ($str[$i-$dec] >= '9' || $str[$i-$dec]<='0')))
        break;
        if($str[$i-$dec]>='0'&&$str[$i-$dec]<='9'){
          if($first){
            $mentok=$hitloop;
            $first=false;
          }
          $string.=$str[$i-$dec];
        }
        $dec++;
        $hitloop++;
      }
      $mentok_ = strlen($string);
      $bil1 = intval(strrev($string));
      $string="";
      $inc=1;
      $hitloop_=1;
      $first=true;
      while(1){
        if(($first==false) || 
        ($first==false && ($str[$i+$inc] >= '9' || $str[$i+$inc]<='0')))
        break;
        if($str[$i+$inc]>='0'&&$str[$i+$inc]<='9'){
          if($first){
            $mentok=$hitloop_;
            $first=false;
          }
          $string.=$str[$i+$inc];
        }
        $inc++;
        $hitloop_++;
      }
      $bil2 = intval($string);
      $bil1+=$bil2;
      $result = strval($bil1);
      $len = strlen($result);
      $st=0;
      $index = $i-($hitloop-1);
      for($j = $index ; $j < $index+$len ; $j++){
        $str[$j] = $result[$st];
        $st++;
      }
      $max = $i+($hitloop_-1);
      for($j =  $index+$len; $j <= $max ; $j++){
        $str[$j] = 'x';
      }
    }
    if($str[$i] == '-'){
      $string="";
      $dec=1;
      $mentok=0;
      $hitloop=1;
      $first=true;
      while(1){
        if(($first==false && $i < $dec) || 
        ($first==false && ($str[$i-$dec] >= '9' || $str[$i-$dec]<='0')))
        break;
        if($str[$i-$dec]>='0'&&$str[$i-$dec]<='9'){
          if($first){
            $mentok=$hitloop;
            $first=false;
          }
          $string.=$str[$i-$dec];
        }
        $dec++;
        $hitloop++;
      }
      $mentok_ = strlen($string);
      $bil1 = intval(strrev($string));
      $string="";
      $inc=1;
      $hitloop_=1;
      $first=true;
      while(1){
        if(($first==false) || 
        ($first==false && ($str[$i+$inc] >= '9' || $str[$i+$inc]<='0')))
        break;
        if($str[$i+$inc]>='0'&&$str[$i+$inc]<='9'){
          if($first){
            $mentok=$hitloop_;
            $first=false;
          }
          $string.=$str[$i+$inc];
        }
        $inc++;
        $hitloop_++;
      }
      $bil2 = intval($string);
      $bil1=$bil2;
      $result = strval($bil1);
      $len = strlen($result);
      $st=0;
      $index = $i-($hitloop-1);
      for($j = $index ; $j < $index+$len ; $j++){
        $str[$j] = $result[$st];
        $st++;
      }
      $max = $i+($hitloop_-1);
      for($j =  $index+$len; $j <= $max ; $j++){
        $str[$j] = 'x';
      }
    }
  }
  $last="";
  for($i = 0 ; $i < strlen($str) ; $i++){
    if($str[$i] >= '0' && $str[$i] <= '9'){
      $last.=$str[$i];
    }
    else{
      break;
    }
  }
  return $last;
}
   
// keep this function call here  
echo Calculator(fgets(fopen('php://stdin', 'r')));  

?>
