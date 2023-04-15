<!-- Main -->
<div class="col container pt-4">
    <?php if (form_error('nama') || form_error('pword') || form_error('pword1')) : ?>
        <?php echo $this->session->flashdata('message'); ?>
    <?php endif ?>
    <?php echo $this->session->flashdata('input'); ?>
    <div class="col">
        <div class="row">
            <div class="col-auto">
                <p class="fs-2">Ini adalah Akun Guru !</p>
            </div>


            <!-- tambah data -->
            <div class="col-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAkun">
                    Tambah Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="tambahAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?php echo site_url('admin/tambahakun') ?>" method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
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
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="uname">
                                        <div class="text-danger">
                                            <?php echo form_error('uname'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">password</label>
                                        <input type="password" class="form-control" id="password" name="pword">
                                        <div class="text-danger">
                                            <?php echo form_error('pword'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password1" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password1" name="pword1">
                                        <div class="text-danger">
                                            <?php echo form_error('pword1'); ?>
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

    </div>
    <div class="col">
        <!-- form search -->
        <form action="<?php echo site_url('admin/akunGuru') ?>" method="post">
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
            <div class="table-responsive">

                <table class="table">
                    <thead class="c-third">
                        <tr>
                            <th class="col-1">No</th>
                            <th class="col-3">Nama</th>
                            <th class="col-3">Username</th>
                            <th class="col-2">Password</th>
                            <th class="col-1">Level</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="paginationpage">
                        <?php $number = 1;
                        foreach ($akunguru as $key) : ?>
                            <tr class="pagination-data">
                                <td><?php echo $number;
                                    $number++ ?></td>
                                <td><?php echo $key['nama'] ?></td>
                                <td><?php echo $key['uname'] ?></td>
                                <td>
                                    <?php
                                    $passwordsplit = str_split($key['pword']);
                                    $passwordlenght = count($passwordsplit);
                                    for ($i = 0; $i < $passwordlenght; $i++) {
                                        $passwordhint[$i] =  "*";
                                    }
                                    $passwordlenght = join($passwordhint);
                                    echo $passwordlenght;
                                    ?>
                                </td>
                                <td><?php echo $key['level'] ?></td>
                                <td>

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editakunguru<?php echo $key['idbio'] ?>">Edit</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusakunguru<?php echo $key['idbio'] ?>">Hapus</button>
                                </td>
                                <!-- modal edit    -->
                                <div class="modal fade" id="editakunguru<?php echo $key['idbio'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit <?php echo $key['nama'] ?>?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo site_url('admin/editakunGuru') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="edit" value="edit">
                                                        <input type="hidden" name="nama" value="<?php echo $key['nama'] . '-' . $key['idbio'] ?>">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="nama" value="<?php echo $key['nama'] ?>" disabled>
                                                        <div class="text-danger">
                                                            <?php echo form_error('nama'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username" name="uname" value="<?php echo $key['uname'] ?>">
                                                        <div class="text-danger">
                                                            <?php echo form_error('uname'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">password</label>
                                                        <input type="password" class="form-control" id="password" name="pword">
                                                        <div class="text-danger">
                                                            <?php echo form_error('pword'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password1" class="form-label">Konfirmasi Password</label>
                                                        <input type="password" class="form-control" id="password1" name="pword1">
                                                        <div class="text-danger">
                                                            <?php echo form_error('pword1'); ?>
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
                                <!-- endmodal edit   -->

                                <!-- modal hapus    -->
                                <div class="modal fade" id="hapusakunguru<?php echo $key['idbio'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah Anda yakin ingin menghapus <?php echo $key['nama'] ?>?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?php echo site_url('admin/hapusakun') ?>" method="post">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-danger" name="hapus" value="<?php echo $key['idbio'] ?>">Hapus</button>
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