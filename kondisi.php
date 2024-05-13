<?php
$nilai1 = 10;
$nilai2 = 10;

if ($nilai1 < $nilai2) {
    echo "Nilai 1 lebih kecil dari nilai 2";
} elseif ($nilai1 > $nilai2) {
    echo "Nilai 1 lebih besar dari nilai 2";
} elseif ($nilai1 == $nilai2) {
    echo "Nilai 1 sama dengan nilai 2";
} elseif ($nilai1 >= $nilai2) {
    echo "Nilai 1 lebih besar dari sama dengan nilai 2";
} else {
    echo "Jawaban tidak diketahui";
}

echo "<br>";

$day = date('D');
echo "Hari ini adalah $day";

if ($day == "Sat") {
    echo "Kelas Jarvis Dimulai!";
} elseif ($day == "Sun") {
    echo "Kelas Jarvis Dimulai!";
} elseif ($day == "Mon") {
    echo "Kelas Jarvis Libur!";
} else {
    echo "Jawaban tidak diketahui!";
}
