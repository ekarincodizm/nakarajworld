<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashBoardModel extends CI_Model {

  public function DashBoardTeam()
  {
    // $AllTeam = $this->db->get('mlm_account')->num_rows();
    $CodeTeam = array();
    for ($i='A'; $i <='I' ; $i++) {
      $CodeTeam[$i] = $this->db->where('account_team', $i)->get('mlm_account')->num_rows();
    }
    return $CodeTeam;
  }
  public function DashBoardGroup($id)
  {
    $Group = $this->db
    ->where('downline_count_upline_id', $id)
    // ->Where('account_code', $code)
    // ->Where('account_code', $code)
    ->get('mlm_downline_count')->num_rows();
    return $Group;

  }
}
