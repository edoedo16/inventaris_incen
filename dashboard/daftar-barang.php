<?php

include "../include/koneksi.php";

$title = "Daftar Barang";
include "../include/head.php";

$data = mysqli_query($koneksi, "SELECT * FROM `tb_databarang`");
?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

    <div class="col">
        <a href="#" data-bs-toggle="modal" data-bs-target="#tambahBarangModal">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0 text-white">Tambah Data Barang</h6>
                        <div class="ms-auto">
                            <i class='bx bx-add-to-queue fs-3 text-white'></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- modal -->

    <div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <form class="row g-1" action="action/proses.php" method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Kode Barang</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-label'></i></span>
                                <input type="text" name="kodebarang" class="form-control border-start-0"
                                    placeholder="Kode" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Barang</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-label'></i></span>
                                <input type="text" name="namabarang" class="form-control border-start-0"
                                    placeholder="Nama Barang" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Jumlah Barang</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-label'></i></span>
                                <input type="number" name="jumlahbarang" class="form-control border-start-0"
                                    placeholder="Jumlah Barang" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Kondisi</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-label'></i></span>
                                <select name="kondisi" class="form-control">
                                    <option selected value="Baik">Baik</option>
                                    <option value="Kurang Baik">Kurang Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <label class="form-label">Keterangan</label>
                            <div class="input-group">
                                <textarea name="keterangan" class="form-control" placeholder="Keterangan"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label mt-3">Upload Gambar</label>
                            <input class="form-control" id="imageInput" name="image" type="file" accept="image/*"
                                onchange="readURL(this)">
                            <img id="blah" class=" m-4 text-center" style="max-height: 240px; width:250px;" />
                        </div>


                </div>
                <div class="modal-footer">
                    <!-- <input type="hidden" value="<?//= $mobil_id; ?>" name="id"> -->
                    <input type="hidden" value="tambahbarang" name="aksi">
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
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
                                        <?= htmlspecialchars($d['kode_barang']); ?>
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= htmlspecialchars($d['nama_barang']); ?>
                        </td>
                        <td><?= htmlspecialchars($d['jumlah']); ?></td>
                        <td>
                            <?= htmlspecialchars($d['keterangan']); ?>
                        </td>
                        <td>
                            <img src="gambar/<?= $d['gambar']?>" width="50px">
                        </td>
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
                                                <label class="form-label">Kode Barang</label>
                                                <div class="input-group"> <span
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bxs-label'></i></span>
                                                    <input type="text" name="kodebarang"
                                                        class="form-control border-start-0" placeholder="Kode"
                                                        autocomplete="off" required
                                                        value="<?= htmlspecialchars($d['kode_barang'])?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Nama Barang</label>
                                                <div class="input-group"> <span
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bxs-label'></i></span>
                                                    <input type="text" name="namabarang"
                                                        class="form-control border-start-0" placeholder="Nama Barang"
                                                        autocomplete="off" required
                                                        value="<?= htmlspecialchars($d['nama_barang'])?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Jumlah Barang</label>
                                                <div class="input-group"> <span
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bxs-label'></i></span>
                                                    <input type="number" name="jumlahbarang"
                                                        class="form-control border-start-0" placeholder="Jumlah Barang"
                                                        autocomplete="off" required
                                                        value="<?= htmlspecialchars($d['jumlah'])?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Kondisi</label>
                                                <div class="input-group"> <span
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bxs-label'></i></span>
                                                    <select name="kondisi" class="form-control">
                                                        <option selected value="Baik">Baik</option>
                                                        <option value="Kurang Baik">Kurang Baik</option>
                                                        <option value="Rusak">Rusak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label class="form-label">Keterangan</label>
                                                <div class="input-group">
                                                    <textarea name="keterangan" class="form-control"
                                                        placeholder="Keterangan"
                                                        required><?= htmlspecialchars($d['keterangan'])?></textarea>
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <label class="form-label mt-3">Upload Gambar</label>
                                                <input class="form-control" id="imageInput" name="image" type="file"
                                                    accept="image/*" onchange="readURL(this)">
                                                <img id="blah" class=" m-4 text-center"
                                                    style="max-height: 240px; width:250px;" />
                                            </div> -->
                                        </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" value="editbarang" name="aksi">
                                    <input type="hidden" value="<?= htmlspecialchars($d['gambar'])?>" name="gambarr">
                                    <input type="hidden" value="<?= htmlspecialchars($d['id_barang']); ?>" name="id">
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
                                    <h5 class="modal-title">Konfirmasi hapus data barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>


                                <div class="modal-body">
                                    <div class=""> Yakin untuk menghapus data barang?</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="action/proses.php" method="POST">
                                        <input type="hidden" value="hapusbarang" name="aksi">
                                        <input type="hidden" value="<?= htmlspecialchars($d['id_barang']); ?>"
                                            name="id">
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




<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php

include "../include/foot.php";

?>