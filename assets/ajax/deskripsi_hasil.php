<?php
require "../../admin/function/functions_keltani.php";
$id_hsl = intval($_GET['id_hsl']);
$satuan = $_GET['satuan'];
$komoditi = $_GET['komoditi'];
$id_kom = intval($_GET['id_kom']);


$detil_hasiltani = query("SELECT tb_keltani.*, tb_detil_hasiltani.*, tb_desa.*
                        FROM tb_keltani
                        INNER JOIN tb_detil_hasiltani ON tb_keltani.id_kel = tb_detil_hasiltani.id_kel
                        LEFT JOIN tb_desa ON tb_detil_hasiltani.id_desa = tb_desa.id_desa
                        WHERE tb_detil_hasiltani.id_hsl = $id_hsl
                        ORDER BY tb_detil_hasiltani.id_detil DESC");

// var_dump($detil_hasiltani);


?>

<table class="table table-bordered table-sm">
    <caption class="">Tabel Hasil Kelompok Tani</caption>
    <thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th>Kelompok Tani</th>
            <th>Desa</th>
            <th class="text-center">Jumlah (<?= $satuan ?>)</th>
            <th class="text-center">Kontak WA</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
        <?php foreach ($detil_hasiltani as $row): ?>
            <tr>
                <td class="text-center"><?= $i ?></td>
                <td><?= $row['nama_kel'] ?></td>
                <td><?= $row['nm_desa']?></td>
                <td class="text-center"><?= $row['jml_tani'] ?></td>
                <td class="text-center"><button type="button" class="btn btn-success"><a href="https://wa.me/+<?= $row['no_wa']?>" style="color: white;">Kirim Pesan</a></button></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>

    </tbody>
</table>