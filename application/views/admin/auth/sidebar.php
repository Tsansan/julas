<!-- Sidebar -->
<div class="col-2 c-primary pt-5 px-0">
    <div class="sidebar-button col py-2 <?php echo $retVal = ($this->uri->segment(2) == "" || $this->uri->segment(1) == "home") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("admin") ?>">Dashboard</a></div>
    <div class="sidebar-button col py-2 <?php echo $retVal = ($this->uri->segment(2) == "jurnal") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("admin/jurnal") ?>">Jurnal</a> </div>
    <div class="sidebar-button col py-2  <?php echo $retVal = ($this->uri->segment(2) == "jadwal") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("admin/jadwal") ?>"> Jadwal</a></div>
    <div class="sidebar-button col py-2"><a href="#" data-bs-toggle="modal" data-bs-target="#Logoutmodal">Log out</a></div>

    <!-- Logout Modal -->
    <div class="modal fade" id="Logoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo site_url('login/logout') ?>" method="post">
                    <div class="modal-body">
                        <div class=" mb-2">
                            <label for="inputjurnal" class="form-label">Ingin keluar?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn c-second">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End logoutModal -->
</div>
<!-- end sidebar -->