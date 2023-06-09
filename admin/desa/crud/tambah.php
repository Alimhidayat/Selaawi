<?php
require '../function/functions.php';

if (isset($_POST['tambah'])) {
    // var_dump($_POST);
    // var_dump(tambah($_POST));
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Desa baru telah ditambahkan');
            document.location.href='../index.php';
        </script>
        ";
    } else{
        echo "
        <script>
            alert('Desa gagal ditambahkan');
            document.location.href='../index.php';
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
    <title>Tambah Desa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2 class="mt-4 mb-5 text-center">Halaman Tambah Desa</h2>
        <form action="" method="post">
            <div class="form-group row">
                <label for="nm_desa" class="col-sm-2">Nama Desa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nm_desa" id="nm_desa" required>
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary" name="tambah" class="">Tambah</button>
            </center>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
