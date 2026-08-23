<?php
class Solution
{

    /**
     * @param String $num
     * @return Boolean
     */
    function sumGame($num)
    {

        $char_array = str_split($num);

        $question_indices = array_keys($char_array, '?');
        $turn = true;

        $length = count($char_array);
        $left = array_slice($char_array, 0, ($length / 2));
        $right = array_slice($char_array, ($length / 2));


        $leftQ = array_count_values($left)['?'];
        $rightQ = array_count_values($right)['?'];

        $leftSum = 0;
        $rightSum = 0;

        foreach ($left as $value) {
            if ($value != '?') {
                $leftSum += $value;
            }
        }

        foreach ($right as $value) {
            if ($value != '?') {
                $rightSum += $value;
            }
        }

        $turn = true;

        while ($leftQ > 0 || $rightQ > 0) {
            $diff = $leftSum - $rightSum;


            //---------ALICE'S TURN---------


            if ($turn) {
                if ($diff >  0) {
                    //Left sum is higher
                    if ($leftQ) {
                        $chosen_index = array_search('?', $left);
                        if ($diff > 9) {
                            $left[$chosen_index] = 9;
                            $leftSum += 9;
                        } else {
                            $left[$chosen_index] = $diff;
                            $leftSum += $diff;
                        }
                        $leftQ--;
                    } else {
                        $chosen_index = array_search('?', $right);
                        $right[$chosen_index] = 0;
                        $rightSum += 0;
                        $rightQ--;
                    }
                } elseif ($diff < 0) {
                    //Right sum is higher
                    if ($rightQ) {
                        $chosen_index = array_search('?', $right);
                        if ($diff < -9) {
                            $right[$chosen_index] = 9;
                            $rightSum += 9;
                        } else {
                            $right[$chosen_index] = $diff;
                            $rightSum += $diff;
                        }
                        $rightQ--;
                    } else {
                        $chosen_index = array_search('?', $left);
                        $left[$chosen_index] = 0;
                        $leftSum += 0;
                        $leftQ--;
                    }
                } else {
                    //They are equal

                    if ($leftQ > $rightQ) {
                        $chosen_index = array_search('?', $right);
                        $right[$chosen_index] = 9;
                        $rightSum += 9;
                        $rightQ--;
                    } elseif ($leftQ < $rightQ) {
                        $chosen_index = array_search('?', $left);
                        $left[$chosen_index] = 9;
                        $leftSum += 9;
                        $leftQ--;
                    } else {
                        //They are equal
                        return 'Draw';
                    }
                }
                $turn = false;
            } 

            //---------BOB's TURN---------
            
            else {
                $diff = $leftSum - $rightSum;
                if ($diff > 0) {
                    //Left is higher
                    if ($rightQ) {
                        if ($diff > 9) {
                            $chosen_index = array_search('?', $right);
                            $right[$chosen_index] = 9;
                            $rightSum += 9;
                            $rightQ--;
                        } else {
                            $chosen_index = array_search('?', $right);
                            $right[$chosen_index] = $diff;
                            $rightSum += $diff;
                            $rightQ--;
                        }
                    } else {
                        //Alice won
                        return true;
                    }
                } elseif ($diff < 0) {
                    //Right is higher
                    if ($leftQ) {
                        if ($diff > 9) {
                            $chosen_index = array_search('?', $left);
                            $left[$chosen_index] = 9;
                            $leftSum += 9;
                            $leftQ--;
                        } else {
                            $chosen_index = array_search('?', $left);
                            $left[$chosen_index] = $diff;
                            $leftSum += $diff;
                            $leftQ--;
                        }
                    } else {
                        //Alice won
                        return true;
                    }
                } else {
                    //They are equal

                    if ($leftQ < $rightQ) {
                        $chosen_index = array_search('?', $right);
                        $right[$chosen_index] = 9;
                        $rightSum += 9;
                        $rightQ--;
                    } elseif ($leftQ > $rightQ) {
                        $chosen_index = array_search('?', $left);
                        $left[$chosen_index] = 9;
                        $leftSum += 9;
                        $leftQ--;
                    } else {
                        //They are equal
                        return 'Draw';
                    }
                }

                $turn = true;
            }
        }

        if ($leftSum - $rightSum !== 0) {
            return true;
        } else {
            return false;
        }
    }
}


$result = new Solution();
$num = "?3295???";
print_r($result->sumGame($num));
