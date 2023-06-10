<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../login/login.php");
    exit;
}
require '../function/functions_keltani.php';
// id hasil ini nanti bakalan dimasukan kedalam tabel tb_detil_hasiltani
// tapi kan yang bikin saya bingung nanti kan harus di 
$id_hsl = $_GET['id'];
// var_dump($id_hsl);
// exit;

$tanggal = $_GET['tanggal'];
$satuan = $_GET['satuan'];

// For back
$id_kom = $_GET['id_kom'];
$jenis_komoditi = $_GET['jenis_komoditi'];

// Pagination
// Pagination
$jumlahDataPerHalaman = 5; 
$jumlahData = count(query("SELECT tb_keltani.*, tb_detil_hasiltani.jml_tani, tb_desa.nm_desa
                            FROM tb_keltani
                            INNER JOIN tb_detil_hasiltani ON tb_keltani.id_kel = tb_detil_hasiltani.id_kel
                            LEFT JOIN tb_desa ON tb_detil_hasiltani.id_desa = tb_desa.id_desa
                            WHERE tb_detil_hasiltani.id_hsl = $id_hsl"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;



// SELECT tb_keltani.nama_kel, tb_detil_hasiltani.jml_tani, tb_keltani.no_wa FROM tb_keltani INNER JOIN tb_detil_hasiltani ON tb_keltani.id_kel = tb_detil_hasiltani.id_kel WHERE tb_detil_hasiltani.id_hsl = 25;
// $detil_hasiltani = query("SELECT * FROM tb_keltani 
//                             INNER JOIN tb_detil_hasiltani ON tb_keltani.id_kel = tb_detil_hasiltani.id_kel 
//                             WHERE tb_detil_hasiltani.id_hsl = $id_hsl
//                             LIMIT $awalData, $jumlahDataPerHalaman");

$detil_hasiltani = query("SELECT tb_keltani.*, tb_detil_hasiltani.*, tb_desa.*
                        FROM tb_keltani
                        INNER JOIN tb_detil_hasiltani ON tb_keltani.id_kel = tb_detil_hasiltani.id_kel
                        LEFT JOIN tb_desa ON tb_detil_hasiltani.id_desa = tb_desa.id_desa
                        WHERE tb_detil_hasiltani.id_hsl = $id_hsl
                        ORDER BY tb_detil_hasiltani.id_detil DESC
                        LIMIT $awalData, $jumlahDataPerHalaman");

// var_dump($detil_hasiltani);


// var_dump($detil_hasiltani);
// Menampilkan nilai total IFNULL(SUM(tb_detil_hasiltani.jml_tani), 0)
$total_tani = query("SELECT IFNULL(SUM(jml_tani),0) AS total FROM tb_detil_hasiltani WHERE id_hsl = $id_hsl");
// var_dump($detil_hasiltani);
// exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok Tani</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Hasil Tani - <?= date('d F Y', strtotime($tanggal)) ?> - Komoditi <?= $jenis_komoditi ?></h3>
        <br>

        

        <table class="table table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kelompok Tani</th>
                    <th>Desa</th>
                    <th>Jumlah (<?= $satuan ?>)</th>
                    <th>No-Wa</th>
                    <th class="text-center">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($detil_hasiltani as $row) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['nama_kel'] ?></td>
                        <td><?= $row['nm_desa']?></td>
                        <td><?= $row['jml_tani'] ?></td>
                        <td><?= $row['no_wa'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-danger">
                                <a href="crud/hapus.php?id=<?= $id_hsl ?>&tanggal=<?= $tanggal ?>&id_kel=<?= $row['id_kel'] ?>&satuan=<?= $satuan ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>" style="color: white;">Hapus</a>
                            </button>
                            <button class="btn btn-primary">
                                <a href="crud/ubah.php?id=<?= $id_hsl ?>&tanggal=<?= $tanggal ?>&id_kel=<?= $row['id_kel'] ?>&satuan=<?= $satuan ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>&id_desa= <?= $row['id_desa']?>&id_detil=<?= $row['id_detil']?>" style="color: white;">Ubah</a>
                            </button>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">
                        Total
                    </td>
                    <td colspan="3">
                        <?php foreach ($total_tani as $row) : ?>
                            <?= $row['total'] ?>
                        <?php endforeach; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php if ($jumlahHalaman > 1) : ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($halamanAktif > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>&id=<?= $id_hsl ?>&tanggal=<?= $tanggal ?>&satuan=<?= $satuan ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>">&laquo;</a>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item active">
                                <a class="page-link" href="?halaman=<?= $i ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_hsl ?>&tanggal=<?= $tanggal ?>&satuan=<?= $satuan ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>"><?= $i ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $i ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_hsl ?>&tanggal=<?= $tanggal ?>&satuan=<?= $satuan ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>"><?= $i ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>&id=<?= $id_hsl ?>&tanggal=<?= $tanggal ?>&satuan=<?= $satuan ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>">&raquo;</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <br>
        <?php endif; ?>
        <br>
        <button class="btn btn-primary" name="tambah">
            <a href="crud/tambah.php?id_hsl=<?= $id_hsl ?>&tanggal=<?= $tanggal ?>&satuan=<?= $satuan ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>" style="color: white;">Tambah</a>
        </button>
        <button class="btn btn-secondary">
            <a href="../hasil_tani/index.php?id=<?= $id_kom ?>&komoditi=<?= $jenis_komoditi ?>" style="color: white;">Kembali</a>
        </button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
