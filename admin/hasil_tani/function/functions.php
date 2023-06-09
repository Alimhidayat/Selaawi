<?php

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

// TAMBAH DATA HASIL TANI
/// MENGHILANGKAN FIELD JUMLAH
function tambah($data){
    global $conn;

    $jumlah = $data['jumlah'];
    $tanggal = $data['tanggal'];
    $id_kom = $data['id_kom'];
    $satuan = $data['satuan'];

    $query = "INSERT INTO tb_hasiltani
                VALUES
                ('', '$tanggal', '$satuan' ,$id_kom)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// HAPUS DATA HASIL TANI
function hapus($id){
    global $conn;

    $query = "DELETE FROM tb_hasiltani WHERE id_hsl = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// UBAH DATA
/// MENGHILANGKAN FIELD JUMLAH
function ubah($data){
    global $conn;
    $id = $data['id_hsl'];

    $tanggal = $data['tanggal'];
    $satuan = $data['satuan'];

    $query = "UPDATE tb_hasiltani SET
                tanggal = '$tanggal',
                satuan = '$satuan'
                WHERE id_hsl = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

