<?php

  class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
      // $answer = array_values(array_unique($nums));
      // return count($answer);


      $k = 0;

      for ($i = 0; $i < count($nums); $i++){
        if ($i == 0 || $nums[$i] != $nums[$i - 1]) {
          $nums[$k] = $nums[$i];
          $k++;

        }
      }
      return $k;
        
    // function removeDuplicates(&nums)nums =  // Updatenums in-place
    //   return count(nums); // Return the new length
  
  }
}


  $num = [0,0,1,1,1,2,2,3,3,4];

  $solution = new Solution();
  var_dump($solution -> removeDuplicates($num));
