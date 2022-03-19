<?php 

function WeightedPath($strArr) {

  // code goes here
  $size = strlen($strArr[1]);
  $oneSize=false;
  if($size==1)$oneSize=true;
  $length = intval($strArr[0]);
  $last = $strArr[$length];
  $result = "";
  $jarak = 99;
  $berubah = true;
  for($i = 1 ; $i <= $length ; $i++){
    $result .= $strArr[$i];
  }
  for($i = $length+1 ; $i < count($strArr) ; $i++){
    $jalan = $strArr[1];
    $pertama = "";
    for($j = 0 ; $j < $size ; $j++){
      if($strArr[$i][$j]=="|")break;
      $pertama .= $strArr[$i][$j];
    }
    $kedua = "";
    for($j = $size+1 ; $j < strlen($strArr[count($strArr)-1]) ; $j++){
      if($strArr[$i][$j]=="|")break;
      $kedua .= $strArr[$i][$j];
    }
    $kesatu_dua = "";
    for($j = $size*2+2 ; $j < strlen($strArr[$i]) ; $j++){
      if($strArr[$i][$j]=="|")break;
      $kesatu_dua .= $strArr[$i][$j];
    }
    $j1 = intval($kesatu_dua);
    if($pertama == $jalan || $kedua == $jalan){
      $way = $kedua;
      if($kedua == $jalan)
      $way = $pertama;
      $jalan_kedua = $jalan;
      $jalan_kedua .= $way;
      $jarak_kedua = $j1;
      if($way == $last){
        if($jarak_kedua<$jarak){
          $result = $jalan_kedua;
          $berubah = false;
          $jarak = $jarak_kedua;
        }
      }
      //
      for($j = $length+1 ; $j < count($strArr) ; $j++){
        $ketiga = "";
        for($k = 0 ; $k < $size ; $k++){
          if($strArr[$j][$k]=="|")break;
          $ketiga .= $strArr[$j][$k];
        }
        $keempat = "";
        for($k = $size+1 ; $k < strlen($strArr[count($strArr)-1]) ; $k++){
          if($strArr[$j][$k]=="|")break;
          $keempat .= $strArr[$j][$k];
        }
        $ketiga_empat = "";
        for($k = $size*2+2 ; $k < strlen($strArr[$j]) ; $k++){
          if($strArr[$j][$k]=="|")break;
          $ketiga_empat .= $strArr[$j][$k];
        }
        $away = "";
        $j2 = intval($ketiga_empat);
        if($ketiga != $jalan && $keempat != $jalan){
          if($ketiga == $way || $keempat == $way){
            $away = $keempat;
            if($keempat == $way)
            $away = $ketiga;
            $jalan_ketiga = $jalan_kedua;
            $jalan_ketiga .= $away;
            $jarak_ketiga = $jarak_kedua;
            $jarak_ketiga += $j2;
            if($away == $last){
              if($jarak_ketiga<$jarak){
                $result = $jalan_ketiga;
                $berubah = false;
                $jarak = $jarak_ketiga;
              }
            }
          }
        }
        //
        if($away!="")
        for($k = $length+1 ; $k < count($strArr) ; $k++){
          $kelima = "";
          for($l = 0 ; $l < $size ; $l++){
            if($strArr[$k][$l]=="|")break;
            $kelima .= $strArr[$k][$l];
          }
          $keenam = "";
          for($l = $size+1 ; $l < strlen($strArr[count($strArr)-1]) ; $l++){
            if($strArr[$k][$l]=="|")break;
            $keenam .= $strArr[$k][$l];
          }
          $kelima_enam = "";
          for($l = $size*2+2 ; $l < strlen($strArr[$k]) ; $l++){
            if($strArr[$k][$l]=="|")break;
            $kelima_enam .= $strArr[$k][$l];
          }
          $j3 = intval($kelima_enam);
          $theway = "";
          if(($kelima != $jalan && $keenam != $jalan)){
            if($kelima == $away || $keenam == $away){
              $theway = $keenam;
              if($keenam == $away)
              $theway = $kelima;
              $jalan_keempat = $jalan_ketiga;
              $jalan_keempat .= $theway;
              $jarak_keempat = $jarak_ketiga;
              $jarak_keempat += $j3;
              if($theway == $last){
                if($jarak_keempat<$jarak){
                  $result = $jalan_keempat;
                  $berubah = false;
                  $jarak = $jarak_keempat;
                }
              }
            }
          }
          //
          if($theway != "")
          for($l = $length+1 ; $l < count($strArr) ; $l++){
            $ketujuh = "";
            for($m = 0 ; $m < $size ; $m++){
              if($strArr[$l][$m]=="|")break;
              $ketujuh .= $strArr[$l][$m];
            }
            $kedelapan = "";
            for($m = $size+1 ; $m < strlen($strArr[count($strArr)-1]) ; $m++){
              if($strArr[$l][$m]=="|")break;
              $kedelapan .= $strArr[$l][$m];
            }
            $ketujuh_lapan = "";
            for($m = $size*2+2 ; $m < strlen($strArr[$l]) ; $m++){
              if($strArr[$l][$m]=="|")break;
              $ketujuh_lapan .= $strArr[$l][$m];
            }
            $j4 = intval($ketujuh_lapan);
            $theaway = "";
            if($ketujuh != $jalan && $kedelapan != $jalan){
              if($ketujuh == $theway || $kedelapan == $theway){
                $theaway = $kedelapan;
                if($kedelapan == $theway)
                $theaway = $ketujuh;
                $jalan_lima = $jalan_keempat;
                $jalan_lima .= $theaway;
                $jarak_lima = $jarak_keempat;
                $jarak_lima += $j4;
                if($theaway == $last){
                  if($jarak_lima<$jarak){
                    $result = $jalan_lima;
                    $berubah = false;
                    $jarak = $jarak_lima;
                  }
                }
              }
            }
            //
            if($theaway != "")
            for($m = $length+1 ; $m < count($strArr) ; $m++){
              $kesembilan = "";
              for($n = 0 ; $n < $size ; $n++){
                if($strArr[$m][$n]=="|")break;
                $kesembilan .= $strArr[$m][$n];
              }
              $kesepuluh = "";
              for($n = $size+1 ; $n < strlen($strArr[count($strArr)-1]) ; $n++){
                if($strArr[$m][$n]=="|")break;
                $kesepuluh .= $strArr[$m][$n];
              }
              $kesembilan_kesepuluh = "";
              for($n = $size*2+2 ; $n < strlen($strArr[$m]) ; $n++){
                if($strArr[$m][$n]=="|")break;
                $kesembilan_kesepuluh .= $strArr[$m][$n];
              }
              $j5 = intval($kesembilan_kesepuluh);
              $theawaychoose = "";
              if($kesembilan == $theaway || $kesepuluh == $theaway){
                $theawaychoose = $kesepuluh;
                if($kesepuluh == $theaway)
                $theawaychoose = $kesembilan;
                $jalan_enam = $jalan_lima;
                $jalan_enam .= $theawaychoose;
                $jarak_enam = $jarak_lima;
                $jarak_enam += $j5;
                if($theawaychoose == $last){
                  if($jarak_enam<$jarak){
                    $result = $jalan_enam;
                    $berubah = false;
                    $jarak = $jarak_enam;
                  }
                }
              }
              if($theawaychoose != "")
              //
              for($n = $length+1 ; $n < count($strArr) ; $n++){
                $kesebelas = "";
                for($o = 0 ; $o < $size ; $o++){
                  if($strArr[$n][$o]=="|")break;
                  $kesebelas .= $strArr[$n][$o];
                }
                $keduabelas = "";
                for($o = $size+1 ; $o < strlen($strArr[count($strArr)-1]) ; $o++){
                  if($strArr[$n][$o]=="|")break;
                  $keduabelas .= $strArr[$n][$o];
                }
                $kesebelas_duabelas = "";
                for($o = $size*2+2 ; $o < strlen($strArr[$n]) ; $o++){
                  if($strArr[$n][$o]=="|")break;
                  $kesebelas_duabelas .= $strArr[$n][$o];
                }
                $j6 = intval($kesebelas_duabelas);
                if($kesebelas == $theawaychoose || $keduabelas == $theawaychoose){
                  $theawayselect = $keduabelas;
                  if($keduabelas == $theawaychoose)
                  $theawayselect = $kesebelas;
                  $jalan_tujuh = $jalan_enam;
                  $jalan_tujuh .= $theawayselect;
                  $jarak_tujuh = $jarak_enam;
                  $jarak_tujuh += $j6;
                  if($theawayselect == $last){
                    if($jarak_tujuh<$jarak){
                      $result = $jalan_tujuh;
                      $berubah = false;
                      $jarak = $jarak_tujuh;
                    }
                  }
                }
              }
              //
            }
            //
          }
          //
        }
        //
      }
      //
    }
  }
  if($berubah)return "-1";
  $start = 0;
  $last = "";
  if($oneSize)
  for($i = 0 ; $i < strlen($result) ; $i++){
    $last .= $result[$i];
    if($i!=strlen($result)-1)$last.='-';
  }
  else
  for($i = 0 ; $i < strlen($result) ; $i++){
    $last .= $result[$i];
    $start++;
    if($start%$size==0&&$start<strlen($result)-$size+1)$last.='-';
  }
  return $last;
}
   
// keep this function call here  
echo WeightedPath(fgets(fopen('php://stdin', 'r')));  

?>
