<?php
class Kendaraan
{
    public $merk;
    public $tahun;
    public $warna;
    public $kecepatanMaksimal;
    public $jenisKendaraan;

    public function __construct($merk, $tahun, $warna, $kecepatanMaksimal, $jenisKendaraan)
    {
        $this->merk = $merk;
        $this->tahun = $tahun;
        $this->warna = $warna;
        $this->kecepatanMaksimal = $kecepatanMaksimal;
        $this->jenisKendaraan = $jenisKendaraan;
    }

    public function infoKendaraan()
    {
        return "Merk: $this->merk, Tahun: $this->tahun, Warna: $this->warna, Kecepatan Maksimal: $this->kecepatanMaksimal km/jam, Jenis Kendaraan: $this->jenisKendaraan";
    }
}

class Mobil extends Kendaraan
{
    public $jenisBahanBakar;
    public $jumlahPintu;
    public $jumlahBan;
    public $tipe;
    public $kapasitasMesin;
    public $transmisi;
    public $harga;

    public function __construct($merk, $tahun, $warna, $kecepatanMaksimal, $jenisKendaraan, $jenisBahanBakar, $jumlahPintu, $jumlahBan, $tipe, $kapasitasMesin, $transmisi, $harga)
    {
        parent::__construct($merk, $tahun, $warna, $kecepatanMaksimal, $jenisKendaraan);
        $this->jenisBahanBakar = $jenisBahanBakar;
        $this->jumlahPintu = $jumlahPintu;
        $this->jumlahBan = $jumlahBan;
        $this->tipe = $tipe;
        $this->kapasitasMesin = $kapasitasMesin;
        $this->transmisi = $transmisi;
        $this->harga = $harga;
    }

    public function infoMobil()
    {
        $hargaRupiah = number_format($this->harga, 0, ',', '.');
        return parent::infoKendaraan() . ", Jenis Bahan Bakar: $this->jenisBahanBakar, Jumlah Pintu: $this->jumlahPintu, Jumlah Ban: $this->jumlahBan, Tipe: $this->tipe, Kapasitas Mesin: $this->kapasitasMesin cc, Transmisi: $this->transmisi, Harga: Rp. $hargaRupiah";
    }
}

$mobilSaya = new Mobil("Toyota", 2020, "Merah", 180, "Mobil Pribadi", "Bensin", 4, 4, "SUV", 2000, "Otomatis", 350000000);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container my-5">
        <h3 class="mb-3">Daftar Info Mobil</h3>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Tahun</th>
                        <th>Warna</th>
                        <th>Kecepatan Maksimal</th>
                        <th>Jenis Kendaraan</th>
                        <th>Jenis Bahan Bakar</th>
                        <th>Jumlah Pintu</th>
                        <th>Jumlah Ban</th>
                        <th>Tipe</th>
                        <th>Kapasitas Mesin</th>
                        <th>Transmisi</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $mobilSaya->merk; ?></td>
                        <td><?php echo $mobilSaya->tahun; ?></td>
                        <td><?php echo $mobilSaya->warna; ?></td>
                        <td><?php echo $mobilSaya->kecepatanMaksimal; ?> km/jam</td>
                        <td><?php echo $mobilSaya->jenisKendaraan; ?></td>
                        <td><?php echo $mobilSaya->jenisBahanBakar; ?></td>
                        <td><?php echo $mobilSaya->jumlahPintu; ?></td>
                        <td><?php echo $mobilSaya->jumlahBan; ?></td>
                        <td><?php echo $mobilSaya->tipe; ?></td>
                        <td><?php echo $mobilSaya->kapasitasMesin; ?> cc</td>
                        <td><?php echo $mobilSaya->transmisi; ?></td>
                        <td>Rp. <?php echo number_format($mobilSaya->harga, 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
            <small><b>Info Mobil:</b> <?= $mobilSaya->infoMobil() ?></small>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>