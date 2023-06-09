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

// Tambah data ke tabel tb_detil_hasiltani
function tambah($data){
    global $conn; 

    $id_kel = $data['kel_tani'];
    $id_hsl = $data['id_hsl'];
    $jumlah = $data['jumlah_tani'];
    $id_desa = $data['desa'];
    

    // Kondisi jika $id_hsl kosong
    if ($id_hsl == "") {
        echo "
        <script>
            alert('Belum memilih kelompok tani');
        </script>
        ";
        return false;
    }
    // Tambahkan kondisi jika kelompok tani yang dipilih sama

    $query = "SELECT id_kel FROM tb_detil_hasiltani WHERE id_kel = $id_kel AND id_hsl = $id_hsl AND id_desa = $id_desa";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "
        <script>
            alert('Kelompok tani dan desa sudah ada');
        </script>
        ";
        return false;
    }

    // Kondisi jika $id_desa kosong
    if ($id_desa == "") {
        echo "
        <script>
            alert('Belum memilih desa');
        </script>
        ";
        return false;
    }
    // tidak ada kondisi jika desa sama

    // akhir kondisi
    $query ="INSERT INTO tb_detil_hasiltani 
                VALUES ('', $id_kel, $id_hsl, $jumlah, $id_desa)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function ubah($data){
    global $conn; 
    $id_detil = $data['id_detil'];
    $id_kel = $data['kel_tani'];
    $id_hsl = $data['id_hsl']; 
    $jml_tani = $data['jumlah_tani'];
    $id_desa = $data['desa'];

    $id_kel_awal = $data['id_kel_awal'];

    // Tambahkan kondisi jika kelompok tani yang dipilih sama
    if ($id_kel == $id_kel_awal) {
        $id_kel = $id_kel_awal;
    } else {
        $query = "SELECT id_kel FROM tb_detil_hasiltani WHERE id_kel = $id_kel AND id_hsl = $id_hsl AND id_desa = $id_desa";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "
            <script>
                alert('Kelompok tani sudah ada');
            </script>
            ";
            return false;
        }
    }


    $query = "UPDATE tb_detil_hasiltani SET
                id_kel = $id_kel,
                jml_tani = $jml_tani,
                id_desa = $id_desa
                WHERE id_detil = $id_detil";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}   

function hapus($id){
    global $conn; 

    $query = "DELETE FROM tb_detil_hasiltani WHERE id_kel = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

?>