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
            <h3><i class="fas fa-plus"></i> Tambah Detail Jenis Dokumen</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="view_detail_jns_dokumen.php">Data Detail Jenis Dokumen</a></li>
              <li class="breadcrumb-item active">Tambah Detail Jenis Dokumen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Detail Jenis Dokumen</h3>
					<div class="card-tools">
						<a href="view_detail_jns_dokumen.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
				<form class="form-horizontal" method="post" enctype="multipart/form-data" action="simpan_detail_jns_dokumen.php">
				<div class="card-body">
					<div class="form-group row">
						<label for="judul" class="col-sm-12 col-form-label">
							<span class="text-info"><i class="fas fa-user-circle"></i><u>
								Data Detail Jenis Dokumen
							</u></span>
						</label>
					</div>

					
					<div class="form-group row">
						<label for="no_resi" class="col-sm-3 col-form-label">No Resi</label>
						<div class="col-sm-7">
						<select class="form-control" name="no_resi">
							<option>-Pilih No Resi-</option>
							<?php
							$ambil = mysqli_query($koneksi, "SELECT * FROM pengiriman");
							while($data = mysqli_fetch_assoc($ambil)){
							?>
									<option value="<?php echo $data['no_resi'] ?>"><?php echo $data['no_resi']?></option>';
							<?php
							}
							?>
						</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="id_jenis_dokumen" class="col-sm-3 col-form-label">Nama Jenis Dokumen</label>
						<div class="col-sm-7">
						<select class="form-control" name="id_jenis_dokumen">
							<option>-Pilih Jenis Dokumen-</option>
							<?php
							$ambil2 = mysqli_query($koneksi, "SELECT * FROM jenis_dokumen WHERE status_jenis_dokumen=1");
							while($data2 = mysqli_fetch_assoc($ambil2)){
							?>
									<option value="<?php echo $data2['id_jenis_dokumen'] ?>"><?php echo $data2['nama_dokumen']?></option>';
							<?php
							}
							?>
						</select>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="no_dokumen" class="col-sm-3 col-form-label">No Dokumen</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="no_dokumen">
						</div>
					</div>

					<div class="form-group row">
						<label for="tgl_dokumen_diterima" class="col-sm-3 col-form-label">Tanggal Dokumen Diterima</label>
						<div class="col-sm-7">
							<input type="date" class="form-control" name="tgl_dokumen_diterima">
						</div>
					</div>

					<div class="form-group row">
						<label for="file_path" class="col-sm-3 col-form-label">File Path</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="file_path">
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
