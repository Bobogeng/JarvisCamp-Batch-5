<?php
for ($i = 0; $i < 10; $i++) {
    echo "$i ";
}

echo '<br>';

$a = 1;
while ($a < 10) {
    echo "$a ";
    $a++;
}

echo '<br>';

$b = 0;
do {
    $b++;
    echo "$b ";
} while ($b <= 10);

echo '<br>';

$array = ["Irsal", "Fathi", "Farhat"];

$array2 = [
    [
        "Nama" => "Irsal",
        "Domisili" => "Depok",
        "Umur" => 20
    ]
];

foreach ($array as $key => $value) {
    ++$key;
    echo "$key - $value<br>";
}
