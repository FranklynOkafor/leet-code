<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function resultArray($nums) {
        $arr1 = [];
        $arr2 = [];

        $n = count($nums);

        for ($i = 0; $i < $n; $i++){
            if ($i == 0)
            {
                $arr1[] = $nums[$i];
            }else if ($i == 1){
                $arr2[] = $nums[$i];
            }else{
                $arr1_last = end($arr1);
                $arr2_last = end($arr2);

                if ($arr1_last > $arr2_last){
                    $arr1[] = $nums[$i];
                }

                else{
                    $arr2[] = $nums[$i];
                }

                
            }
        }

        $final_array = array_merge($arr1, $arr2);

        return $final_array;
    }
}

$result = new Solution();
$nums = [5,4,3,8];
print_r($result->resultArray($nums));