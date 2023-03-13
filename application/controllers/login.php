<?php
defined('BASEPATH') or exit('No direct script access allowed');


// https://colorhunt.co/palette/7286d38ea7e9e5e0fffff2f2 color hunt link
class Login extends CI_Controller
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
        $this->load->library('form_validation');
        $this->load->model('Login_model', 'login');
    }


    public function index()
    {

        // userdata from session check
        $user = $this->session->userdata('uname');
        $pword = $this->session->userdata('pword');
        $userdata = $this->Login_model->checkdata($user, $pword);
        // check user data in database
        if ($userdata) {
            redirect("home");
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
            $this->load->view('loginuser');
        } else {
            $this->login($username, $password);
        }
    }

    public function login($username, $password)
    {
        $check = $this->login->checkdata($username, $password);
        $this->session->set_userdata($check);
        if (!$check || $check == false) {
            $this->session->set_flashdata('failedlogin', 'Username atau password salah');
            redirect('login');
        }
        redirect("home");
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('uname');
        $this->session->unset_userdata('pword');
        redirect('Login');
    }
}
