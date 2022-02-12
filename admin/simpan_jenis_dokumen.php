<?php 
	include('../koneksi/koneksi.php');

	$insert = mysqli_query($koneksi, "INSERT INTO jenis_dokumen VALUES('$_POST[id_jenis_dokumen]','$_POST[nama_dokumen]','$_POST[status_jenis_dokumen]')");
	
	if($insert){
		header("Location:view_jenis_dokumen.php?notif=tambahberhasil");
	}
	else{
		echo'Data gagal disimpan !';
	}
?>