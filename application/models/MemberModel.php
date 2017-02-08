<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class membermodel extends CI_Model {

  public function MemberList()
  {
    $query = $this->db
    ->where('user_group', 'Member')
    ->join('mlm_user', 'mlm_member.member_id = mlm_user.member_id')
    ->get('mlm_member')
    ->result();
    return $query;

  }
  public function MemberByID($id)
  {
    $query = $this->db
    ->where('member_id', $id)
    ->get('mlm_member')
    ->result_array();
    return $query;
  }
  public function MemberListWhithPV()
  {
    $member = $this->db
    ->where('user_group', 'Member')
    ->join('mlm_user', 'mlm_member.member_id = mlm_user.member_id')
    ->order_by('mlm_member.member_id', 'DESC')
    ->get('mlm_member')
    ->result_array();
    // return $query;

    $i = 0;
    foreach ($member as $member_row) {
      $Getpv = $this->db
      ->where('member_id', $member_row['member_id'])
      ->where('point_type',1)
      ->get('mlm_point_value')
      ->result_array();

      $pv=0;
      foreach ($Getpv as $row){
      $pv += $row['point_value'];
      }
      $member[$i]['total_pv'] = $pv;
      $i++;
    }

    $i = 0;
    foreach ($member as $member_row) {
      $Getpv = $this->db
      ->where('member_id', $member_row['member_id'])
      ->where('point_type',0)
      ->get('mlm_point_value')
      ->result_array();

      $pv=0;
      foreach ($Getpv as $row){
      $pv += $row['point_value'];
      }
      $member[$i]['total_used_pv'] = $pv;
      $i++;
    }
    //[ยังไม่ทำ]ต้องลบกับรายการใช้ PV ก่อน
    return $member;
  }
  Public function checkaccounting($member_id)
  {
    $check = $this->db
    ->where('journals_id', 1)
    ->where('member_id', $member_id)
    ->join('mlm_account','mlm_accounting.accounting_source_id = mlm_account.account_id')
    ->get('mlm_accounting')
    ->result_array();
    return $check;
  }
  public function MemberCreckAccept($id)
  {
    $query = $this->db
    ->where('member_id' , $id)
    ->where('journals_id' , 1)
    ->get('mlm_accounting')
    ->result_array();
    return $query;
  }


}
