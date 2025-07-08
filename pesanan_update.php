<?php
    include("sambungan.php");

    $idmakanan = $_GET["idmakanan"];
    $idpelanggan = $_GET["idpelanggan"];
    $tarikh = $_GET["tarikh"];
    $kuantiti = $_GET["kuantiti"];

    $sql = "UPDATE pesanan 
            SET kuantiti = $kuantiti 
            WHERE idmakanan = '$idmakanan' 
              AND idpelanggan = '$idpelanggan' 
              AND tarikh = '$tarikh'";

    $result = mysqli_query($sambungan, $sql);

    echo "<script>window.location='pesanan_senarai.php'</script>";
?>
