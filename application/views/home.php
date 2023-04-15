<!-- Main -->
<div class="col container pt-4">
    <div class="col">
        <p class="fs-2">Hallo, Selamat <?php echo $waktu . " " . $dataguru['nama'] ?></p>
    </div>
    <div class="col-md-5">
        <p class="fs-6">Apa saja jadwal Hari ini?</p>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive">
                        <thead class="c-third">
                            <tr>
                                <th class="col-2">jamke</th>
                                <th class="col-2">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jadwalharian as $key) : ?>
                                <tr>
                                    <td><?php echo $key['jamke'] ?></td>
                                    <td><?php echo $key['kelas'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
<!-- end main -->