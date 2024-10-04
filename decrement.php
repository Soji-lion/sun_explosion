<?php
  echo 'test';
  $file = 'data.csv';

  $data = fopen($file,"r") or die ("Unable to open data!");
echo 'Counter incremented!';
  $index = fgets($data);
  $index = $index - 1;
  echo 'current index:';
  echo $index;
  fclose($data);
  $data = fopen($file,"w") or die ("Unable to open data!");
  fwrite($data, $index);
  fclose($data);

?>

