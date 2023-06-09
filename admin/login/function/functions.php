<?php
require_once __DIR__."../../../koneksi.php";

// function query($query){
//     global $conn; 
//     $result = mysqli_query($conn, $query);

//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }

//     return $rows;
    
// }

// function login($data){
//     global $conn; 

//     $username = $_data['username'];
//     $password = $_data['password'];

//     $data_admin = query("SELECT * FROM admin");
//     if ($username != $data_admin['username'] && $password != $data_admin['password']) {
//         echo "
//         <script>
//             alert('Username atau Password Salah!!');
//         </script>
//         ";
//     } else{
//         header("Location:../../index.php");
//     }

// }

?>