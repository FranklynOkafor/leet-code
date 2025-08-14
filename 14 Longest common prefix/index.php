<?php
 class Solution {

  /**
   * @param String[] $strs
   * @return String
   */
  function longestCommonPrefix($strs) {
      for ($i = 0; $i < strlen($strs[0]); $i++) {
          $prefix = $strs[0][$i];
          foreach ($strs as $str) {
            if (strlen($str) <= $i || $str[$i] != $prefix) break 2;
          }
      }
      return substr($strs[0], 0, $i);
  }
}
  
  
  $solution = new Solution();
  $myArray = ["a", 'ab'];
  echo $solution -> longestCommonPrefix($myArray)







?>