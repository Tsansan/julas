<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Loginadmin
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

class Loginadmin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Login_model', 'login');
  }

  public function index()
  {

    // userdata from session check
    $user = $this->session->userdata('uname');
    $pword = $this->session->userdata('pword');
    // check user data in database
    if ($user && $pword) {
      $userdata = $this->Login_model->checkdata($user, $pword);
      redirect("admin");
    }

    $this->form_validation->set_rules(
      'username',
      'Username',
      'required',
      array('required' => 'Tolong masukkan %s.')
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required',
      array('required' => 'Tolong masukkan %s.')
    );

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('loginadmin');
    } else {
      $this->login($username, $password);
    }
  }

  public function login($username, $password)
  {
    $check = $this->login->checkdata($username, $password);

    if ($check == null) {
      $this->session->set_flashdata('failedlogin', 'Username atau password salah');
      redirect('loginadmin');
    } else {
      if ($check['Level'] != 1) {
        $this->session->set_flashdata('failedlogin', 'Anda bukan admin');
        redirect('loginadmin/logout');
      }
      # code...
      $this->session->set_userdata($check);
      redirect("admin");
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('uname');
    $this->session->unset_userdata('pword');
    redirect('Loginadmin');
  }
}


/* End of file Loginadmin.php */
/* Location: ./application/controllers/Loginadmin.php */