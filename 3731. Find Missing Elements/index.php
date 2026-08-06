<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findMissingElements($nums) {
        
        sort($nums);
        
        $lowest = (int)$nums[0];
        $largest = (int)end($nums);

        $newArray = range($lowest,$largest);
        $length = count($newArray);
        

        $outputArray = [];

        for ($i = 0; $i < $length; $i++){
            if (!in_array($newArray[$i], $nums)){
                $outputArray[] = $newArray[$i];
            }

        }

        return $outputArray;    

        
    }
}

$result = new Solution();
print_r($result->findMissingElements([3, 5, 4, 7, 1, 6,2]));
