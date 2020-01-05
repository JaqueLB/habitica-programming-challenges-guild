<?php

function getScore() {
  echo "Who have scored? ";
  return strtolower(rtrim(fgets(STDIN)));
}

$scores = [];
echo "Let's count the scores!\n";
echo "First, enter one unique letter to represent each player separated by comma - this is case insensitive: \n";
$players = explode(',', strtolower(rtrim(fgets(STDIN))));
echo "You can end this program any time, by typing the word end.\n";
$score = getScore();
while($score !== 'end') {
  $scores[] = $score;
  $score = getScore();
}
if ($score === 'end' && !empty($scores)) {
  $result = array_count_values($scores);
  $winnerScore = max($result);
  $winner = array_search($winnerScore, $result);
  
  echo "The winner is $winner, with $winnerScore points!\n";
  echo "Here are the full results: \n";

  foreach($players as $player) {
    if (isset($result[$player])) {
      echo "Player $player: $result[$player]\n";
    } else {
      echo "Player $player: 0\n";
    }
  }
}
echo "Bye!";