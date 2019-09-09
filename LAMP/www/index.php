<?php

$sticksLeft = 21;

echo "
$sticksLeft
<form action='' method='POST'>
  <select name='selectSticks'>
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
  </select>
  <input type='submit'>
</form>";

// echo $_POST["selectSticks"];
echo $sticksLeft - $_POST["selectSticks"];