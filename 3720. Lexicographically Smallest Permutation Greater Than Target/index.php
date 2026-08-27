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






        $results = [];
        // Convert the string into an array of characters
        $charArray = str_split($s);

        // Start the recursive backtracking
        $this->backtrackPermute($charArray, 0, count($charArray) - 1, $results);

        // Use array_unique to remove duplicates if the input string has repeating characters
        $permutations = array_unique($results);
        sort($permutations);

        foreach ($permutations as $permutation) {
            if ($permutation > $target) {
                return $permutation;
            }
        }

        return "";
    }

    /**
     * Helper function that handles the backtracking logic.
     */
    private function backtrackPermute(array $chars, int $left, int $right, array &$results): void
    {
        if ($left === $right) {
            $results[] = implode('', $chars);
        } else {
            for ($i = $left; $i <= $right; $i++) {
                // Swap characters
                $this->swapChars($chars, $left, $i);

                // Recursively solve for the next character
                $this->backtrackPermute($chars, $left + 1, $right, $results);

                // Backtrack: Undo the swap for the next iteration
                $this->swapChars($chars, $left, $i);
            }
        }
    }

    /**
     * Swaps two elements in an array.
     */
    private function swapChars(array &$chars, int $i, int $j): void
    {
        $temp = $chars[$i];
        $chars[$i] = $chars[$j];
        $chars[$j] = $temp;
    }
}



$result = new Solution();
print_r($result->lexGreaterPermutation("abc", "bba"));
