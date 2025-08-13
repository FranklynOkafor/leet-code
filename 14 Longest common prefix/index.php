<?php

  class Solution {
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
      $prefixList = $this -> getPrefixes($strs);
      return $this -> getHighestCount($prefixList);
        
    }
    private function getPrefixes($strs){
      $prefixList = [];
      foreach ($strs as $string) {
        $prefix = substr($string, 0, 2);
        array_push($prefixList, $prefix);
        
      }
      return $prefixList;
    }

    private function getHighestCount($prefixList){
      $counts = array_count_values($prefixList);
      $highestvalue = 1;
      $highestPrefix = '';
      $keys = array_keys($counts);
      
      foreach ($counts as $key => $value) {
        if ($value > $highestvalue) {
          $highestPrefix = $key;
          
          # code...
        }
      }
      return $highestPrefix;
      
    }

  }
  

  $solution = new Solution();
  $myArray = ["flower","flow","flight"];
  echo $solution -> longestCommonPrefix($myArray)





















?>