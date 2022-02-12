<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include("includes/header.php") ?>

  <?php include("includes/sidebar.php") ?>
  <?php include ("../koneksi/koneksi.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Pembayaran</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pembayaran.php">Data Pembayaran</a></li>
              <li class="breadcrumb-item active">Tambah Pembayaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Pembayaran</h3>
					<div class="card-tools">
						<a href="view_pembayaran.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
					</div>
				</div>
				<!-- /.card-header -->
				</br>
				
				<div class="col-sm-10">
					<?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
							<?php if($_GET['notif']=="tambahkosong"){?>
							<div class="alert alert-danger" role="alert">Maaf data 
							<?php echo $_GET['jenis'];?> wajib di isi</div>
							<?php }?>
					<?php }?>
				</div>

				<!-- form start -->
				</br></br>
				<!-- <div class="col-sm-10">
						<div class="alert alert-danger" role="alert">Maaf data nama wajib di isi</div>
				</div> -->
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="simpan_pembayaran.php">
				<div class="card-body">
					<div class="form-group row">
						<label for="judul" class="col-sm-12 col-form-label">
							<span class="text-info"><i class="fas fa-user-circle"></i><u>
								Data Pembayaran
							</u></span>
						</label>
					</div>

					<div class="form-group row">
						<label for="id_pembayaran" class="col-sm-3 col-form-label">ID Pembayaran</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="id_pembayaran">
						</div>
					</div>
		
					<div class="form-group row">
						<label for="id_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
						<div class="col-sm-7">
						<select class="form-control" name="id_pegawai">
							<option>-Pilih Pegawai-</option>
							<?php
							$ambil = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE status_pegawai=1");
							while($data = mysqli_fetch_assoc($ambil)){
							?>
									<option value="<?php echo $data['id_pegawai'] ?>"><?php echo $data['nama_pegawai']?></option>';
							<?php
							}
							?>
						</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="id_pemesanan" class="col-sm-3 col-form-label">Id Pemesanan</label>
						<div class="col-sm-7">
						<select class="form-control" name="id_pemesanan">
							<option>-Pilih Pemesanan-</option>
							<?php
							$ambil2 = mysqli_query($koneksi, "SELECT * FROM pemesanan");
							while($data2 = mysqli_fetch_assoc($ambil2)){
							?>
									<option value="<?php echo $data2['id_pemesanan'] ?>"><?php echo $data2['id_pemesanan']?></option>';
							<?php
							}
							?>
						</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="tgl_pembayaran" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
						<div class="col-sm-7">
							<input type="date" class="form-control" name="tgl_pembayaran">
						</div>
					</div>

					<div class="form-group row">
						<label for="bukti_pembayaran" class="col-sm-3 col-form-label">Bukti Pembayaran</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="bukti_pembayaran">
						</div>
					</div>

					<div class="form-group row">
						<label for="jenis_pembayaran" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="jenis_pembayaran">
						</div>
					</div>

					<div class="form-group row">
						<label for="status_pembayaran" class="col-sm-3 col-form-label">Status Pembayaran</label>
						<div class="col-sm-7">
							<label><input type="radio" name="status_pembayaran" value="1" /> Lunas </label>
							<label><input type="radio" name="status_pembayaran" value="0" /> Belum Lunas </label><br>
						</div>
					</div>

					<div class="form-group row">
						<label for="total_pembayaran" class="col-sm-3 col-form-label">Total Pembayaran</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="total_pembayaran">
						</div>
					</div>

					

					</div>

					
					<div class="card-footer">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-info float-right">
							<i class="fas fa-plus"></i> Tambah</button>
							</div>  
					</div>
					<!-- /.card-footer -->

				</div>
				</form>

			</div>
			<!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("includes/footer.php") ?>

</div>
<!-- ./wrapper -->

<?php include("includes/script.php") ?>
</body>
</html>
