<?php
class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function stoneGameVIII($stones) {
        $stone_count = count($stones);
        $alice_score = 0;
        $bob_score = 0;
        
        if ($stone_count == 2){
            $alice_score = array_sum($stones);
        }

        return $alice_score - $bob_score;
    }
}


$result = new Solution();
$result->stoneGameVIII([-1,2,-3,4,-5]);