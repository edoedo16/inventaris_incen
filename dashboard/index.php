<?php 

include "../include/koneksi.php";

$title = "Dashboard" ;
include "../include/head.php";

?>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 bg-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">
                        <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM `tb_databarang`");

                        $jumlah = mysqli_num_rows($sql);
                        echo $jumlah;
                        
                        ?>
                    </h5>
                    <div class="ms-auto">
                        <i class='bx bx-box fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-2 bg-white-transparent" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Total Barang</p>
                    <p class="mb-0 ms-auto"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 bg-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">
                        <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM `tb_transaksi`");

                        $jumlah = mysqli_num_rows($sql);
                        echo $jumlah;
                        
                        ?>
                    </h5>
                    <div class="ms-auto">
                        <i class='bx bx-transfer fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-2 bg-white-transparent" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Transaksi</p>
                    <p class="mb-0 ms-auto"></p>
                </div>
            </div>
        </div>
    </div>
    <?php

				if ($_SESSION['role'] == "Operator") {

				?>
    <div class="col">
        <div class="card radius-10 bg-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">
                        <?php
                        $sql = mysqli_query($koneksi, "SELECT * FROM `tb_user`");

                        $jumlah = mysqli_num_rows($sql);
                        echo $jumlah;
                        
                        ?>
                    </h5>
                    <div class="ms-auto">
                        <i class='bx bx-user fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-2 bg-white-transparent" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">User</p>
                    <p class="mb-0 ms-auto"></p>
                </div>
            </div>
        </div>
    </div>

    <?php
    
                }
    ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-primary">Selamat Datang di Aplikasi Inventaris "AIRIS"</h2>
                <p class="card-text">
                    Aplikasi untuk pencatatan barang inventaris di Polisi Pamong Praja Kota Tomohon
                </p>
                <hr>
            </div>
        </div>
    </div>
</div>

<?php
include "../include/foot.php";
?>