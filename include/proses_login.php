<?php

include "koneksi.php";
session_start();

$user = htmlspecialchars($_POST['username']);
$pass = htmlspecialchars($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM `tb_user` WHERE `username` ='$user'");

$selek = mysqli_fetch_assoc($query);
$row = mysqli_num_rows($query);

if ($row >= 1) {
    $passs = $selek['password'];
    if (password_verify($pass, $passs)) {

        if ($selek["role"] == "Operator") {
            $_SESSION['status'] = "Sukses";
            $_SESSION['nama'] = $selek['nama'];
            $_SESSION['role'] = $selek['role'];
            header("location: ../dashboard/");
        } else if ($selek['role'] == "Admin") {
            $_SESSION['status'] = "Sukses";
            $_SESSION['nama'] = $selek['nama'];
            $_SESSION['role'] = $selek['role'];
            header("location:../dashboard/");
        }
    } else {
        $_SESSION['status'] = "Gagal";


        echo "
        <script>
            window.location.href='../index.php';
        </script>";
    }
} else {

    $_SESSION['status'] = "Gagal";


    echo "
    <script>
        window.location.href='../index.php';
    </script>";
}