<?php
require_once("Game.php");
$game = new Game();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code base metrics</title>
</head>

<body>
    <header>
        <h1>21 - Stick game</h1>
    </header>
    <div class="main content">
        <?php
        echo $game->show();
        ?>
    </div>
</body>

</html>