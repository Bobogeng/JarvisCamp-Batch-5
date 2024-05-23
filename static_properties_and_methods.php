<?php
class Kucing
{
    public $warna;
    public $corak;
    public $warna_mata;
    public static $jumlah_kucing = 0;

    public function __construct($warna, $corak, $warna_mata)
    {
        self::$jumlah_kucing++;
        $this->warna = $warna;
        $this->corak = $corak;
        $this->warna_mata = $warna_mata;
    }

    public function meow()
    {
        echo "Meow...";
    }

    public function makan()
    {
        echo "Kucing " . $this->warna . " sedang makan...";
    }

    public function tidur()
    {
        echo "Kucing " . $this->warna . " sedang tidur...";
    }
}

$oyen = new Kucing("oren", "belang", "kuning");

$oyen->meow();
$oyen->makan();
$oyen->tidur();

$bleki = new Kucing("hitam", "polos", "kuning");

$bleki->meow();
$bleki->makan();
$bleki->tidur();

echo Kucing::$jumlah_kucing;
