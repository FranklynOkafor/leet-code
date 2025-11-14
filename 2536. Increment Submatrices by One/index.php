<?php
class Solution
{

  /**
   * @param Integer $n
   * @param Integer[][] $queries
   * @return Integer[][]
   */
  function rangeAddQueries(int $n, $queries)
  {
    $diff = [];
    $count = $n;
    // Initialize Diff Matrix
    while ($count > 0) {
      $new_array = array_fill(0, $n, 0);
      array_push($diff, $new_array);
      $count -= 1;
    }

    // Process queries
    foreach ($queries as $q) {
      $r1 = $q[0];
      $c1 = $q[1];
      $r2 = $q[2];
      $c2 = $q[3];

      $diff[$r1][$c1] += 1;

      if ($c2 + 1 < $n) $diff[$r1][$c2 + 1] -= 1;
      if ($r2 + 1 < $n) $diff[$r2 + 1][$c1] -= 1;
      if ($r2 + 1 < $n && $c2 + 1 < $n) $diff[$r2 + 1][$c2 + 1] += 1;
    }

    // Row wise Prefix
    foreach ($diff as &$row) {
      for ($i = 1; $i < count($row); $i++) {
        $row[$i] += $row[$i - 1];
      }
    }


    // Column wise prefix
    for ($c = 0; $c < $n; $c++) {
      for ($r = 1; $r < $n; $r++) {
        $diff[$r][$c] += $diff[$r - 1][$c];
      }
    }

    return $diff;
  }
}


$n = 2;
$queries = [[0, 0, 1, 1]];


$solution = new Solution();
echo '<pre>';
print_r($solution->rangeAddQueries($n, $queries));
echo '</pre>';
