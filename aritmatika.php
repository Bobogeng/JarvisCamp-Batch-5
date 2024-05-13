<?php
require_once "lib/function.php";

$nilai1 = 10;
$nilai2 = 3;

echo "$nilai1 x $nilai2 = " . $nilai1 * $nilai2;
echo "<br>";

echo "$nilai1 + $nilai2 = " . $nilai1 + $nilai2;
echo "<br>";

echo "$nilai1 / $nilai2 = " . $nilai1 / $nilai2;
echo "<br>";

echo "$nilai1 - $nilai2 = " . $nilai1 - $nilai2;
echo "<br>";

echo "$nilai1 % $nilai2 = " . $nilai1 % $nilai2;
echo "<br>";

$awal = 1;
$akhir = 10;
echo "Bilangan ganjil diantara $awal dan $akhir : ";
tampilGanjil($awal, $akhir);
echo "<br>";

echo "Bilangan genap diantara $awal dan $akhir : ";
tampilGenap($awal, $akhir);
echo "<br>";

$nilai1 = 10;
$nilai2 = 5;
$operator = '+';
echo "Hasil dari $nilai1 $operator $nilai2 : " . kalkulator($nilai1, $nilai2, $operator);
