<?php

class Solution {
  function isValid($s) {
    $stack = [];
    $map = [
      ')' => '(',
      ']' => '[',
      '}' => '{'
    ];

    for ($i = 0;$i < strlen($s);$i++) {
        $char =$s[$i];

        if (in_array($char, ['(', '[', '{'])) {
          array_push($stack,$char);
        } else {
          if (empty($stack) || array_pop($stack) !== $map[$char]) {
            return false;
          }
        }
      }

      return empty($stack);
  }
}




  $s = '([)]';
  $solution = new Solution();

 var_dump($solution -> isValid($s));

  
  






