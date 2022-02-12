<?php 
	include('../koneksi/koneksi.php');   
$delete = mysqli_query($koneksi, "UPDATE pegawai 
SET status_pegawai=0
WHERE id_pegawai='$_GET[data]'");

if($delete){
    header("Location:view_pegawai.php?notif=hapusberhasil");
}
?>