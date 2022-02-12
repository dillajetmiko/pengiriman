<?php 
include('../koneksi/koneksi.php');
?>

<!-- untuk menampilkan sidebar level admin -->

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
            <h3><i class="fas fa-database"></i> Pengiriman</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Pengiriman</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Data Pengiriman</h3>
          <div class="card-tools">
            <a href="tambah_pengiriman.php" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah Data Pengiriman</a>
          </div>
        </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <form method="get" action="view_pengiriman.php">
                      <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary">
                          <i class="fas fa-search"></i>  Search</button>
                        </div>
                      </div><!-- .row -->
                    </form>
                  </div><br>
                </div><br>
                  <!-- <div class="col-sm-12">
                      <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                      <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                  </div> -->
                  

                <div class="col-sm-12">
                <?php if(!empty($_GET['notif'])){?>
                  <?php if($_GET['notif']=="tambahberhasil"){?>
                      <div class="alert alert-success" role="alert">
                      Data Berhasil Ditambahkan
                      </div>
                  <?php } else if($_GET['notif']=="editberhasil"){ ?>
                      <div class="alert alert-success" role="alert">
                      Data Berhasil Diubah
                      </div>
                  <?php } else if($_GET['notif']=="hapusberhasil"){ ?>
                      <div class="alert alert-success" role="alert">
                      Data Berhasil Dihapus
                      </div>
                  <?php   
                        } 
                      }
                  ?>
                </div>

                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%">No Resi</th>
                      <th width="10%">Pegawai</th>
                      <th width="20%">ID Pembayaran</th>
                      <th width="20%">Status Pengiriman</th>
                      <th width="20%">Tgl Pengiriman</th>
                      <th width="15%"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  //menampilkan data Pengiriman
                  $sql_pengiriman = "SELECT pengiriman.*, pegawai.* 
                                    FROM pengiriman, pegawai 
                                    WHERE pengiriman.id_pegawai=pegawai.id_pegawai";
                  
                  $ambil = mysqli_query($koneksi,$sql_pengiriman);
                  while ($data = mysqli_fetch_array($ambil)) {
                  ?>
                  <tr>
                      <td><?php echo $data['no_resi']; ?></td>
                      <td><?php echo $data['nama_pegawai']; ?></td>
                      <td><?php echo $data['id_pembayaran']; ?></td>
                      <td><?php echo $data['status_pengiriman']; ?></td>
                      <td><?php echo $data['tgl_pengiriman']; ?></td>
                      <td>
                      <a href="edit_pengiriman.php?id=<?php echo $data['no_resi']; ?>" class="btn btn-xs btn-info">
                      <i class="fas fa-edit"></i> Edit</a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $data['no_resi']; ?>?'))
                      window.location.href = 'hapus_pengiriman.php?data=<?php echo $data['no_resi'];?>'" 
                      class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus 
                      </a> 
                      </td>
                  </tr>
                  <?php
                  }?>

                  </tbody>
                </table>
              </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            </div>
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


