<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingInteger($nums) {
        $sum = 0;

        for ($i=0; $i < count($nums) ; $i++) { 
           if ($i === count($nums) -1 ){
                $stopIndex = $i;
                $sum += (int)$nums[$i];
                break;
            }
            
            if ($nums[$i + 1] !== ((int)$nums[$i] + 1 )){
                $stopIndex = $i;
                $sum += (int)$nums[$i];
                break;
                
            }
        
            $sum += (int)$nums[$i];
        }
        
        
        
        $done = false; 
        $answer = 0;
        while (!$done){
            if (in_array($sum, $nums)){
                $sum += 1;
            }
            else{
                $answer = $sum;
                $done = true;
            }
        }
        return $answer;
    }
}

$result = new Solution();
print_r($result->missingInteger([29,30,31,32,33,34,35,36,37]));