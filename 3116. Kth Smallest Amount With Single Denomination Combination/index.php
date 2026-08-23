<?php
class Solution
{

    /**
     * @param Integer[] $coins
     * @param Integer $k
     * @return Integer
     */
    function findKthSmallest($coins, $k)
    {
        $keep_going = true;
        $start = min($coins);
        $end = $start * (int)$k;

       

            while ($start < $end) {
                $middle = intdiv($start + $end, 2);

                // count how many valid amounts are <= $middle
                $count = 0;
                foreach ($coins as $coin) {
                    $count += floor($middle / (int)$coin);
                }

                if ($count < $k) {
                    $start = $middle + 1;
                } else {
                    $end = $middle;
                }
            }

        
    }
}


$result = new Solution();
$coins = [5, 6];
$k = 7;
print_r($result->findKthSmallest($coins, $k));
