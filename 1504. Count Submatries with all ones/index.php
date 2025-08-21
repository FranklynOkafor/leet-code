<?php

  class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function numSubmat($mat) {
      $total = 0;
      foreach ($mat as $value) {
        echo $this -> horizontal($value);
      }
    }

    private function checkOnes($singleArray){
      $count = 0;
      foreach ($$singleArray as $number) {
        if($number == 1){
          $count ++;
        }
        # code...
      }
      return $count;
    }

    private function horizontal($currentMatrix){
      $count = 0;
      // foreach ($currentMatrix as $index => $digit) {
      //   for ($i=0; $i < count($currentMatrix); $i++) {
      //     if ($digit !== 0  && $index !== count($currentMatrix) - 1) {
      //       if ($currentMatrix[$i] == 1){
      //         $count += 1;
      //       }
      //     }
      //     // if ($digit !== 0) {

      //     //   # code...
      //     // }
      //   }
        
      // }

      foreach ($currentMatrix as $index => $digit) {
        if($digit !== 0 && $index < count($currentMatrix)){
          for ($i=0; $i < count($currentMatrix) ; $i++) { 
            if($currentMatrix[$i + 1] == 1){
              $count += 1;

            }else{
              break;
            }
          }
        }
        
        # code...                  [1,0,1]
      }
      return $count;

    }
  }


  $solution = new Solution();
  $mat = [[1,0,1],[1,1,0],[1,1,1]];

  $solution -> numSubmat($mat);
