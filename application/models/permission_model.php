<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class permission_model extends CI_Model {

  public function SuperAdmin()
  {
    $query = $this->db
    ->where('admin_type', 1)
    ->get('mlm_admin')
    ->result_array();
    return $query;
  }
  public function TeamAdmin()
  {
    $query = $this->db
    ->where('admin_type', 2)
    ->get('mlm_admin')
    ->result_array();
    return $query;
  }

  public function UpdateAdmin($AdminForm)
  {
    $this->db
    ->where('admin_id', $AdminForm['admin_id'])
    ->update('mlm_admin', $AdminForm);
  }

}
