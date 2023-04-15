<!-- Main -->
<div class="col container pt-4">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="col">
        <div class="row">
            <div class="col-auto mb-3">
                <p class="fs-2 mb-0">Ini Adalah Jadwal mengajar Guru !</p>
            </div>
            <!-- Tambah data -->
        </div>
        <!-- tambah data -->

    </div>
    <div class="col">
        <!-- form search -->
        <form action="<?php echo site_url('admin/jadwal') ?>" method="post">
            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Cari Jadwal Guru</label>
                </div>
                <div class="col-auto mb-3">
                    <input type="text" id="inputSearch" class="form-control col-md-3" name="search" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
        <!-- endform search -->
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="c-third">
                        <tr>
                            <th class="col-1">No</th>
                            <th class="col-1">Hari</th>
                            <th class="col-1">jam</th>
                            <th class="col-2">Kelas</th>
                            <th class="col-4">Nama</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="paginationpage">
                        <?php $jwlNumber = 1;
                        foreach ($jadwal as $key) : ?>
                            <tr class="pagination-data">
                                <td><?php echo $jwlNumber;
                                    $jwlNumber++; ?></td>
                                <td><?php echo $key['hari'] ?></td>
                                <td><?php echo $key['jamke'] ?></td>
                                <td><?php echo $key['kelas'] ?></td>
                                <td><?php echo $key['nama'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusjadwal<?php echo $key['idjadwal'] ?>">Hapus</button>
                                </td>

                                <!-- modal hapus    -->
                                <div class="modal fade" id="hapusjadwal<?php echo $key['idjadwal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah Anda yakin ingin menghapus <?php echo $key['nama'] ?>?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?php echo site_url('admin/hapusjadwal') ?>" method="post">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-danger" name="hapus" value="<?php echo $key['idjadwal'] ?>">hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- endmodal hapus -->

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- end main -->