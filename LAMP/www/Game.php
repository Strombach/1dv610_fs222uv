<?php

class Game
{
  private $sticksLeft = 21;

  public $usedSticks;

  public function __construct()
  {
    $this->startSession();
  }

  public function startSession()
  {
    session_start();

    $_SESSION["sticksLeft"] = $this->sticksLeft;

    if (!isset($_SESSION["removedSticks"])) {
      $_SESSION["removedSticks"] = [];
    }
    if () {
    if (isset($_POST['selectSticks'])) {
      array_push($_SESSION["removedSticks"], $_POST['selectSticks']);
      $this->usedSticks = $this->getRemovedSticks();
    }

    if (isset($_POST['reset'])) {
      $this->resetSession();
    }
  }
  }

  public function resetSession()
  {
    session_destroy();
  }

  public function show(): string
  {
    return "
    <p>Sticks left= $this->sticksLeft</p>
    <form method='POST'>
      <select name='selectSticks'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
      </select>
      <input type='submit'>
    </form>
    <br>
    <p id='usedSticks'>$this->usedSticks</p>
    <form method='POST'>
      <input name='reset' type='submit' value='Reset'>
    </form>";
  }

  // Gets every value in the session array.
  public function getRemovedSticks(): string
  {
    $returnString = "";
    foreach ($_SESSION["removedSticks"] as $removedStick) {
      $returnString .= $removedStick . "  ";
    }
    return $returnString;
  }
}
