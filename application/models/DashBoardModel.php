<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboardmodel extends CI_Model {

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

  public function DashBoardGroupChartPer30Day($id)
  {
    $today_date = date('Y-m-d');
    $dateSearch = date('Y-m-d', strtotime("-30 days"));
    $Group = $this->db
    ->where('mlm_journal_extend.account_id', $id)
    // ->where('journal_extend_start_date <=', $today_date)
    ->where('journal_extend_start_date >=', $dateSearch)
    ->join('mlm_account','mlm_journal_extend.account_id = mlm_account.account_id')
    ->get('mlm_journal_extend')->num_rows();
    return $Group;

  }
}
