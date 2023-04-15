<!-- Main -->
<div class="col container pt-4">
    <?php echo $this->session->flashdata('message') ?>
    <div class="col">
        <div class="row">
            <div class="col-auto">
                <p class="fs-2">Hai <?php echo $dataguru['nama'] ?>, ingin mengubah akun mu?</p>
            </div>
            <div class="col-auto">
                <button type="button" id="ubahdataakun" class="btn btn-primary btn-enabled-edit">Ubah</button>
            </div>
        </div>
    </div>
    <div class="col">
        <form action="<?php echo site_url('akunku/ubahakun') ?>" class="row g-3 needs-validation" method="post">
            <div class="col-md-12">
                <label for="uname" class="form-label">Username</label>
                <input type="text" class="form-control form-enable" id="uname" name="uname" value="<?php echo $this->session->userdata('uname') ?>" required disabled>
            </div>
            <div class="col-md-6">
                <label for="pword1" class="form-label">Password</label>
                <input type="password" class="form-control form-enable" id="pword1" name="pword1" value="" required disabled>

            </div>
            <div class="col-md-6">
                <label for="pword2" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control form-enable" id="pword2" name="pword2" value="" required disabled>
            </div>
            <div class="col-md-12">
                <p class="fs-6">* Password dan konfirmasi Password harus sama !</p>
            </div>

            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" id="akuncancel" class="btn btn-secondary btn-enabled-cancel" hidden>cancel</button>
                <button type="submit" id="akunsimpandata" class="btn btn-primary btn-enabled-save" hidden>Simpan</button>
            </div>
        </form>
    </div>

</div>
<!-- end main -->