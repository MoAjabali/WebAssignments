<?php

$text = "Hello World";

echo $text;
echo "<br>";
echo "---------------------------------";
echo "<br>";

echo strlen($text);
echo "<br>";
echo "---------------------------------";
echo "<br>";

echo str_word_count($text);
echo "<br>";
echo "---------------------------------";
echo "<br>";

echo strrev($text);
echo "<br>";
echo "---------------------------------";
echo "<br>";

echo strtoupper($text);
echo "<br>";
echo "---------------------------------";
echo "<br>";

echo str_replace("World", "PHP", $text);
echo "<br>";
echo "---------------------------------";
echo "<br>";

$arr = ["Red", "Green", "Blue"];

echo "<pre>";
print_r($arr);
echo "</pre>";
echo "<br>";
echo "---------------------------------";
echo "<br>";

echo count($arr);
echo "<br>";
echo "---------------------------------";
echo "<br>";

sort($arr);
echo "<pre>";
print_r($arr);
echo "</pre>";
echo "<br>";
echo "---------------------------------";
echo "<br>";

array_push($arr, "Yellow");
echo "<pre>";
print_r($arr);
echo "</pre>";
echo "<br>";
echo "---------------------------------";
echo "<br>";

$reversed = array_reverse($arr);
echo "<pre>";
print_r($reversed);
echo "</pre>";
echo "<br>";
echo "---------------------------------";
echo "<br>";

$numbers = [5, 10, 15, 20];

$mapped = array_map(function($n) {
    return $n * 2;
}, $numbers);

echo "<pre>";
print_r($mapped);
echo "</pre>";
echo "<br>";
echo "---------------------------------";
echo "<br>";

$filtered = array_filter($numbers, function($n) {
    return $n > 10;
});

echo "<pre>";
print_r($filtered);
echo "</pre>";
echo "<br>";
echo "---------------------------------";
echo "<br>";

?>
