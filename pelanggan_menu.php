<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<link rel="stylesheet" href="amenu.css">

<header>
    <img class="logo" src="imej/logo.jpg">
    <img class="kelab" src="imej/namakedai.png">
</header>

<nav>
    <ul>
        <li>
            <a href="index.php"><b>MENU</b></a>
        </li>
    </ul>
    <ul>
        <li>
           <?php
               if (isset($_SESSION["idpelanggan"])) 
                   echo "<a href='pesanan_senarai.php'><b>PESANAN</b></a>";
               else     
                   echo "<a href='javascript:papar();'><b>PESANAN</b></a>";
            ?> 
        </li>

    </ul>
    <ul>
        <li>
           <?php
               if (isset($_SESSION["idpelanggan"])) 
                   echo "<a href='logout.php'><b>LOG KELUAR</b></a>";
               else     
                   echo "<a href='login.php'><b>LOG MASUK</b></a>";
            ?>   
        </li>
    </ul>
    
    <?php
       if (isset($_SESSION["idpelanggan"])) {
          $idpelanggan = $_SESSION["idpelanggan"]; 
          $sql = "select * from pelanggan where idpelanggan = '$idpelanggan' "; 
          $result = mysqli_query($sambungan, $sql);
          $pelanggan = mysqli_fetch_array($result);   
          echo "Selamat datang $pelanggan[namapelanggan]";
       } 
    ?> 
</nav>

<script>
    function papar() {
        alert("Sila log masuk untuk melihat pesanan");
    }
</script>
