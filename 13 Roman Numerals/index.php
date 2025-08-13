<?php



  class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    
    function romanToInt($s) {
      $resources = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
      ];
  
      $numArray = $this -> toDigits($s, $resources);
  
      $optimizedArray = $this -> checkLeft($numArray);
      $result = array_sum($optimizedArray);
      return $result;
  
  
    }
    private function toDigits($roman, $resources){
      $strList = str_split($roman);
      $newList = [];
      foreach ($strList as $value) {
        foreach ($resources as $key => $number) {
          if ($value == $key) {
            array_push($newList, $number);
          }
        }
      }
      return $newList;
    }

    private function checkLeft($digitsArray){
      $newArray = [];
      foreach ($digitsArray as $index => $value) {
        if ($index == 0){
          array_push($newArray, $value);
          continue;
        }
        
        if ($digitsArray[$index-1] < $digitsArray[$index]){
          $num = $value - $digitsArray[$index- 1];
          
          array_push($newArray, $num);
          
        }else{
          array_push($newArray, $digitsArray[$index]);
        }
        
      }
      var_dump($newArray);

      return $newArray;
    }
}

$newBoy  = new Solution();
echo $newBoy->romanToInt('MCMXCIV');
