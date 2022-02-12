<?php 
	include('../koneksi/koneksi.php');
	
	$insert = mysqli_query($koneksi, "INSERT INTO pembayaran VALUES('$_POST[id_pembayaran]','$_POST[id_pegawai]','$_POST[id_pemesanan]','$_POST[tgl_pembayaran]','$_POST[bukti_pembayaran]','$_POST[jenis_pembayaran]','$_POST[status_pembayaran]','$_POST[total_pembayaran]')");

	if($insert){
		header("Location:view_pembayaran.php?notif=tambahberhasil");
	}
	else{
		echo'Data gagal disimpan !';
	}
?>