<?php
	include("sambungan.php");
	include("penjual_menu.php");

	if (isset($_POST["submit"])) {
		$idpelanggan = $_POST["idpelanggan"];
		$katakunci = $_POST["katakunci"];
		$namapelanggan = $_POST["namapelanggan"];

		$sql = "insert into pelanggan values('$idpelanggan', '$katakunci', '$namapelanggan')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<h4>Berjaya tambah</h4>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<main>

<h3 class="panjang">BORANG TAMBAH PELANGGAN</h3>
<form class="panjang" action="pelanggan_insert.php" method="post">
    <table>
        <tr>
            <td class="warna">ID Pelanggan</td>
            <td><input required type="text" 
            name="idpelanggan" placeholder="cth: P065"  
            pattern="[A-Z0-9]{4}" 
            oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')" 
            oninput="this.setCustomValidity('')"
            <?php  
                       $sql = "SELECT * FROM pelanggan ORDER BY idpelanggan DESC LIMIT 1";
                       $result = mysqli_query($sambungan, $sql);
                       $bilrekod = mysqli_num_rows($result);
                       if ($bilrekod > 0) { 
                   		   $pelanggan = mysqli_fetch_array($result);
                   		   $idpelanggan = ++$pelanggan["idpelanggan"];
		              }
		              else
			             $idpelanggan = "P001";
		              echo "value = '$idpelanggan'";                    
                   
            ?>
            >
            </td>
        </tr>
        <tr>
            <td class="warna">Nama Pelanggan</td>
            <td><input type="text" name="namapelanggan" placeholder="cth: Hajar"></td>
        </tr>    
        <tr>
            <td class="warna">Kata Kunci</td>
            <td><input type="text" name="katakunci" placeholder="cth: 123"></td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>

<br>
<center>
    <button class="biru" onclick="tukar_warna(0)">Biru</button>
    <button class="hijau" onclick="tukar_warna(1)">Hijau</button>
    <button class="merah" onclick="tukar_warna(2)">Merah</button>
    <button class="hitam" onclick="tukar_warna(3)">Hitam</button>
</center>

<script>
    function tukar_warna(n) {
        var warna = ["Blue", "Green", "Red", "Black"];
        var teks = document.getElementsByClassName("warna");
        for(var i=0; i<teks.length; i++)
            teks[i].style.color=warna[n];
    }
</script>
</main>
