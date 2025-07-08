<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("pelanggan_menu.php");

    $idpelanggan = $_SESSION["idpelanggan"];

    $sql = "select * from pelanggan where idpelanggan = '$idpelanggan'"; 
    $result = mysqli_query($sambungan, $sql);
    $pelanggan = mysqli_fetch_array($result);
    $namapelanggan = $pelanggan['namapelanggan'];

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $today = date('Y-m-d');
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<table>
    
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th colspan="2">Kuantiti</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Pesanan</th>
    </tr>

    <?php
        $bayaran = 0;
         
        $sql = "select * from pesanan 
                join makanan on pesanan.idmakanan = makanan.idmakanan
                join pelanggan on pesanan.idpelanggan = pelanggan.idpelanggan
                where pesanan.idpelanggan = '$idpelanggan' and tarikh = '$today' ";
        $result = mysqli_query($sambungan, $sql);
    

        while($makanan = mysqli_fetch_array($result)) {
             $idmakanan = $makanan['idmakanan'];    
             $kuantiti = $makanan['kuantiti'];    
             $jumlah = $makanan['kuantiti'] * $makanan['harga'];
             $jumlah_format = number_format($jumlah, 2);    
             echo "<tr> <td>$makanan[idmakanan]</td>
                        <td>$makanan[namamakanan]</td>
                        <td>$makanan[kuantiti]</td>
                        <td>
                            <a href='javascript:kemaskini(\"$idmakanan\",\"$idpelanggan\",\"$today\");'>
                                <img src='imej/update.png'>
                            </a>
                        </td>
                        <td>RM $makanan[harga]</td>
                        <td>RM $jumlah_format</td>
                        <td>
                            <a href='pesanan_delete.php?idmakanan=$idmakanan&&idpelanggan=$idpelanggan&&tarikh=$today'>
                                 <img src='imej/delete.png'>
                            </a>
                         </td> 
                   </tr>";
            $bayaran = $bayaran + $jumlah;
        }
    
        $bayaran_format = number_format($bayaran, 2);
        $tarikh = date_format(date_create($today), 'd-m-Y');
        echo "<td colspan = '5'>Jumlah Bayaran</td><td>RM $bayaran_format</td></tr>";
        echo "<caption>SENARAI PESANAN<br><br>
                  Nama : $namapelanggan Tarikh : $tarikh</caption>"; 
    ?>
</table>

<script>
    function kemaskini(idm, idp, t) {
        var bil = prompt("Masukkan kuantiti");
        window.location = "pesanan_update.php?idmakanan=" + idm + "&&idpelanggan=" + idp + "&&tarikh=" + t + "&&kuantiti=" + bil;
    }
</script>