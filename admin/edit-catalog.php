<?php 
    require "../src/koneksi.php";
    require "navbar.php";
    $id =  $_GET['p'];
    $queryProduk = mysqli_query($con,"SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id WHERE a.id='$id'");
    $dataProduk = mysqli_fetch_array($queryProduk);
    $queryKategori = mysqli_query($con, "SELECT * FROM kategori where id!='$dataProduk[kategori_id]'");
    
    
?>

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
    <div class=" container my-20 mx-auto  w-3/6  flex flex-col items-center">
        <h1 class="text-2xl text-center">Edit Catalog</h1>
        <form action=""  method="post" class="w-[36rem]  mx-auto"  enctype="multipart/form-data">
            <div>
                <label for="catalog">Nama Bunga</label>
                <input type="text" name="catalog" id="catalog" class="block border-2 border-black rounded-md w-full p-2" value="<?php echo $dataProduk["nama_bunga"]  ?>"  required>
            </div>
            <div>
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori"  class="block border-2 border-black rounded-md w-full p-2" required>
                    <option value="<?php echo $dataProduk['kategori_id'] ?>"><?php echo $dataProduk['nama_kategori'] ?></option>
                    <?php 
                        while($data = mysqli_fetch_array($queryKategori)){
                            ?>
                    
                            <option value="<?php echo $data["id"] ?>"><?php echo $data["nama"] ?> </option>
                            <?php
                        }
                        ?>
                </select>
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="block border-2 border-black rounded-md w-full p-2" value="<?php echo $dataProduk["harga"]  ?>" required>
            </div>
            <div>
                <label for="currentFoto">Foto bunga</label>
                <img src="../item/<?php echo $dataProduk['gambar']?>" alt="gambar" class="w-20 h-20">
            </div>
            <div class="mt-2">
                <label for="foto"></label>
                <input type="file" name="foto" id="foto" class="block border-2 border-black rounded-md w-full" value="<?php echo $dataProduk["gambar"]  ?>" >
            </div>
            <div>
                <label for="detile">detile</label>
                <textarea name="detile" id="detile" cols="30" rows="10" class="block border-2 border-black rounded-md w-full "  ><?php echo $dataProduk["detail"]  ?></textarea>
            </div>
            <div>
                <label for="stok">Stok</label>
                <select name="stok" id="stok"  class="block border-2 border-black rounded-md w-full p-2" required>
                        <option value="<?php echo $dataProduk["ketersediaan_stok"] ?>"><?php echo $dataProduk["ketersediaan_stok"] ?></option>
                        <?php
                        if($dataProduk["ketersediaan_stok"]== 'tersedia'){
                            ?>
                                <option value="tidak tersedia">Habis</option>
                            <?php
                        }else{
                            ?>
                                <option value="tidak tersedia">Tersedia</option>
                            <?php
                        }
                        ?>
                </select>
            </div>
            <div>
                <button name="btn-simpan" class="bg-blue-400 hover:bg-blue-500 rounded px-5 py-1 text-white mt-5">Edit</button>
                <button name="btn-delete" class="bg-red-400 hover:bg-red-500 rounded px-5 py-1 text-white mt-5">Delete</button>
            </div>
        </form>

        <?php
            if(isset($_POST['btn-simpan'])){
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
                            $queryUpdate = mysqli_query($con , "UPDATE produk SET kategori_id='$kategori',nama_bunga='$catalog', harga='$harga', detail='$detile',ketersediaan_stok='$stok' WHERE id='$id'");
                            if($nama_file != ""){
                                if($image_size > 5000000){
                                    ?>
                                        <div class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative" role="alert">
                                            <strong class="font-bold">file lebih dri 50mb</strong>
                                        </div>
                                    <?php
                                }else{
                                    if($imageFileType !="jpg" && $imageFileType!= "png" && $imageFileType != "svg" && $imageFileType != "gif" && $imageFileType != "jpeg"){
                                        ?>
                                        <div class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative" role="alert">
                                            <strong class="font-bold">tipe file tidak sesuai</strong>
                                        </div>
                                        <?php
                                    }else{
                                        move_uploaded_file($_FILES["foto"]["tmp_name"],$target_dir . $new_name );
                                        $queryUpdate = mysqli_query($con , "UPDATE produk SET gambar='$new_name' WHERE id='$id'");
                                        
                                }
                            }
                            
                            }
                            if ($queryUpdate) {
                                ?>
                                <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative" role="alert">
                                    <strong class="font-bold"> produk berhasil diupdate</strong>
                                </div>
                                <meta http-equiv="refresh" content="2; url=catalog.php">
                                <?php
                            }
                        }
            }
            if (isset($_POST['btn-delete'])) {
                $queryDelete = mysqli_query($con , "DELETE FROM produk where id='$id'");
                if($queryDelete) {
                    ?>
                    <div class="bg-green-100 border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Kategori Berhasil diHapus</strong>
                    </div>

                    <meta http-equiv="refresh" content="1; url=catalog.php"/>
                    <?php
                }
            }
        ?>
    </div>
</body>
</html>