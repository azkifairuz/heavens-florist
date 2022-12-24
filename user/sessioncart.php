<?php
require "../src/koneksi.php";
session_start();
$idProduk = $_GET["id"];


//jika sudah ada ditambah

if (isset($_SESSION['keranjang'][$idProduk])) {
    $_SESSION['keranjang'][$idProduk]+=1;
}
else {
    $_SESSION['keranjang'][$idProduk]=1;
}



$jumlahBunga = count($_SESSION["keranjang"]);
echo "<script>alert('berhasil menambahkan ke keranjang')</script>";
echo "<script>location = 'index.php'</script>"
?>