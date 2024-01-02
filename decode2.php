
<?php

function is_staircase($nums)
{
    $col_length = 0;
    $staircase = [];
    $input_list = $nums;
    while (!empty($input_list)) {
        $col_length++;
        $column = array_splice($input_list, 0, $col_length);
        if (count($column) < $col_length) {
            return false;
        }
        $staircase[] = $column;
    }
    return $staircase;
}

function decode($file)
{
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    $arr = [];
    foreach ($lines as $line) {
        $key = explode(' ', $line);
        $arr[$key[0]] = $key[1];
    }
    ksort($arr);
    return $arr;
}

try {
    $arr = decode('message_file.txt');
    $last_array = is_staircase($arr);
    if ($last_array === false) {
        echo "Input is not a staircase";
    } else {
        foreach ($last_array as $key => $element) {

            if ($key === key(array_slice($last_array, -1, 1, true))) {
                echo $element[sizeof($element) - 1];
            } else {
                echo $element[sizeof($element) - 1] . ' ';
            }
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
