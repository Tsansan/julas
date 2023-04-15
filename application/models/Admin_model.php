<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Admin_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Admin_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

  public function jadwalGuru($search)
  {
    if (!$search) {
      $query = "SELECT * FROM tb_jadwal INNER JOIN tb_bio ON tb_jadwal.idbio = tb_bio.idbio ";
    } else {
      $query = "SELECT * FROM tb_jadwal INNER JOIN tb_bio ON tb_jadwal.idbio = tb_bio.idbio WHERE hari LIKE '%$search%' OR kelas LIKE '%$search%' OR nama LIKE '%$search%'";
    }
    $data = $this->db->query($query)->result_array();
    return $data;
  }

  public function daftarGuru($search)
  {
    if (!$search) {
      $query = "SELECT * FROM tb_bio";
    } else {
      $query = "SELECT * FROM tb_bio WHERE nama LIKE '%$search%' OR nip LIKE '%$search%' OR mapel LIKE '%$search%' OR email LIKE '%$search%'";
    }
    $data = $this->db->query($query)->result_array();
    return $data;
  }

  public function akunGuru($search)
  {
    if (!$search) {
      $query = "SELECT * FROM tb_user 
      INNER JOIN tb_bio ON tb_user.id_bio = tb_bio.idbio
      INNER JOIN tb_level ON tb_user.level = tb_level.idlevel";
    } else {
      $query = "SELECT * FROM tb_user 
      INNER JOIN tb_bio ON tb_user.id_bio = tb_bio.idbio
      INNER JOIN tb_level ON tb_user.level = tb_level.idlevel
      WHERE nip LIKE '%$search%' OR uname LIKE '%$search%' OR nama LIKE '%$search%'";
    }
    $data = $this->db->query($query)->result_array();
    return $data;
  }


  public function jurnalGuru($search)
  {
    if ($search == "") {
      $query = "SELECT * FROM tb_jurnal 
      INNER JOIN tb_jadwal ON tb_jurnal.idjadwal = tb_jadwal.idjadwal
      INNER JOIN tb_bio ON tb_jurnal.idbio = tb_bio.idbio ORDER BY idjurnal DESC";
    } else {
      $query = "SELECT * FROM tb_jurnal 
      INNER JOIN tb_jadwal ON tb_jurnal.idjadwal = tb_jadwal.idjadwal
      INNER JOIN tb_bio ON tb_jurnal.idbio = tb_bio.idbio
      WHERE tb_jurnal.kelas LIKE '%$search%' OR nama LIKE '%$search%' OR tanggal LIKE '%$search%' ORDER BY idjurnal DESC";
    }
    $data = $this->db->query($query)->result_array();
    return $data;
  }


  public function jurnalHariini($tanggal)
  {
    $query = "SELECT * FROM tb_jurnal 
      INNER JOIN tb_jadwal ON tb_jurnal.idjadwal = tb_jadwal.idjadwal
      INNER JOIN tb_bio ON tb_jadwal.idbio = tb_bio.idbio
      WHERE tanggal = '$tanggal'";

    $data = $this->db->query($query)->result_array();

    $countdata = count($data);

    if ($countdata == null) {
      $data = [
        'tanggal' => $tanggal,
        'tidakhadir' => "nihil"
      ];
    } else {
      # code...
      for ($i = 0; $i < $countdata; $i++) {
        $sum[$i] = $data[$i]['tidakhadir'];
      }

      $sum = array_sum($sum);

      $data = [
        'tanggal' => $tanggal,
        'tidakhadir' => $sum
      ];
    }
    return $data;
  }


  // tambah ====================================================
  public function tambahGuru($data)
  {
    $query = "SELECT * FROM tb_bio";
    $dataguru = $this->db->query($query)->result_array();

    $lastdataguru = count($dataguru) - 1;
    $datasplit = explode("o", $dataguru[$lastdataguru]['idbio']);
    $datanumber = $datasplit[1] + 1;
    $datanumber = str_split($datanumber);
    $datalength = count($datanumber);
    $datazero = 4 - $datalength;

    if ($datazero > 0) {
      for ($i = 0; $i < $datazero; $i++) {
        $zeroinput[$i] = 0;
      }
      $datamerger = array_merge($zeroinput, $datanumber);
      $datamerger = join($datamerger);
    } else {
      $datamerger = join($datanumber);
    }

    $datainput = [
      'idbio'   => "bio" . $datamerger,
      'nama'    => htmlspecialchars($data['nama']),
      'nip'     => htmlspecialchars($data['nip']),
      'alamat'  => htmlspecialchars($data['alamat']),
      'nohp'    => htmlspecialchars($data['nohp']),
      'email'   => htmlspecialchars($data['email']),
      'mapel'   => htmlspecialchars($data['mapel']),
    ];

    $this->db->insert('tb_bio', $datainput);
  }

  public function tambahAkun($data)
  {
    $idbio = explode("-", $data['nama']);

    $datainput = [
      'id' => '',
      'uname' => $data['uname'],
      'pword' => $data['pword'],
      'id_bio' => $idbio[1],
      'level' => 3
    ];

    $this->db->insert('tb_user', $datainput);
  }

  public function tambahjadwal($input)
  {
    // mengambil id jadwal terakhir
    $query = "SELECT * FROM tb_jadwal";

    $datajadwal = $this->db->query($query)->result_array();

    $lastdatajadwal = count($datajadwal) - 1;
    $datasplit = explode("l", $datajadwal[$lastdatajadwal]['idjadwal']);
    $datanumber = $datasplit[1] + 1;
    $datanumber = str_split($datanumber);
    $datalength = count($datanumber);
    $datazero = 4 - $datalength;

    if ($datazero > 0) {
      for ($i = 0; $i < $datazero; $i++) {
        $zeroinput[$i] = 0;
      }
      $datamerger = array_merge($zeroinput, $datanumber);
      $datamerger = join($datamerger);
    } else {
      $datamerger = join($datanumber);
    }

    $idbio = explode("-", $input['idbio']);

    $datainput = [
      'idjadwal' => "jwl" . $datamerger,
      'hari' => $input['hari'],
      'jamke' => $input['jamke'],
      'kelas' => $input['kelas'],
      'idbio' => $idbio[1]
    ];

    $this->db->insert('tb_jadwal', $datainput);
  }

  // Hapus===================================================
  public function hapusGuru($search)
  {
    $query = "DELETE FROM tb_bio WHERE idbio = '$search'";
    $this->db->query($query);
  }

  public function hapusAkun($search)
  {
    $query = "DELETE FROM tb_user WHERE id_bio = '$search'";
    $this->db->query($query);
  }

  public function hapusJadwal($search)
  {
    $query = "DELETE FROM tb_jadwal WHERE idjadwal = '$search'";
    $this->db->query($query);
  }

  // edit ==============================================

  public function editguru($data)
  {
    $datainput = [
      // 'idbio'   => htmlspecialchars($data['idbio']), 
      'nama'    => htmlspecialchars($data['nama']),
      'nip'     => htmlspecialchars($data['nip']),
      'alamat'  => htmlspecialchars($data['alamat']),
      'nohp'    => htmlspecialchars($data['nohp']),
      'email'   => htmlspecialchars($data['email']),
      'mapel'   => htmlspecialchars($data['mapel']),
    ];

    $this->db->update('tb_bio', $datainput, ['idbio' => $data['idbio']]);
  }


  public function editAkun($data)
  {
    $idbio = explode('-', $data['nama']);

    $datainput = [
      'uname' => $data['uname'],
      'pword' => $data['pword'],
      'id_bio' => $idbio[1],
      'level' => 3
    ];

    $this->db->update('tb_user', $datainput, ['id_bio' => $idbio[1]]);
  }
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */