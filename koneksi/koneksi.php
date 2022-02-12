<?php
    $koneksi = mysqli_connect("localhost", "root", "", "seafood_046");
    //connection check
    if (!$koneksi){
        die("Error koneksi: " . mysqli_connect_errno());
    }
?>