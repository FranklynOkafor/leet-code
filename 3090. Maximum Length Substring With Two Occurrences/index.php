<?php
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function maximumLengthSubstring($s)
    {
        $n = strlen($s);
        $core = array_unique(str_split($s));
        $shortlist = [];

        for ($i = 0; $i <= $n; $i++) {
            for ($j = $i + 1; $j <= $n; $j++) {
                $substring = substr($s, $i, $j);
                // $count = strlen($substring);
                $scattered  = str_split($substring);

                $complete = true;
                foreach ($core as $character) {
                    if (!in_array($character, $scattered)) {
                        $complete = false;
                    }
                }
                if ($complete) {
                    $letters_count = array_count_values($scattered);
                    
                    $addit = true;

                    foreach ($letters_count as $key => $value) {
                        if ($value > 2) {
                            $addit = false;
                        }
                        # code...
                    }
                    if ($addit) {
                        array_push($shortlist, $substring);
                    }
                }
                
                
            }
        }
        $brief = (array_unique($shortlist));
        $latest = array_reduce($brief, function($carry, $item){
            return (strlen($item) > strlen((string)$carry)) ? $item : $carry;

        });
        print_r(strlen((string)$latest));
    }
}


$result = new Solution();
$s = "aaa";
($result->maximumLengthSubstring($s));




