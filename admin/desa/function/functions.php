<!-- INSERT dan DELETE -->
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

    $nm_desa = htmlspecialchars($data['nm_desa']);
    // var_dump($nm_desa);

    // fungsi jika nama desa sudah ada
    // CEK APAKAH KOMODITAS TERSEBUT SUDAH ADA
    $result = mysqli_query($conn, "SELECT nm_desa from tb_desa WHERE nm_desa = '$nm_desa'");

    if ( mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('Desa tersebut sudah ada');
        </script>
        ";
        return false;
    }

    $query ="INSERT INTO tb_desa
                VALUES ('', '$nm_desa')";
                
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);



}

function hapus($id){
    global $conn; 
    // var_dump($id);   
    $query = "DELETE FROM tb_desa WHERE id_desa = $id";
    // var_dump($query);
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    // return $id;

}


function cari($keyword){
    $query = "SELECT * FROM tb_desa WHERE nm_desa LIKE '%$keyword%'";
    
    return query($query);
}