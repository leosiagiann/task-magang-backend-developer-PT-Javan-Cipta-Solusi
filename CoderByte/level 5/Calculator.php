<?php 

function Calculator($str) {

  // code goes here
  $num = array();
  $string="";
  for($i = 0 ; $i < strlen($str) ; $i++){
    if($str[$i] == ')'){
      if($i == strlen($str)-1){
        $num[] = $string;
        $num[] = $str[$i];
        break;
      }
      $num[] = $string;
      $num[] = $str[$i];
      $i++;
      if($str[$i]=='(')
      $string = $str[$i];
      else $string="";
    }
    if($str[$i] == '('){
      if($i > 0 && $str[$i-1] == ')'){
        $num[] = $str[$i];
        $i++;
        $string = "";
      }
      if($i > 0 && $str[$i-1] >= '0' && $str[$i-1] <= '9'){
        $num[] = $string;
        $string="";
        $string.=$str[$i];
        $num[] = $string;
        $i++;
        $string = "";
      }
      if($i > 0 && ($str[$i-1] == '-' || $str[$i-1] == '+'
      || $str[$i-1] == '*'|| $str[$i-1] == '/')){
        $string.=$str[$i];
        $num[] = $string;
        $i++;
        $string = "";
      }
      if($i == 0){
        $num[] = $str[$i];
        $i++;
        $string = "";
      }
    }
    if(($str[$i] == '+' || $str[$i] == '*' || $str[$i] == '/' || $str[$i] == '-')
      && ($str[$i-1] >= '0' && $str[$i-1] <= '9')){
      $num[] = $string;
      $string = "";
    }
    $string .= $str[$i];
    if($i == strlen($str)-1){
      $num[] = $string;
    }
  }
  $newNum = array();
  for($i = 0 ; $i < count($num) ; $i++){
    $hasilkurungan = 0;
    $bukaKurung = false;
    $awal=0;
    for($j = 0 ; $j < strlen($num[$i]) ; $j++){
      if($num[$i][$j] == '('){
        $bukaKurung=true;
        $awal=$i;
      }
    }
    if($bukaKurung){
      $batas=0;
      $dah = false;
      for($j = $i+1 ; $j < count($num) ; $j++){
        for($k = 0 ; $k < strlen($num[$j]) ; $k++){
          if($num[$j][$k] == ')'){
            $batas=$j;
            $dah = true;
            break;
          };
        }
        if($dah)break;
      }
      $hasil= array();
      for($j = $awal+1 ; $j < $batas-1 ; $j++){
        $string = "";
        for($k = 0 ; $k < strlen($num[$j]) ; $k++){
          if($num[$j][$k]=='-'|| ($num[$j][$k]>='0'&&$num[$j][$k]<='9'))
          $string.=$num[$j][$k];
        }
        $bil_awal = intval($string);
        $operator = "";
        $string = "";
        for($k = 0 ; $k < strlen($num[$j+1]) ; $k++){
          if($num[$j+1][$k]!='/'&&$num[$j+1][$k]!='*')
          $string.=$num[$j+1][$k];
          else $operator.=$num[$j+1][$k];
        }
        $bil_akhir = intval($string);
        if($operator==""){
          $hasil[] = $bil_awal;
        }
        else{
          if($operator=="/"){
            $bil_awal/=$bil_akhir;
          }
          else{
            $bil_awal*=$bil_akhir;
          }
          $string =  strval($bil_awal);
          $num[$j+1] = "";
          $num[$j+1] = $string;
        }
      }
      for($k = 0 ; $k < strlen($num[$batas]) ; $k++){
        if($num[$batas][$k]=='-'|| ($num[$batas][$k]>='0'&&$num[$batas][$k]<='9'))
        $string.=$num[$batas][$k];
      }
      $bil_final = intval($string);
      $hasil[] = $bil_final;
      for($j = 0 ; $j < count($hasil) ; $j++){
        $hasilkurungan += $hasil[$j];
      }
      if($batas-$awal>2){
        $valuenyaya = "";
        if($num[$i][0] == '/')$valuenyaya .= "/";
        if($num[$i][0] == '*' || $num[$i][0] == '(')$valuenyaya .= "*";
        if($num[$i][0] == '+' && $hasilkurungan > 0)$valuenyaya .= "+";
        $valuenyaya .= strval($hasilkurungan);
        $newNum[] = $valuenyaya;
      }
      else{
        $valuenyaya = "";
        if($num[$i][0] == '/')$valuenyaya .= "/";
        if($num[$i][0] == '*' || $num[$i][0] == '(')$valuenyaya .= "*";
        if($num[$i][0] == '+' && $hasilkurungan > 0)$valuenyaya .= "+";
        $valuenyaya .= $num[$i+1];
        $newNum[] = $valuenyaya;
      }
      $i = $batas;
    }
    else{
      $newNum[] = $num[$i];
    }
  }
  $keseluruhan = 0;
  $final_value = array();
  for($i = 0 ; $i < count($newNum)-1 ; $i++){
    $string = "";
    for($j = 0 ; $j < strlen($newNum[$i]) ; $j++){
      if($newNum[$i][$j] == '-' || ($newNum[$i][$j] >= '0' && $newNum[$i][$j] <= '9'))
      $string .= $newNum[$i][$j];
    }
    $angka = intval($string);
    $string = "";
    $operator = "";
    for($j = 0 ; $j < strlen($newNum[$i+1]) ; $j++){
      if($newNum[$i+1][$j] == '-'|| ($newNum[$i+1][$j] >= '0' && $newNum[$i+1][$j] <= '9'))
      $string .= $newNum[$i+1][$j];
    }
    $operator .= $newNum[$i+1][0];
    $angka2 = intval($string);
    if($operator == "*" || $operator == "/"){
      if($operator == "/"){
        $angka/=$angka2;
      }
      else{
        $angka*=$angka2;
      }
      $newNum[$i+1] = strval($angka);
    }
    else{
      $final_value[] = intval($angka);
    }
  }
  $last_ = count($newNum)-1;
  $string = "";
  for($j = 0 ; $j < strlen($newNum[$last_]) ; $j++){
    if($newNum[$last_][$j] == '-' || ($newNum[$last_][$j] >= '0' && $newNum[$last_][$j] <= '9'))
    $string .= $newNum[$last_][$j];
  }
  $final_value[] = intval($string);
  for($i = 0 ; $i < count($final_value) ; $i++){
    $keseluruhan += $final_value[$i];
  }
  return $keseluruhan;
}
   
// keep this function call here  
echo Calculator(fgets(fopen('php://stdin', 'r')));