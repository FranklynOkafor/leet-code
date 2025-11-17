<?php
class Solution
{

  /**
   * @param Integer[] $nums
   * @param Integer $k
   * @return Boolean
   */
  function kLengthApart($nums, $k)
  {
    $amount = count($nums);
    $isLegit = true;

    $oneArray = array_keys($nums, 1);
    var_dump($oneArray);
    foreach ($oneArray as $index => $value) {

      if (count($oneArray) == 1) {
        break;
      } else if ($index == 0) {


        $future = $oneArray[$index + 1];
        if ($future - ($value + 1) < $k) {
          echo 'First';
          $isLegit = false;
          break;
        }
      }
      // Check Last digit
      else if ($index == count($oneArray) - 1) {



        $previous = $oneArray[$index - 1];
        // echo $previous;
        if ($value - ($previous + 1) < $k) {
          echo '<br> ' .  $value . ' - ' . ($previous + 1) . 'is less than ' . $k;
          echo 'Second';
          $isLegit = false;
          break;
        }
        # code...
      }
      // Check every other
      else {
        echo 'Third';

        $previous = $oneArray[$index - 1];
        $future = $oneArray[$index + 1];
        if ($value - ($previous + 1) < $k or $future - ($value + 1) < $k) {
          echo 'round';
          $isLegit = false;
          break;
        }
      }
    }
    return $isLegit;
  }
}

$nums = [1, 0, 0, 0, 1, 0, 0, 1];
$k = 2;

$solution = new Solution();
var_dump($solution->kLengthApart($nums, $k));
