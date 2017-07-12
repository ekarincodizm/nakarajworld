<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class config_model extends CI_Model {

  public function Config()
  {
    $Config = $this->db
    ->get('mlm_config')
    ->result_array();
    return $Config;
  }
  public function UpdateConfig($input)
  {
    $query = $this->db
    ->where('mlm_config_id', $input['mlm_config_id'])
    ->update('mlm_config', $input);
  }
}
