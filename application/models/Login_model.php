<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Login_model
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

class Login_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function checkdata($uname, $pword)
  {
    $query = "SELECT * FROM tb_user WHERE uname = '$uname' AND pword = '$pword'";
    $data = $this->db->query($query)->row_array();

    if ($data['uname'] != null && $data['pword'] != null) {
      $unamecheck = str_split($uname);
      $pwordcheck = str_split($pword);
      $datauname = str_split($data['uname']);
      $datapword = str_split($data['pword']);

      for ($i = 0; $i < strlen($uname); $i++) {
        if ($unamecheck[$i] != $datauname[$i]) {
          return false;
        }
      }
      for ($i = 0; $i < strlen($pword); $i++) {
        if ($pwordcheck[$i] != $datapword[$i]) {
          return false;
        }
      }
    } else {
      $data = null;
    }

    return $data;
  }

  // ------------------------------------------------------------------------

  public function checkdataAdmin($uname, $pword)
  {
    $query = "SELECT * FROM tb_user WHERE uname = '$uname' AND pword = '$pword' AND level = '2'";
    $data = $this->db->query($query)->row_array();

    if ($uname != null && $pword != null) {
      $unamecheck = str_split($uname);
      $pwordcheck = str_split($pword);
      $datauname = str_split($data['uname']);
      $datapword = str_split($data['pword']);

      for ($i = 0; $i < strlen($uname); $i++) {
        if ($unamecheck[$i] != $datauname[$i]) {
          return false;
        }
      }
      for ($i = 0; $i < strlen($pword); $i++) {
        if ($pwordcheck[$i] != $datapword[$i]) {
          return false;
        }
      }
    }

    return $data;
  }

  //-----------------------------------------------------------------------

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */