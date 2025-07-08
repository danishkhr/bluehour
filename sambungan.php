<?php
    $nama_database = "pesanan";

    $sambungan = mysqli_connect("localhost", "root", "", $nama_database);
    if ( !$sambungan ) {
          die("sambungan gagal");
    } 
?>