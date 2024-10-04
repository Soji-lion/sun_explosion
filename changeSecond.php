<?php
while (true){
  echo 'test';
  $file = '/var/www/html/data.csv';

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
  if ($index<0){
  $state = fopen('/var/www/html/state.csv', "w") or die ("Unable to open data!");
  fwrite($state, 1);
  fclose($state);
  idle();
}
  if ($index>1000000){
  $state = fopen('/var/www/html/state.csv', "w") or die ("Unable to open data!");
  fwrite($state, 2);
  fclose($state);
  idle();
}

  sleep(1);
}

function idle() {
  $index = 0;
  $data = fopen('/var/www/html/data.csv', "w") or die ("Unable to open data!");
  fwrite($data, 0);
  fclose($data);
  while ($index<1000000){
    $data = fopen('/var/www/html/data.csv',"r") or die ("Unable to open data!");
    $index = fgets($data);
    fclose($data);
    sleep(1);
  }
  $state = fopen('/var/www/html/state.csv', "w") or die ("Unable to open data!");
  fwrite($state, 0);
  fclose($state);
  $data = fopen('/var/www/html/data.csv', "w") or die ("Unable to open data!");
  fwrite($data, 500000);
  fclose($data);
}
?>
