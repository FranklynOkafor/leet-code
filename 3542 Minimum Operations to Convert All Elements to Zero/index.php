<?php

class Solution
{
  /**
   * @param Integer[] $nums
   * @return Integer
   */ 
  public function minOperations($nums)
  {
    $stack = [];
    $res = 0;

    foreach ($nums as $n) {
      // Pop elements from stack that are greater than current
      while (!empty($stack) && end($stack) > $n) {
        array_pop($stack);
      }

      // Skip zeros
      if ($n == 0) {
        continue;
      }

      // If stack is empty or current is greater than top, need new operation
      if (empty($stack) || end($stack) < $n) {
        $res++;
        $stack[] = $n;
      }
    }

    return $res;
  }
}

// Example usage
$sol = new Solution();

echo $sol->minOperations([1, 2, 1, 2, 1, 2]); // Output: 4
echo "\n";
echo $sol->minOperations([3, 1, 2, 1]);       // Output: 3
echo "\n";
echo $sol->minOperations([0, 2]);             // Output: 1
echo "\n";

// Very large array test
$largeArray = array_merge(range(1, 10000), range(10000, 1));
echo $sol->minOperations($largeArray);
