<?php 

function PolynomialExpansion($str) {

  // code goes here
  $num1 = array();
  $string = "";
  for($i = 1 ; $i < strlen($str) ; $i++){
    if(($i>1&&$str[$i]=='-'&& $str[$i-1]!='^')||$i>1&&$str[$i]==')'){
      $num1[] = $string;
      $i++;
      $string = "-";
    }
    if($str[$i]=='+'){
      $num1[] = $string;
      $i++;
      $string = "";
    }
    $string .= $str[$i];
    if($str[$i-1] == ')')break;
  }
  $start = $i+1;
  
  $string="";
  $num2 = array();
  $string = "";
  for($i = $start ; $i < strlen($str) ; $i++){
    if(($i > ($start+1) && $str[$i]=='-' && $str[$i-1]!='^') || $str[$i] == ')' ){
      $num2[] = $string;
      $i++;
      $string = "-";
    }
    if($i==strlen($str))break;
    if($str[$i]=='+'){
      $num2[] = $string;
      $i++;
      $string = "";
    }
    $string .= $str[$i];
  }
  $result = array();
  for($i = 0 ; $i < count($num1) ; $i++){
    $kata1 = "";
    for($k = 0 ; $k < strlen($num1[$i]) ; $k++){
      if($num1[$i][$k]=='-'||($num1[$i][$k]>='0'&&$num1[$i][$k]<='9'))
      $kata1.=$num1[$i][$k];
      else break;
    }
    $angka1 = intval($kata1);
    $kata1 = "";
    for($j = $k ; $j < strlen($num1[$i]) ; $j++){
      $kata1.=$num1[$i][$j];
    }
    $trigonometri1 = "";
    $trigonometri1 = $kata1;
    $hasil1="";
    for($j = 0 ; $j < count($num2) ; $j++){
      $kata2 = "";
      for($k = 0 ; $k < strlen($num2[$j]) ; $k++){
      if($num2[$j][$k]=='-'||($num2[$j][$k]>='0'&&$num2[$j][$k]<='9'))
        $kata2.=$num2[$j][$k];
        else break;
      }
      $angka2 = intval($kata2);
      $kata2 = "";
      for($l = $k ; $l < strlen($num2[$j]) ; $l++){
        $kata2.=$num2[$j][$l];
      }
      $trigonometri2 = "";
      $trigonometri2 = $kata2;
      $angkanya = $angka1*$angka2;
      if($trigonometri1!="")
      if($trigonometri1[strlen($trigonometri1)-1]=='0' && ($trigonometri1[strlen($trigonometri1)-2]>'9' || 
      $trigonometri1[strlen($trigonometri1)-2]<'0' && $trigonometri1[strlen($trigonometri1)-2]!='-'))$trigonometri1="";
      if($trigonometri2!="")
      if($trigonometri2[strlen($trigonometri2)-1]=='0' && ($trigonometri2[strlen($trigonometri2)-2]>'9' || 
      $trigonometri2[strlen($trigonometri2)-2]<'0' && $trigonometri2[strlen($trigonometri2)-2]!='-'))$trigonometri2="";
      $hasil_trigonometri="";
      if($trigonometri1!=""||$trigonometri2!=""){
        if($trigonometri1==""){
          $hasil_trigonometri=$trigonometri2;
        }
        if($trigonometri2==""){
          $hasil_trigonometri=$trigonometri1;
        }
        if($trigonometri1!=""&&$trigonometri2!=""){
          $kesatu = "";
          $cek=false;
          for($m = 0 ;  $m < strlen($trigonometri1) ; $m++){
            if($cek){
              $kesatu.=$trigonometri1[$m];
            }
            if($trigonometri1[$m]=='^')$cek=true;
          }
          $kedua = "";
          $cek=false;
          for($m = 0 ;  $m < strlen($trigonometri2) ; $m++){
            if($cek){
              $kedua.=$trigonometri2[$m];
            }
            if($trigonometri2[$m]=='^')$cek=true;
          }
          $_kesatu = intval($kesatu);
          $_kedua = intval($kedua);
          if($_kesatu==0)$_kesatu=1;
          if($_kedua==0)$_kedua=1;
          $_kesatu += $kedua;
          $hasil_trigonometri = $trigonometri1[0];
          if($_kesatu!=1)$hasil_trigonometri.="^";
          $hasil_trigonometri.=$_kesatu;
        }
      }
      $last = "";
      if($angkanya!=1&&$angkanya!=-1)
      $last .= $angkanya;
      if($angkanya==-1)
      $last .= "-";
      // if($hasil_trigonometri[strlen($hasil_trigonometri)-1] != '0' ){
      $last .= $hasil_trigonometri;
      // }
      $result[] = $last;
    }
  }
  $last = array();
  for($i = 0 ; $i < count($result) ; $i++){
    $gakAda = true;
    $yesOrno = false;
    for($j = 0 ; $j < strlen($result[$i]) ; $j++){
      if(($result[$i][$j]>'9'||$result[$i][$j]<'0')&&$result[$i][$j]!='-'){
        $yesOrno=true;
        break;
      }
    }
    if($yesOrno){
      $dahtri = false;
      $trigonometri = "";
      $gaktri = "";
      for($j = 0 ; $j < strlen($result[$i]) ; $j++){
        if(($result[$i][$j]>'9'||$result[$i][$j]<'0')&&$result[$i][$j]!='-'){
          $dahtri=true;
        }
        if($dahtri){
          $trigonometri .= $result[$i][$j];
        }
        else{
          $gaktri.=$result[$i][$j];
        }
      }
      $valuenya = intval($gaktri);
      if($valuenya==0)$valuenya=1;
      for($j = $i+1 ; $j < count($result) ; $j++){
        $triUntukCek = "";
        $gakuntukCek="";
        $dahmulai = false;
        for($k = 0 ; $k < strlen($result[$j]) ; $k++){
          if(($result[$j][$k]>'9'||$result[$j][$k]<'0')&&$result[$j][$k]!='-'){
            $dahmulai=true;
          }
          if($dahmulai){
            $triUntukCek .= $result[$j][$k];
          }
          else{
            $gakuntukCek.=$result[$j][$k];
          }
        }
        $valuekeduanya = intval($gakuntukCek);
        if($valuekeduanya==0)$valuekeduanya=1;
        if($trigonometri==$triUntukCek){
          $valuenya+=$valuekeduanya;
          $result[$j] = $valuenya;
          $result[$j] .= $trigonometri;
          $gakAda = false;
        }
      }
    }
    if($gakAda){
      $last[] = $result[$i];
    }
  }
  for($i = 0 ; $i < count($last) ; $i++){
    $triOrNo = false;
    $mulaikanlah=false;
    $gas="";
    for($j = 0 ; $j < strlen($last[$i]) ; $j++){
      if(($last[$i][$j]>'9'||$last[$i][$j]<'0')&&$last[$i][$j]!='-'){
        $triOrNo=true;
      }
      if($mulaikanlah){
        $gas .= $last[$i][$j];
      }
      if($last[$i][$j] == "^")$mulaikanlah=true;
    }
    $angkaF = intval($gas);
    for($j = $i+1 ; $j < count($last) ; $j++){
      $triOrNoSec = false;
      $mulaikanlah2=false;
      $gas2="";
      for($k = 0 ; $k < strlen($last[$j]) ; $k++){
        if(($last[$j][$k]>'9'||$last[$j][$k]<'0')&&$last[$j][$k]!='-'){
          $triOrNoSec=true;
        }
        if($mulaikanlah2){
          $gas2 .= $last[$j][$k];
        }
        if($last[$j][$k] == "^")$mulaikanlah2=true;
      }
      $angkaS = intval($gas2);
      if($triOrNo == false && $triOrNoSec == true && $angkaS > 0){
        $temp = $last[$i];
        $last[$i] = $last[$j];
        $last[$j] = $temp;
      }
      if($triOrNo == true && $triOrNoSec == true){
        if($angkaF<$angkaS){
          $temp = $last[$i];
          $last[$i] = $last[$j];
          $last[$j] = $temp;
        }
      }
      if($triOrNo == true && $triOrNoSec == false){
        if($angkaF<0){
          $temp = $last[$i];
          $last[$i] = $last[$j];
          $last[$j] = $temp;
        }
      }
    }
  }
  $tampung_terus = array();
  $gakkena = true;
  for($i = 0 ; $i < count($last) ; $i++){
    $yes=true;
    if($last[$i][strlen($last[$i])-1] == '0' && ($last[$i][strlen($last[$i])-2]>'9' || 
      $last[$i][strlen($last[$i])-2]<'0' && $last[$i][strlen($last[$i])-2]!='-')){
      $sementara_aja = "";
      for($j = 0 ; $j < strlen($last[$i]) ; $j++){
        if($last[$i][$j]=='-'||($last[$i][$j]>='0'&&$last[$i][$j]<='9')){
          $sementara_aja .= $last[$i][$j];
        }else break;
      }
      $this_value = intval($sementara_aja);
      for($j = $i+1 ; $j < count($last) ; $j++){
        $awasya = true;
        for($k = 0 ; $k < strlen($last[$j]) ; $k++){
          if(($last[$j][$k]>'9'||$last[$j][$k]<'0')&&$last[$j][$k]!='-'){
            $awasya = false;
            break;
          }
        }
        if($awasya){
          $angkanya = intval($last[$j]);
          $this_value += $angkanya;
          $last[$j] = strval($this_value);
          $yes=false;
          $gakkena=false;
        }
      }
    }
    if($yes){
      $tampung_terus[] = $last[$i];
    }
  }
  $kirimkan = "";
  if($gakkena)
  for($i = 0 ; $i < count($last) ; $i++){
    if($i==0){
      $kirimkan.=$last[$i];
    }
    else{
      if($last[$i][0] != '-')
      $kirimkan.='+';
      if($last[$i][strlen($last[$i])-1] == '0')
      for($j = 0 ; $j < strlen($last[$i]) ; $j++){
        if($last[$i][$j]=='-'||($last[$i][$j] >= '0' && $last[$i][$j] <= '9'))
        $kirimkan.=$last[$i][$j];
        else break;
      }
      else
      $kirimkan.=$last[$i];
    }
  }
  else
  for($i = 0 ; $i < count($tampung_terus) ; $i++){
    if($i==0){
      $kirimkan.=$tampung_terus[$i];
    }
    else{
      if($tampung_terus[$i][0] != '-')
      $kirimkan.='+';
      if($tampung_terus[$i][strlen($tampung_terus[$i])-1] == '0')
      for($j = 0 ; $j < strlen($tampung_terus[$i]) ; $j++){
        if($tampung_terus[$i][$j]=='-'||($tampung_terus[$i][$j] >= '0' && $tampung_terus[$i][$j] <= '9'))
        $kirimkan.=$tampung_terus[$i][$j];
        else break;
      }
      else
      $kirimkan.=$tampung_terus[$i];
    }
  }
  return $kirimkan;
}
// keep this function call here  
echo PolynomialExpansion(fgets(fopen('php://stdin', 'r')));  

?>
