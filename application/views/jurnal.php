<!-- Main -->
<div class="col container pt-4">
    <?php echo $this->session->flashdata('message') ?>
    <div class="col">
        <p class="fs-2">Ini Catatan Mengajar harian mu!</p>
    </div>
    <div class="col-md-5">
        <p class="fs-6">Jadwal hari ini!</p>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="c-third">
                                <tr>
                                    <th class="col-2">jamke</th>
                                    <th class="col-2">Kelas</th>
                                    <th class="col-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomorjnl = 1;
                                foreach ($jadwalharian as $key) : ?>
                                    <tr>
                                        <td><?php echo $key['jamke'] ?></td>
                                        <td><?php echo $key['kelas'] ?></td>
                                        <td>

                                            <!-- Button trigger modal jurnal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaljurnal<?php echo $key['idjadwal'] ?>">
                                                Jurnal
                                            </button>

                                            <!-- Modal  jurnal-->
                                            <div class="modal fade" id="modaljurnal<?php echo $key['idjadwal'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Jurnal kelas <?php echo $key['kelas'] . " jam ke- " . $key['jamke'] ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?php echo site_url('jurnal/tambahjurnal') ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <input type="hidden" name="tanggal" value="<?php echo date('m-d-Y') ?>">
                                                                    <input type="hidden" name="idjadwal" value="<?php echo $key['idjadwal'] ?>">
                                                                    <input type="hidden" name="idbio" value="<?php echo $key['idbio'] ?>">
                                                                    <input type="hidden" name="kelas" value="<?php echo $key['kelas'] ?>">
                                                                    <label for="jurnal" class="form-label">Jurnal</label>
                                                                    <input type="text" class="form-control" id="jurnal" name="jurnal">
                                                                    <label for="hadir" class="form-label">Jumlah Siswa Hadir</label>
                                                                    <input type="number" class="form-control" id="hadir" name="hadir">
                                                                    <label for="tidakhadir" class="form-label">Tidak Hadir</label>
                                                                    <input type="number" class="form-control" id="tidakhadir" name="tidakhadir">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- endmodal jurnal -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10">
        <p class="fs-6">Catatan Jurnal</p>
        <div class="row">
            <div class="card py-3">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="c-third">
                                <tr>
                                    <th class="col-1">No</th>
                                    <th class="col-2">Tanggal</th>
                                    <th class="col-1">Kelas</th>
                                    <th class="col-6">Jurnal</th>
                                    <th class="col-1">Hadir</th>
                                    <th class="col-1">Tidak Hadir</th>
                                </tr>
                            </thead>
                            <tbody id="paginationpage">
                                <?php $nomorjnl = 1;
                                foreach ($jurnal as $key) : ?>
                                    <tr class="pagination-data">
                                        <td><?php echo $nomorjnl;
                                            $nomorjnl++; ?></td>
                                        <td><?php echo $key['tanggal'] ?></td>
                                        <td><?php echo $key['kelas'] ?></td>
                                        <td><?php echo $key['catatan'] ?></td>
                                        <td><?php echo $key['hadir'] ?></td>
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
    </div>
</div>
<!-- end main -->