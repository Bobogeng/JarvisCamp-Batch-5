<?php
session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$barangErr = $hargaErr = $deskripsiErr = $stokErr = '';
$barang = $harga = $deskripsi = $stok = '';
$validationPassed = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['barang'])) {
        $barangErr = 'Nama barang tidak boleh kosong!';
        $validationPassed = false;
    } else {
        $barang = test_input($_POST['barang']);
    }
    if (empty($_POST['harga'])) {
        $hargaErr = 'Harga barang tidak boleh kosong!';
        $validationPassed = false;
    } else {
        $harga = test_input($_POST['harga']);
    }
    if (empty($_POST['deskripsi'])) {
        $deskripsiErr = 'Deskripsi barang tidak boleh kosong!';
        $validationPassed = false;
    } else {
        $deskripsi = test_input($_POST['deskripsi']);
    }
    if (empty($_POST['stok'])) {
        $stokErr = 'Stok barang tidak boleh kosong!';
        $validationPassed = false;
    } else {
        $stok = test_input($_POST['stok']);
    }
    if ($validationPassed) {
        $_SESSION['products'][] = [
            'Barang' => $barang,
            'Harga' => $harga,
            'Deskripsi' => $deskripsi,
            'Stok' => $stok
        ];
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Form Processing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <main class="container my-5">
        <h3>Form Produk</h3>
        <hr />
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div class="form-group row">
                <label for="barang" class="col-4 col-form-label">Nama Barang</label>
                <div class="col-8">
                    <input id="barang" name="barang" placeholder="Masukkan nama barang" type="text" class="form-control" value="<?= $barang ?>">
                    <small class="text-danger"><?= $barangErr ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-4 col-form-label">Harga</label>
                <div class="col-8">
                    <input id="harga" name="harga" placeholder="Masukkan harga barang" type="number" class="form-control" value="<?= $harga ?>">
                    <small class="text-danger"><?= $hargaErr ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                <div class="col-8">
                    <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control"><?= $deskripsi ?></textarea>
                    <small class="text-danger"><?= $deskripsiErr ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-4 col-form-label">Stok</label>
                <div class="col-8">
                    <input id="stok" name="stok" placeholder="Masukkan stok barang" type="number" class="form-control" value="<?= $stok ?>">
                    <small class="text-danger"><?= $stokErr ?></small>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </main>
</body>

</html>