<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../login/login.php");
    exit;
}
require '../function/functions_indel.php';
// echo $id;

$jenis_komoditi = $_GET['komoditi'];
$id_kom = $_GET['id'];

// mengambil data hasil tani
// $hasil_tani = query("SELECT * FROM tb_hasiltani WHERE id_kom=$id_kom");

// Pagination
$jumlahDataPerHalaman = 5; 
$jumlahData = count(query("SELECT tb_hasiltani.*, IFNULL(SUM(tb_detil_hasiltani.jml_tani), 0) AS jumlah
                            FROM tb_hasiltani
                            LEFT JOIN tb_detil_hasiltani ON tb_hasiltani.id_hsl = tb_detil_hasiltani.id_hsl
                            WHERE tb_hasiltani.id_kom = $id_kom
                            GROUP BY tb_hasiltani.id_hsl"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    



$hasil_tani = query("SELECT tb_hasiltani.*, IFNULL(SUM(tb_detil_hasiltani.jml_tani), 0) AS jumlah
                        FROM tb_hasiltani
                        LEFT JOIN tb_detil_hasiltani ON tb_hasiltani.id_hsl = tb_detil_hasiltani.id_hsl
                        WHERE tb_hasiltani.id_kom = $id_kom
                        GROUP BY tb_hasiltani.id_hsl 
                        ORDER BY tb_hasiltani.tanggal DESC
                        LIMIT $awalData, $jumlahDataPerHalaman");

// var_dump($hasil_tani);

// var_dump($hasil_tani);
// exit;

// INI BELUM BERHASIL JUGA 
// if (isset($_POST['cari'])) {
//     $keywords = $_POST['keyword'];
//     // echo $keywords;
//     $hasil_tani = "SELECT * FROM tb_hasiltani WHERE id_kom = $id_kom";
// }
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $hasil_tani = query("SELECT tb_hasiltani.*, IFNULL(SUM(tb_detil_hasiltani.jml_tani), 0) AS jumlah
                            FROM tb_hasiltani
                            LEFT JOIN tb_detil_hasiltani ON tb_hasiltani.id_hsl = tb_detil_hasiltani.id_hsl
                            WHERE tb_hasiltani.id_kom = $id_kom AND tb_hasiltani.tanggal LIKE '%$keyword%'
                            GROUP BY tb_hasiltani.id_hsl 
                            ORDER BY tb_hasiltani.tanggal DESC
                            LIMIT $awalData, $jumlahDataPerHalaman");
}

// Menjumlahkan semua nilai yang ada pada kolom jml_tani dio tb_detil_hasiltani berdasarkan id_hsl
// $jumlah = query("SELECT id_hsl, SUM(jml_tani) AS total
// FROM tb_detil_hasiltani
// GROUP BY id_hsl");
// var_dump($jumlah);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Hasil Tani</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5">Hasil Tani untuk komoditi <?= $jenis_komoditi ?></h2>
        <!-- Untuk mencari berdasarkan kategori tahun -->
        <form class="form-inline" action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="keyword" size="25" autofocus placeholder="2023-05-29" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="cari">Cari</button>
        </form>
        <br>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Edit</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Kelompok Tani</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($hasil_tani as $row) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>
                            <a class="btn btn-danger" href="crud/hapus.php?id=<?= $row['id_hsl'] ?>&jenis_komoditi=<?= $jenis_komoditi ?>&id_komo=<?= $id_kom ?>" onclick="return confirm('Yakin akan menghapus?')">Hapus</a>
                            <a class="btn btn-primary" href="crud/ubah.php?id=<?= $row['id_hsl'] ?>&jenis_komoditi=<?= $jenis_komoditi ?>&id_komo=<?= $id_kom ?>&satuan=<?= $row['satuan'] ?>" onclick="return confirm('Yakin akan Mengubah?')">Ubah</a>
                        </td>
                        <td><?= date('d F Y', strtotime($row['tanggal'])) ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td><?= $row['satuan'] ?></td>
                        <td><a href="../kel_tani/index.php?id=<?= $row['id_hsl'] ?>&tanggal=<?= $row['tanggal'] ?>&satuan=<?= $row['satuan'] ?>&id_kom=<?= $id_kom ?>&jenis_komoditi=<?= $jenis_komoditi ?>">Kelompok Tani</a></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Awal Pagination -->
        <?php if ($jumlahHalaman > 1) : ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($halamanAktif > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_kom ?>">&laquo;</a>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item active">
                                <a class="page-link" href="?halaman=<?= $i ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_kom ?>"><?= $i ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $i ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_kom ?>"><?= $i ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>&komoditi=<?= $jenis_komoditi ?>&id=<?= $id_kom ?>">&raquo;</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <br>
        <?php endif; ?>
        <!-- Akhir Pagination -->

        <button class="btn btn-primary" style="margin: 20px;"><a href="crud/tambah.php?jenis_komoditi=<?= $jenis_komoditi ?>&id_komo=<?= $id_kom ?>" style="text-decoration:none; color:white;">Tambah Hasil Tani</a></button>

        <button class="btn btn-secondary" style="margin: 20px;"><a href="../index.php" style="text-decoration:none; color:white;">Kembali</a></button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
