<?php 
	include('../koneksi/koneksi.php');

	$ambil_sql="UPDATE pengiriman SET id_pegawai='$_POST[id_pegawai]',
    				id_pembayaran='$_POST[id_pembayaran]',
    				status_pengiriman='$_POST[status_pengiriman]',
    				tgl_pengiriman='$_POST[tgl_pengiriman]'
					WHERE no_resi='$_POST[no_resi]'";
	
	$update = mysqli_query($koneksi, $ambil_sql);
	if($update){
		header("Location:view_pengiriman.php?notif=editberhasil");
	}
	else{
		echo'Data gagal diupdate !';
	}
	?>