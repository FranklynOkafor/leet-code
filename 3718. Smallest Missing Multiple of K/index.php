<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function missingMultiple($nums, $k) {
        for($i = 1; $i < 100; $i++){
            $curent_multiple = (int)$i * (int)$k;

            if (!in_array($curent_multiple, $nums)) {
               
                return $curent_multiple;
                break;
            }
            
        }
        
    }
}


$result = new Solution();

print_r($result->missingMultiple([8,2,3,4,6], 2)); 