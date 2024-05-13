<?php
function salam($nama, $suasana) {
    echo "Selamat siang $nama!<br>Saya lagi $suasana<br>";
}

function tampilGanjil($awal, $akhir) {
    for ($i = $awal; $i <= $akhir; $i++) {
        if ($i % 2 !== 0) {
            echo $i . " ";
        }
    }
}

function tampilGenap($awal, $akhir) {
    for ($i = $awal; $i <= $akhir; $i++) {
        if ($i % 2 === 0) {
            echo $i . " ";
        }
    }
}

function kalkulator($num1, $num2, $operator) {
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '/':
            if ($num2 == 0) {
                return "Tidak bisa dibagi nol";
            }
            return $num1 / $num2;
        case '*':
            return $num1 * $num2;
        default:
            return "Operator salah";
    }
}
