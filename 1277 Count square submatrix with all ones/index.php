<?php

  class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function countSquares($matrix) { 
      $longestArray = ($this -> longestArray($matrix)); 
      var_dump($this -> checkLengthOfOne(1, 2, $longestArray));
    }

    private function longestArray($matrix){
      $longest = null;
      $currentCount = 0;
      foreach ($matrix as $myArray) {
        if (count($myArray) > $currentCount) {
          $currentCount = count($myArray);
          $longest = $myArray;
        }
      }
      return $longest;
    }

    private function checkLengthOfOne($offset ,$length, $array){
      $invented = array_slice($array, $offset, $length);
      var_dump(array_unique($invented));
      echo "{}";
      return array_unique($invented) == 1 && $array[0] == 1; 


    }
  }


  $solution = new Solution();
  $myMatrix = [
    [0,1,1,1],
    [1,1,1,1],
    [0,1,1,1]
  ];
  $solution -> countSquares($myMatrix);

  // $blaa = [5,3,4,4,4,2,34,2,4,2,4,3,3,4];
  // for ($i = 0; $i < 20; $i++){
  //   if ($i > count($blaa) -1) {
  //     continue;
  //     # code...
  //   }
  //   echo $blaa[$i];
  // }