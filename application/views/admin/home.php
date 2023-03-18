<!-- Main -->
<div class="col container pt-4">
    <div class="col">
        <p class="fs-2">Hallo, Selamat pagi admin</p>
    </div>
    <div class="col">
        <p class="fs-6">Jurnal Guru Hari ini</p>
        <div class="row">
            <table class="table">
                <thead class="c-third">
                    <tr>
                        <th class="col-1">No</th>
                        <th class="col-3">Nama Guru</th>
                        <th class="col-1">Kelas</th>
                        <th class="col-1">Jam Ke</th>
                        <th class="col-4">Jurnal</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Lilik</td>
                        <td>9A</td>
                        <td>1-2</td>
                        <td>Anatomu tubuh</td>
                        <td>
                            <a href="#" class="btn c-second" data-bs-toggle="modal" data-bs-target="#exampleModal">Jurnal</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Ninik</td>
                        <td>9b</td>
                        <td>3-4</td>
                        <td>-</td>
                        <td>
                            <a href="#" class="btn c-second" data-bs-toggle="modal" data-bs-target="#exampleModal">Jurnal</a>
                        </td>
                    </tr>
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