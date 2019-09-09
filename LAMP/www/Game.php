<?php

class Game
{
  private $sticksLeft = 21;

  public $humanPicks = [];
  public $humanString = "";

  public $comPicks = [];
  public $comString = "";

  public function __construct()
  {
    $this->startSession();
  }

  public function startSession()
  {
    session_start();

    $_SESSION["sticksLeft"] = $this->sticksLeft;

    if (isset($_POST['selectSticks'])) {
      $this->playRound();
    }

    if (isset($_POST['reset'])) {
      $this->resetSession();
    }
  }

  public function resetSession()
  {
    session_destroy();
  }

  public function playRound()
  {
    // HUMAN PART 
    array_push($this->humanPicks, $_POST['selectSticks']);
    $this->printSticks(false);

    // COMPUTER PART 
    if ($_SESSION["sticksLeft"] == 5) {
      array_push($this->comPicks, 4);
      $this->printSticks(true);
    } else { 
      array_push($this->comPicks, 1);
      $this->printSticks(true);
    }
  }

  // Gets every value in the session array.
  public function printSticks($isAI)
  {
    if (!$isAI) {
      foreach ($this->humanPicks as $pick) {
        $this->humanString .= $pick . " ";
        $_SESSION["sticksLeft"] -= $pick;
      }
    } else {
      foreach ($this->comPicks as $pick) {
        $this->comString .= $pick . " ";
        $_SESSION["sticksLeft"] -= $pick;
      }
    }
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
        <option value='4'>4</option>
      </select>
      <input type='submit'>
    </form>
    <br>
    <p id='humanPicks'>User drew: $this->humanString</p>
    <p id='ComPicks'>Computer drew: $this->comString</p>
    <form method='POST'>
      <input name='reset' type='submit' value='Reset'>
    </form>";
  }
}
