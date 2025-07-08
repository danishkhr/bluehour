<?php
    include("sambungan.php");
	include("pelanggan_menu.php");

    echo "<link rel='stylesheet' href='abutton.css'>";
    echo "<main class='menu'>";

    $sql = "select * from makanan";
    $result = mysqli_query($sambungan, $sql);
        
    if (isset($_SESSION["idpelanggan"])) {
        $idpelanggan = $_SESSION["idpelanggan"];
        while($makanan = mysqli_fetch_array($result)) {
        echo "<figure>
                  <img class='home' src='imej/$makanan[gambar]'>
                  <figcaption>
                      <form method='post' action='pesanan_insert.php'> 
                          Kuantiti <input type=number min=1 max=50 value=1 name=kuantiti>
                          <input type=hidden name=idpelanggan value=$idpelanggan>
                          <input type=hidden name=idmakanan value=$makanan[idmakanan]>
                          <button class='tempah' type='submit' name='submit'>Pesan</button>
                      </form>
                  </figcaption>
              </figure>";
        }
    }
    else 
        while ($makanan = mysqli_fetch_array($result)) {
              echo "<figure><img class='home' src='imej/$makanan[gambar]'></figure>";
        }
    echo "</main>";
?>