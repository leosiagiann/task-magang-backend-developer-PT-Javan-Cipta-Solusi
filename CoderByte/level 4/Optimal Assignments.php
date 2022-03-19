<?php 

function OptimalAssignments($strArr) {
  $num;
  $baris=0;
  // code goes here
  $length = count($strArr);
  foreach($strArr as $s){
    $kolom=0;
    $angka="";
    for($i = 0 ; $i < strlen($s) ; $i++){
      if($s[$i] >= "0" && $s[$i] <= "9")
      {
        $angka .= $s[$i];
      }
      if($s[$i] == "," || $s[$i] == ")"){
        $num[$baris][$kolom] = floor($angka);
        $angka="";
        $kolom++;
      }
    }
    $baris++;
  }
  $min;
  for($i = 0 ; $i < $length ; $i++){
    $minKolom=99;
    $index=0;
    for($j = 0 ; $j < $length ; $j++){
      if($minKolom>$num[$i][$j]){
        $minKolom = $num[$i][$j];
        $index=$j;
      }
    }
    $min[$i] = $index;
  }
  $sama;
  $sameOrNot=false;
  for($i = 0 ; $i < $length ; $i++){

    for($j = $i+1 ; $j < $length ; $j++){

      if($sameOrNot){
        $pas = 0;
        for($k = 0 ; $k < count($sama) ; $k++){
          if($i == $sama[$k]){
            $pas = 1;
            break;
          }
        }
        if($pas==1){
          if($min[$i]==$min[$j]){
            $sama[] = $j;
          }
        }
        else{
          if($min[$i]==$min[$j]){
            $sama[] = $i;
            $sama[] = $j;
          }
        }
      }
      else{
        if($min[$i]==$min[$j]){
          $sama[] = $i;
          $sama[] = $j;
          $sameOrNot=true;
        }
      }
    }
  }
  if($sameOrNot){
    $kosong;
    for($i = 0 ; $i < $length ; $i++){
      $cocok=true;
      for($j = 0 ; $j < $length ; $j++){
        if($i == $min[$j]){
          $cocok=false;
          break;
        }
      }
      if($cocok)$kosong[] = $i;
    }
    for($i = 0 ; $i < count($kosong) ; $i++){
      $index = 0;
      $minimum = 99;
      for($j = 0 ; $j  < count($sama) ; $j++){

        if($num[$sama[$j]][$kosong[$i]] <= $minimum){
          $minimum = $num[$sama[$j]][$kosong[$i]];
          $index = $sama[$j];
        }

      }
      $min[$index]=$kosong[$i];
    }
    $result="";
    for($i = 0 ; $i < $length ; $i++){
      $result .= '('.$i+1;
      $result .= '-';
      $result .= $min[$i]+1;
      $result .= ')';
    }
    return $result;
  }
  else{
    $result="";
    for($i = 0 ; $i < $length ; $i++){
      $result .= '('.$i+1;
      $result .= '-';
      $result .= $min[$i]+1;
      $result .= ')';
    }
    return $result;
  }
}
   
// keep this function call here  
echo OptimalAssignments(fgets(fopen('php://stdin', 'r')));  

?>
