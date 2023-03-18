<!-- Main -->
<div class="col container pt-4">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="col">
        <div class="row">
            <div class="col-auto">
                <p class="fs-2">Ini Adalah Jadwal mengajar Guru !</p>
            </div>


            <!-- tambah data -->
            <div class="col-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo site_url('admin/tambahguru') ?>" method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nohp" class="form-label">No HP</label>
                                        <input type="text" class="form-control" id="nohp" name="nohp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mapel" class="form-label">Mapel</label>
                                        <input type="text" class="form-control" id="mapel" name="mapel">
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

    </div>
    <div class="col">
        <!-- form search -->
        <form action="<?php echo site_url('admin/guru') ?>" method="post">
            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Cari Jadwal Guru</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="inputSearch" class="form-control" name="search" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
        <!-- endform search -->
        <div class="row">
            <table class="table">
                <thead class="c-third">
                    <tr>
                        <th class="col-1">No</th>
                        <th class="col-1">Nama</th>
                        <th class="col-1">NIP</th>
                        <th class="col-2">Email</th>
                        <th class="col-2">Mapel</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataCari">
                    <?php $jwlNumber = 1;
                    foreach ($daftarGuru as $key) : ?>
                        <tr>
                            <td><?php echo $jwlNumber;
                                $jwlNumber++; ?></td>
                            <td><?php echo $key['nama'] ?></td>
                            <td><?php echo $key['nip'] ?></td>
                            <td><?php echo $key['email'] ?></td>
                            <td><?php echo $key['mapel'] ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editguru<?php echo $key['idbio'] ?>">Edit</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusguru<?php echo $key['idbio'] ?>">Hapus</button>
                            </td>

                            <!-- modal edit    -->
                            <div class="modal fade" id="editguru<?php echo $key['idbio'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <?php echo $key['nama'] ?>?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?php echo site_url('admin/editGuru') ?>" method="post">
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $key['nama'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nip" class="form-label">NIP</label>
                                                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $key['nip'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $key['alamat'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nohp" class="form-label">No HP</label>
                                                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $key['nohp'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $key['email'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mapel" class="form-label">Mapel</label>
                                                    <input type="text" class="form-control" id="mapel" name="mapel" value="<?php echo $key['mapel'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="edit" value="<?php echo $key['idbio'] ?>">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- endmodal edit   -->

                            <!-- modal hapus    -->
                            <div class="modal fade" id="hapusguru<?php echo $key['idbio'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah Anda yakin ingin menghapus <?php echo $key['nama'] ?>?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="<?php echo site_url('admin/hapusGuru') ?>" method="post">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger" name="hapus" value="<?php echo $key['idbio'] ?>">hapus</button>
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
        </div>
    </div>
</div>
<!-- end main -->