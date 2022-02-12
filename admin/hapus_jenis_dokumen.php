<?php 
	include('../koneksi/koneksi.php');   
    $delete = mysqli_query($koneksi, "UPDATE jenis_dokumen 
    SET status_jenis_dokumen=0
    WHERE id_jenis_dokumen='$_GET[data]'");
    
    if($delete){
        header("Location:view_jenis_dokumen.php?notif=hapusberhasil");
    }
?>