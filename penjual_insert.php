<?php
     /* Program ini bertujuan untuk
        memasukkan penjual yang baru
        pastikan idpenjual tidak sama
        semasa memasukkan data  */

    include("sambungan.php");
	include("penjual_menu.php");

	if (isset($_POST["submit"])) {
		$idpenjual = $_POST["idpenjual"];
		$katakunci = $_POST["katakunci"];
		$namapenjual = $_POST["namapenjual"];
		
		$sql = "insert into penjual values('$idpenjual', '$katakunci', '$namapenjual')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<h4>Berjaya tambah</h4>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">BORANG TAMBAH PENJUAL</h3>
<form class="panjang" action="penjual_insert.php" method="post">
    <table>
        <tr>
            <td>ID Penjual</td>
            <td><input required type="text" name="idpenjual"placeholder="idpenjual"></td>
        </tr>
        <tr>
        <tr>
            <td>Kata Kunci</td>
            <td><input type="text" name="katakunci" placeholder="max: 8 char"></td>
        </tr>
        <tr>
            <td>Nama Penjual</td>
            <td><input type="text" name="namapenjual"placeholder="Nama Penjual"></td>
        </tr>
        <tr>
        
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>
