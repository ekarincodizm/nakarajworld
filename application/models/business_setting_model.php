<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class business_setting_model extends CI_Model {

  public function LoadBusinessSetting()
  {
    $query =  $this->db->get('mlm_fee_setting')->result();
    return $query;
  }
  public function LoadPlanOneSetting()
  {
    $query = $this->db
    // ->where('income_percent_level', 1)
    ->where('account_class_id', 1)
    ->get('mlm_income_percent_setting')
    ->result();
    return $query;
  }

  public function LoadPlanOneSetting2()
  {
    $query = $this->db
    // ->where('income_percent_level', 1)
    ->where('account_class_id !=', 1)
    ->get('mlm_income_percent_setting')
    ->result();
    return $query;
  }
}
