<?php 
	include('../koneksi/koneksi.php');
	
	$insert = mysqli_query($koneksi, "INSERT INTO detail_jns_dokumen VALUES('$_POST[no_resi]','$_POST[id_jenis_dokumen]','$_POST[no_dokumen]','$_POST[tgl_dokumen_diterima]','$_POST[file_path]')");
	
	if($insert){
		header("Location:view_detail_jns_dokumen.php?notif=tambahberhasil");
	}
	else{
		echo'Data gagal disimpan !';
	}
?>