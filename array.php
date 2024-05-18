<?php
$fruits = [1, 2, 3, 5];
$fruits[0] = "Hijau";
$fruits[2] = "Hijau";
print_r($fruits);

echo "<br>";
echo count($fruits);
echo "<br>";

array_push($fruits, 'mangga', 'apple');
print_r($fruits);
echo "<br>";

var_dump(in_array("Hijau", $fruits));
echo "<br>";

$last = array_pop($fruits);
print_r($fruits);
echo "<br>";
echo $last;

unset($fruits);
echo "<br>";
print_r($fruits);
echo "<br>";
echo $_SERVER["HTTP_HOST"];
