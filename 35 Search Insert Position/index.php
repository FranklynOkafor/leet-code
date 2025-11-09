<?php
class Solution
{

  /**
   * @param Integer[] $nums
   * @param Integer $target
   * @return Integer
   */
  function searchInsert($nums, $target)
  {
    if (in_array($target, $nums)) {
      $result = array_search($target, $nums);
    } else {
      $highestDigit = $nums[count($nums) - 1];
      if ($target >= $highestDigit) {
        $result = count($nums);
      } else if ($target < $nums[0]) {
        $result = 0;
      } else {
        foreach ($nums as $index => $value) {
          if ($target > $value  && $target < $nums[$index + 1]) {

            $result = $index + 1;
          }
        }
      }
    }

    return $result;
  }
}

$nums = [1, 3, 5, 6];
$target = 7;

$solution = new Solution();
echo $solution->searchInsert($nums, $target);
