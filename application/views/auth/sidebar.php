<!-- Sidebar -->
<div class="col-2 c-primary pt-5 px-0">
    <div class="sidebar-button col py-2 <?php echo $retVal = ($this->uri->segment(1) == "" || $this->uri->segment(1) == "home") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("") ?>"><i class="fa-solid fa-gauge"></i><span class="sidebarTitle"> Dashboard</span></a></div>
    <div class="sidebar-button col py-2 <?php echo $retVal = ($this->uri->segment(1) == "jurnal") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("jurnal") ?>"><i class="fa-solid fa-clipboard"></i> <span class="sidebarTitle"> Jurnal</span></a> </div>
    <div class="sidebar-button col py-2 <?php echo $retVal = ($this->uri->segment(1) == "profil") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("profil") ?>"><i class="fa-solid fa-id-badge"></i> <span class="sidebarTitle"> My Profile</span></a> </div>
    <div class="sidebar-button col py-2 <?php echo $retVal = ($this->uri->segment(1) == "akunku") ? "c-active" : "nactive"; ?>"><a href="<?php echo site_url("akunku") ?>"><i class="fa-solid fa-user-pen"></i> <span class="sidebarTitle"> Akun</span></a> </div>
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