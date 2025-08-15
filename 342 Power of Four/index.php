<?php

  class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfFour($n) {
      $isAPower = false;
      $numList = [];
      for ($i=0; $i < 10000; $i++) { 
        array_push($numList, $i);
        # code...
      }
    
      foreach ($numList as $pow) {
        if (pow(4, $pow) == $n) {
          $isAPower = true;
          break;
        }
      }
      return $isAPower;
    }
  }



  $solution = new Solution();
  var_dump($solution -> isPowerOfFour(1));
  // echo pow(64, (1/3));