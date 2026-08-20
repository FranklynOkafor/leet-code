<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function largestInteger($nums, $k)
    {
        $digits_present = array_unique($nums);
        $splited_array = [];
        $working_tool = [];

        foreach($digits_present as $digit)
        {
            $working_tool[(int)$digit] = 0;
        }
        
        for($i = 0; $i < count($nums); $i++)
        {
            $current_slice = array_slice($nums, $i, (int)$k);

            if(count($current_slice) < (int)$k)
            {
                break;
            }

            array_push($splited_array, $current_slice);
        }

        
        // print_r($splited_array);
        foreach($working_tool as $digit => $count)
        {
            foreach($splited_array as $slice)
            {
                if (in_array($digit, $slice))
                {
                    $value = $working_tool[$digit];
                    $value++;
                    $working_tool[$digit] = $value;
                    
                }
            }
        }

        foreach($working_tool as $digit => $count)
        {
            if ($count > 1)
            {
                unset($working_tool[$digit]);
            }
        }
        if (count($working_tool) == 0)
        {
            return -1;
        }
        $highest_digit = 0;
        foreach ($working_tool as $digit => $count)
        {
            if ($digit > $highest_digit)
            {
                $highest_digit = $digit;
            }
        }

        return $highest_digit;

   
    }
}


$result = new Solution;
print_r($result->largestInteger([3,9,2,1,7], 2));
