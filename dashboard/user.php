<?php


include "../include/koneksi.php";

$title = "User";
include "../include/head.php";

$data = mysqli_query($koneksi, "SELECT * FROM `tb_user`");
?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

    <div class="col">
        <a href="#" data-bs-toggle="modal" data-bs-target="#tambahUserModal">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0 text-white">Tambah User</h6>
                        <div class="ms-auto">
                            <i class='bx bx-add-to-queue fs-3 text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- modal -->

    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <form class="row g-1" action="action/proses.php" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Nama</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-user'></i></span>
                                <input type="text" name="nama" class="form-control border-start-0" placeholder="Nama"
                                    autocomplete="off" maxlength="100" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Username</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-label'></i></span>
                                <input type="text" name="username" class="form-control border-start-0"
                                    placeholder="Username" autocomplete="off" maxlength="50" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Password</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-label'></i></span>
                                <input type="text" name="password" class="form-control border-start-0"
                                    placeholder="Password" maxlength="50" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Role</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-label'></i></span>
                                <select name="role" class="form-control">
                                    <option selected value="Admin">Admin</option>
                                    <option value="Operator">Operator</option>
                                </select>
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" value="tambahuser" name="aksi">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- end modal -->


</div><!-- end row -->

<!-- Start Content -->
<div class="card radius-10">
    <div class="card-body">

        <!-- alert -->
        <?php

		if (isset($_SESSION['alert'])) {

			if ($_SESSION['alert'] == "success") {

		?>


        <div class="col-12">
            <div class="alert alert-outline-success shadow-sm alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-success"><?= $_SESSION['pesan'] ?></h6>
                    </div>
                </div>
            </div>
        </div>

        <?php
				unset($_SESSION['alert']);
			}
		}

		?>
        <!-- end alert -->

        <!-- alert -->
        <?php

		if (isset($_SESSION['alert'])) {

			if ($_SESSION['alert'] == "gagal") {

		?>


        <div class="col-12">
            <div class="alert alert-outline-danger shadow-sm alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-danger"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-danger"><?= $_SESSION['pesan'] ?></h6>
                    </div>
                </div>
            </div>
        </div>

        <?php
				unset($_SESSION['alert']);
			}
		}

		?>
        <!-- end alert -->

        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-0">Daftar Inventaris</h5>
            </div>

        </div>
        <hr>
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="dt">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

					$no = 1;

					foreach ($data as $d) {

					?>
                    <tr>
                        <td>
                            <?= $no++; ?>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">

                                <div class="ms-2">
                                    <h6 class="mb-1 font-14">
                                        <?= htmlspecialchars($d['nama']); ?>
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= htmlspecialchars($d['username']); ?>
                        </td>
                        <td><?= htmlspecialchars($d['role']); ?></td>
                        <td>
                            <div class="d-flex order-actions">
                                <a href="javascript:;" class="bg bg-warning text-white" data-bs-toggle="modal"
                                    data-bs-target="#editModal<?= $no; ?>"><i class="bx bx-edit-alt"></i></a>
                                <a href="javascript:;" class="bg bg-danger text-white ms-4" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal<?= $no; ?>"><i class="bx bx-x"></i></a>
                            </div>
                        </td>
                    </tr>

                    <!--Edit modal -->

                    <div class="modal fade" id="editModal<?= $no; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Reservasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <form action="action/proses.php" method="POST">
                                        <div class="row g-1">
                                            <div class="col-12">
                                                <label class="form-label">Nama</label>
                                                <div class="input-group"> <span
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bxs-user'></i></span>
                                                    <input type="text" name="nama" class="form-control border-start-0"
                                                        placeholder="Nama" autocomplete="off" maxlength="100" required
                                                        value="<?= $d['nama']?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Username</label>
                                                <div class="input-group"> <span
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bxs-label'></i></span>
                                                    <input type="text" name="username"
                                                        class="form-control border-start-0" placeholder="Username"
                                                        autocomplete="off" maxlength="50" required
                                                        value="<?= $d['username']?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group"> <span
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bxs-label'></i></span>
                                                    <input type="text" name="password"
                                                        class="form-control border-start-0" placeholder="Password"
                                                        maxlength="50" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Role</label>
                                                <div class="input-group"> <span
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bxs-label'></i></span>
                                                    <select name="role" class="form-control">
                                                        <option selected value="Admin">Admin</option>
                                                        <option value="Operator">Operator</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" value="edituser" name="aksi">
                                    <input type="hidden" value="<?= htmlspecialchars($d['id_user']); ?>" name="id">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>

                                </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- end modal -->



                    <!--Hapus modal -->

                    <div class="modal fade" id="hapusModal<?= $no; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi hapus data user</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <div class=""> Yakin untuk menghapus data user?</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="action/proses.php" method="POST">
                                        <input type="hidden" value="hapususer" name="aksi">
                                        <input type="hidden" value="<?= htmlspecialchars($d['id_user']); ?>" name="id">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- end modal -->


                    <?php

					}

					?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end content -->





<?php

include "../include/foot.php";

?>