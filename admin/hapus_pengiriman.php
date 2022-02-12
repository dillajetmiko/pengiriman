<?php 
	include('../koneksi/koneksi.php');   
$delete = mysqli_query($koneksi, "DELETE FROM pengiriman WHERE no_resi='$_GET[data]'");

if($delete){
    header("Location:view_pengiriman.php?notif=hapusberhasil");
}
?>