<!DOCTYPE html>
<html>
<head>
	<title>Frontend</title>
	<!-- css - bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<!-- css - fontawesome -->
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
</head>
<body>
	<div class="container">
		<div class="card m-2">
			<div class="card-header">
				<div class="float-left">LOGO</div>
				<div class="float-right">
					<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModalAdd">Add</a>
				</div>
			</div>
			<div class="card-body">
				<?php
				if($_GET['pesan'] == !null){
					if ($_GET['pesan'] == "sukses") {
						$ket = "Sukses";
						$class = "success";
					}else{
						$ket = "Gagal";
						$class = "danger";
					}
					if ($_GET['kat'] == "add") {
						$detail = "ditambahkan";
					}elseif ($_GET['kat'] == "edit") {
						$detail = "diubah";
					}else{
						$detail = "dihapus";
					}
					?>
					<div class="alert alert-<?= $class; ?> alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Data <strong><?= $ket; ?>!</strong> <?= $detail; ?>.
					</div>
					<?php 
				}
				?>
				<table class="table table-bordered" id="manageMemberTable">
					<thead class="bg-secondary text-center">
						<th width="5%">#</th>
						<th width="25%">Produk</th>
						<th width="20%">Kategori</th>
						<th width="10%">Stok</th>
						<th width="30%">Deskripsi</th>
						<th width="10%">Action</th>
					</thead>
					<tbody>
						<?php
						include "php_action/koneksi.php";
						$sql = "SELECT
						products.name AS nama_produk
						, products.stok AS stok
						, products.id AS id
						, products.deskripsi AS deskripsi
						, categories.name AS nama_kategori
						FROM
						db_gudang.products
						INNER JOIN db_gudang.categories 
						ON (products.category_id = categories.id)
						ORDER BY categories.id ASC";
						$result = mysqli_query($conn, $sql);
						$no=1;
						while($row = mysqli_fetch_assoc($result)) {
							?>
							<tr>
								<td class="text-center"><?= $no++; ?></td>
								<td><?= $row['nama_produk']; ?></td>
								<td><?= $row['nama_kategori']; ?></td>
								<td class="text-center"><?= $row["stok"]; ?></td>
								<td class="text-center"><?= $row["deskripsi"]; ?></td>
								<td class="text-center">
									<a href="php_action/delete.php?id=<?= $row['id']; ?>">
										<i class="fas fa-trash"></i>
									</a>
									<a href="#" data-toggle="modal" data-target="#myModalEdit" data-id="<?= $row['id']; ?>">
										<i class="fas fa-edit"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- The Modal Add -->
	<div class="modal" id="myModalAdd">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">ADD DATA</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form action="php_action/add.php" method="post">
						<div class="form-group">
							<select class="form-control" id="kategori" name="kategori">
								<?php
								$sql2 = "SELECT * FROM categories;";
								$result2 = mysqli_query($conn, $sql2);
								while($row2 = mysqli_fetch_assoc($result2)) {
									?>
									<option value="<?= $row2['id']; ?>"><?= $row2['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="produk" name="produk" placeholder="Produk ..">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="stok" name="stok" placeholder="Stok ..">
						</div>
						<div class="form-group">
							<textarea class="form-control" id="deskripsi" name="deskripsi">Deskripsi</textarea>
						</div>
						<div class="form-group float-right">
							<button class="btn btn-warning" type="submit" name="add">Add</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- The Modal Edit -->
	<div class="modal" id="myModalEdit">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">EDIT DATA</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<div class="hasil-data"></div>
				</div>

			</div>
		</div>
	</div>

	<!-- The Modal Delete -->
	<div class="modal" id="myModalDelete">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<p class="text-center">
						<i class="fas fa-check fa-5x"></i>
					</p>
					<p class="text-center">
						Data name telah berhasil dihapus.
					</p>
				</div>

			</div>
		</div>
	</div>

	<!-- plugins - jquery -->
	<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
	<!-- js - bootstrap -->
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){

			$('#myModalEdit').on('show.bs.modal', function (e) {

				var idx = $(e.relatedTarget).data('id');

            //menggunakan fungsi ajax untuk pengambilan data

            $.ajax({

            	type : 'post',

            	url : 'php_action/detail.php',

            	data :  'idx='+ idx,

            	success : function(data){

                $('.hasil-data').html(data);//menampilkan data ke dalam modal

            }

        });

        });

		});

	</script>
	</html>