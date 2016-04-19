<!DOCTYPE html>
<html lang="en">
<head>
    <title>Roll Dice Gamr</title>
</head>
<body>
    <h1>Roll Dice Game</h1>

 @if($rand == $guess)
    <h2>You Guessed Correctly</h2>
 @else
    <h2>You Guessed Wrong</h2>
 @endif
    <p>Rolled: {{{ $rand }}}</p>
    <p>Guess: {{{ $guess }}}</p>

</body>
</html>