<?php if ($_SERVER['REQUEST_METHOD'] == "POST") { ?>
    <table>
        <tbody>
            <tr>
                <td>Nama</td>
                <td>: <?= $_POST['nama'] ?></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>: <?= $_POST['tmp_lahir'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?= $_POST['tgl_lahir'] ?></td>
            </tr>
        </tbody>
    </table>
<?php
} else {
    header('Location: form.php');
}
