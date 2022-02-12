<?php 
	include('../koneksi/koneksi.php');

	$ambil_sql="UPDATE jenis_dokumen SET nama_dokumen='$_POST[nama_dokumen]',status_jenis_dokumen='$_POST[status_jenis_dokumen]'
                WHERE id_jenis_dokumen='$_POST[id_jenis_dokumen]'";
	
	$update = mysqli_query($koneksi, $ambil_sql);
	if($update){
		header("Location:view_jenis_dokumen.php?notif=editberhasil");
	}
	else{
		echo'Data gagal diupdate !';
	}
?>