<?php
defined('BASEPATH') or exit('No direct script access allowed');


// https://colorhunt.co/palette/7286d38ea7e9e5e0fffff2f2 color hunt link
class Jurnal extends CI_Controller
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
        $this->load->helper('date');
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
        $data['jurnal'] = $this->user->jurnal($user, $pword);
        $data['jadwal'] = $this->user->jurnal($user, $pword);
        $data['jadwalharian'] = $this->jadwalharian($data['dataguru']['idbio']);


        $this->load->view('auth/header', $data);
        $this->load->view('auth/sidebar');
        $this->load->view('auth/topbar');
        $this->load->view('jurnal');
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
            default:
                # code...
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

    public function tambahjurnal()
    {
        $input['tanggal'] = $this->input->post('tanggal');
        $input['idjadwal'] = $this->input->post('idjadwal');
        $input['idbio'] = $this->input->post('idbio');
        $input['kelas'] = $this->input->post('kelas');
        $input['jurnal'] = $this->input->post('jurnal');
        $input['hadir'] = $this->input->post('hadir');
        $input['tidakhadir'] = $this->input->post('tidakhadir');

        if ($input['jurnal'] == "" || $input['jurnal'] == null) {
            # code...
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jurnal Belum terisi!</div>');
            redirect('jurnal');
        } else {
            $this->user->tambahjurnal($input);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jurnal Telah Terisi</div>');
            redirect('jurnal');
        }
    }
}
