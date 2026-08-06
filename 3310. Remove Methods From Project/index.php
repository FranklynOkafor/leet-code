<?php
class Solution
{
    /**
     * @param Integer $n
     * @param Integer $k
     * @param Integer[][] $invocations
     * @return Integer[]
     */
    function remainingMethods($n, $k, $invocations)
    {
        // Build adjacency list
        $graph = array_fill(0, $n, []);

        foreach ($invocations as $edge) {
            $graph[$edge[0]][] = $edge[1];
        }

        // Find all suspicious methods using DFS
        $suspicious = array_fill(0, $n, false);
        $stack = [$k];

        while (!empty($stack)) {
            $node = array_pop($stack);

            if ($suspicious[$node]) {
                continue;
            }

            $suspicious[$node] = true;

            foreach ($graph[$node] as $next) {
                if (!$suspicious[$next]) {
                    $stack[] = $next;
                }
            }
        }

        // Check whether removal is allowed
        foreach ($invocations as $edge) {
            $from = $edge[0];
            $to = $edge[1];

            if (!$suspicious[$from] && $suspicious[$to]) {
                return range(0, $n - 1);
            }
        }

        // Return remaining methods
        $answer = [];

        for ($i = 0; $i < $n; $i++) {
            if (!$suspicious[$i]) {
                $answer[] = $i;
            }
        }

        return $answer;
    }
}


$results = new Solution();
print_r($results->remainingMethods(3, 2, [[1,2],[0,1],[2,0]]));
