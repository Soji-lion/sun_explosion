<?php
$file = 'state.csv';
$data = fopen($file,"r") or die ("Unable to open data!");
  $index = fgets($data);
  echo $index;
  fclose($data);
?>
