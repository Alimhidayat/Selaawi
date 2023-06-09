<?php
// Melakukan koneksi dengan database
$conn = mysqli_connect('localhost', 'root', '', 'abdimas');

function query($query){
    global $conn;
    // ambil data dari tabel / query data
    $result = mysqli_query($conn, $query);
    // var_dump($result);
    // if (!$result) {
    //     echo mysqli_error($conn);
    // }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


?>