<?php


class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function shortestBeautifulSubstring($s, $k) {
        $k = (int)$k;
        $s_array = str_split($s);
        
        $ones = array_keys($s_array, "1");
        if (count($ones) < $k){
            return "";
        }

        $break_num = count($ones) - $k;

        $shortest_count = 100;
        $shortest_sub = "";
        $array_of_shortests = [];
        for ($i = 0; $i <= $break_num; $i++) {
            $current_ones = array_slice($ones, $i, $k);
            $current_count = $current_ones[count($current_ones) - 1] - $current_ones[0] + 1;

            if($current_count < $shortest_count){
                $shortest_count = $current_count;
                $shortest_sub = substr($s, $current_ones[0], $current_count);
                array_pop($array_of_shortests);
                array_push($array_of_shortests, $shortest_sub);
            }

            else if($current_count == $shortest_count){
                $shortest_sub = substr($s, $current_ones[0], $current_count);
                array_push($array_of_shortests, $shortest_sub);
            }
        }
        $highest_indices_sum = 0;
        if (count($array_of_shortests) > 1){
            foreach ($array_of_shortests as $current_sub) {
                $current_indices_sub = array_keys(str_split($current_sub), "1");
                $current_indices_sum = array_sum($current_indices_sub);
                if ($current_indices_sum > $highest_indices_sum){
                    $highest_indices_sum = $current_indices_sum;
                    $shortest_sub = $current_sub;
                }
                
            }
            return $shortest_sub;

        }
        else {
            return $array_of_shortests[0];
        }
    }
}


$result = new Solution();

print_r($result->shortestBeautifulSubstring("1100001110111100100", 8));