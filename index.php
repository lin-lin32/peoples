<?php

$peoples = [
    'Elena Zhuzhneva' => [7, 8, 1, 3, 5, 7, 8, 4, 10],
    'Dmitry Zhuzhnev' => [2, 2, 4, 1, 5, 7, 1, 6, 7],
    'Elena Chery' => [10, 7, 4, 2, 12, 7, 11, 6, 1],
    'Vladimir Voronkov' => [6, 4, 1, 11, 5, 8, 7, 9, 7],
    'Vladimir Lantsev' => [2, 12, 9, 1, 3, 1, 1, 6, 7],
    'Marianna Valerianovna' => [12, 9, 1, 10, 9, 7, 6, 6, 7],
    'Palych' => [2, 2, 4, 1, 5, 1, 12, 6, 7]
];

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

