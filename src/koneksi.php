<?php
    $con = mysqli_connect("localhost","root","","ecommercedb");

    //check connection
    if (mysqli_connect_errno()) {
        echo"gagal terkoneksi anjirr: " . mysqli_connect_error();
        exit();
    }
?>