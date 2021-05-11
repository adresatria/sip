<?php

session_start(); // untuk mengaktifkan session user

session_destroy(); // untuk menghentikan session user

header("location:login.php"); // memindahkan ke halaman login dan memberi pesan logout
?>
