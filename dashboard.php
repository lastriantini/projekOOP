<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$connObj = new Connection();
$conn = $connObj->getConnection();

$functions = new Functions($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];
    $nilai4 = $_POST['nilai4'];
    $nilai5 = $_POST['nilai5'];
    $nilai6 = $_POST['nilai6'];

    $functions->insertData($nama, $nis, $nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);

    $total = $functions->Total($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
    $rata = $functions->Rata($total);
    $max = $functions->cariMax($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
    $min = $functions->cariMin($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
    $grade = $functions->cariGrade($rata);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
</head>

<body>
    <form action="" method="POST">
        <center>
          <h1>Daftar Pengisian Nilai</h1>
          <br>
            <div class="container">
                <h2>Silahkan Isi Format Berikut</h2>
                <hr><br>
                <label>Nama</label><br>
                <input type="text" name="nama" required><br>
                <label>NIS</label><br>
                <input type="text" name="nis" required><br>
                <label for="nilai1">PIPAS</label><br>
                <input type="number" name="nilai1" min="0" max="100" required><br>
                <label for="nilai2">PJOK</label><br>
                <input type="number" name="nilai2"min="0" max="100"  required><br>
                <label for="nilai3">B.inggris</label><br>
                <input type="number" name="nilai3" min="0" max="100" required><br>
                <label for="nilai4">B.indo</label><br>
                <input type="number" name="nilai4" min="0" max="100" required><br>
                <label for="nilai5">MTK</label><br>
                <input type="number" name="nilai5" min="0" max="100" required><br>
                <label for="nilai6">Produktif</label><br>
                <input type="number" name="nilai6" min="0" max="100" required><br>
                <br>
                <div class="button">
                    <button type="submit" name="submit">Submit</button>
                </div>
            </center>
        </div>
    </form>

    <br><br><br>
    <button><a href="logout.php">Keluar</a></button>
    <center>
        <?php if (isset($total)) : ?>
            <h2>Hasil Perhitungan</h2>
            <hr><br>
            <p>Nilai Total: <?php echo $total; ?></p>
            <p>Nilai Rata-Rata: <?php echo $rata; ?></p>
            <p>Nilai Maksimum: <?php echo $max; ?></p>
            <p>Nilai Minimum: <?php echo $min; ?></p>
            <p>Nilai Grade: <?php echo $grade; ?></p>
        <?php endif; ?>
    </center>
</body>
</html>