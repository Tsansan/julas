<!-- Main -->
<div class="col container pt-4">
    <?php echo $this->session->flashdata('message') ?>
    <div class="col">
        <div class="row">
            <div class="col-auto">
                <p class="fs-2">Profil Ku !</p>
            </div>
            <div class="col-auto">
                <button type="button" id="ubahdata" class="btn btn-primary btn-enabled-edit">Ubah</button>
            </div>
        </div>
    </div>
    <div class="col">
        <form action="<?php echo site_url('profil/ubahprofil') ?>" class="row g-3" method="post">
            <div class="col-md-6">
                <label for="pronama" class="form-label">Nama</label>
                <input type="text" class="form-control form-enable" id="pronama" name="nama" value="<?php echo $dataguru['nama'] ?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="NIP" class="form-label">NIP</label>
                <input type="text" class="form-control form-enable" id="pronip" name="nip" value="<?php echo $dataguru['nip'] ?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="pronohp" class="form-label">No Handphone</label>
                <input type="text" class="form-control form-enable" id="pronohp" name="nohp" value="<?php echo $dataguru['nohp'] ?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="proemail" class="form-label">Email</label>
                <input type="email" class="form-control form-enable" id="proemail" name="email" value="<?php echo $dataguru['email'] ?>" disabled>
            </div>
            <div class="col-md-12">
                <label for="proalamat" class="form-label">Alamat</label>
                <input type="text" class="form-control form-enable" id="proalamat" name="alamat" value="<?php echo $dataguru['alamat'] ?>" disabled>
            </div>
            <div class="col-md-12">
                <label for="promapel" class="form-label">Mata Pelajaran</label>
                <input type="text" class="form-control form-enable" id="promapel" name="mapel" value="<?php echo $dataguru['mapel'] ?>" disabled>
            </div>
            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" id="procancel" class="btn btn-secondary btn-enabled-cancel" hidden>cancel</button>
                <button type="submit" id="prosimpandata" class="btn btn-primary btn-enabled-save" hidden>Simpan</button>
            </div>
        </form>
    </div>

</div>
<!-- end main -->