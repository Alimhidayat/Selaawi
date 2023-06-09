<?php
// Melakukan koneksi
require_once __DIR__."../../../koneksi.php";


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
    
    $judul_inf = htmlspecialchars($data['judul_inf']);
    $konten_inf = $data['konten_inf'];
    $tanggal_inf = $data['tanggal_inf'];

    // CEK APAKAH JUDUL TERSEBUT SUDAH ADA
    $result = mysqli_query($conn, "SELECT judul_inf from tb_informasi WHERE judul_inf = '$judul_inf'");

    if ( mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Informasi dengan judul $judul_inf sudah tersedia');
        </script>
        ";
        return false;
    }

    // upload gambar
    $gambar = upload();
    // if ($gambar == false)
    // if (!$gambar ) {
    //     return false;
    // }

    $query = "INSERT INTO tb_informasi 
                VALUES
                ('', '$judul_inf', '$konten_inf', '$gambar', '$tanggal_inf')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // Cek apakah gambar tidak di upload
    // if ($error == 4) {
    //     echo "<script>
    //         alert('Anda tidak memilih gambar');
    //     </script>";
    //     return 'default.jpeg';
    // }

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
    move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

    return $namaFileBaru;

}

function ubah($data){
    global $conn; 

    $id_inf = $data['id_inf'];
    $judul_inf = htmlspecialchars($data['judul_inf']);
    $konten_inf = $data['konten_inf'];
    $tanggal_inf = $data['tanggal_inf'];
    // judul_lama
    $judul_lama = htmlspecialchars($data['judul_lama']);

    // gambar_lama
    $gambar_lama = $data['gambar_lama'];

     // JIKA TIDAK ADA PERUBAHAN JUDUL
     if ($judul_inf == $judul_lama) {
        $judul_inf = $judul_lama;
    } else{
        // CEK APAKAH JUDUL TERSEBUT SUDAH ADA
        $result = mysqli_query($conn, "SELECT judul_inf from tb_informasi WHERE judul_inf = '$judul_inf'");

        if ( mysqli_fetch_assoc($result)) {
            echo "
            <script>
                alert('Informasi dengan judul $judul_inf sudah tersedia');
            </script>
            ";
            return -1;
        }
    }

    

    // upload gambar
   // cek apakah user memilih gambar baru atau tidak
   if($_FILES['gambar']['error'] == 4){
        $gambar = $gambar_lama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE tb_informasi SET
                gambar = '$gambar',
                judul_inf = '$judul_inf',
                konten_inf = '$konten_inf',
                tanggal_inf = '$tanggal_inf'
                WHERE id_inf = $id_inf";
    
    mysqli_query($conn, $query);
    

    return mysqli_affected_rows($conn);

}



function hapus($id){
    global $conn; 

    $query = "DELETE FROM tb_informasi WHERE id_inf = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}