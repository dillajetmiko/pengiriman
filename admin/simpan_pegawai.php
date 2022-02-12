<?php 
	include('../koneksi/koneksi.php');
	
	$insert = mysqli_query($koneksi, "INSERT INTO pegawai VALUES('$_POST[id_pegawai]','$_POST[id_jabatan]','$_POST[nama_pegawai]','$_POST[telp_pegawai]','$_POST[email_pegawai]','$_POST[alamat_pegawai]','$_POST[jk_pegawai]','$_POST[pass_pegawai]','$_POST[status_pegawai]')");

	if($insert){
		header("Location:view_pegawai.php?notif=tambahberhasil");
	}
	else{
		echo'Data gagal disimpan !';
	}
?>