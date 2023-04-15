<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Kepsek_model
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

class Kepsek_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function datakepsek($uname, $pword)
  {
    $query = "SELECT * FROM tb_user 
    INNER JOIN tb_bio ON tb_user.id_bio = tb_bio.idbio
    WHERE tb_user.uname = '$uname' AND tb_user.pword = '$pword'";

    $data = $this->db->query($query)->row_array();

    return $data;
  }

  public function daftarguru($search)
  {
    $query = "SELECT * FROM tb_bio 
    WHERE tb_bio.nama LIKE '%$search%' OR tb_bio.nip LIKE '%$search%'";

    $data = $this->db->query($query)->result_array();

    return $data;
  }

  public function jurnalguruhariini($search)
  {
    $query = "SELECT * FROM tb_jurnal
    INNER JOIN tb_bio ON tb_bio.idbio = tb_jurnal.idbio
    WHERE tb_jurnal.tanggal LIKE '%$search%'";

    $data = $this->db->query($query)->result_array();

    return $data;
  }

  public function jadwalGuru($search)
  {
    $query = "SELECT * FROM tb_jadwal 
    INNER JOIN tb_bio ON tb_bio.idbio = tb_jadwal.idbio
    WHERE tb_bio.nama LIKE '%$search%' LIKE tb_jadwal.kelas LIKE '%$search%'";

    $data = $this->db->query($query)->result_array();

    return $data;
  }
  // ------------------------------------------------------------------------

}

/* End of file Kepsek_model.php */
/* Location: ./application/models/Kepsek_model.php */