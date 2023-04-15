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
    $this->load->library('form_validation');
    $this->load->model('Admin_model', 'admin');
    date_default_timezone_set("Asia/Jakarta");

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

    $data['jurnal'] = $this->admin->jurnalHariini(date('m-d-Y'));
    $data['jurnalguru'] = $this->admin->jurnalGuru(date('m-d-Y'));
    $data['jumlahguru'] = count($this->admin->daftarGuru(""));

    $this->load->view("admin/auth/header", $data);
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
    $data['dataguru'] = $this->admin->daftarGuru('');
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

  public function akunGuru()
  {

    // validation form add account
    $input['edit'] = $this->input->post('edit');
    $input['nama'] = $this->input->post('nama');
    $input['uname'] = $this->input->post('uname');
    $input['pword'] = $this->input->post('pword');
    $input['pword1'] = $this->input->post('pword1');

    // data view
    $search = $this->input->post('search');
    $data['akunguru'] = $this->admin->akunGuru($search);
    $data['dataguru'] = $this->admin->daftarGuru($search);

    $this->form_validation->set_rules(
      'uname',
      'Uname',
      'required',
      array('required' => 'Tolong masukkan %s.')
    );
    $this->form_validation->set_rules(
      'pword',
      'Pword',
      'required',
      array('required' => 'Tolong masukkan %s.')
    );
    $this->form_validation->set_rules(
      'pword1',
      'Pword1',
      'required',
      array('required' => 'Tolong masukkan %s.')
    );


    if ($this->form_validation->run() == FALSE) {
      $this->load->view("admin/auth/header", $data);
      $this->load->view('admin/auth/sidebar');
      $this->load->view('admin/auth/topbar');
      $this->load->view('admin/akunguru');
      $this->load->view('admin/auth/footer');
      if (form_error()) {
        # code...
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        harap masukkan data dengan benar !
        </div>');
      }
    } else {
      if ($input['edit'] == 'edit') {
        # code...
        $this->editakunguru($input);
      } else {
        # code...
        $this->tambahAkun($input);
      }
    }
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

  public function tambahAkun()
  {
    // data masuk
    // validation form add account
    $input['edit'] = $this->input->post('edit');
    $input['nama'] = $this->input->post('nama');
    $input['uname'] = $this->input->post('uname');
    $input['pword'] = $this->input->post('pword');
    $input['pword1'] = $this->input->post('pword1');

    // cek data apakah sudah ada usernya

    // ambil idbio di unput

    $idbioinputo = explode("-", $input['nama']);
    $idbioinput = $idbioinputo[1];


    // ambil idbio di database
    $idbiobase    = $this->admin->akunGuru('');
    $idbiolenght  = count($idbiobase);

    for ($i = 0; $i < $idbiolenght; $i++) {
      if ($idbiobase[$i]['id_bio'] == $idbioinput) {
        # code...
        $this->session->set_flashdata('input', '<div class="alert alert-danger" role="alert">
        ' . $idbioinputo[0] . ' Sudah memiliki akun
        </div>');
        redirect('admin/akunguru');
        break;
      }
    }

    // cek password input apakah sama
    if ($input['pword'] != $input['pword1']) {

      $this->session->set_flashdata('input', '<div class="alert alert-danger" role="alert">password tidak sesuai dengan konfirmasi password yang di masukkan
        </div>');
      redirect('admin/akunguru');
    }


    $this->admin->tambahAkun($input);
    $this->session->set_flashdata('input', '<div class="alert alert-success" role="alert">
        Data Sudah Masuk!
    </div>');
    redirect('admin/akunguru');
  }

  public function tambahjadwal()
  {
    $input['hari'] = $this->input->post('hari');
    $input['jamke'] = $this->input->post('jamke');
    $input['kelas'] = $this->input->post('kelas');
    $input['idbio'] = $this->input->post('nama');

    if ($input['hari'] == "" || $input['jamke'] == "" || $input['kelas'] == "" || $input['idbio'] == "") {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        harap masukkan data dengan benar !
    </div>');
      redirect('admin/jadwal');
    } else {
      # code...
      $this->admin->tambahjadwal($input);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Sudah masuk !
    </div>');
      redirect('admin/jadwal');
    }
  }

  // hapus =============================================================================

  public function hapusGuru()
  {
    $hapus = $this->input->post("hapus");
    $this->admin->hapusGuru($hapus);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data Telah diHapus!
    </div>');
    redirect('admin/guru');
  }

  public function hapusjadwal()
  {
    $hapus = $this->input->post("hapus");
    $this->admin->hapusJadwal($hapus);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data Telah diHapus!
    </div>');
    redirect('admin/jadwal');
  }


  // edit akun ======================================================================
  public function editakunguru()
  {
    // cek data apakah sudah ada usernya\
    // ambil idbio di unput
    // cek password input apakah sama
    // validation form add account
    $input['edit'] = $this->input->post('edit');
    $input['nama'] = $this->input->post('nama');
    $input['uname'] = $this->input->post('uname');
    $input['pword'] = $this->input->post('pword');
    $input['pword1'] = $this->input->post('pword1');
    if ($input['pword'] != $input['pword1']) {

      $this->session->set_flashdata('input', '<div class="alert alert-danger" role="alert">password tidak sesuai dengan konfirmasi password yang di masukkan
        </div>');
      redirect('admin/akunguru');
    }

    $this->admin->editakun($input);
    $this->session->set_flashdata('input', '<div class="alert alert-success" role="alert">
        Data Sudah Berhasil di ganti!
    </div>');
    redirect('admin/akunguru');
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



  // hapus ===============================================================================

  public function hapusakun()
  {
    $input = $this->input->post('hapus');
    $this->admin->hapusAkun($input);
    redirect('admin/akunguru');
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */