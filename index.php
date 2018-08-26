<?php

$peoples = [];

$arrFirstNames = file('firstNames.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$arrLastNames = file('lastNames.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$count = min(count($arrFirstNames), count($arrLastNames));

while (true) {
    if (count($peoples) >= $count) {
        break;
    }

    $randFirstNameIndex = array_rand($arrFirstNames);
    $randLastNameIndex = array_rand($arrLastNames);

    $uniqueRandKey = $arrFirstNames[$randFirstNameIndex] . ' ' . $arrLastNames[$randLastNameIndex];

    if (array_key_exists($uniqueRandKey, $peoples)) {
        continue;
    }

    $arr = array_fill(0, rand (10 , 30), '');

    $peoples[$uniqueRandKey] = array_map(function() {
        return rand (1 , 10);
    }, $arr);
}

//echo '<pre>';
//var_dump($peoples);
//echo '</pre>';

$fp = fopen('counter.txt', 'w+t');

foreach ($peoples as $key => $value) {
    $str = $key . ' -> ';
    $str .= array_sum($value) / count($value);
    $str .= "\n";
    $test = fwrite($fp, $str);
    if (!$test) echo 'Error';
}
echo 'File created';
fclose($fp);
