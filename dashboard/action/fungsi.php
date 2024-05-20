<?php

include '../../include/koneksi.php';

function tambahDataBarang($data){
    
    global $koneksi;
    $kodebarang = htmlspecialchars($data['kodebarang']);
    $namabarang = htmlspecialchars($data['namabarang']);
    $jumlahbarang = htmlspecialchars($data['jumlahbarang']);
    $kondisi = htmlspecialchars($data['kondisi']);
    $keterangan = htmlspecialchars($data['keterangan']);
    
    $direktori = "../gambar/";
    $filename = $_FILES['image']['name'];
    // $ukurangambar = $_FILES['gambar']['size'];
    // $gambarError = $_FILES['gambar']['error'];
    // $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $filename);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $namaBaru = uniqid();
    $namaBaru .= '.';
    $namaBaru .= $ekstensiGambar;

    $sql ="INSERT INTO `tb_databarang`( `kode_barang`, `nama_barang`, `jumlah`, `kondisi`, `keterangan`, `gambar`) VALUES ('$kodebarang','$namabarang','$jumlahbarang','$kondisi','$keterangan','$namaBaru')";

    mysqli_query($koneksi, $sql);

    move_uploaded_file($_FILES['image']['tmp_name'], $direktori . $namaBaru);
    
    $hasil = mysqli_affected_rows($koneksi);
    return $hasil;
    
}

function hapusDataBarang($data){

    global $koneksi;
    $id = $data['id'];

    $sql = "DELETE FROM `tb_databarang` WHERE `id_barang` = '$id'";

    mysqli_query($koneksi, $sql);

    $hasil = mysqli_affected_rows($koneksi);
    return $hasil;
}

function editDataBarang($data){
    
    global $koneksi;
    $id = $data['id'];
    $kodebarang = htmlspecialchars($data['kodebarang']);
    $namabarang = htmlspecialchars($data['namabarang']);
    $jumlahbarang = htmlspecialchars($data['jumlahbarang']);
    $kondisi = htmlspecialchars($data['kondisi']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $gambarr = htmlspecialchars($data['gambarr']);
    
    

   

    // if(!empty($_FILES['image'])){

    //     $direktori = "../gambar/";
    //     $filename = $_FILES['image']['name'];
    //     // $ukurangambar = $_FILES['gambar']['size'];
    //     // $gambarError = $_FILES['gambar']['error'];
    //     // $ekstensiValid = ['jpg', 'jpeg', 'png'];
    //     $ekstensiGambar = explode('.', $filename);
    //     $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    //     $namaBaru = uniqid();
    //     $namaBaru .= '.';
    //     $namaBaru .= $ekstensiGambar;

    //     move_uploaded_file($_FILES['image']['tmp_name'], $direktori . $namaBaru);

    //     $sql = "UPDATE `tb_databarang` SET `kode_barang`='$kodebarang',`nama_barang`='$namabarang',`jumlah`='$jumlahbarang',`kondisi`='$kondisi',`keterangan`='$keterangan',`gambar`='$namaBaru' WHERE `id_barang`='$id'";

    //     mysqli_query($koneksi, $sql);
    
    //     $hasil = mysqli_affected_rows($koneksi);
    //     return $hasil;
    // }else {
       // $namaBaru = $gambarr;

        $sql = "UPDATE `tb_databarang` SET `kode_barang`='$kodebarang',`nama_barang`='$namabarang',`jumlah`='$jumlahbarang',`kondisi`='$kondisi',`keterangan`='$keterangan' WHERE `id_barang`='$id'";

        mysqli_query($koneksi, $sql);
    
        $hasil = mysqli_affected_rows($koneksi);
        return $hasil;
    //}

   
}

function tambahTransaksi($data){

    global $koneksi;
    $idbarang = htmlspecialchars($data['idbarang']);
    $nama = htmlspecialchars($data['nama']);
    $jumlahbarang = htmlspecialchars($data['jumlahbarang']);
    $keterangan = htmlspecialchars($data['keterangan']);
    
    $sql1 = mysqli_query($koneksi, "SELECT `jumlah` FROM `tb_databarang` WHERE `id_barang` = '$idbarang'");
    $selek = mysqli_fetch_assoc($sql1);

    $jumlahbaru = $selek['jumlah'] - $jumlahbarang;

    $sql2 = mysqli_query($koneksi, "INSERT INTO `tb_transaksi`(`id_barang`, `nama_peminjam`, `jumlah_pinjaman`, `keterangan_pinjaman`) VALUES ('$idbarang','$nama','$jumlahbarang','$keterangan')");

    $sql3 = mysqli_query($koneksi, "UPDATE `tb_databarang` SET `jumlah` = '$jumlahbaru' WHERE `id_barang` = '$idbarang'");

    $hasil = mysqli_affected_rows($koneksi);
    return $hasil;
    
}

function editTransaksi($data){
    
    global $koneksi;
    $idtransaksi = $data['id'];
    $idbarang = $data['idb'];
    $kondisi = htmlspecialchars($data['kondisi']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $jumlahbarang = htmlspecialchars($data['jumlahbarang']);

    $sql1 = mysqli_query($koneksi, "SELECT `jumlah` FROM `tb_databarang` WHERE `id_barang` = '$idbarang'");
    $selek = mysqli_fetch_assoc($sql1);

    $jumlahbaru = $selek['jumlah'] + $jumlahbarang;

    $sql = "UPDATE `tb_transaksi` SET `kondisi_setelah`='$kondisi',
    `jumlah_kembali`='$jumlahbarang',`keterangan_pinjaman`='$keterangan', `tanggal_pengembalian` = CURRENT_TIMESTAMP WHERE `id_transaksi`='$idtransaksi'";

    $sql2 = "UPDATE `tb_databarang` SET `jumlah` = '$jumlahbaru' WHERE `id_barang`='$idbarang'";

    mysqli_query($koneksi, $sql);
    mysqli_query($koneksi, $sql2);
    
    $hasil = mysqli_affected_rows($koneksi);
    return $hasil;

}

function tambahUser($data){

    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $role = htmlspecialchars($data['role']);

    $passhash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO `tb_user`(`nama`,`username`, `password`, `role`) VALUES ('$nama','$username','$passhash','$role')";

    mysqli_query($koneksi,$sql);

    $hasil = mysqli_affected_rows($koneksi);
    return $hasil;
}

function hapusUser($data){
    
    global $koneksi;
    $id = $data['id'];

    $sql = "DELETE FROM `tb_user` WHERE `id_user` = '$id'";

    mysqli_query($koneksi, $sql);

    $hasil = mysqli_affected_rows($koneksi);
    return $hasil;
}

function editUser($data){
    
    global $koneksi;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $role = htmlspecialchars($data['role']);

    $passhash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE `tb_user` SET `nama`='$nama',`username`='$username',`password`='$passhash',`role`='$role' WHERE `id_user`='$id'";

    mysqli_query($koneksi, $sql);

    $hasil = mysqli_affected_rows($koneksi);
    return $hasil;
}


function logout()
{
    unset($_SESSION);
    session_destroy();

    return true;
}


?>