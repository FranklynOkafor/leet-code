<?php

  class Solution {

    /**
     * @param String $num
     * @return String
     */
    function largestGoodInteger($num) {
      $maximum = strlen($num) - 2;
      $highest = -1;
      $chosenStr = '';
      $number = (int)$num;


      $stringArray = str_split($num);

      $numArray = str_split((string)$num);
      $numArray = array_map('intval', $numArray);

      
      // echo substr($num, 5, 3);
      for ($i=0; $i < $maximum; $i++) { 
        if ($num[$i] == $num[$i + 1] && $num[$i] == $num[$i + 2] ) {
          $currentCount = array_sum(array_slice($numArray, $i, 3));
          if ($currentCount > $highest) {
            $highest = $currentCount;
            $chosenStr = substr($num, $i, 3);
          }

        }
      }
      return $chosenStr;
        
    }
  }

  $num = "2300019";
  $solution = new Solution();
  $solution -> largestGoodInteger($num);

  // var_dump(sum(str_split($num)));

