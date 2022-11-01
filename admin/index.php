<?php   
    require "../src/koneksi.php";
    require "navbar.php";
    $queryKategori = mysqli_query($con , "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username']; ?>'s home</title>
    <link rel="stylesheet" href="../dist/output.css">
    
</head>
<body>

<section class="mt-20 mx-10 md:mx-[600px] text-center mb-5">
    <h1 class="text-2xl ">Halo <?php echo $_SESSION['username']; ?></h1>
</section>

<section class="summary md:mx-[600px] mx-28">
        <div class="flex flex-col justify-between h-full ">
            <div class="flex w-80 item-center  mb-10 py-7 px-5 h-40 justify-between rounded-xl from-purple-500 to-blue-400 bg-gradient-to-br">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                <div class="text-center">
                    <h1 class="text-4xl">Categories</h1>
                    <p><?php echo $jumlahKategori  ?> Catagories</p>
                    <a href="categories.php">
                        <p>Detile</p>
                    </a>
                </div>
            </div>
            <div class="flex w-80 item-center py-7 px-5 h-40  rounded-xl from-blue-400 to-[#b5e6db] bg-gradient-to-br">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                <div class="text-center ml-10">
                    <h1 class="text-4xl">Catalog</h1>
                    <p>0 catalog</p>
                    <p>Detile</p>
                </div>
            </div>
        </div>
</section>


    <script src="../src/script.js"></script>
</body>
</html>