<?php

function is_staircase($nums)
{
    $col_length = 0;
    $staircase = [];
    $index = 0;
    while ($index < count($nums)) {
        $col_length++;
        $column = array_slice($nums, $index, $col_length);
        if (count($column) < $col_length) {
            return false;
        }
        $staircase[] = $column;
        $index += $col_length;
    }
    return $staircase;
}

function decode($file)
{
    $contents = file_get_contents($file);
    $lines = explode("\n", $contents);
    $arr = array_combine(array_column(array_map('explode', array_fill(0, count($lines), ' '), $lines), 0), array_column(array_map('explode', array_fill(0, count($lines), ' '), $lines), 1));
    ksort($arr);
    return $arr;
}

$arr = decode('message_file.txt');
$last_array = is_staircase($arr);
if ($last_array === false) {
    echo "Input is not a staircase";
} else {
    $last_key = key(array_slice($last_array, -1, 1, true));
    foreach ($last_array as $key => $element) {
        echo $element[sizeof($element) - 1] . ($key === $last_key ? '' : ' ');
    }
}
