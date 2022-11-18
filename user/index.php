<?php 
    session_start();
    require "../src/koneksi.php";
    $queryProduk = mysqli_query($con,"SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Heaven's Florist</title>
        <link rel="stylesheet" href="../dist/output.css" />
    </head>
    <body class="bg-[#f9f9f9]">
        <header class="flex fixed top-0 left-0 right-0 justify-between text-white  bg-primary-500 text-gr px-4 z-50 text-lg">
        <div class="md:mt-3 md:ml-10 py-navbar-item px-navbar-item md:p-0">
        <img class="md:w-20 md:ml-10 w-14" src="../item/logo3.png" alt="">
        </div>
            <!-- Responsive navbar -->
            <div
                class="mobilenav hidden md:hidden fixed top-14 bottom-0 h-full left-0 bg-primary-500 shadow-2xl"
            >
                <ul>
                <li>
                    <a
                    href="index.php"
                    class="flex items-center py-2 px-navbar-item hover:bg-[#19126d]"
                    >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 mr-2"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                        />
                    </svg>
                    Home
                    </a>
                </li>
                <li>
                    <a
                    href="#"
                    class="block py-2 px-navbar-item hover:bg-[#19126d] transition-colors"
                    >Catagories</a
                    >
                </li>
                <li>
                    <a
                    href="#"
                    class="block py-2 px-navbar-item hover:bg-[#19126d] transition-colors"
                    >Catalog</a
                    >
                </li>
                </ul>
                <ul>
                <li class="relative">
                    <a
                    href="#"
                    class="myAccount flex justify-between items-center py-2 px-navbar-item hover:bg-slate-700 transition-colors"
                    >
                    My Account
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 ml-3 arrowleft"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8.25 4.5l7.5 7.5-7.5 7.5"
                        />
                    </svg>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 ml-3 arrowbot hidden"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                        />
                    </svg>
                    </a>
                    <ul
                    class="menuAccount hidden items-center bg-slate-800 w-full pb-3 text-sm"
                    >
                    <li>
                        <a
                        href="profil.php"
                        class="py-2 px-5 items-center flex hover:bg-slate-700"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>
                        My Profile
                        </a>
                    </li>
                    <li class="">
                        <a
                        href="cart.php"
                        class="py-2 px-5 items-center hover:bg-slate-700 flex"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                            />
                        </svg>
                            cart
                        </a>
                    </li>
                    <li>
                        <a
                        href="/src/orders.html"
                        class="py-2 px-5 items-center flex hover:bg-slate-700"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                            />
                        </svg>
                        Orders
                        </a>
                    </li>
                    <li>
                        <a
                        href="logout.php"
                        class="py-2 px-5 items-center flex hover:bg-slate-700"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
                            />
                        </svg>
                        Logout
                        </a>
                    </li>
                    </ul>
                </li>

            </div>
            <!-- responsive navbar -->
            <!-- main navbar -->
            <nav class="hidden md:block">
                <ul class="grid grid-flow-col">
                <li>
                    <a
                    href="index.php"
                    class="flex items-center py-navbar-item px-navbar-item hover:bg-[#19126d] transition-colors mr-4"
                    >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 mr-2"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                        />
                    </svg>
                    Home
                    </a>
                </li>
                <li class="categories">
                    <span
                    class="block cursor-pointer py-navbar-item px-navbar-item hover:bg-[#19126d] transition-colors mr-4"
                    >Catagories</span
                    >
                </li>
                <li>
                    <span
                    class="catalog block cursor-pointer py-navbar-item px-navbar-item hover:bg-[#19126d] transition-colors mr-4"
                    >Catalog</span
                    >
                </li>
                </ul>
            </nav>
            <nav class="hidden md:block">
                <ul class="grid grid-flow-col items-center">
                <li class="relative">
                    <span
                    
                    class="cursor-pointer flex myAccount items-center py-navbar-item px-navbar-item hover:bg-[#19126d] transition-colors mr-4"
                    >
                    My Account
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 ml-3 arrowleft"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8.25 4.5l7.5 7.5-7.5 7.5"
                        />
                    </svg>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 ml-3 arrowbot hidden"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                        />
                    </svg>
                    </span>
                    <ul
                    class="menuAccount hidden absolute items-center bg-primary-500 right-0 w-36 pb-3 mx-7 text-sm"
                    >
                    <li>
                        <a
                        href="profil.php"
                        class="py-2 px-5 items-center flex hover:bg-[#19126d]"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>
                        My Profile
                        </a>
                    </li>
                    <li class="">
                        <a
                        href="cart.php"
                        class="py-2 px-5 items-center hover:bg-[#19126d] flex"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 mr-3"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
                            />
                        </svg>
                        Cart
                        </a>
                    </li>
                    <li>
                        <a
                        href="/src/orders.html"
                        class="py-2 px-5 items-center flex hover:bg-[#19126d]"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"
                            />
                        </svg>

                        Orders
                        </a>
                    </li>
                    <li>
                        <a
                        href="logout.php"
                        class="py-2 px-5 items-center flex hover:bg-[#19126d]"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5 mr-2"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"
                            />
                        </svg>

                        Logout
                        </a>
                    </li>
                    </ul>
                </li>

                </ul>
            </nav>
            <!-- main navbar -->
            <!-- humberger menu -->
            <button class="block md:hidden">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6 humberger"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                />
                </svg>
                <!-- tanda silang -->
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6 hidden cross"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                />
                </svg>
            </button>
        </header>
        <!-- home page -->
        <div
        class="md:h-full md:text-primary-500 mx-auto md:rounded-xl md:px-5 pt-2 my-10 md:my-28 md:max-w-[800px] md:bg-[#d4d1ed]"
        >
        <section class="homePage">
            <div class="my-3 mx-3">
            <!-- title -->
            <div class="flex items-center mt-10 mb-3">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="#ffea00"
                stroke-width="1"
                stroke="black"
                class="w-6 h-6 mr-3 md:mt-1"
                >
                <path
                    fill-rule="evenodd"
                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                    clip-rule="evenodd"
                />
                </svg>
                <h1 class="text-xl md:text-2xl text-primary-500">Our Recomendation</h1>
            </div>
            <!-- container -->
            <div class="container py-5 w-full overflow-x-scroll md:overflow-x-hidden h-full scroll-smooth  ">
                <!-- card -->
                <div class="min-h-0 md:min-h-0 flex flex-col justify-center">
                <div class="relative m-3 flex   md:flex-wrap mx-auto justify-center">
                <div class="card relative max-w-sm min-w-[340px] bg-white border-2  hover:shadow-2xl rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                                <div class="overflow-x-hidden rounded-2xl relative">
                                    <img
                                    class="h-40 rounded-xl w-full object-cover bg-bottom"
                                    src="../item/rose red.jpeg?>"
                                    />
                                    <p
                                    class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group"
                                    >
                                    <a href="#" class="py-1 h-8 w-20" >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="black"
                                        >
                                            <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                            />
                                        </svg>
                                    </a> 
                                    </p>
                                </div>
                                <div class="mt-4 pl-2 mb-2 flex justify-between">
                                    <div>
                                    <p class="text-lg font-semibold text-gray-900 mb-0">
                                        rose red
                                    </p>
                                    <p class="text-md text-gray-800 mt-0">Rp 70k</p>
                                    <span class="rounded-sm mb-2 text-center mt-2 capitalize">tersedia</span>
                                    </div>
                                    <div
                                    class="flex flex-col-reverse mb-1 mr-4 cursor-pointer"
                                    >
                                    <a href="#" class="py-1 h-8 w-20" ><button class="hover:bg-[#166534] bg-[#16a34a] text-white rounded-md w-20 py-1 h-8"> Buy</button></a>
                                    <span class="rounded-sm mb-2 text-center">Setangkai</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card relative max-w-sm min-w-[340px] bg-white border-2  hover:shadow-2xl rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                                <div class="overflow-x-hidden rounded-2xl relative">
                                    <img
                                    class="h-40 rounded-xl w-full object-cover bg-bottom"
                                    src="../item/list produk/bouquet_lily.jpeg?>"
                                    />
                                    <p
                                    class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group"
                                    >
                                    <a href="#" class="py-1 h-8 w-20" >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="black"
                                        >
                                            <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                            />
                                        </svg>
                                    </a> 
                                    </p>
                                </div>
                                <div class="mt-4 pl-2 mb-2 flex justify-between">
                                    <div>
                                    <p class="text-lg font-semibold text-gray-900 mb-0">
                                        Lily
                                    </p>
                                    <p class="text-md text-gray-800 mt-0">Rp 250k</p>
                                    <span class="rounded-sm mb-2 text-center mt-2 capitalize">tersedia</span>
                                    </div>
                                    <div
                                    class="flex flex-col-reverse mb-1 mr-4 cursor-pointer"
                                    >
                                    <a href="#" class="py-1 h-8 w-20" ><button class="hover:bg-[#166534] bg-[#16a34a] text-white rounded-md w-20 py-1 h-8"> Buy</button></a>
                                    <span class="rounded-sm mb-2 text-center">Setangkai</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card relative max-w-sm min-w-[340px] bg-white border-2  hover:shadow-2xl rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                                <div class="overflow-x-hidden rounded-2xl relative">
                                    <img
                                    class="h-40 rounded-xl w-full object-cover bg-top"
                                    src="../item/list produk/tulip white.jpeg?>"
                                    />
                                    <p
                                    class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group"
                                    >
                                    <a href="#" class="py-1 h-8 w-20" >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="black"
                                        >
                                            <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                            />
                                        </svg>
                                    </a> 
                                    </p>
                                </div>
                                <div class="mt-4 pl-2 mb-2 flex justify-between">
                                    <div>
                                    <p class="text-lg font-semibold text-gray-900 mb-0">
                                        Tulip white
                                    </p>
                                    <p class="text-md text-gray-800 mt-0">Rp 80k</p>
                                    <span class="rounded-sm mb-2 text-center mt-2 capitalize">tersedia</span>
                                    </div>
                                    <div
                                    class="flex flex-col-reverse mb-1 mr-4 cursor-pointer"
                                    >
                                    <a href="#" class="py-1 h-8 w-20" ><button class="hover:bg-[#166534] bg-[#16a34a] text-white rounded-md w-20 py-1 h-8"> Buy</button></a>
                                    <span class="rounded-sm mb-2 text-center">Setangkai</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card relative max-w-sm min-w-[340px] bg-white border-2  hover:shadow-2xl rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                                <div class="overflow-x-hidden rounded-2xl relative">
                                    <img
                                    class="h-40 rounded-xl w-full object-cover bg-center"
                                    src="../item/list produk/bouquet_sunflower x rose.jpeg?>"
                                    />
                                    <p
                                    class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group"
                                    >
                                    <a href="#" class="py-1 h-8 w-20" >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="black"
                                        >
                                            <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                            />
                                        </svg>
                                    </a> 
                                    </p>
                                </div>
                                <div class="mt-4 pl-2 mb-2 flex justify-between">
                                    <div>
                                    <p class="text-lg font-semibold text-gray-900 mb-0">
                                        bucket sunflowerxrose
                                    </p>
                                    <p class="text-md text-gray-800 mt-0">Rp 300k</p>
                                    <span class="rounded-sm mb-2 text-center mt-2 capitalize">tersedia</span>
                                    </div>
                                    <div
                                    class="flex flex-col-reverse mb-1 mr-4 cursor-pointer"
                                    >
                                    <a href="#" class="py-1 h-8 w-20" ><button class="hover:bg-[#166534] bg-[#16a34a] text-white rounded-md w-20 py-1 h-8"> Buy</button></a>
                                    <span class="rounded-sm mb-2 text-center">bucket</span>
                                    </div>
                                </div>
                            </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        <!-- home page  -->
        <!-- catalog -->
        <section class="catalogPage">
            <div class="my-3 mx-3">
            <!-- title -->
            <div class="flex items-center mb-3">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="#ba181b"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="#000000"
                class="w-5 h-5 md:w-6 md:h-6 mr-2 mt-2"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 6h.008v.008H6V6z"
                />
                </svg>
                <h1 class="text-xl md:text-2xl">Catalog</h1>
            </div>
            <!-- container -->
            <div class="container py-5 w-full h-full">
                <!-- card -->
                <div class="min-h-0 overflow-x-scroll md:overflow-x-hidden md:min-h-0 flex flex-col justify-center scroll-smooth">
                <div class="relative m-3 flex md:flex-wrap mx-auto justify-center">
                    <?php 
                        while($data=mysqli_fetch_array($queryProduk)){
                            ?>
                            <div class="card relative max-w-sm min-w-[340px] bg-white border-2  hover:shadow-2xl rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                                <div class="overflow-x-hidden rounded-2xl relative">
                                    <img
                                    class="h-40 rounded-xl w-full object-cover bg-bottom"
                                    src="../item/<?php echo $data["gambar"] ?>"
                                    />
                                    <p
                                    class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group"
                                    >
                                    <a href="cart.php?id=<?php echo $data["id"]?>" class="py-1 h-8 w-20" >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="black"
                                        >
                                            <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                            />
                                        </svg>
                                    </a> 
                                    </p>
                                </div>
                                <div class="mt-4 pl-2 mb-2 flex justify-between">
                                    <div>
                                    <p class="text-lg font-semibold text-gray-900 mb-0">
                                        <?php echo $data['nama_bunga'] ?>
                                    </p>
                                    <p class="text-md text-gray-800 mt-0">Rp <?php echo $data["harga"] ?>k</p>
                                    <span class="rounded-sm mb-2 text-center mt-2 capitalize"><?php echo $data['ketersediaan_stok'] ?></span>
                                    </div>
                                    <div
                                    class="flex flex-col-reverse mb-1 mr-4 cursor-pointer"
                                    >
                                    <a href="beli.php?id=<?php echo $data["id"]?>" class="py-1 h-8 w-20" ><button class="hover:bg-[#166534] bg-[#16a34a] text-white rounded-md w-20 py-1 h-8"> Buy</button></a>
                                    <span class="rounded-sm mb-2 text-center"><?php echo $data['nama_kategori'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div> 
                </div>
            </div>
            </div>
        </section>
        <!-- catalog -->
        <!-- categories page -->
        <section class="categoriesPage my-3 mx-3">
            <div class="my-3 flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2 w-6 h-6">
                <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
            </svg>          
            <h1 >Catagories</h1>
            </div>
            <div class="my-5">
            <div
                class="grid mx-auto w-[320px] h-full py-3 px-3 grid-cols-2 gap-2 text-center md:w-[800px] md:grid-cols-4"
            >
            <span class="w-36 h-36 block transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110">
            <img src="../item/kategori 1.png" class="w-36 h-36" alt="" />
            </span>
            <span class="w-36 h-36 block  transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 ">
            <img
                src="../item/kategori 2.png"
                class="w-36 h-36"
                alt=""
            />
            </span>
            <span class="w-36 h-36 block  transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 ">
            <img
                src="../item/kategori 3.png"
                class="w-36 h-36"
                alt=""
            />
            </span>
            <span class="w-36 h-36 block  transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110">
            <img src="../item/kategori 4.png" class="w-36 h-36" alt="" />
            </span>
            </div>
            </div>
        </section>
        <!-- categories page -->
        </div>
        <script src="../src/script.js"></script>
    </body>
</html>
