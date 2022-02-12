<?php 
	include('../koneksi/koneksi.php');   
    $delete = mysqli_query($koneksi, "DELETE FROM detail_jns_dokumen 
    WHERE no_resi='$_GET[data]' AND id_jenis_dokumen='$_GET[data2]'");

    if($delete){
        header("Location:view_detail_jns_dokumen.php?notif=hapusberhasil");
    }
?>