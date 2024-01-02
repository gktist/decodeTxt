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
    $arr = [];
    $handle = fopen($file, 'r');
    if ($handle === false) {
        throw new Exception("Failed to open file");
    }
    while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        $key = explode(' ', $line);
        $arr[$key[0]] = $key[1];
    }
    fclose($handle);
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




echo "<br>";
echo "<br>";
echo "<br>";





$message_file = "message_file.txt";

function loadData($filename)
{
    $myFile = fopen($filename, "r") or die("Unable to open file!");

    while (!feof($myFile)) {
        $line = explode(" ", fgets($myFile), 2);
        $lines[$line[0]] =  $line[1];
    }

    fclose($myFile);

    return $lines;
}

function getLastWords($words)
{
    $level = 1;
    $lastWords = array();

    while (true) {
        for ($i = 0; $i < $level; $i++) {
            if (count($words) > 0)
                $lastWord = array_shift($words);
            else
                return $lastWords;
        }
        $lastWords[] = $lastWord;
        $level++;
    }
}

function decode2($message_file)
{
    $words = loadData($message_file);

    ksort($words);

    return implode(" ", getLastWords($words));
}

echo decode2($message_file);
