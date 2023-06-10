<?php 
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:../login/login.php");
	exit;
}
require 'function/functions.php';

// var_dump($id);
$desa = query("SELECT * FROM tb_desa");

if (isset($_POST['cari'])) {
	$desa = cari($_POST['keyword']);
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="32x32" href="../../assets-selawi/logo-selawi.jpeg">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets-selawi/logo-selawi.jpeg">

	<!-- bootstrap -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

	<style>
		a{
			text-decoration: none;
			color: white;
		}
		a:hover{
			text-decoration: none;
			color: white;
		}
		<?php
        require_once "../sidebar/sidebar.css";
        ?>

		.logo {
			margin-top: 20px;
			height: 100px;
		}

		footer {
			position: fixed;
			bottom: 0;
			left: 0;
			width: 100%;
			background-color: #f8f9fa;
			padding: 20px 0;
			text-align: center;
		}
		/* footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center; */
			/* position: fixed;
			bottom: 0;
			left: 0; */
        /* } */
	</style>

	<title>Kelompok Tani</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
		<?php require_once "../sidebar/sidebar.php";?>
			<!-- Your content goes here -->
			<div class="col-md-10 col-lg-10">
				<div class="container" style="padding-bottom: 30px;">
					<h2 class="text-center mt-5 mb-5">Desa di Kecamatan Selaawi</h2>
					<form action="" method="post" class="form-inline mb-3">
						<input class="form-control mr-sm-2" type="search" name="keyword" size="25" autofocus placeholder="Cari Desa" autocomplete="off">
						<button type="submit" name="cari" class="btn btn-secondary">Cari</button>
					</form>

					<div class="table-responsive-lg">
						<table class="table table-bordered table-hover table-sm">
							<thead class="thead-dark">
								<tr>
									<th scope="col" class="text-center" style="width: 100px;">No</th>
									<th scope="col" class="text-center" style="width: 150px;">Edit</th>
									<th scope="col">Nama Desa</th>
								</tr>
							</thead>

							<tbody>
								<?php $i = 1;?>
								<?php foreach ($desa as $row) :?>
								<tr>
									<th scope="row" class="text-center"><?= $i ?></th>
									<td class="text-center">
										<button type="button" class="btn btn-danger">
											<a href="crud/hapus.php?id_desa=<?=$row['id_desa']?>&nama_desa=<?=$row['nm_desa']?>" onclick="return confirm('Yakin akan hapus?')">Hapus</a>
										</button>
									</td>
									<td><?= $row['nm_desa']?></td>
								</tr>
								<?php $i++;?>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					<br>
					<center>
						<button type="button" class="btn btn-primary"><a href="crud/tambah.php">Tambah Desa</a></button>
					</center>
					
				</div>
			</div>
		</div>
	</div>

	<footer>
        <p>&copy; Copyright 2023 BPP Selaawi Kabupaten Garut</p>
    </footer>

	<script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
