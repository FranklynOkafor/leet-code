<?php
class Solution
{

    /**
     * @param String $num
     * @param Integer $t
     * @return String
     */
    function smallestNumber($num, $t)
    {


        $found_answer = false;

        while (!$found_answer) {
            $digits = str_split($num);
            $current_product = array_product($digits);
            $rem = $current_product % (int)$t;

            if ($rem == 0) {
                $found_answer = true;
            } else {

            }
        }


    }
    function increasedigit($prev, $current) {
        $cur = array_map('intval', str_split((string)$current));
        $pre = array_map('intval', str_split((string)$prev));

        $length = count($pre);


        foreach($pre as $key => $value){
            if ($cur[$key] !== $value){
                
            }
        }

        
    }
}

$result = new Solution();
print_r($result->smallestNumber("1234", 256));
