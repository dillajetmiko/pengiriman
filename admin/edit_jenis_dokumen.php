<?php 
  include('../koneksi/koneksi.php');
  $sql_query="SELECT * FROM jenis_dokumen, pegawai WHERE id_jenis_dokumen='$_GET[id]'";
	$ambil = mysqli_query($koneksi, $sql_query);
  $data = mysqli_fetch_array($ambil);
?>

<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include("includes/header.php") ?>

  <?php include("includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Jenis Dokumen</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="view_jenis_dokumen.php">Data Jenis Dokumen</a></li>
              <li class="breadcrumb-item active">Edit Data Jenis Dokumen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Jenis Dokumen</h3>
        <div class="card-tools">
          <a href="view_jenis_dokumen.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->

    	</br></br>
      <div class="col-sm-10">
      <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
      <?php if($_GET['notif']=="editkosong"){?>
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
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="update_jenis_dokumen.php">
      <div class="card-body">
        <div class="form-group row">
          <label for="foto" class="col-sm-12 col-form-label">
          <span class="text-info"><i class="fas fa-user-circle"></i><u>
          Data Jenis Dokumen</u></span></label>
        </div>

        <div class="form-group row">
          <label for="id_jenis_dokumen" class="col-sm-3 col-form-label">ID Jenis Dokumen</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="id_jenis_dokumen" value="<?php echo $data['id_jenis_dokumen']; ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="nama_dokumen" class="col-sm-3 col-form-label">Nama Dokumen</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="nama_dokumen" value="<?php echo $data['nama_dokumen']; ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="status_jenis_dokumen" class="col-sm-3 col-form-label">Status Jenis Dokumen</label>
          <div class="col-sm-7">
            <?php
            if($data['status_jenis_dokumen']==1){
            ?>
            <label><input type="radio" name="status_jenis_dokumen" value="1" checked="checked"/> Aktif </label>
            <label><input type="radio" name="status_jenis_dokumen" value="0" /> Tidak Aktif </label><br>
            <?php
            } else {
            ?>
            <label><input type="radio" name="status_jenis_dokumen" value="1" /> Aktif </label>
            <label><input type="radio" name="status_jenis_dokumen" value="0" checked="checked"/> Tidak Aktif </label><br>
            <?php
            }
            ?>
          </div>
        </div>
      
        <div class="card-footer">
          <div class="col-sm-12">
          <button type="submit" class="btn btn-info float-right">
          <i class="fas fa-plus"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->

      </div>
      <!-- /.card-body -->
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
