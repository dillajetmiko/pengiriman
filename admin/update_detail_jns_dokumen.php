<?php 
	include('../koneksi/koneksi.php');

	$ambil_sql="UPDATE detail_jns_dokumen SET id_jenis_dokumen='$_POST[id_jenis_dokumen]',
    no_dokumen='$_POST[no_dokumen]',
    tgl_dokumen_diterima='$_POST[tgl_dokumen_diterima]',
    file_path='$_POST[file_path]'
    WHERE no_resi='$_POST[no_resi]' AND id_jenis_dokumen='$_POST[id_jenis_dokumen]'";
	
	$update = mysqli_query($koneksi, $ambil_sql);
	if($update){
		header("Location:view_detail_jns_dokumen.php?notif=editberhasil");
	}
	else{
		echo'Data gagal diupdate !';
	}
?>