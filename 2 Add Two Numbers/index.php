<?php

class Solution {

  /**
   * @param ListNode $l1
   * @param ListNode $l2
   * @return ListNode
   */
  function addTwoNumbers($l1, $l2) {
      $arr1 = [];
      $arr2 = [];

      for ($i= 0; $i < length($l1) ; $i++) { 
        if (!$items) {
          $item1 = $l1;

        }else{
          $item1 = $item->next;
        }
        array_push($arr1, $item1->val);
      }
      for ($i= 0; $i < length($l2) ; $i++) { 
        if (!$items) {
          $item1 = $l2;

        }else{
          $item1 = $item->next;
        }
        array_push($arr2, $item1->val);
      }

      $arr1rev = array_reverse($arr1);
      $arr2rev = array_reverse($arr2);

      $sum = join('', $arr1rev) + join('', $arr2rev);
      $sumRev = array_reverse(str_split($sum));

      for ($i=0; $i < count($sumRev) ; $i++) { 
        if (!$sumList) {
          $sumList = new ListNode($sumRev[$i], null);
          $currentNode = $sumList;
          # code...
        }else{
          $currentNode->next = new ListNode($sumRev[$i], nul);
          $currentNode = $currentNode->next;
        }
        # code...
      }
      return $sumList;

      





      function length($list){
        $count = 0;
        foreach ($list as $value) {
          $count += 1;
          # code...
        }
        return $count;
      }
      
  }
}

  

?>