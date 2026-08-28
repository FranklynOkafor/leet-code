<?php
class Solution
{
    /**
     * @param String $s
     * @param String $target
     * @return String
     */
    function lexGreaterPermutation($s, $target)
    {
        $freq = array_fill(0, 26, 0);

        foreach (str_split($s) as $ch) {
            $freq[ord($ch) - 97]++;
        }

        $ans = $this->dfs($freq, $target, 0);

        return $ans === null ? "" : $ans;
    }

    private function dfs(&$freq, $target, $pos)
    {
        $n = strlen($target);

        // Reached the end while still equal -> invalid
        if ($pos == $n) {
            return null;
        }

        $cur = ord($target[$pos]) - 97;

        // Option 1: stay equal
        if ($freq[$cur] > 0) {
            $freq[$cur]--;

            $res = $this->dfs($freq, $target, $pos + 1);

            $freq[$cur]++;

            if ($res !== null) {
                return chr($cur + 97) . $res;
            }
        }

        // Option 2: become greater here
        for ($c = $cur + 1; $c < 26; $c++) {
            if ($freq[$c] == 0) {
                continue;
            }

            $freq[$c]--;

            $suffix = "";

            for ($i = 0; $i < 26; $i++) {
                if ($freq[$i] > 0) {
                    $suffix .= str_repeat(chr($i + 97), $freq[$i]);
                }
            }

            $freq[$c]++;

            return chr($c + 97) . $suffix;
        }

        return null;
    }
}



$result = new Solution();
print_r($result->lexGreaterPermutation("abc", "bba"));
