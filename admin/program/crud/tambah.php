<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../../login/login.php");
	exit;
}

require "../function/functions.php";



if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Program berhasil ditambahkan');
            document.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('program gagal ditambahkan');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Tambah Program BPP Selaawi</title>
</head>

<body>
    <h3 class="mt-4 mb-3 text-center">Tambah Program</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar" name="gambar"
                        onchange="showFileName(this)">
                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                </div>
                <p id="file-name"></p>
            </div>

            <div class="form-group">
                <label for="judul_prog">Judul Program</label>
                <input type="text" name="jud_prog" class="form-control" id="judul_prog">
            </div>
            <div class="form-group">
                <label for="konten_prog">Konten Program</label>
                <textarea id="konten_prog" name="konten_prog" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah Program</button>
        </div>
    </form>


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