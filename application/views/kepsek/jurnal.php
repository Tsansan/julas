<!-- Main -->
<div class="col container pt-4">
    <div class="col">
        <p class="fs-2">Ini Catatan Mengajar Guru!</p>
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
            <div class="table-responsive">
                <table class="table">
                    <thead class="c-third">
                        <tr>
                            <th class="col-1">No</th>
                            <th class="col-2">Tanggal</th>
                            <th class="col-2">Nama</th>
                            <th class="col-1">Kelas</th>
                            <th class="col-4">Jurnal</th>
                        </tr>
                    </thead>
                    <tbody id="paginationpage">
                        <?php $number = 1;
                        foreach ($jurnal as $key) : ?>
                            <tr class="pagination-data">
                                <td><?php echo $number;
                                    $number++ ?></td>
                                <td><?php echo $key['tanggal'] ?></td>
                                <td><?php echo $key['nama'] ?></td>
                                <td><?php echo $key['kelas'] ?></td>
                                <td><?php echo $key['catatan'] ?></td>

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