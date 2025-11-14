<?php
class Solution
{

  /**
   * @param String[] $strs
   * @param Integer $m
   * @param Integer $n
   * @return Integer
   */
  function findMaxForm($strs, $m, $n)
  {
    $sortedArray = $this -> sortedArray($strs);
    
  }
  function sortedArray($strs){
    $newArray = [];
    $currentLength = 1;
    while (!empty($strs)) {
      foreach ($strs as $key => $value) {
        if (strlen($value) == $currentLength) {
          array_push($newArray, $value);
          unset($strs[$key]);
        }
      }
      $currentLength++;
    }
    return $newArray;
  }
}

$strs = ["10", "0001", "111001", "1", "0"];
$m = 5;
$n = 3;


$solution = new Solution();
print_r($solution->findMaxForm($strs, $m, $n));
