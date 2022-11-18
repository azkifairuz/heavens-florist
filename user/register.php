<?php
    session_start();
    require "../src/koneksi.php "
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign Up</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
<section >
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            welcome to  Heaven's florist gang
        </a>
        <div class="w-full  rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 bg-primary-500 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign Up
                </h1>
                <form class="space-y-4 md:space-y-6" action="" method="post">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">username</label>
                        <input type="text" name="username" id="username" class="bg-primary-800 border border-gray-300 text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Input Username" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                        <input type="email" name="email" id="email" class="bg-primary-800 border border-gray-300 text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="blablbal@gmail.com" required>
                    </div>
                    <div>
                        <label for="password1" class="block mb-2 text-sm font-medium text-white ">Password</label>
                        <input type="password1" name="password1" id="password1" placeholder="••••••••" class="bg-primary-800 border border-gray-300 text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-primary-800 border border-gray-300 text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required>
                    </div>
                
                    <button type="submit" name="loginbutton" class="w-full text-white bg-primary-300 hover:bg-primary-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                </form>
            </div>
        </div>
        <div class="text-black">
            <?php
                if (isset($_POST['loginbutton'])) {
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);
                    $password1 = htmlspecialchars($_POST['password1']);
                    $email = htmlspecialchars($_POST['email']);
                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username' ");
                    $checkData = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                    
                    if ($checkData > 0) {
                        ?>
                        <div class="bg-red-100 border border-red-400 w-full text-red-700 px-10 py-3 rounded relative" role="alert">
                            <strong class="font-bold">username sudah  ada</strong>
                        </div>
                        <?php
                    }else {
                        if ($password1 != $password) {
                            echo 'pasword tidak sesuai';
                        }else{
                            $tambahUser= mysqli_query($con,"INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');");
                            if ($tambahUser) {
                                ?>
                                <div class="bg-red-100 border border-red-400 w-full text-red-700 px-10 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">berhasil daftar silahkan login</strong>
                                </div>
                                <meta http-equiv="refresh" content="2; url=login.php">
                            <?php
                            }else {
                                
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>

</section>
</body>
</html>