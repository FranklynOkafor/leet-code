<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer $t
     * @return Integer
     */
    function smallestNumber($n, $t) {
        $remainder = 2;
        while($remainder != 0){
            $product = array_product(str_split($n));
            
            $remainder = $product % (int)$t;
            $n += 1;
        }
        return $n - 1;
    }
}
$test = new Solution();
print_r($test-> smallestNumber(10, 2)); 