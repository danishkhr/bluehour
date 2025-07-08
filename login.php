<?php
    include("sambungan.php");
    include("pelanggan_menu.php");

    if (isset($_POST["submit"])) {
        $idpelanggan = $_POST["idpelanggan"];
        $katakunci = $_POST["katakunci"];

        $jumpa = FALSE;

        if ($jumpa == FALSE) {
            $sql = "SELECT * FROM pelanggan";
            $result = mysqli_query($sambungan, $sql);
            while($pelanggan = mysqli_fetch_array($result))   {
                if ($pelanggan["idpelanggan"] == $idpelanggan && $pelanggan["katakunci"] == $katakunci) {
                    $jumpa = TRUE;
                    $_SESSION["idpelanggan"] = $pelanggan["idpelanggan"];
                    $_SESSION["nama"] = $pelanggan["namapelanggan"];
                    $_SESSION["status"] = "pelanggan";
                    break;
                }
            }
        }

        if ($jumpa == FALSE) {
            $sql = "SELECT * FROM penjual";
            $result = mysqli_query($sambungan, $sql);
            while($penjual = mysqli_fetch_array($result))   {
                if ($penjual["idpenjual"] == $idpelanggan && $penjual["katakunci"] == $katakunci) {
                    $jumpa = TRUE;
                    $_SESSION["idpelanggan"] = $penjual["idpenjual"];
                    $_SESSION["nama"] = $penjual["namapenjual"];
                    $_SESSION["status"] = "penjual";
                    break;
                }
            }
        }

        if ($jumpa == TRUE)
            if ($_SESSION["status"] == "pelanggan")
                header("Location: index.php");
            else if ($_SESSION["status"] == "penjual")
                header("Location: makanan_senarai.php"); 
        echo "<script>alert('kesalahan pada id pelanggan atau katalaluan');</script>"; 
    }      
?>

<link rel="stylesheet" href="abutton.css">
<link rel="stylesheet" href="aborang.css">
    
<h3 class="pendek">LOG MASUK</h3>
<form class="pendek" action="login.php" method="post">
    <table>
        <tr>
            <td><img src="imej/user.png"></td>
            <td><input type="text" name="idpelanggan" placeholder="idpelanggan"></td>
        </tr>
        <tr>
            <td><img src="imej/lock.png"></td>
            <td><input type="katakunci" name="katakunci" placeholder="katakunci"></td>
        </tr>
    </table>
    <button class="login" type="submit" name="submit">Log Masuk</button>
    <button class="signup" type="button" onclick="window.location='signup.php'">Daftar Masuk</button><br><br>
    Belum ada idpelanggan klik Daftar Masuk
</form>