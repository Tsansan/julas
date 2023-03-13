<?php
defined('BASEPATH') or exit('No direct script access allowed');


// https://colorhunt.co/palette/7286d38ea7e9e5e0fffff2f2 color hunt link
class Jadwal extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function index()
    {
        $this->load->view('auth/header');
        $this->load->view('auth/sidebar');
        $this->load->view('auth/topbar');
        $this->load->view('Jadwal');
        $this->load->view('auth/footer');
    }
}
