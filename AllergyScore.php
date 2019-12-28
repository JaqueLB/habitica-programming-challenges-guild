<?php
$knownAllergies = [
    1 => 'eggs',
    2 => 'peanuts',
    4 => 'shellfish',
    8 => 'strawberries',
    16 => 'tomatoes',
    32 => 'chocolate',
    64 => 'pollen',
    128 => 'cats'
];
$scores = [];

echo "Welcome to the Allergy Score System!\nEnter the patient score: ";

$givenScore = rtrim(fgets(STDIN));
$givenScore = intval(round($givenScore));

if (!is_numeric($givenScore)) {
    echo "You need to give a number.\n";
    return 0;
}

if ($givenScore < 1) {
    echo "You do not have any known allergies.\n";
    return 0;
}

if (isset($knownAllergies[$givenScore])) {
    echo "You have the following allergy: $knownAllergies[$givenScore]\n";
    return 0;
}

// get the binary number that represents the original $givenScore, reversed
$allergies = [];
for ($i = 0; $i < 8; $i++) {
    $allergies[] = $givenScore % 2;

    $givenScore = intval(round($givenScore / 2, 0, PHP_ROUND_HALF_DOWN));
}

// combine the binary reversed number with the fixed list of known allergies
$results = array_combine(array_values($knownAllergies), array_values($allergies));
// remove all false (0) results
$results = array_filter($results);

// print the allergies
if (empty($results)) {
    echo "You do not have any known allergies.\n";
} else {
    echo "You have the following allergies: " . implode(", ", array_keys($results)) . "\n";
}

return 0;
