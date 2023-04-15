<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model User_model
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

class User_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function dataGuru($uname, $pword)
  {
    $query = "SELECT * FROM tb_user 
    INNER JOIN tb_bio ON tb_user.id_bio = tb_bio.idbio Where tb_user.uname = '$uname' and tb_user.pword = '$pword'";

    $data = $this->db->query($query)->row_array();
    return $data;
  }

  public function jurnal($uname, $pword)
  {
    $query = "SELECT * FROM tb_user 
    INNER JOIN tb_bio ON tb_user.id_bio = tb_bio.idbio 
    INNer JOIN tb_jurnal on tb_jurnal.idbio = tb_bio.idbio
    Where tb_user.uname = '$uname' and tb_user.pword = '$pword' ORDER BY idjurnal DESC";

    $data = $this->db->query($query)->result_array();
    return $data;
  }

  public function tambahjurnal($input)
  {
    // mengambil id jurnal terakhir
    $query = "SELECT * FROM tb_jurnal";

    $datajurnal = $this->db->query($query)->result_array();

    $lastdatajurnal = count($datajurnal) - 1;
    $datasplit = explode("l", $datajurnal[$lastdatajurnal]['idjurnal']);
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

    $data = [
      'idjurnal' => "jnl" . $datamerger,
      'tanggal' => $input['tanggal'],
      'idjadwal' => $input['idjadwal'],
      'idbio' => $input['idbio'],
      'kelas' => $input['kelas'],
      'catatan' => $input['jurnal'],
      'hadir' => $input['hadir'],
      'tidakhadir' => $input['tidakhadir']
    ];
    $this->db->insert('tb_jurnal', $data);
  }

  public function jadwal($idbio, $days)
  {
    if ($days == null) {
      # code...
      $query = "SELECT * FROM tb_jadwal WHERE idbio = '$idbio'";
    } else {
      # code...
      $query = "SELECT * FROM tb_jadwal WHERE idbio = '$idbio' and hari = '$days'";
    }

    $data = $this->db->query($query)->result_array();

    return $data;
  }


  public function ubahProfil($input)
  {
    $data = [
      "idbio"   => $input['idbio'],
      "nama"    => $input['nama'],
      "nip"     => $input['nip'],
      "nohp"    => $input['nohp'],
      "email"   => $input['email'],
      "alamat"  => $input['alamat'],
      "mapel"   => $input['mapel']
    ];

    $this->db->update('tb_bio', $data, ['idbio' => $input['idbio']]);
  }

  public function ubahAkun($input)
  {
    $idbio = $input['idbio'];
    $query = "SELECT * FROM tb_user Where id_bio = '$idbio'";
    $datauser = $this->db->query($query)->row_array();

    $data = [
      'id' => $datauser['id'],
      'uname' => $input['uname'],
      'pword' => $input['pword1'],
      'id_bio' => $input['idbio'],
      'Level' => $datauser['Level']
    ];
    $this->db->update('tb_user', $data, ['id' => $datauser['id']]);
  }
  // ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */