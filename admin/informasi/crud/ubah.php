<?php
require "../function/functions.php";
$id_inf = $_GET['id_inf'];

$tb_informasi = query("SELECT * FROM tb_informasi WHERE id_inf = $id_inf")[0];


if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Konten Informasi Berhasil Diubah');
            document.location.href = '../index.php';
        </script>
        ";
    } elseif (ubah($_POST) == 0) {
        echo "
        <script>
            alert('Tidak ada perubahan Konten Informasi');
            document.location.href = '../index.php';
        <script>
        ";
    }
    else {
        echo "
        <script>
            alert('Konten Informasi Gagal Diubah');
            document.location.href = '../index.php';
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
    <title>Ubah Artikel Informasi</title>
</head>
<body>
    <div class="container">
        <h3 class="mt-4 mb-3 text-center">Ubah Informasi Artikel</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?=$tb_informasi['gambar']?>" name="gambar_lama">
            <input type="hidden" value="<?=$tb_informasi['judul_inf']?>" name="judul_lama">
            <input type="hidden" value="<?=$tb_informasi['id_inf']?>" name="id_inf">
            <div class="form-group">
                <div class="mb-3">
                    <img src="../assets/img/<?= $tb_informasi['gambar'] ?>" alt="" style="width: 250px"
                        class="img-thumbnail">
                </div>
                <label for="gambar">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar" name="gambar"
                        onchange="showFileName(this)">
                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                </div>
                <p id="file-name"></p>
            </div>
            <div class="form-group">
                <label for="tanggal_inf">Tanggal</label>
                <input type="date" class="form-control" id="tanggal_inf" name="tanggal_inf" value="<?=$tb_informasi['tanggal_inf']?>">
            </div>
            <div class="form-group">
                <label for="judul_inf">Judul Informasi</label>
                <input type="text" class="form-control" id="judul_inf" name="judul_inf" value="<?=$tb_informasi['judul_inf']?>">
            </div>
            <div class="form-group">
                <label for="konten_inf">Konten Informasi</label>
                <textarea class="form-control" id="konten_inf" name="konten_inf" rows="5"><?=$tb_informasi['konten_inf']?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="ubah">Ubah Informasi</button>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('konten_inf');
    </script>
    <script>
        function showFileName(input) {
            var fileName = input.files[0].name;
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

