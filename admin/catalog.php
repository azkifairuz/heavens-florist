<?php
    require "../src/koneksi.php";
    require "navbar.php";
    $queryCatalog = mysqli_query($con , "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id");
    $jumlahCatalog = mysqli_num_rows($queryCatalog);

    $queryCategori = mysqli_query($con , "SELECT * FROM kategori");

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
        <div class="mx-auto container  w-full mt-20 items-center ">
            <div class="mx-auto  max-w-xs flex flex-col justify-center items-center ">
                <h1 class="my-2 text-2xl font-bold">Add Catalog</h1>
                <form action="" method="post" enctype="multipart/form-data" class="md:w-[36rem]">
                    <div>
                        <label for="catalog" class="text-lg"></label>
                        <input type="text" id="catalog" name="catalog" placeholder="input catalog" class="md:w-full rounded-md border-2 block border-black my-2 p-2" required>
                    </div>
                    <div>
                        <label for="kategori"></label>
                        <select name="kategori" id="kategori" placeholder="pilih..." class="w-full py-2 rounded-md border-2 border-black">
                            <option value="" required>Pilih Kategori...</option>
                            <?php
                                while($data=mysqli_fetch_array($queryCategori)){
                                    ?>
                                    <option value="<?php echo $data['id'] ?>"> <?php echo $data['nama'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="harga"></label>
                        <input name="harga" id="harga" type="number" placeholder="Harga" class="md:w-full rounded-md border-2 block border-black my-2 p-2" required>
                    </div>
                    <div>
                        <label for="foto"></label>
                        <input name="foto" type="file" id="foto" class="form-control cursor-pointer block  w-full   text-base   font-normal   text-gray-700   bg-white bg-clip-padding   border border-solid border-gray-300   rounded   transition   ease-in-out   m-0   focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"">
                        <p class="mt-1 text-sm text-black" id="file_input_help">SVG, PNG, JPG or GIF size dibawah 50mb.</p>
                    </div>
                    <div>
                        <label for="detile">Detail</label>
                        <textarea name="detile" id="detile" placeholder="detile" cols="30" rows="10" class="rounded-md block border-2 border-black form-control "></textarea>
                    </div>
                    <div>
                        <label for="stok"></label>
                        <select name="stok" id="stok" class="w-full py-2 rounded-md border-2 border-black mt-5">
                            <option value="tersedia">Tersedia</option>
                            <option value="tiak tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="items-center ">
                        <button class="md:w-full py-2 px-5 mt-2  bg-blue-500 text-white rounded-xl border-2 " type="submit" name="simpan_catalog">Submit</button>
                    </div>
                </form>
                <?php 
                    if (isset($_POST['simpan_catalog'])) {
                        $catalog = htmlspecialchars($_POST['catalog']);
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $harga = htmlspecialchars($_POST['harga']);
                        $stok = htmlspecialchars($_POST['stok']);
                        $detile = htmlspecialchars($_POST['detile']);
                        //validasi gambar    
                        $fileSize = $_FILES["foto"]["size"];
                        $target_dir = "../item/";
                        $nama_file = basename($_FILES["foto"]["name"]);
                        $target_file = $target_dir . $nama_file ;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $image_size = $_FILES["foto"]["size"];
                        $RandomAccountNumber = uniqid();

                        $new_name = $RandomAccountNumber . "." . $imageFileType;
                        if($catalog == "" || $kategori== "" || $harga == "" ){
                            ?>
                            <div class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Masih Ada field kosong</strong>
                            </div>
                            <?php
                        }else{
                            if($nama_file != ""){
                                if($image_size > 50000000){
                                    ?>
                                        <div class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative" role="alert">
                                            <strong class="font-bold">file lebih dri 50mb</strong>
                                        </div>
                                    <?php
                                }else{
                                    if($imageFileType !="jpg" && $imageFileType!= "png" && $imageFileType != "svg" && $imageFileType != "gif"){
                                        ?>
                                        <div class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative" role="alert">
                                            <strong class="font-bold">tipe file tidak sesuai</strong>
                                        </div>
                                    <?php
                                    }else{
                                        move_uploaded_file($_FILES["foto"]["tmp_name"],$target_dir . $new_name );
                                    }
                                }
                            }
                            //nambah data ke database
                             //mengambil nama catalog yg ada di table catalog
                            $queryTambah = mysqli_query($con, "INSERT INTO  produk (kategori_id, nama_bunga, harga ,gambar ,detail, ketersediaan_stok) VALUE('$kategori','$catalog','$harga','$new_name','$detile','$stok')");
                            if($queryTambah){
                                ?>
                            <div class="bg-green-100 border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative" role="alert">
                                <strong class="font-bold"> produk berhasil tersimpan</strong>
                            </div>\
                            <meta http-equiv="refresh" content="0, url=catalog.php">
                            <?php
                            }
                        }                        
                    }
                ?>
            </div>
        </div>
<section class="categories mb-10 ">
    <div class=" mx-auto w-full">
        <table class="border-2  border-blue-700 text-left mx-auto  table-auto  mt-10">
            <thead class="bg-gradient-to-br from-purple-500 to-blue-700 text-white">
                <tr>
                    <th class="px-6 py-2">No</th>
                    <th class="px-6 py2">Catalog</th>
                    <th class="px-6 py2">Kategori</th>
                    <th class="px-6 py2">Harga</th>
                    <th class="px-6 py2">Ketersediaan Stok</th>
                    <th class="px-6 py2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        if($jumlahCatalog==0){
            ?> 
        <tr colspan=5>
            <td colspan=5>Tidak ada data</td>
        </tr>
    <?php 
        } else{
            $jumlah = 1;
            while($data=mysqli_fetch_array($queryCatalog)){
                ?>
                <tr>
                    <td class="py-2 px-6"><?php echo $jumlah; ?></td>
                    <td class="py-2 px-6"><?php echo $data['nama_bunga']; ?></td>
                    <td class="py-2 px-6"><?php echo $data['nama_kategori']; ?></td>
                    <td class="py-2 px-6"><?php echo $data['harga']; ?></td>
                    <td class="py-2 px-6"><?php echo $data['ketersediaan_stok']; ?></td>
                    <td class="py-2 px-6 text-center"><a href="edit-catalog.php?p=<?php echo $data['id']; ?>" class=" cursor-pointer text-center rounded-md  bg-blue-400 text-white p-[0.30rem] w-7 h-7">GO</a></td>
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