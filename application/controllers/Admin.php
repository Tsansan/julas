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
  }

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
    $this->load->view("admin/auth/header");
    $this->load->view('admin/auth/sidebar');
    $this->load->view('admin/auth/topbar');
    $this->load->view('admin/jadwal');
    $this->load->view('admin/auth/footer');
  }
  public function Jurnal()
  {
    $this->load->view("admin/auth/header");
    $this->load->view('admin/auth/sidebar');
    $this->load->view('admin/auth/topbar');
    $this->load->view('admin/jadwal');
    $this->load->view('admin/auth/footer');
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */