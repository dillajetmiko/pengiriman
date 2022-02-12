<?php 
	include('../koneksi/koneksi.php');

	$ambil_sql="UPDATE pegawai SET id_jabatan='$_POST[id_jabatan]',
    nama_pegawai='$_POST[nama_pegawai]',
    telp_pegawai='$_POST[telp_pegawai]',
    email_pegawai='$_POST[email_pegawai]',
    alamat_pegawai='$_POST[alamat_pegawai]',
    jk_pegawai='$_POST[jk_pegawai]',
    pass_pegawai='$_POST[pass_pegawai]',
    status_pegawai='$_POST[status_pegawai]'
    WHERE id_pegawai='$_POST[id_pegawai]'";
	
	$update = mysqli_query($koneksi, $ambil_sql);
	if($update){
		header("Location:view_pegawai.php?notif=editberhasil");
    }
    else{
		echo'Data gagal diupdate !';
	}
?>