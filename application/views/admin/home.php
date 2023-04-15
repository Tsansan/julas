<!-- Main -->
<div class="col container pt-4">
    <div class="col">
        <p class="fs-2">Hallo, Selamat <?php echo $waktu ?> admin</p>
    </div>
    <div class="col mb-2">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Jumlah Guru</h3>
                        <p class="card-text"><?php echo $jumlahguru; ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Jumlah Siswa </h3>
                        <p class="card-text">690</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col mb-2">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Jumlah total siswa tidak hadir</h3>
                        <p class="card-text">Hari ini : <?php echo $jurnal['tidakhadir'] ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col mb-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Jurnal Guru hari ini</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="c-third">
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-2">Tanggal</th>
                                <th class="col-2">Nama</th>
                                <th class="col-1">Kelas</th>
                                <th class="col-4">Jurnal</th>
                                <th class="col-4">tidak Hadir</th>
                            </tr>
                        </thead>
                        <tbody id="paginationpage">
                            <?php $number1 = 1;
                            foreach ($jurnalguru as $key) : ?>
                                <tr class="pagination-data">
                                    <td><?php echo $number1;
                                        $number1++ ?></td>
                                    <td><?php echo $key['tanggal'] ?></td>
                                    <td><?php echo $key['nama'] ?></td>
                                    <td><?php echo $key['kelas'] ?></td>
                                    <td><?php echo $key['catatan'] ?></td>
                                    <td><?php echo $key['tidakhadir'] ?></td>

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
</div>
</div>
<!-- end main -->