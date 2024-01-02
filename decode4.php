<?php

function txtFileRows_to_Array($file)
{
    $message = file_get_contents($file);
    $lines = explode("\n", $message);

    foreach ($lines as $line) {
        $key_value = explode(' ', $line);
        $txtRowsArray[$key_value[0]] = $key_value[1];
    }
    ksort($txtRowsArray);
    return $txtRowsArray;
}

function get_staircase_numbers_of_array($txtRowsArray)
{
    $temp = 0;
    $i = array_key_first($txtRowsArray);
    for ($i; $temp + $i <= sizeof($txtRowsArray) - $i; $i++) {
        //
        $temp += $i;
        $get_staircase_numbers_array[] = $temp;
    }
    return $get_staircase_numbers_array;
}

function get_staircase_values_from_txt($txtRowsArray)
{
    $staircase_numbers_of_array = get_staircase_numbers_of_array($txtRowsArray);
    foreach ($staircase_numbers_of_array as $key => $value) {
        echo $txtRowsArray[$value] . ' ';
    }
}

$txtRowsArray = txtFileRows_to_Array('message_file.txt');
get_staircase_values_from_txt($txtRowsArray);


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


$testArray = array('proto', 'deyt', 'trit', 'tet', 'pempt', 'ekto');
get_staircase_values_from_txt($testArray, get_staircase_numbers_of_array($testArray));


/* test sync with github renamed */
