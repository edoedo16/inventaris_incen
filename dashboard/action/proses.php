<?php

include 'fungsi.php';

session_start();

if(isset($_POST['aksi'])){
    if($_POST['aksi'] == "tambahbarang"){
        $berhasil = tambahDataBarang($_POST);

        if($berhasil > 0){
            $_SESSION['alert'] = 'success';
            $_SESSION['pesan'] = 'Data berhasil ditambahkan.';
        }else{
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data gagal ditambahkan.';
        }

        echo "<script>window.location.href='../daftar-barang.php';</script>";
    }else if($_POST['aksi'] == "editbarang"){
        $berhasil = editDataBarang($_POST);

        if($berhasil > 0){
            $_SESSION['alert'] = 'success';
            $_SESSION['pesan'] = 'Data berhasil diedit.';
        }else{
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data gagal diedit.';
        }

        echo "<script>window.location.href='../daftar-barang.php';</script>";
    }else if($_POST['aksi'] == "hapusbarang"){
        $berhasil = hapusDataBarang($_POST);

        if($berhasil > 0){
            $_SESSION['alert'] = 'success';
            $_SESSION['pesan'] = 'Data berhasil dihapus.';
        }else{
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data gagal dihapus.';
        }

        echo "<script>window.location.href='../daftar-barang.php';</script>";
    }else if($_POST['aksi'] == "tambahtransaksi"){
        $berhasil = tambahTransaksi($_POST);

        if($berhasil > 0){
            $_SESSION['alert'] = 'success';
            $_SESSION['pesan'] = 'Peminjaman berhasil ditambahkan.';
        }else{
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Peminjaman gagal ditambahkan.';
        }

        echo "<script>window.location.href='../transaksi.php';</script>";
    }else if($_POST['aksi'] == "edittransaksi"){
        $berhasil = editTransaksi($_POST);

        if($berhasil > 0){
            $_SESSION['alert'] = 'success';
            $_SESSION['pesan'] = 'Pengembalian berhasil terkonfirmasi.';
        }else{
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Pengembalian gagal terkonfirmasi.';
        }

        echo "<script>window.location.href='../transaksi.php';</script>";
    }else if($_POST['aksi'] == 'tambahuser'){
        $berhasil = tambahUser($_POST);

        if($berhasil > 0){
            $_SESSION['alert'] = 'success';
            $_SESSION['pesan'] = 'Data berhasil ditambahkan.';
        }else{
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data gagal ditambahkan.';
        }

        echo "<script>window.location.href='../user.php';</script>";
    }else if($_POST['aksi'] == 'hapususer'){
        $berhasil = hapusUser($_POST);

        if($berhasil > 0){
            $_SESSION['alert'] = 'success';
            $_SESSION['pesan'] = 'Data berhasil dihapus.';
        }else{
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data gagal dihapus.';
        }

        echo "<script>window.location.href='../user.php';</script>";
    }else if($_POST['aksi'] == 'edituser'){
        $berhasil = editUser($_POST);

        if($berhasil > 0){
            $_SESSION['alert'] = 'success';
            $_SESSION['pesan'] = 'Data berhasil diedit.';
        }else{
            $_SESSION['alert'] = 'gagal';
            $_SESSION['pesan'] = 'Data gagal diedit.';
        }

        echo "<script>window.location.href='../user.php';</script>";
    }
}

if ($_GET['aksi'] == "logout") {
    $berhasil = logout();
    if ($berhasil) {
        echo "<script>window.location.href='../../';</script>";
    }
}


?>