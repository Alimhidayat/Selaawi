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


function tambah($data){
    global $conn; 

    $album = htmlspecialchars($data['album']);

    // CEK APAKAH Album TERSEBUT SUDAH ADA
    $result = mysqli_query($conn, "SELECT album from tb_album WHERE album = '$album'");

    if ( mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Album $album sudah ada');
        </script>
        ";
        return false;
    }
    $query = "INSERT INTO tb_album
                VALUES 
                ('', '$album')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


    
}
function ubah($data){
    global $conn; 
    $id_album = $data['id_album'];
    $album = htmlspecialchars($data['album']);
    $album_awal = htmlspecialchars($data['album_awal']);

    if ($album == $album_awal) {
        $album = $album_awal;
    } else {
        $query = "SELECT * FROM tb_album WHERE album = '$album'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "
            <script>
                alert('Album sudah ada');
            </script>
            ";
            return false;
        }
    }

    $query = "UPDATE tb_album SET
                    album = '$album'
                    WHERE id_album = $id_album";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn; 
    $query = "DELETE FROM tb_album WHERE id_album = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>