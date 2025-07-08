<?php
    include("sambungan.php");

    $idpelanggan = $_GET["idpelanggan"];

    $sql = "delete from pelanggan where idpelanggan = '$idpelanggan' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='pelanggan_senarai.php'</script>";
?>