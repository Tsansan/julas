<?php
defined('BASEPATH') or exit('No direct script access allowed');


// https://colorhunt.co/palette/7286d38ea7e9e5e0fffff2f2 color hunt link
class Home extends CI_Controller
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
        $data['jadwalharian'] = $this->jadwalharian($data['dataguru']['idbio']);
        // pagi 00-11
        // siang 11-15
        // sore 15 - 18
        // malam 18 - 00
        if (date('H') < 11) {
            $data['waktu'] = 'Pagi';
        } elseif (date('H') < 15) {
            # code...
            $data['waktu'] = 'siang';
        } elseif (date('H') < 18) {
            # code...
            $data['waktu'] = 'Sore';
        } elseif (date('H') > 18) {
            # code...
            $data['waktu'] = 'Malam';
        }


        $this->load->view('auth/header', $data);
        $this->load->view('auth/sidebar');
        $this->load->view('auth/topbar');
        $this->load->view('Home');
        $this->load->view('auth/footer');
    }


    public function jadwalharian($idbio)
    {
        date_default_timezone_set("Asia/Jakarta");
        switch (date('D')) {
            case 'Mon':
                # code...
                $hari = "Senin";
                break;
            case 'Tue':
                # code...
                $hari = "Selasa";
                break;
            case 'Wed':
                # code...
                $hari = "Rabu";
                break;
            case 'Thu':
                # code...
                $hari = "Kamis";
                break;
            case 'Fri':
                # code...
                $hari = "Jum`at";
                break;
            case 'Sat':
                # code...
                $hari = "Sabtu";
                break;
            case 'Sun':
                # code...
                $hari = "Minggu";
                break;
        }

        $data = $this->user->jadwal($idbio, $hari);
        $countdata = count($data);

        for ($i = 0; $i <  $countdata; $i++) {
            for ($j = $i + 1; $j < $countdata; $j++) {
                # code...
                if ($data[$i]['jamke'] > $data[$j]['jamke']) {
                    $temp = $data[$i];
                    $data[$i] = $data[$j];
                    $data[$j] = $temp;
                }
            }
        }
        return $data;
    }
}
