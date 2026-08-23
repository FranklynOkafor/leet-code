<?php
class Solution {

    /**
     * @param String $num
     * @return Boolean
     */
    function sumGame($num) {
        $n = strlen($num);
        $half = $n / 2;

        $leftSum = 0;
        $rightSum = 0;
        $leftQ = 0;
        $rightQ = 0;

        for ($i = 0; $i < $half; $i++) {
            if ($num[$i] == '?') {
                $leftQ++;
            } else {
                $leftSum += intval($num[$i]);
            }
        }

        for ($i = $half; $i < $n; $i++) {
            if ($num[$i] == '?') {
                $rightQ++;
            } else {
                $rightSum += intval($num[$i]);
            }
        }

        return 2 * ($leftSum - $rightSum) != 9 * ($rightQ - $leftQ);
    }
}


$result = new Solution();
$num = "?3295???";
print_r($result->sumGame($num));
