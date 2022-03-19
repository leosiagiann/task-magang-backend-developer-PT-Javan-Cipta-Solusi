<?php 

function SudokuQuadrantChecker($strArr) {

  // code goes here
  for($i = 0 ; $i < count($strArr) ; $i++){
    $strArr[$i] = preg_replace("/[^1-9x]/","",$strArr[$i]);
  }
  $sama = array();
  for($i = 0 ; $i < count($strArr) ; $i++){
    for($j = 0 ; $j < count($strArr) ; $j++){
      $first=0;
      for($k = $j+1 ; $k < count($strArr) ; $k++){
        if($strArr[$i][$j]!='x'){
          if($strArr[$i][$j] == $strArr[$i][$k]){
            if($first==0){
              $baris = floor($i/3)*3+1;
              $kolom = floor($j/3);
              $baris += $kolom;
              $adaAtauGak=0;
              for($l = 0 ; $l < count($sama) ; $l++){
                if($sama[$l]==$baris){
                  $adaAtauGak=1;
                  break;
                }
              }
              if($adaAtauGak==0){
                $sama[] = $baris;
              }
            }
            $first = 1;
            $baris = floor($i/3)*3+1;
            $kolom = floor($k/3);
            $baris += $kolom;
            $adaAtauGak=0;
            for($l = 0 ; $l < count($sama) ; $l++){
              if($sama[$l]==$baris){
                $adaAtauGak=1;
                break;
              }
            }
            if($adaAtauGak==0){
              $sama[] = $baris;
            }
          }
        }
      }
    }
  }
  for($i = 0 ; $i < count($strArr) ; $i++){
    for($j = 0 ; $j < count($strArr) ; $j++){
      $first=0;
      for($k = $j+1 ; $k < count($strArr) ; $k++){
        if($strArr[$j][$i]!='x'){
          if($strArr[$j][$i] == $strArr[$k][$i]){
            if($first==0){
              $baris = floor($j/3)*3+1;
              $kolom = floor($i/3);
              $baris += $kolom;
              $adaAtauGak=0;
              for($l = 0 ; $l < count($sama) ; $l++){
                if($sama[$l]==$baris){
                  $adaAtauGak=1;
                  break;
                }
              }
              if($adaAtauGak==0){
                $sama[] = $baris;
              }
            }
            $first = 1;
            $baris = floor($k/3)*3+1;
            $kolom = floor($i/3);
            $baris += $kolom;
            $adaAtauGak=0;
            for($l = 0 ; $l < count($sama) ; $l++){
              if($sama[$l]==$baris){
                $adaAtauGak=1;
                break;
              }
            }
            if($adaAtauGak==0){
              $sama[] = $baris;
            }
          }
        }
      }
    }
  }
  if(count($sama)==0) return "legal";
  for($i = 0 ; $i < count($sama) ; $i++){
    for($j = $i+1 ; $j < count($sama) ; $j++){
      if($sama[$i]>$sama[$j]){
        $temp = $sama[$i];
        $sama[$i] = $sama[$j];
        $sama[$j] = $temp;
      }
    }
  }
  $result = "";
  for($i = 0 ; $i < count($sama) ; $i++){
    $result .= $sama[$i];
    if($i != count($sama)-1){
      $result .= ',';
    }
  }
  return $result;
}
   
// keep this function call here  
echo SudokuQuadrantChecker(fgets(fopen('php://stdin', 'r')));  

?>
