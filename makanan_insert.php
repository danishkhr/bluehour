<?php
	include("sambungan.php");
	include("penjual_menu.php");

	if (isset($_POST["submit"])) {
		$idmakanan = $_POST["idmakanan"];
        $namamakanan = $_POST["namamakanan"];
		$harga = $_POST["harga"];
        $idpenjual = $_POST["idpenjual"];
        
        $namafail = $idmakanan.".png";
        $sementara = $_FILES["namafail"]["tmp_name"];
        move_uploaded_file($sementara, "imej/".basename($namafail));
        
		$sql = "insert into makanan values('$idmakanan', '$namamakanan', '$namafail', $harga, '$idpenjual')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<h4>Berjaya tambah</h4>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">BORANG TAMBAH MAKANAN</h3>
<form class="panjang" action="makanan_insert.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
           <td>ID Makanan</td>
           <td><input required type="text" name="idmakanan"placeholder="idmakanan"></td>
        </tr>
        <tr>
            <td>Nama Makanan</td>
            <td><input type="text" name="namamakanan"placeholder=NamaMakanan></td>
        </tr>
        <tr>
            <td>Gambar 350x320</td>
            <td><input type="file" name="namafail" accept=".png, .jpg"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga"placeholder=Harga></td>
        </tr>
        <tr>
            <td>Penjual</td>
            <td>
                <select name="idpenjual">
                <?php
                    $sql = "select * from penjual";
                    $data = mysqli_query($sambungan, $sql);
                    while($penjual = mysqli_fetch_array($data)){
                    echo "<option value='$penjual[idpenjual]'>$penjual[namapenjual]</option>";
                    }
                ?>
                </select>
            </td>
        </tr>     
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>
