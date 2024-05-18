<?php
session_start();

require_once 'produk.php';

$new_products = $_SESSION['products'] ?? [];
$list_products = array_merge($products, $new_products);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <main class="container my-5">
        <h3 class="mb-3">Daftar Produk</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_products as $product) { ?>
                        <tr>
                            <td><?= $product['Barang'] ?></td>
                            <td><?= number_format($product['Harga'], 0, ',', '.'); ?></td>
                            <td><?= $product['Deskripsi'] ?></td>
                            <td><?= $product['Stok'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>