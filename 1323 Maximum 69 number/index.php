<?php

  class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function maximum69Number ($num) {
      $numList = str_split((string)$num);
      // echo "<pre>";
      // var_dump($numList);
      // echo "</pre>";
      
      foreach ($numList as $index => $num) {
        if ($num == 6) {
          $numList[$index] = 9;
          break;
        }
      }
      // echo "<pre>";
      // var_dump($numList);
      // echo "</pre>";

      $numReturn = (int)implode($numList);

      return $numReturn;
    }
    


  }


  $solution = new Solution();
  echo $solution -> maximum69Number(9999);