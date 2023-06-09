<!-- INSERT dan DELETE -->
<?php
// Melakukan koneksi
require_once __DIR__."../../koneksi.php";

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}

// TAMBAH DATA KOMODITAS
function tambah($data){
    global $conn;
    
    $nama_komo = htmlspecialchars($data['nama_komo']);
    $des_komo = htmlspecialchars($data['des_komo']);

    // CEK APAKAH KOMODITAS TERSEBUT SUDAH ADA
    $result = mysqli_query($conn, "SELECT jenis_kom from tb_komoditas WHERE jenis_kom = '$nama_komo'");

    if ( mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Jenis komoditas tersebut sudah ada');
        </script>
        ";
        return false;
    }

    // upload gambar
    $gambar = upload();
    // if ($gambar == false)
    if (!$gambar ) {
        return false;
    }

    // fungsi untuk nama komoditas yang berbeda

    // $result = query("SELECT * FROM tb_komoditas WHERE jenis_komo ==  '$nama_komo'");
    // return $result;
    // exit;
    

    $query = "INSERT INTO tb_komoditas 
                VALUES
                ('', '$nama_komo', '$des_komo', '$gambar')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // Cek apakah gambar tidak di upload
    if ($error == 4) {
        echo "<script>
            alert('Anda tidak memilih gambar');
        </script>";
        return 'default.jpeg';
    }

    // Cek Ekstensi gambar valid
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Upload Gambar jpg,jpeg atau png');
        </script>";
        return false;
    }

    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    
    // Lolos pengecekan, gambar siap diupload
    move_uploaded_file($tmpName, '../asset/img_komo/' . $namaFileBaru);

    return $namaFileBaru;

}


// HAPUS DATA KOMODITAS
function hapus($id){
    global $conn; 
    mysqli_query($conn, "DELETE FROM tb_komoditas WHERE id_kom = $id");

    return mysqli_affected_rows($conn);
}

// UBAH DATA KOMODITAS
function ubah($data){
    global $conn;

    $id = $data['id_kom'];
    
    $nama_komo = htmlspecialchars($data['nama_komo']);
    $des_komo = htmlspecialchars($data['des_komo']);
    $gambar_lama = $data['gambar_lama'];

    $nama_komo_awal = $data['nama_komo_awal'];

    // JIKA TIDAK ADA PERUBAHAN NAMA KOMODITAS
    if ($nama_komo == $nama_komo_awal) {
        $nama_komo = $nama_komo_awal;
    } else{
        // CEK APAKAH KOMODITAS TERSEBUT SUDAH ADA
        $result = mysqli_query($conn, "SELECT jenis_kom from tb_komoditas WHERE jenis_kom = '$nama_komo'");
        if ( mysqli_fetch_assoc($result)) {
            echo "
            <script>
                alert('Jenis komoditas tersebut sudah ada');
            </script>
            ";
            // $nama_komo = $nama_komo_awal;
            return -1;
        }
    }



    // cek apakah user memilih gambar baru atau tidak
    if($_FILES['gambar']['error'] == 4){
        $gambar = $gambar_lama;
    } else {
        $gambar = upload();
    }



    $query = "UPDATE tb_komoditas SET
                gambar = '$gambar',
                jenis_kom = '$nama_komo',
                des_kom = '$des_komo'
                WHERE id_kom = $id";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// FUNGSI CARI

function cari($keyword){
    $query = "SELECT * FROM tb_komoditas WHERE jenis_kom LIKE '%$keyword%'";
    
    return query($query);
}
?>