<?php 
	include('../koneksi/koneksi.php');   
$delete = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran='$_GET[data]'");

if($delete){
    header("Location:view_pembayaran.php?notif=hapusberhasil");
}
?>