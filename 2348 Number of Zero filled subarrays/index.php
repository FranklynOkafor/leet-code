<?php

  class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function zeroFilledSubarray($nums) {
      $zeroAmt = $this -> getCount($nums);
      echo $zeroAmt;
      $others = $this -> checkHigher($nums, $zeroAmt);

      return $zeroAmt + $others;

        
    }
    private function getCount($chosenArray){
      $count = 0;
      foreach ($chosenArray as $value) {
        if ($value == 0){
          $count ++;
        }
      }
      return $count;
    }

    private function checkHigher($nums, $zeroAmt){
      $count = 0;
      for ($i=2; $i < $zeroAmt ; $i++) {
        
        for ($j=0; $j < count($nums) ; $j++) {
          $fresh_array = array_slice($nums, $j, $i);
          echo '<pre>';
          var_dump($fresh_array);
          echo '</pre>';
          $onTrack = false;
          if (count(array_unique($fresh_array)) == 1 && $fresh_array[0] == 0) {
            $count ++;
            // echo '<pre>';
            // var_dump($fresh_array);
            // echo '</pre>';
          }
        } 
      }
      return $count;
    }

    
  }


  $myArray = [0,0,0,2,0,0];
  // $myArray = [1, 2, 3, 0];
  $solution = new Solution();
  var_dump($solution -> zeroFilledSubarray($myArray));

