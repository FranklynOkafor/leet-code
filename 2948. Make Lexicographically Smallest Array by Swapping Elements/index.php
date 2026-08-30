<?php


class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $limit
     * @return Integer[]
     */
    function lexicographicallySmallestArray($nums, $limit) {

        $n = count($nums);

        // [value, original index]
        $pairs = [];

        for ($i = 0; $i < $n; $i++) {
            $pairs[] = [$nums[$i], $i];
        }

        // Sort by value
        usort($pairs, function ($a, $b) {
            return $a[0] - $b[0];
        });

        $answer = $nums;

        $left = 0;

        while ($left < $n) {

            $right = $left;

            // Find the end of this connected group
            while (
                $right + 1 < $n &&
                $pairs[$right + 1][0] - $pairs[$right][0] <= $limit
            ) {
                $right++;
            }

            // Get original indices of this group
            $indices = [];

            for ($i = $left; $i <= $right; $i++) {
                $indices[] = $pairs[$i][1];
            }

            // Put smallest values at smallest indices
            sort($indices);

            for ($i = 0; $i < count($indices); $i++) {
                $answer[$indices[$i]] = $pairs[$left + $i][0];
            }

            // Move to next group
            $left = $right + 1;
        }

        return $answer;
    }
}

$result = new Solution();

print_r($result->lexicographicallySmallestArray([1,5,3,9,8], 2));