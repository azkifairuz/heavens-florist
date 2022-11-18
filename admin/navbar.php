<?php
    require "session.php";
    require "../src/koneksi.php";
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
<header
    class="flex fixed top-0 left-0 right-0 justify-center  bg-[#1f1c3f] text-white px-4 z-50 md:text-2xl text-xs" 
    >
      <div class="py-navbar-item px-navbar-item uppercase font-bold flex items-center ">
      <ul class="flex">
          <li>
              <span class="rounded-full md:w-8 md:h-8 h-5 w-5 bg-slate-400 block   mr-2"></span>
          </li> 
          <li class="relative top-0   ">
            <a
              href="index.php"
              class="myAccount flex justify-between items-center  "
            >
            <?php echo $_SESSION['username']; ?>
            </a>
          </li>
          
      </ul>  
    </div>
    
      <!-- main navbar -->
      <nav class=" flex">
        <ul class="grid grid-flow-col">
          <li class="categories">
            <a href="categories.php" 
              class="block cursor-pointer py-navbar-item  px-navbar-item md:hover:bg-slate-700 transition-colors md:mr-4"
              > Catagories</a
            >
          </li>
          <li>
            <a href="catalog.php"
              
              class="catalog block cursor-pointer py-navbar-item px-navbar-item md:hover:bg-slate-700 transition-colors md:mr-4"
              >Catalog</a
            >
          </li>
          <li>
            <a
              href="logout.php"
              class="flex items-center py-navbar-item px-navbar-item md:hover:bg-slate-700 transition-colors mr-4"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="  0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 mr-2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"
                />
              </svg>

              Logout
            </a>
          </li>
        </ul>
    </nav>
      
      <!-- main navbar -->
      <!-- humberger menu -->
</header>

<script src="../src/script.js"></script>
</body>
</html>