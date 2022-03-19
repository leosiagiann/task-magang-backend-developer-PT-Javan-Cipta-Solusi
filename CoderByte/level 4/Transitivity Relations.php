<?php 

function TransitivityRelations($strArr) {

  // code goes here
  for($i = 0 ; $i < count($strArr) ; $i++){
    $strArr[$i] = preg_replace("/[^0-9]/", "", $strArr[$i]);
  }
  $min = array();
  for($i = 0 ; $i < count($strArr) ; $i++){
    for($j = 0 ; $j < count($strArr) ; $j++){
      if($i!=$j){
        if($strArr[$i][$j] == '1'){
          for($k = 0 ; $k < count($strArr) ; $k++){
            if($j!=$k&&$k!=$i){
              if($strArr[$j][$k] == '1'){


                if($strArr[$i][$k] == '0'){
                  $string = '';
                  $string .= '(';
                  $string .= $i;
                  $string .= ',';
                  $string .= $k;
                  $string .= ')';
                  $min[] = $string;
                }

                for($l = 0 ; $l < count($strArr) ; $l++){
                  if($l!=$k&&$l!=$i){
                    if($strArr[$k][$l] == '1'){
                      if($strArr[$i][$l] == '0'){
                        $string = '';
                        $string .= '(';
                        $string .= $i;
                        $string .= ',';
                        $string .= $l;
                        $string .= ')';
                        $min[] = $string;
                      }
                    }
                  }
                }

              }
            }
          }
        }
      }
    }
  }
  if(count($min)==0)return "transitive";
  $result="";
  for($i = 0 ; $i < count($min) ; $i++){
    for($j = $i+1 ; $j < count($min) ; $j++){
      if($min[$i]>$min[$j]){
        $temp = $min[$i];
        $min[$i] = $min[$j];
        $min[$j] = $temp;
      }
    } 
  }
  for($i = 0 ; $i < count($min) ; $i++){
    $result .= $min[$i];
    if($i != count($min)-1)
    $result .= '-';
  }
  return $result;
}
   
// keep this function call here  
echo TransitivityRelations(fgets(fopen('php://stdin', 'r')));  

?>
