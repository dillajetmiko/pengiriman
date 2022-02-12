<?php 
  include('../koneksi/koneksi.php');
  $sql_query="SELECT pegawai.*, jabatan.* 
  FROM pegawai, jabatan 
  WHERE pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_pegawai='$_GET[id]'";
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
            <h3><i class="fas fa-edit"></i> Edit Data Pegawai</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="view_pegawai.php">Data Pegawai</a></li>
              <li class="breadcrumb-item active">Edit Data Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Pegawai</h3>
        <div class="card-tools">
          <a href="view_pegawai.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="update_pegawai.php">
      <div class="card-body">
        <div class="form-group row">
          <label for="foto" class="col-sm-12 col-form-label">
          <span class="text-info"><i class="fas fa-user-circle"></i><u>
          Data Pegawai</u></span></label>
        </div>

        <div class="form-group row">
          <label for="id_pegawai" class="col-sm-3 col-form-label">ID Pegawai</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="id_pegawai" value="<?php echo $data['id_pegawai']; ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $data['nama_pegawai']; ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="id_jabatan" class="col-sm-3 col-form-label">Jabatan</label>
          <div class="col-sm-7">
          <select class="form-control" name="id_jabatan">
            <?php
            $ambil2 = mysqli_query($koneksi, "SELECT * FROM jabatan");
            while($data2 = mysqli_fetch_assoc($ambil2)){
              if($data2['id_jabatan']==$data['id_jabatan']){
            ?>
                <option selected value="<?php echo $data2['id_jabatan'] ?>"><?php echo $data2['nama_jabatan']?></option>;
            <?php
              }else{
            ?>
            ?>
                <option value="<?php echo $data2['id_jabatan'] ?>"><?php echo $data2['nama_jabatan']?></option>;
            <?php
              }
            }
            ?>
          </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="telp_pegawai" class="col-sm-3 col-form-label">Telp Pegawai</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="telp_pegawai" value="<?php echo $data['telp_pegawai']; ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="email_pegawai" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-7">
            <input type="email" class="form-control" name="email_pegawai" value="<?php echo $data['email_pegawai']; ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="alamat_pegawai" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="alamat_pegawai" value="<?php echo $data['alamat_pegawai']; ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="jk_pegawai" class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-7">
            <?php
            if($data['jk_pegawai']==1){
            ?>
            <label><input type="radio" name="jk_pegawai" value="1" checked="checked"/> Laki-laki </label>
            <label><input type="radio" name="jk_pegawai" value="2" /> Perempuan </label><br>
            <?php
            } else {
            ?>
            <label><input type="radio" name="jk_pegawai" value="1" /> Laki-laki </label>
            <label><input type="radio" name="jk_pegawai" value="2" checked="checked"/> Perempuan </label><br>
            <?php
            }
            ?>
          </div>
        </div>

        <div class="form-group row">
          <label for="pass_pegawai" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="pass_pegawai" value="<?php echo $data['pass_pegawai']; ?>" >
          </div>
        </div>

        <div class="form-group row">
          <label for="status_pegawai" class="col-sm-3 col-form-label">Status Pegawai</label>
          <div class="col-sm-7">
            <?php
            if($data['status_pegawai']==1){
            ?>
            <label><input type="radio" name="status_pegawai" value="1" checked="checked"/> Aktif </label>
            <label><input type="radio" name="status_pegawai" value="0" /> Tidak Aktif </label><br>
            <?php
            } else {
            ?>
            <label><input type="radio" name="status_pegawai" value="1" /> Aktif </label>
            <label><input type="radio" name="status_pegawai" value="0" checked="checked"/> Tidak Aktif </label><br>
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
