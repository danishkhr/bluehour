<?php
    include("sambungan.php");
    include("penjual_menu.php");

	if (isset($_POST["submit"])) {
		$idpenjual = $_POST["idpenjual"];
		$namapenjual = $_POST["katakunci"];
		$katakunci = $_POST["namapenjual"];

		$sql = "update penjual 
                set katakunci = '$katakunci', namapenjual = '$namapenjual' 
                where idpenjual = '$idpenjual' ";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<h4>Berjaya kemaskini</h4>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}

	if (isset($_GET['idpenjual']))
        $idpenjual = $_GET['idpenjual'];

	$sql = "select * from penjual where idpenjual = '$idpenjual' ";
	$result = mysqli_query($sambungan, $sql);
	while($penjual = mysqli_fetch_array($result)) {
		$katakunci = $penjual['katakunci'];
		$namapenjual = $penjual['namapenjual'];
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">KEMASKINI PENJUAL</h3>
<form class="panjang" action="penjual_update.php" method="post">
    <table>
        <tr>
            <td>ID Penjual</td>
            <td><input type="text" name="idpenjual" value="<?php echo $idpenjual; ?>" ></td>
        </tr>
        <tr>
            <td>Kata Kunci</td>
            <td><input type="text" name="katakunci" value="<?php echo $katakunci; ?>" ></td>
        </tr>
        <tr>
            <td>Nama Penjual</td>
            <td><input type="text" name="namapenjual" value="<?php echo $namapenjual; ?>" ></td>
        </tr>
        
    </table>
    <button class="kemaskini" type="submit" name="submit">Kemaskini</button>
</form>
