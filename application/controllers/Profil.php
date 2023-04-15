<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Profil
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Profil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // load model
    $this->load->model('user_model', 'user');
    date_default_timezone_set("Asia/Jakarta");
    // userdata from session
    $user = $this->session->userdata('uname');
    $pword = $this->session->userdata('pword');
    $userdata = $this->Login_model->checkdata($user, $pword);
    // check user data in database
    if (!$userdata) {
      redirect("login");
    }
  }

  public function index()
  {
    $user = $this->session->userdata('uname');
    $pword = $this->session->userdata('pword');

    $data['dataguru'] = $this->user->dataGuru($user, $pword);

    $this->load->view('auth/header', $data);
    $this->load->view('auth/sidebar');
    $this->load->view('auth/topbar');
    $this->load->view('profil');
    $this->load->view('auth/footer');
  }

  public function ubahprofil()
  {
    $user = $this->session->userdata('uname');
    $pword = $this->session->userdata('pword');

    $dataguru = $this->user->dataGuru($user, $pword);


    $input['idbio']   =  $dataguru['idbio'];
    $input['nama']    =  htmlspecialchars($this->input->post('nama'));
    $input['nip']     =  htmlspecialchars($this->input->post('nip'));
    $input['nohp']    =  htmlspecialchars($this->input->post('nohp'));
    $input['email']   =  htmlspecialchars($this->input->post('email'));
    $input['alamat']  =  htmlspecialchars($this->input->post('alamat'));
    $input['mapel']   =  htmlspecialchars($this->input->post('mapel'));

    if ($input['idbio'] == "" || $input['nama'] == "" || $input['nip'] == "" || $input['nohp'] == "" || $input['email'] == "" || $input['alamat'] == "" || $input['mapel'] == "") {

      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data gagal di ubah, Harap masukkan semua form !
        </div>');
      redirect('profil');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil di ubah !
        </div>');
      $this->user->ubahProfil($input);
      redirect('profil');
    }
  }
}


/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */