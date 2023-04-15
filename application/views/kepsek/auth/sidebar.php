<!-- Sidebar -->
<div class="col-2 c-primary pt-5 px-0">
    <div class="sidebar-button col py-2 <?php echo $retVal = ($this->uri->segment(2) == "" || $this->uri->segment(1) == "home") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("admin") ?>"><i class="fa-solid fa-gauge"></i><span class="sidebarTitle"> Dashboard</span></a></div>
    <div class="sidebar-button col py-2  <?php echo $retVal = ($this->uri->segment(2) == "jadwal") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("kepsek/jadwal") ?>"><i class="fa-solid fa-clock"></i><span class="sidebarTitle"> Jadwal</span></a></div>
    <div class="sidebar-button col py-2  <?php echo $retVal = ($this->uri->segment(2) == "guru") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("kepsek/guru") ?>"><i class="fa-solid fa-chalkboard-user"></i><span class="sidebarTitle"> Guru</span></a></div>
    <div class="sidebar-button col py-2  <?php echo $retVal = ($this->uri->segment(2) == "akunguru") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("kepsek/akunguru") ?>"><i class="fa-solid fa-user"></i><span class="sidebarTitle"> Akun Guru</span></a></div>
    <div class="sidebar-button col py-2 <?php echo $retVal = ($this->uri->segment(2) == "jurnal") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("kepsek/jurnal") ?>"><i class="fa-solid fa-clipboard"></i> <span class="sidebarTitle"> Jurnal</span></a> </div>
    <div class="sidebar-button col py-2"><a href="#" data-bs-toggle="modal" data-bs-target="#Logoutmodal"><i class="fa-solid fa-right-from-bracket"></i><span class="sidebarTitle"> Log out</span></a></div>

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