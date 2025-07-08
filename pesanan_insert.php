<?php
    include("sambungan.php");

    $idpelanggan = $_POST["idpelanggan"];
    $idmakanan = $_POST["idmakanan"];
    $kuantiti = $_POST["kuantiti"];
   
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today = date('Y-m-d');
        
    $sql = "insert into pesanan values('$idpelanggan', '$idmakanan', '$today', '$kuantiti')";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "<script>alert('Makanan berjaya dipesan')</script>";
    else
        echo "<script>alert('Makanan sudah dipesan...Klik pesanan')</script>";

    echo "<script>window.location='index.php'</script>";
?>