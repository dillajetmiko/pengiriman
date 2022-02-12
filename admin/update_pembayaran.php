<?php 
	include('../koneksi/koneksi.php');

	$ambil_sql="UPDATE pembayaran SET id_pegawai='$_POST[id_pegawai]',
    				id_pemesanan='$_POST[id_pemesanan]',
    				tgl_pembayaran='$_POST[tgl_pembayaran]',
    				bukti_pembayaran='$_POST[bukti_pembayaran]',
    				jenis_pembayaran='$_POST[jenis_pembayaran]',
    				status_pembayaran='$_POST[status_pembayaran]',
    				total_pembayaran='$_POST[total_pembayaran]'
					WHERE id_pembayaran='$_POST[id_pembayaran]'";
	
	$update = mysqli_query($koneksi, $ambil_sql);
	if($update){
		header("Location:view_pembayaran.php?notif=editberhasil");
	}
	else{
		echo'Data gagal diupdate !';
	}
	?>