<?php 
require_once __DIR__."../../../koneksi.php";


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// TAMBAH KELOMPOK TANI
function tambah($data){
	global $conn;

	$kel_tani = $data['kel_tani'];
	$no_wa = $data['no_wa'];

	// FUNCTION UNTUK KEL_TANI
	// if ($kel_tani == "") {
	// 	echo "
	// 	<script>
	// 		alert('Anda belum memilih kelompok tani');
	// 	</script>
	// 	";
	// 	return false;
	// }

	// Cek kel_tani apakah sudah ada di tabel tb_keltani
    $query = "SELECT nama_kel FROM tb_keltani WHERE nama_kel = '$kel_tani'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "
        <script>
            alert('Kelompok tani sudah ada');
        </script>
        ";
        return false;
    }


	// FUNCTION UNTUK no_wa
	$no_wa = preg_replace('/^0/', '62', $no_wa);

	$query = "INSERT INTO tb_keltani 
				VALUES
				('', '$kel_tani', '$no_wa')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	
}

// HAPUS KELOMPOK TANI
function hapus($id){
	global $conn; 

	$query = "DELETE FROM tb_keltani WHERE id_kel= $id";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// UBAH KELOMPOK TANI
function ubah($data){
	global $conn; 

	$kel_tani = $data['kel_tani'];
	$no_wa = $data['no_wa'];
	$id_kel = $data['id_kel'];

	// FUNCTION UNTUK no_wa
	$no_wa = preg_replace('/^0/', '62', $no_wa);

	$wa_lama = $data['wa_lama'];
	// jika no_wa kosong
	if (empty($no_wa)) {
		$no_wa = $wa_lama;
	}

	$query = "UPDATE tb_keltani SET 
				nama_kel = '$kel_tani',
				no_wa = '$no_wa'
				WHERE id_kel = $id_kel";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function cari($keyword){
    $query = "SELECT * FROM tb_keltani WHERE nama_kel LIKE '%$keyword%'";
    
    return query($query);
}
?>