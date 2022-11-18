<?php
session_start();
$idProduk = $_GET["id"];
unset($_SESSION['keranjang'][$idProduk]);
echo "<script>alert('produk berhasil dihapus dari keranjang')</script>";
echo "<script>location ='cart.php'</script>";
?>