<?php

session_start();

if (empty($_SESSION['status'])) {
	echo "<script>
	window.location.href='../error.php';
	</script>";
}




?>


<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../assets/images/logopolpp.png" type="image/png" />
    <!--plugins-->
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
    <link href="../assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
    <link href="../assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">

    <title>AIRIS - <?= $title; ?></title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="ms-2">
                    <img src="../assets/images/logopolpp.png" class="logo-icon ">
                </div>
                <div>
                    <div class="logo-text m-3 fs-3">
                        <div class="ms-3 ">
                            <h3>AIRIS</h3>
                        </div>

                    </div>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">


                <?php

				//if ($_SESSION['role'] == "user") {
				?>

                <!-- <li>
                    <a href="dashboard.php">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="status-reservasi.php">
                        <div class="parent-icon"><i class='bx bx-message-detail'></i>
                        </div>
                        <div class="menu-title">Status Reservasi</div>
                    </a>
                </li> -->

                <?php
				//} else {
				?>

                <span> </span>

                <?php
				//}

				?>

                <?php

				//if ($_SESSION['role'] == "admin") {

				?>

                <!-- <li>
                    <a href="index.php">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>

                </li>
                <li>
                    <a href="status-mobil.php">
                        <div class="parent-icon"><i class='bx bx-info-circle'></i>
                        </div>
                        <div class="menu-title">Status Mobil</div>
                    </a>
                </li>
                <li>
                    <a href="daftar-mobil.php">
                        <div class="parent-icon"><i class='bx bx-car'></i>
                        </div>
                        <div class="menu-title">Daftar Mobil</div>
                    </a>

                </li>
                <li>
                    <a href="daftar-driver.php">
                        <div class="parent-icon"><i class='bx bx-user-circle'></i>
                        </div>
                        <div class="menu-title">Daftar Driver</div>
                    </a>

                </li> -->

                <?php

				//} else {
				?>

                <span> </span>

                <?php
				//}
				?>


                <?php

				//if ($_SESSION['role'] == "developer") {

				?>
                <li>
                    <a href="index.php">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>

                </li>
                <li>
                    <a href="daftar-barang.php">
                        <div class="parent-icon"><i class='bx bx-box'></i>
                        </div>
                        <div class="menu-title">Daftar Barang</div>
                    </a>

                </li>
                <li>
                    <a href="transaksi.php">
                        <div class="parent-icon">
                            <i class="bx bx-transfer"></i>
                        </div>
                        <div class="menu-title">Transaksi</div>
                    </a>
                    <!-- <ul>
                        <li>
                            <a><i class="bx bx-folder-minus"></i>Peminjaman</a>
                        </li>
                        <li>
                            <a><i class="bx bx-folder-plus"></i>Pengembalian</a>
                        </li>
                    </ul> -->
                </li>

                <?php

				if ($_SESSION['role'] == "Operator") {

				?>
                <li>
                    <a href="user.php">
                        <div class="parent-icon"><i class='bx bx-user'></i>
                        </div>
                        <div class="menu-title">User</div>
                    </a>
                </li>
                <?php
				}

				?>

                <!-- 
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class='bx bx-info-circle'></i>
                        </div>
                        <div class="menu-title">Status Mobil</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class='bx bx-car'></i>
                        </div>
                        <div class="menu-title">Daftar Mobil</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class='bx bx-user-circle'></i>
                        </div>
                        <div class="menu-title">Daftar Driver</div>
                    </a>

                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class='bx bx-user-plus'></i>
                        </div>
                        <div class="menu-title">User</div>
                    </a>
                </li> -->

                <?php
			//	} else {
				?>

                <span> </span>

                <?php
				//}

				?>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="search-bar flex-grow-1">
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-notifications-list">

                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-message-list">

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../assets/images/icons/user.png" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0"><?= $_SESSION['nama']; ?></p>
                                <p class="designattion mb-0"><?= $_SESSION['role']; ?></p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="action/proses.php?aksi=logout"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">