<?php
class Solution {

  /**
   * @param String $haystack
   * @param String $needle
   * @return Integer
   */
  function strStr($haystack, $needle) {
    $position = strpos($haystack, $needle);
    if (str_contains($haystack, $needle)) {
      return $position;
    }else{
      return -1;
    };
      
  }
}

$haystack = "sadbutad";
$needle = "sad";

$solution = new Solution();
$solution -> strStr($haystack, $needle);