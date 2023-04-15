<!-- Main -->
<div class="col container pt-4">

    <?php echo $this->session->flashdata('message'); ?>
    <div class="col">
        <div class="row">
            <div class="col-auto mb-3">
                <p class="fs-2 mb-0">Ini Adalah Jadwal mengajar Guru !</p>
            </div>
            <!-- Tambah data -->
            <div class="col-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo site_url('admin/tambahjadwal') ?>" method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buat jadwal</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="hari" class="form-label">Hari</label>
                                        <select class="form-select" id="hari" name="hari">
                                            <option selected>Choose...</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jum`at">Jum`at</option>
                                            <option value="Sabtu">Sabtu</option>
                                        </select>
                                        <div class="text-danger">
                                            <?php echo form_error('nama'); ?>
                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <label for="jamke" class="form-label">Jam ke</label>
                                        <select class="form-select" id="jamke" name="jamke">
                                            <option selected>Choose...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                        <div class="text-danger">
                                            <?php echo form_error('nama'); ?>
                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select class="form-select" id="kelas" name="kelas">
                                            <option selected>Choose...</option>
                                            <option value="VIIA">VIIA</option>
                                            <option value="VIIB">VIIB</option>
                                            <option value="VIIC">VIIC</option>
                                            <option value="VIID">VIID</option>
                                            <option value="VIIE">VIIE</option>
                                            <option value="VIIF">VIIF</option>
                                            <option value="VIIG">VIIG</option>
                                            <option value="VIIH">VIIH</option>
                                            <option value="VIIIA">VIIIA</option>
                                            <option value="VIIIB">VIIIB</option>
                                            <option value="VIIIC">VIIIC</option>
                                            <option value="VIIID">VIIID</option>
                                            <option value="VIIIE">VIIIE</option>
                                            <option value="VIIIF">VIIIF</option>
                                            <option value="VIIIG">VIIIG</option>
                                            <option value="VIIIH">VIIIH</option>
                                            <option value="IXA">IXA</option>
                                            <option value="IXB">IXB</option>
                                            <option value="IXC">IXC</option>
                                            <option value="IXD">IXD</option>
                                            <option value="IXE">IXE</option>
                                            <option value="IXF">IXF</option>
                                            <option value="IXG">IXG</option>
                                            <option value="IXH">IXH</option>
                                        </select>
                                        <div class="text-danger">
                                            <?php echo form_error('nama'); ?>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">Nama</label>
                                        <select class="form-select" id="inlineFormSelectPref" name="nama">
                                            <option selected>Choose...</option>
                                            <?php foreach ($dataguru as $key) : ?>
                                                <option value="<?php echo $key['nama'] . "-" . $key['idbio'] ?>"><?php echo $key['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="text-danger">
                                            <?php echo form_error('nama'); ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- endtambah data -->
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