<?php
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function checkDivisibility($n) {
        $newArr = array_map('intval', str_split((string)$n));
        $arr_sum  =  array_sum($newArr);

        $arr_prod = array_product($newArr);

        $total = $arr_sum + $arr_prod;
        
        if((int)$n % $total == 0){
            return true;
        }

        return false;
    }
}

$result = new Solution();
$n = 4075;
print_r($result->checkDivisibility($n));