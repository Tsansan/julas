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

  public function jurnalGuru($search)
  {
    if (!$search) {
      $query = "SELECT * FROM tb_jurnal 
      INNER JOIN tb_jadwal ON tb_jurnal.idjadwal = tb_jadwal.idjadwal
      INNER JOIN tb_bio ON tb_jadwal.idbio = tb_bio.idbio";
    } else {
      $query = "SELECT * FROM tb_jurnal 
      INNER JOIN tb_jadwal ON tb_jurnal.idjadwal = tb_jadwal.idjadwal
      INNER JOIN tb_bio ON tb_jadwal.idbio = tb_bio.idbio
      WHERE hari LIKE '%$search%' OR kelas LIKE '%$search%' OR nama LIKE '%$search%'";
    }
    $data = $this->db->query($query)->result_array();
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

  public function hapusGuru($search)
  {
    $query = "DELETE FROM tb_bio WHERE idbio = '$search'";
    $this->db->query($query);
  }

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
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */