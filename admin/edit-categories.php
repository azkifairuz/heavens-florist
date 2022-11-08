<?php 
    require "../src/koneksi.php";
    require "navbar.php";
    $id =  $_GET['p'];
    $query = mysqli_query($con,"SELECT * FROM kategori WHERE id='$id' ");
    $data = mysqli_fetch_array($query);
    
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
<body >
    <div class="mx-auto mt-20 container w-3/6  flex flex-col items-center">
        <h1 class=" text-2xl text-center mb-5">Edit Kategori</h1>
        <form  action="" method="POST">
            <div>
                <label for="kategori" class="mr-2 block">Kategori</label>
                <input type="text" name="kategori" id="kategori" value="<?php echo $data['nama'] ?>" class="w-60 border-2 p-1 text-l capitalize border-black">
            </div>
            <div class="mt-5 ">
                <button type="submit"  name="edt-btn" class=" bg-blue-400 text-white px-4 py-1 text-base rounded-md ">Edit</button>
                <button type="submit"  name="delete-btn" class=" bg-red-400 text-white px-4 py-1 text-base rounded-md ">Delete</button>
            </div>
        </form>
        <?php 
            if(isset($_POST['edt-btn']))
            {
                $kategori = htmlspecialchars($_POST['kategori']);
                if($data['nama']==$kategori){
                    ?>
                            <meta http-equiv="refresh" content="0; url=categories.php"/>
                    
                    <?php
                }else{
                    $queryName = mysqli_query($con,"SELECT * FROM kategori WHERE nama='$kategori' ");
                    $jumlahQuery =  mysqli_num_rows($queryName);
                    if ($jumlahQuery>0) {
                        ?>
                        <div class="bg-red-100 border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Kategori Sudah ada</strong>
                        </div>
                        <?php
                    }else{
                        $updateData = mysqli_query($con,"UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                        if($updateData){
                            ?>
                            <div class="bg-green-100 border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Kategori Berhasil Di Update</strong>
                            </div>

                            <meta http-equiv="refresh" content="1; url=categories.php"/>
                            <?php
                        }else{
                            echo mysqli_errord($con);
                        }
                    }
                }
            }
            if (isset($_POST['delete-btn'])) {
                $queryDelete = mysqli_query($con , "DELETE FROM kategori where id='$id'");
                if($queryDelete) {
                    ?>
                    <div class="bg-green-100 border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Kategori Berhasil diHapus</strong>
                    </div>

                    <meta http-equiv="refresh" content="1; url=categories.php"/>
                    <?php
                }
            }
        ?>
    </div>
</body>
</html>