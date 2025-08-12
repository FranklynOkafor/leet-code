<?php
  // Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.
  $numbers = [3, 2, 4];
  $target = 6;

  function twoSum($num, $target){
    for ($i=0; $i < count($num); $i++) {
    
      for ($j=0; $j < count($num); $j++) { 
        // echo $i;
        if ($num[$i] != $num[$j]){
          if ($num[$i] + $num[$j] == $target) {
            echo "[".$i.", ".$j."]";
            return;
          }
        }
      }
    }
    
  }

  twoSum($numbers, $target)
  
?>