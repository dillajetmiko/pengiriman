<?php 
  include('../koneksi/koneksi.php');
  $sql_query="SELECT pembayaran.*, pegawai.* 
              FROM pembayaran, pegawai 
              WHERE pembayaran.id_pegawai=pegawai.id_pegawai AND pembayaran.id_pembayaran='$_GET[id]'";
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
            <h3><i class="fas fa-edit"></i> Edit Data Pembayaran</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="view_pembayaran.php">Data Pembayaran</a></li>
              <li class="breadcrumb-item active">Edit Data Pembayaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Pembayaran</h3>
        <div class="card-tools">
          <a href="view_pembayaran.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="update_pembayaran.php">
      <div class="card-body">
        <div class="form-group row">
          <label for="foto" class="col-sm-12 col-form-label">
          <span class="text-info"><i class="fas fa-user-circle"></i><u>
          Data Pembayaran</u></span></label>
        </div>

        <div class="form-group row">
          <label for="id_pembayaran" class="col-sm-3 col-form-label">ID Pembayaran</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="id_pembayaran" value="<?php echo $data['id_pembayaran']; ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="id_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
          <div class="col-sm-7">
          <select class="form-control" name="id_pegawai">
            <?php
            $ambil2 = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE status_pegawai=1");
            while($data2 = mysqli_fetch_assoc($ambil2)){
              if($data2['id_pegawai']==$data['id_pegawai']){
            ?>
                <option selected value="<?php echo $data2['id_pegawai'] ?>"><?php echo $data2['nama_pegawai']?></option>;
            <?php
              }else{
            ?>
            ?>
                <option value="<?php echo $data2['id_pegawai'] ?>"><?php echo $data2['nama_pegawai']?></option>;
            <?php
              }
            }
            ?>
          </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="id_pemesanan" class="col-sm-3 col-form-label">Id Pemesanan</label>
          <div class="col-sm-7">
          <select class="form-control" name="id_pemesanan">
            <?php
            $ambil3 = mysqli_query($koneksi, "SELECT * FROM pemesanan");
            while($data3 = mysqli_fetch_assoc($ambil3)){
              if($data3['id_pemesanan']==$data['id_pemesanan']){
            ?>
                <option selected value="<?php echo $data3['id_pemesanan'] ?>"><?php echo $data3['id_pemesanan']?></option>';
            <?php
              }else{
            ?>
            ?>
                <option value="<?php echo $data3['id_pemesanan'] ?>"><?php echo $data3['id_pemesanan']?></option>';
            <?php
              }
            }
            ?>
          </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="tgl_pembayaran" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
          <div class="col-sm-7">
            <input type="date" class="form-control" name="tgl_pembayaran" value="<?php echo $data['tgl_pembayaran']; ?>" >
          </div>
        </div>

        <div class="form-group row">
          <label for="bukti_pembayaran" class="col-sm-3 col-form-label">Bukti Pembayaran</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="bukti_pembayaran" value="<?php echo $data['bukti_pembayaran']; ?>" >
          </div>
        </div>

        <div class="form-group row">
          <label for="jenis_pembayaran" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="jenis_pembayaran" value="<?php echo $data['jenis_pembayaran']; ?>" >
          </div>
        </div>

        <div class="form-group row">
          <label for="status_pembayaran" class="col-sm-3 col-form-label">Status Pembayaran</label>
          <div class="col-sm-7">
            <?php
            if($data['status_pembayaran']==1){
            ?>
            <label><input type="radio" name="status_pembayaran" value="1" checked="checked"/> Lunas </label>
            <label><input type="radio" name="status_pembayaran" value="0" /> Belum Lunas </label><br>
            <?php
            } else {
            ?>
            <label><input type="radio" name="status_pembayaran" value="1" /> Lunas </label>
            <label><input type="radio" name="status_pembayaran" value="0" checked="checked"/> Belum Lunas </label><br>
            <?php
            }
            ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="total_pembayaran" class="col-sm-3 col-form-label">Total Pembayaran</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="total_pembayaran" value="<?php echo $data['total_pembayaran']; ?>" >
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
