<?php
    include("sambungan.php");
	include("penjual_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<main>
    <div id="printarea">
    <?php
       if (isset($_POST['submit'])) {           
            $idpelanggan = $_POST['idpelanggan'];
            $tarikh = $_POST['tarikh'];
            $pilih = $_POST['pilih'];
           
            $sql = "select * from pelanggan where idpelanggan = '$idpelanggan' "; 
            $result = mysqli_query($sambungan, $sql);
            $pelanggan = mysqli_fetch_array($result);
            $namapelanggan = $pelanggan['namapelanggan'];
        
            if ($pilih == 1) {
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kuantiti</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>";
                
                $bayaran = 0;
                
                $sql = "select * from pesanan 
                join makanan on pesanan.idmakanan = makanan.idmakanan
                where pesanan.idpelanggan = '$idpelanggan' and pesanan.tarikh = '$tarikh' ";

                $result = mysqli_query($sambungan, $sql);
                while($pesanan = mysqli_fetch_array($result)) {  
                     $jumlah = $pesanan['kuantiti'] * $pesanan['harga'];
                     $jumlah_format = number_format($jumlah, 2);    
                     echo "<tr> <td>$pesanan[idmakanan]</td>
                                <td>$pesanan[namamakanan]</td>
                                <td>$pesanan[kuantiti]</td>
                                <td>RM $pesanan[harga]</td>
                                <td>RM $jumlah_format</td>
                           </tr>";
                     $bayaran = $bayaran + $jumlah;
                }
                $bayaran_format = number_format($bayaran, 2);
                
                echo "<br><td colspan = 3><td>Jumlah Bayaran</td><td>RM $bayaran_format</td></tr>";
                echo "<caption><img class=logo src='imej/logo.jpg'><br><img src='imej/namakedai.png' width=400><br>
                          Nama : $namapelanggan Tarikh : $tarikh</caption>
                      </table>"; 
            }
           
            if ($pilih == 2) {             
                echo "<table>
                        <tr>
                            <th>Tarikh</th>
                            <th>ID</th>
                            <th>Makanan</th>
                            <th>Kuantiti</th>
                        </tr>";
                            
                $sql = "select * from pesanan 
                join makanan on pesanan.idmakanan = makanan.idmakanan
                where pesanan.idpelanggan = '$idpelanggan' order by tarikh asc";

                $result = mysqli_query($sambungan, $sql);
                while($pesanan = mysqli_fetch_array($result)) {
                     echo "<tr> <td>$pesanan[tarikh]</td>
                                <td>$pesanan[idmakanan]</td>
                                <td>$pesanan[namamakanan]</td>
                                <td>$pesanan[kuantiti]</td>
                           </tr>";
                }
                echo "<caption>SENARAI PESANAN<br><br>
                         Nama : $namapelanggan</caption>
                      </table>"; 
            }
       }
    ?>
    </div>
    <center><button class="cetak" onclick="printPageArea()">Cetak</button></center>
</main>

<script>
    function printPageArea(){
        var printContent = document.getElementById("printarea").innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
