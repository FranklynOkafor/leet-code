<?php


class Solution
{
    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function shortestBeautifulSubstring($s, $k)
    {
        $k = (int)$k;
        $s_array = str_split($s);

        // Get the positions of all 1s
        $ones = array_keys($s_array, "1");

        // Not enough 1s to make a beautiful substring
        if (count($ones) < $k) {
            return "";
        }

        $shortest_count = PHP_INT_MAX;
        $shortest_sub = "";
        $break_num = count($ones) - $k;

        for ($i = 0; $i <= $break_num; $i++) {

            $current_ones = array_slice($ones, $i, $k);

            $current_count =
                $current_ones[$k - 1] - $current_ones[0] + 1;
            $current_sub = substr(
                $s,
                $current_ones[0],
                $current_count
            );

            // Found a shorter substring
            if ($current_count < $shortest_count) {
                $shortest_count = $current_count;
                $shortest_sub = $current_sub;
            }

            // Same length: choose lexicographically smaller
            elseif (
                $current_count == $shortest_count &&
                $current_sub < $shortest_sub
            ) {
                $shortest_sub = $current_sub;
            }
        }

        return $shortest_sub;
    }
}

$result = new Solution();

print_r($result->shortestBeautifulSubstring("1100001110111100100", 8));
