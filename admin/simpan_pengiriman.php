<?php 
	include('../koneksi/koneksi.php');
	
	$insert = mysqli_query($koneksi, "INSERT INTO pengiriman VALUES('$_POST[no_resi]','$_POST[id_pegawai]','$_POST[id_pembayaran]','$_POST[status_pengiriman]','$_POST[tgl_pengiriman]')");

	if($insert){
		header("Location:view_pengiriman.php?notif=tambahberhasil");
	}
	else{
		echo'Data gagal disimpan !';
	}
?>