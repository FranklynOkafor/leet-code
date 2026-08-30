<?php
class Solution {

    /**
     * @param String $s
     * @param String $target
     * @return String
     */
    function lexPalindromicPermutation($s, $target) {

        $n = strlen($s);


        $freq = array_fill(0, 26, 0);

        for ($i = 0; $i < $n; $i++) {
            $freq[ord($s[$i]) - ord('a')]++;
        }

        // --------------------------------------------------
        // 2. Check whether a palindrome is possible
        // --------------------------------------------------

        $oddCount = 0;
        $middle = '';

        for ($i = 0; $i < 26; $i++) {
            if ($freq[$i] % 2 == 1) {
                $oddCount++;
                $middle = chr(ord('a') + $i);
            }
        }

        if ($oddCount > 1) {
            return "";
        }

        // --------------------------------------------------
        // 3. Build frequency of the left half
        // --------------------------------------------------

        $halfLen = intdiv($n, 2);
        $halfFreq = array_fill(0, 26, 0);

        for ($i = 0; $i < 26; $i++) {
            $halfFreq[$i] = intdiv($freq[$i], 2);
        }

        $targetHalf = substr($target, 0, $halfLen);

        // --------------------------------------------------
        // 4. First check whether targetHalf itself is possible
        // --------------------------------------------------

        $remaining = $halfFreq;
        $possible = true;

        for ($i = 0; $i < $halfLen; $i++) {

            $c = ord($targetHalf[$i]) - ord('a');

            if ($remaining[$c] == 0) {
                $possible = false;
                break;
            }

            $remaining[$c]--;
        }

        if ($possible) {

            $candidate = $targetHalf
                       . $middle
                       . strrev($targetHalf);

            // It is possible that the palindrome is already
            // greater than target because of the middle/right side.
            if ($candidate > $target) {
                return $candidate;
            }
        }

        // --------------------------------------------------
        // 5. Find the smallest left half > targetHalf
        // --------------------------------------------------
        //
        // Try changing each position from RIGHT to LEFT.
        //
        // At position i:
        //
        //   target:       a b c d
        //   candidate:    a b c e
        //
        // We keep everything before i equal to target,
        // choose the smallest available character > target[i],
        // then fill the rest with the smallest characters.
        //
        // --------------------------------------------------

        for ($i = $halfLen - 1; $i >= 0; $i--) {

            // Get the frequency of characters used by
            // targetHalf[0 .. i-1].
            $remaining = $halfFreq;
            $validPrefix = true;

            for ($j = 0; $j < $i; $j++) {

                $c = ord($targetHalf[$j]) - ord('a');

                if ($remaining[$c] == 0) {
                    $validPrefix = false;
                    break;
                }

                $remaining[$c]--;
            }

            // We cannot preserve this prefix, so try a
            // shorter prefix.
            if (!$validPrefix) {
                continue;
            }

            // Character currently at position i in target.
            $targetChar = ord($targetHalf[$i]) - ord('a');

            // Try the smallest available character that is
            // strictly greater than target[i].
            for ($c = $targetChar + 1; $c < 26; $c++) {

                if ($remaining[$c] == 0) {
                    continue;
                }

                // Build the left half.
                $newHalf = substr($targetHalf, 0, $i);

                // Put the larger character at position i.
                $newHalf .= chr(ord('a') + $c);

                $remaining[$c]--;

                // Fill the rest with the smallest possible
                // characters.
                for ($x = 0; $x < 26; $x++) {
                    while ($remaining[$x] > 0) {
                        $newHalf .= chr(ord('a') + $x);
                        $remaining[$x]--;
                    }
                }

                // Construct palindrome.
                $candidate = $newHalf
                           . $middle
                           . strrev($newHalf);

                return $candidate;
            }
        }

        return "";
    }
}




$result = new Solution();

print_r($result->lexPalindromicPermutation("baba", "bbba"));