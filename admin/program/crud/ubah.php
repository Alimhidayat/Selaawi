<?php
require "../function/functions.php";

$id_prog = $_GET['id_prog'];
// var_dump($id_prog);
$program = query("SELECT * FROM tb_program WHERE id_prog = $id_prog")[0];

if (isset($_POST['ubah'])) {
    // var_dump(ubah($_POST));
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Program berhasil diubah');
            document.location.href = '../index.php';
        </script>
        ";
    } elseif (ubah($_POST) == 0) {
        echo "
        <script>
            alert('Tidak terjadi perubahan pada program');
            document.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('program gagal diubah');
            document.location.href = '../index.php';
        </script>
        ";

    }
    // var_dump($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Ubah Program BPP Selaawi</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Ubah Program</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_prog" value="<?= $program['id_prog'] ?>">
            <input type="hidden" name="gambar_lama" value="<?= $program['gmbr_prog'] ?>">
            <input type="hidden" name="judul_lama" value="<?= $program['jud_prog'] ?>">

            <div class="form-group">
                <div class="mb-3">
                    <img src="../assets/img/<?= $program['gmbr_prog'] ?>" alt="" style="width: 250px"
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
                <label for="jud_prog">Judul Program</label>
                <input type="text" class="form-control" id="jud_prog" name="jud_prog"
                    value="<?= $program['jud_prog'] ?>">
            </div>
            <div class="form-group">
                <label for="konten_prog">Konten Program</label>
                <textarea class="form-control" id="konten_prog"
                    name="konten_prog"><?= $program['konten_prog'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="ubah">Ubah Program</button>
    </div>

    <script src="../../../assets/plugin/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('konten_prog');
    </script>
    <script>
        function showFileName(input) {
            var fileName = input.files[0].name;
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    </form>
</body>

</html>