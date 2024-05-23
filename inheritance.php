<?php
class Hewan
{
    protected $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function makan()
    {
        echo "Hewan sedang makan.";
    }

    public function tidur()
    {
        echo "Hewan sedang tidur.";
    }
}

class Kucing extends Hewan
{
    public $warna;
    public $corak;
    public $warna_mata;

    public function __construct($nama, $warna, $corak, $warna_mata)
    {
        parent::__construct($nama);
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
        echo "Kucing " . $this->nama . " sedang makan...";
    }

    public function tidur()
    {
        echo "Kucing " . $this->nama . " sedang tidur...";
    }
}

$oyen = new Kucing("oyen", "oren", "belang", "kuning");

$oyen->meow();
$oyen->makan();
$oyen->tidur();

$bleki = new Kucing("bleki", "hitam", "polos", "kuning");

$bleki->meow();
$bleki->makan();
$bleki->tidur();
