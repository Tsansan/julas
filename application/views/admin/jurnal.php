<!-- Main -->
<div class="col container pt-4">
    <div class="col">
        <p class="fs-2">Ini Catatan Mengajar harian mu!</p>
    </div>
    <div class="col">
        <!-- form search -->
        <form action="<?php echo site_url('admin/jurnal') ?>" method="post">
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
                        <th class="col-2">Tanggal</th>
                        <th class="col-2">Nama</th>
                        <th class="col-1">Kelas</th>
                        <th class="col-4">Jurnal</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jurnal as $key) : ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo $key['tanggal'] ?></td>
                            <td><?php echo $key['nama'] ?></td>
                            <td><?php echo $key['kelas'] ?></td>
                            <td><?php echo $key['catatan'] ?></td>
                            <td>
                                <a href="#" class="btn c-second" data-bs-toggle="modal" data-bs-target="#exampleModal">Jurnal</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <div class=" mb-2">
                                    <label for="inputjurnal" class="form-label">Input Jurnal</label>
                                    <input type="text" name="jurnalkelas" id="inputjurnal" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn c-second">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- EndModal -->

        </div>
    </div>
</div>
<!-- end main -->