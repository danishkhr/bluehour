<?php
    include("sambungan.php");

    $idmakanan = $_GET["idmakanan"];
    $idpelanggan = $_GET["idpelanggan"];
    $tarikh = $_GET["tarikh"];

    $sql = "delete from pesanan where idmakanan = '$idmakanan' and idpelanggan = '$idpelanggan' and tarikh = '$tarikh' ";
    $result = mysqli_query($sambungan, $sql);

    echo "<script>window.location='pesanan_senarai.php'</script>";
?>