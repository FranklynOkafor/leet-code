<?php
  class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
      foreach ($nums as $index => $number) {
        if ($number == $val) {
          unset($nums[$index]);
        }
      }
      $answer = count($nums);
      return $answer;
    }
  }

  $solution = new Solution();
  $nums = [3,2,2,3];
  $val  = 3;
  echo $solution -> removeElement($nums, $val);


?> 