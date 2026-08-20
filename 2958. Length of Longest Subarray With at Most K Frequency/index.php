<?php
class Solution
{

    /**
     * @param int[] $nums
     * @param int $k
     * @return int
     */
    function maxSubarrayLength($nums, $k)
    {
        $akons = array_unique($nums);

        $digit_count = [];
        $last_borns = [];
        foreach ($akons as $value) {
            $digit_count[$value] = array_count_values($nums)[$value];
        }

        foreach ($digit_count as $key => $value) {
            if ($value <= $k) {
                $last_borns[$key] = $value;
            }
        }
        print_r($last_borns);
    }
}


$solution = new Solution();
$nums = [1, 2, 3, 1, 2, 3, 1, 2];
$k = 2;
$solution->maxSubarrayLength($nums, $k);
