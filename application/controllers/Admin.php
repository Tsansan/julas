<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Admin
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller ADMIN
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code
    $this->load->model('Admin_model', 'admin');

    // userdata from session
    $user = $this->session->userdata('uname');
    $pword = $this->session->userdata('pword');
    $userdata = $this->Login_model->checkdata($user, $pword);
    // check user data in database
    if (!$userdata || $userdata['Level'] != "1") {
      redirect("loginadmin");
    }
  }


  // view===============================================================================================

  public function index()
  {
    $this->load->view("admin/auth/header");
    $this->load->view('admin/auth/sidebar');
    $this->load->view('admin/auth/topbar');
    $this->load->view('admin/Home');
    $this->load->view('admin/auth/footer');
  }
  public function jadwal()
  {

    $search = $this->input->post('search');
    // datajadwal
    $data['jadwal'] = $this->admin->jadwalGuru($search);

    // view jadwal
    $this->load->view("admin/auth/header", $data);
    $this->load->view('admin/auth/sidebar');
    $this->load->view('admin/auth/topbar');
    $this->load->view('admin/jadwal');
    $this->load->view('admin/auth/footer');
  }
  public function guru()
  {
    $search = $this->input->post('search');

    $data['daftarGuru'] = $this->admin->daftarGuru($search);
    // for ($i = 3; $i < $datasplitcount; $i++) {
    //   $datamerge[$i - 3] = $datasplit[$i];
    // }
    // print_r($datamerge);

    $this->load->view("admin/auth/header", $data);
    $this->load->view('admin/auth/sidebar');
    $this->load->view('admin/auth/topbar');
    $this->load->view('admin/guru');
    $this->load->view('admin/auth/footer');
  }
  public function Jurnal()
  {

    $search = $this->input->post('search');

    $data['jurnal'] = $this->admin->jurnalGuru($search);

    $this->load->view("admin/auth/header", $data);
    $this->load->view('admin/auth/sidebar');
    $this->load->view('admin/auth/topbar');
    $this->load->view('admin/jurnal');
    $this->load->view('admin/auth/footer');
  }

  // Tambah ===========================================================================

  public function tambahguru()
  {
    $nama   = $this->input->post('nama');
    $nip    = $this->input->post('nip');
    $alamat = $this->input->post('alamat');
    $nohp   = $this->input->post('nohp');
    $email  = $this->input->post('email');
    $mapel  = $this->input->post('mapel');

    $data = [
      'nama'    => $nama,
      'nip'     => $nip,
      'alamat'  => $alamat,
      'nohp'    => $nohp,
      'email'   => $email,
      'mapel'   => $mapel,
    ];

    $this->admin->tambahGuru($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Sudah Masuk!
    </div>');
    redirect('admin/guru');
  }

  public function hapusGuru()
  {
    $hapus = $this->input->post("hapus");
    $this->admin->hapusGuru($hapus);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data Telah diHapus!
    </div>');
    redirect('admin/guru');
  }

  public function editGuru()
  {
    $idbio   = $this->input->post('edit');
    $nama   = $this->input->post('nama');
    $nip    = $this->input->post('nip');
    $alamat = $this->input->post('alamat');
    $nohp   = $this->input->post('nohp');
    $email  = $this->input->post('email');
    $mapel  = $this->input->post('mapel');

    $data = [
      'idbio'    => $idbio,
      'nama'    => $nama,
      'nip'     => $nip,
      'alamat'  => $alamat,
      'nohp'    => $nohp,
      'email'   => $email,
      'mapel'   => $mapel,
    ];

    $this->admin->editGuru($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Telah diEdit!
    </div>');
    redirect('admin/guru');
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */