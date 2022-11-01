<?php
    require "../src/koneksi.php";
    require "navbar.php";
    $queryCatlog = mysqli_query($con , "SELECT * FROM produk");
    $jumlahCatalog = mysqli_num_rows($queryCatlog);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username']; ?>'s catalog</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
        <div class="mx-auto  w-full mt-20 items-center ">
            <div class="mx-auto  max-w-xs flex flex-col justify-center items-center ">
                <h1 class="my-2 text-2xl font-bold">Add Catalog</h1>
                <form action="" method="post" class="">
                    <div>
                        <label for="catalog" class="text-lg"></label>
                        <input type="text" id="catalog" name="catalog" placeholder="input categories" class="border-2 block border-black my-2 p-2">
                    </div>
                    <div class="items-center ">
                        <button class="py-2 px-5 my-2 mx-12 bg-blue-500 text-white rounded-xl border-2 " type="submit" name="simpan_catalog">Submit</button>
                    </div>
                </form>
                <?php 
                    if (isset($_POST['simpan_catalog'])) {
                        $catalog = htmlspecialchars($_POST['catalog']);
                        //mengambil nama catalog yg ada di table catalog
                        $getCatalog = mysqli_query($con, "SELECT * FROM produk WHERE nama_bunga='$catalog'");
                        $jumlahDataKatgeori = mysqli_num_rows($getCatalog);
                        
                        if($jumlahDataKatgeori > 0){
                        ?> 
                        <div class="bg-red-100 border text-center border-red-400 w-full text-red-700 px-10 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Catalog <?php echo $catalog ?> sudah ada</strong>
                        </div>
                        <?php
                        }
                        else {
                            $querySimpan = mysqli_query($con , "INSERT INTO catalog (nama) VALUES ('$catalog')");
                            if ($querySimpan) {
                            ?>
                            <div class="bg-green-100 border text-center border-green-400 w-full text-green-700 px-10 py-3 rounded relative" role="alert">
                                <strong class="font-bold"><?php echo $catalog ?> berhasil ditambahkan</strong>
                            </div>
                            <meta http_equiv="refresh" content="0; url=categories.php">
                            <?php
                            }
                        }
                        
                    }
                ?>
            </div>
        </div>

<section class="categories ">
    <div class=" mx-auto w-full">
        <table class="border-2  border-blue-700 text-left mx-auto  table-auto  mt-20">
            <thead class="bg-gradient-to-br from-purple-500 to-blue-700 text-white">
                <tr>
                    <th class="px-6 py-2">No</th>
                    <th class="px-6 py2">Categori</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        if($jumlahCatalog==0){
            ?> 
        <tr>
            <td>Tidak ada data</td>
        </tr>
    <?php 
        } else{
            $jumlah = 1;
            while($data=mysqli_fetch_array($queryCatlog)){
                ?>
                <tr>
                    <td class="py-2 px-6"><?php echo $jumlah; ?></td>
                    <td class="py-2 px-6"><?php echo $data['nama']; ?></td>
                </tr>
                <?php
            $jumlah++;
        }
    }
    ?>
        </tbody>
        </table>
    </div>
</section>
</body>
</html>