<?php
function convert($word) {
  $results = [];
  
  preg_match('/[aeiou]{1}/', $word, $results, PREG_OFFSET_CAPTURE);

  $pigLatin = substr($word, $results[0][1]) . substr($word, 0, $results[0][1]) . 'ay';
  echo ">>>> In PigLatin, $word is $pigLatin!" . PHP_EOL;
}

function program() {
  echo "Which word(s) do you want to convert? ";
  $input = rtrim(fgets(STDIN));
  $listOfWords = explode(" ", $input);
  
  if (is_array($listOfWords)) {
    foreach($listOfWords as $word) {
      convert($word);
    }
  } else {
    convert($input);
  }
  
}

echo "1st challenge of December / 2019\nWelcome to the PigLatin Converter!\n";

do {
  program();
  echo "Do you want to convert another word? (y for yes, any other key for no) ";
  $yOrN = rtrim(fgets(STDIN));
} while (in_array($yOrN, ['y', 'Y']));

echo "Bye!" . PHP_EOL;
exit;
