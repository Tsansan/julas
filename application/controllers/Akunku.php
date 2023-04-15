<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Akunku
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

class Akunku extends CI_Controller
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
      redirect("login/logout");
    }
  }

  public function index()
  {
    // 

    $user = $this->session->userdata('uname');
    $pword = $this->session->userdata('pword');

    $data['dataguru'] = $this->user->dataGuru($user, $pword);

    $this->load->view('auth/header', $data);
    $this->load->view('auth/sidebar');
    $this->load->view('auth/topbar');
    $this->load->view('akun');
    $this->load->view('auth/footer');
  }

  public function ubahakun()
  {
    $user = $this->session->userdata('uname');
    $pword = $this->session->userdata('pword');

    $data['dataguru'] = $this->user->dataGuru($user, $pword);
    $input['uname'] = htmlspecialchars($this->input->post('uname'));
    $input['pword1'] = htmlspecialchars($this->input->post('pword1'));
    $input['pword2'] = htmlspecialchars($this->input->post('pword2'));
    $input['idbio'] = htmlspecialchars($data['dataguru']['idbio']);

    if ($input['pword1'] != $input['pword2']) {
      # code...
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data gagal di ubah, Harap masukkan dengan benar !
        </div>');
      redirect('akunku');
    } else {
      # code...
      $this->user->ubahAkun($input);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil di ubah, silahkan login kembali !
        </div>');
      redirect('login/logout');
    }
  }
}


/* End of file Akunku.php */
/* Location: ./application/controllers/Akunku.php */