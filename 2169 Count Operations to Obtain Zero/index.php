<?php
class Solution
{

  /**
   * @param Integer $num1
   * @param Integer $num2
   * @return Integer
   */
  public $count = 0;

  public $newNum1 = null;

  public $newNum2 = null;
  function countOperations($num1, $num2)
  {
    $this->newNum1 = $num1;
    $this->newNum2 = $num2;
    while ($this->newNum1 != 0 && $this->newNum2 != 0) {
      if ($this->newNum1 >= $this->newNum2) {
        $this->newNum1 -= $this->newNum2;
        # code...
      }else{
        $this->newNum2 -= $this->newNum1;
      }
      $this->count ++; 
    }
    return $this->count;
  }
  
}

$num1 = 20;
$num2 = 20;
$solution = new Solution();
echo $solution->countOperations($num1, $num2);
