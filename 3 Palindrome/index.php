<?php

  class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
      $myArray = str_split($x);
      $myArray2 = array_reverse($myArray); 
       
      return is($myArray == $myArray2);
    }
  }

  
  function isPalindrome($x) {
    $myArray = str_split($x);
    $myArray2 = array_reverse($myArray); 


    $newnum = implode('', $myArray2);
    // echo $newnum;
    // echo (2==3)? true : false;
    echo ($x == $newnum) ? 'true' : 'false';
  }
  // echo isPalindrome(-232);
  echo 2===2;




  


?>