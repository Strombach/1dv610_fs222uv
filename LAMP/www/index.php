<?php

session_start();

$sticksLeft = 21;

$_SESSION["sticksLeft"] = $sticksLeft;

if (!isset($_SESSION["removedSticks"])) {
  $_SESSION["removedSticks"] = [];
}

// The form for selecting how many sticks to remove
echo "
<p>Sticks left= $sticksLeft</p>
<form action='' method='POST'>
  <select name='selectSticks'>
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
  </select>
  <input type='submit'>
</form>";

echo "
<form action='' method='POST'>
  <button name=type='button'>Reset</button>
</form>";

if(isset($_POST['selectSticks'])) {
  array_push($_SESSION["removedSticks"], $_POST['selectSticks']);
  displayRemovedSticks();
}

// ******** You should write a condition that checks of the form for reset
// is pressed and Posted. In that case destroy session.

// Echoes every value in the session array.
function displayRemovedSticks() {
  foreach($_SESSION["removedSticks"] as $removedStick) {
    echo $removedStick;
  }
}