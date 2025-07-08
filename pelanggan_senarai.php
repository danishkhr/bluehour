<?php
    include("sambungan.php");
	include("penjual_menu.php");
?>

<link rel="stylesheet" href="asenarai.css">
<table class="pelanggan">
    <caption>SENARAI NAMA PELANGGAN</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kata Kunci</th>
        <th colspan="2">Tindakan</th>
    </tr>

    <?php
        $sql = "select * from pelanggan";
        $result = mysqli_query($sambungan, $sql);
        while($pelanggan = mysqli_fetch_array($result)) {
        $idpelanggan = $pelanggan["idpelanggan"];
        echo "<tr>  <td>$pelanggan[idpelanggan]</td>
                    <td class='nama'>$pelanggan[namapelanggan]</td>
                    <td>$pelanggan[katakunci]</td>
                    <td>
                        <a href='pelanggan_update.php?idpelanggan=$idpelanggan'>
                            <img src='imej/update.png'>
                        </a>
                    </td>
                    <td>
                        <a href='javascript:padam(\"$idpelanggan\");'>
                            <img src='imej/delete.png'>
                        </a>
                    </td>
               </tr>";
        }
    ?>
</table>

<script>
    function padam(id)    {
        if (confirm("Adakah anda ingin padam") == true) {
            window.location="pelanggan_delete.php?idpelanggan=" + id;
        }
    }
</script>
