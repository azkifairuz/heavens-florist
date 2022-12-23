<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
<?php
    require "../src/koneksi.php";
    require "navbar.php";
    $queryCheckout = mysqli_query($con , "SELECT a.*, b.nama_bunga AS nama_produk FROM checkout_detail a JOIN produk b on a.id_produk=b.id");
    $jumlahCheckout = mysqli_num_rows($queryCheckout);


?>

<section class="catalog mb-10 mt-20">
    <div class=" md:mx-auto overflow-x-auto w-full mx-2 px-2">
        <table class="border-2  border-blue-700 text-left md:mx-auto  table-fixed mt-10">
            <thead class="bg-gradient-to-br text-xs from-purple-500 to-blue-700 text-white">
                <tr>
                    <th class="px-6 py-2">No</th>
                    <th class="px-6 py-2">Produk</th>
                    <th class="px-6 py-2">Tanggal</th>
                    <th class="px-6 py-2">Jumlah</th>
                    <th class="px-6 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="">
                <?php 
        if($jumlahCheckout==0){ 
            ?> 
        <tr rowspan=5>
            <td colspan=5>Tidak ada data</td>
        </tr>
    <?php 
        } else{
            $no = 1;
            while($data=mysqli_fetch_array($queryCheckout)){
                ?>
                <tr class="text-xs capitalize ">
                    <td class="py-2 px-6"><?php echo $no; ?></td>
                    <td class="py-2 px-6"><?php echo $data['nama_produk']; ?></td>
                    <td class="py-2 px-6"><?php echo $data['tanggal']; ?></td>
                    <td class="py-2 px-6"><?php echo number_format($data['jumlah']); ?></td>
                    <td class="py-2 px-6 text-center"><div  class=" cursor-pointer text-center rounded-md  bg-blue-400 text-white p-[0.30rem] w-20 h-7">selesai</div></td>
                </tr>
                <?php
            $no++;
        }
    }
    ?>
        </tbody>
        </table>
    </div>
</section>
</body>
</html>