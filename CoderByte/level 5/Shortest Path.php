<?php 

function ShortestPath($strArr) {

  // code goes here
  $oneSize = false;
  $size = strlen($strArr[1]);
  if($size==1)$oneSize=true;
  $jlh = intval($strArr[0]);
  $last = $strArr[$jlh];
  $result = "";
  if($oneSize)
  for($i = 1 ; $i <= $jlh ; $i++){
    $result .= $strArr[$i];
  }
  else
  for($i = 1 ; $i <= $jlh ; $i++){
    for($j = 0 ; $j < $size ; $j++){
      $result .= $strArr[$i][$j];
    }
  }
  $berubah = true;
  for($i = $jlh+1 ; $i < count($strArr) ; $i++){
    $jalan = $strArr[1];
    $pertama = "";
    for($j = 0 ; $j < $size ; $j++){
      $pertama .= $strArr[$i][$j];
    }
    $kedua = "";
    for($j = $size+1 ; $j < strlen($strArr[count($strArr)-1]) ; $j++){
      $kedua .= $strArr[$i][$j];
    }
    if($pertama == $jalan || $kedua == $jalan){
      $way = $kedua;
      if($kedua == $jalan)
      $way = $pertama;
      $jalan_kedua = $jalan;
      $jalan_kedua .= $way;
      if($way == $last){
        if(strlen($result)>=strlen($jalan_kedua)){
          $result = $jalan_kedua;
          $berubah = false;
        }
      }
      //
      for($j = $jlh+1 ; $j < count($strArr) ; $j++){
        $ketiga = "";
        for($k = 0 ; $k < $size ; $k++){
          $ketiga .= $strArr[$j][$k];
        }
        $keempat = "";
        for($k = $size+1 ; $k < strlen($strArr[count($strArr)-1]) ; $k++){
          $keempat .= $strArr[$j][$k];
        }
        if($ketiga == $way || $keempat == $way){
          $away = $keempat;
          if($keempat == $way)
          $away = $ketiga;
          $jalan_ketiga = $jalan_kedua;
          $jalan_ketiga .= $away;
          if($away == $last){
            if(strlen($result)>=strlen($jalan_ketiga)){
              $result = $jalan_ketiga;
              $berubah = false;
            }
          }
          //
          for($k = $jlh+1 ; $k < count($strArr) ; $k++){
            $kelima = "";
            for($l = 0 ; $l < $size ; $l++){
              $kelima .= $strArr[$k][$l];
            }
            $keenam = "";
            for($l = $size+1 ; $l < strlen($strArr[count($strArr)-1]) ; $l++){
              $keenam .= $strArr[$k][$l];
            }
            if($kelima == $away || $keenam == $away){
              $theway = $keenam;
              if($keenam == $away)
              $theway = $kelima;
              $jalan_keempat = $jalan_ketiga;
              $jalan_keempat .= $theway;
              if($theway == $last){
                if(strlen($result)>=strlen($jalan_keempat)){
                  $result = $jalan_keempat;
                  $berubah = false;
                }
              }
              //
              for($l = $jlh+1 ; $l < count($strArr) ; $l++){
                $ketujuh = "";
                for($m = 0 ; $m < $size ; $m++){
                  $ketujuh .= $strArr[$l][$m];
                }
                $kedelapan = "";
                for($m = $size+1 ; $m < strlen($strArr[count($strArr)-1]) ; $m++){
                  $kedelapan .= $strArr[$l][$m];
                }
                if($ketujuh == $theway || $kedelapan == $theway){
                  $theaway = $kedelapan;
                  if($kedelapan == $theway)
                  $theaway = $ketujuh;
                  $jalan_kelima = $jalan_keempat;
                  $jalan_kelima .= $theaway;
                  if($theaway == $last){
                    if(strlen($result)>=strlen($jalan_kelima)){
                      $result = $jalan_kelima;
                      $berubah = false;
                    }
                  }
                }
            
              }
              //
            }
        
          }
          //
        }
    
      }
      //
    }

  }
  if($berubah)return "-1";
  $hasil = "";
  $start = 0;
  if($oneSize)
  for($i = 0 ; $i < strlen($result) ; $i++){
    $hasil .= $result[$i];
    if($i!=strlen($result)-1)$hasil.="-";
  }
  else
  for($i = 0 ; $i < strlen($result) ; $i++){
    $hasil .= $result[$i];
    $start++;
    if($start%$size==0&&$start<strlen($result)-$size+1)$hasil.='-';
  }
  return $hasil;
}
   
// keep this function call here  
echo ShortestPath(fgets(fopen('php://stdin', 'r')));  

?>
