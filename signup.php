<?php
    include("sambungan.php"); 
    include("pelanggan_menu.php");

    if(isset($_POST["submit"])) {    
        $idpelanggan = $_POST["idpelanggan"];
        $katakunci = $_POST["katakunci"];
        $namapelanggan = $_POST["namapelanggan"];

        $sql = "insert into pelanggan values('$idpelanggan', '$katakunci', '$namapelanggan')";
        $result = mysqli_query($sambungan, $sql);
        if ($result)
            echo "<script>alert('Berjaya signup')</script>";
        else 
            echo "<script>alert('Tidak berjaya signup')</script>";
        echo "<script>window.location='index.php'</script>";
    }
?> 

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<body>
    <h3 class="panjang">PENDAFTARAN</h3>
    <form class="panjang" action="signup.php" method="post">
    <table>
        <tr>
            <td>ID Pelanggan</td>
            <td><input required type="text" name="idpelanggan" 
                    placeholder="cth: P065" pattern="[A-Z0-9]{4}" 
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
                $idpelanggan = "S001";
                echo "value = '$idpelanggan'";                    
                   
            ?>
            >
            </td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td><input required type="text" name="namapelanggan" placeholder="cth: Hajar"></td>
        </tr>
        <tr>
            <td>Katalaluan</td>
            <td><input required type="katakunci" name="katakunci" placeholder="Maksimum 9 digit"></td>
        </tr>
    </table>
    
    <button class="signup" type="submit" name="submit">Daftar</button>
    <button class="batal" type="button" onclick="window.location='index.php'">Batal</button>
</form>
</body>
