<?php
require "../src/koneksi.php";
session_start();
$idProduk = $_GET["id"];


//jika sudah ada ditambah
if ($idProduk==true) {
  if (isset($_SESSION['keranjang'][$idProduk])) {
    $_SESSION['keranjang'][$idProduk]+=1;
}else {
    $_SESSION['keranjang'][$idProduk]=1;
}
}


$jumlahBunga = count($_SESSION["keranjang"]);
// echo "<script>alert('berhasil menambahkan ke keranjang')</script>";
// echo "<script>location = 'index.php'</script>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart page</title>
    <link rel="stylesheet" href="../dist/output.css" />
</head>
<body class="bg-gray-100">
  <div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Shopping Cart</h1>
          <h2 class="font-semibold text-2xl"><?php echo $jumlahBunga ?> Items</h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
          <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
          <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Harga</h3>
          <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
        </div>
        <?php $totalharga = 0 ?>
        <?php foreach ($_SESSION["keranjang"] as $idProduk=>$jumlah): ?>
          <?php
            $queryProduk = mysqli_query($con,"SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id WHERE a.id='$idProduk'");
            while ($data=mysqli_fetch_array($queryProduk)) {
              $subharga = $data['harga'] * $jumlah;
              
              ?>
              <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                <div class="flex w-2/5"> <!-- product -->
                  <div class="w-20">
                    <img class="h-24" src="../item/<?php echo $data['gambar'] ?>" alt="">
                  </div>
                  <div class="flex flex-col justify-between ml-4 flex-grow">
                    <span class="font-bold text-sm"><?php echo $data['nama_bunga'] ?></span>
                    <span class="text-red-500 text-xs"><?php echo $data['nama_kategori'] ?></span>
                    <a href="hapuscart.php?id=<?php echo $data["id"] ?>" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
                  </div>
                </div>
                <div class="flex justify-center w-1/5">
                  <svg class="minQty cursor-pointer fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                  </svg>

                  <input class="qty mx-2 border text-center w-8" name="qty" id="qty" type="text" value="<?php echo $jumlah ?>">

                  <svg class="addQty cursor-pointer fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                  </svg>
                </div>
                <input class="price text-center w-1/5 font-semibold text-sm" value="<?php echo $data['harga'] ?>k" disabled >
                <input class="totalprice text-center w-1/5 font-semibold text-sm" value=" <?php echo $subharga?>k" disabled>
              </div>
              <?php
              $totalharga+=$subharga;
            }
            ?>
          
          <?php endforeach ?>
        <a href="index.php" class="flex font-semibold text-indigo-600 text-sm mt-10">
      
          <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
          Continue Shopping
        </a>
      </div>

      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-sm uppercase">Items <?php echo $jumlahBunga  ?></span>
          <span class="font-semibold text-sm"></span>
        </div>
        <div>
          <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
          <select class="block p-2 text-gray-600 w-full text-sm">
            <option>FREE </option>
          </select>
        </div>

          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>Total cost<input class="totalCost" type="text" value=' <?php echo $totalharga ?>k ' disabled></span>
            <span></span>
          </div>
          <a href="payment.php"><button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button></a>
        </div>
      </div>

    </div>
  </div>
  <script src="cart.js"></script>
</body>
</html>