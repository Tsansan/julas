<!-- Main -->
<div class="col container pt-4">
    <div class="col">
        <p class="fs-2">Ini Adalah Jadwal mengajar Guru !</p>
    </div>
    <div class="col">
        <!-- form search -->
        <form action="<?php echo site_url('admin/jadwal') ?>" method="post">
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
                        <th class="col-1">Hari</th>
                        <th class="col-1">jam</th>
                        <th class="col-2">Kelas</th>
                        <th class="col-4">Nama</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $jwlNumber = 1;
                    foreach ($jadwal as $key) : ?>
                        <tr>
                            <td><?php echo $jwlNumber;
                                $jwlNumber++; ?></td>
                            <td><?php echo $key['hari'] ?></td>
                            <td><?php echo $key['jamke'] ?></td>
                            <td><?php echo $key['kelas'] ?></td>
                            <td><?php echo $key['nama'] ?></td>
                            <td>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end main -->