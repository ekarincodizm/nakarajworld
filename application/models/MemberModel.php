<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends CI_Model {

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
    ->get('mlm_member')
    ->result_array();
    // return $query;

    $i = 0;
    foreach ($member as $member_row) {
      $shop_detail = $this->db
      ->where('member_id', $member_row['member_id'])
      ->where('shop_detail_status',1)
      ->join('mlm_shop_items', 'mlm_shop_detail.shop_detail_id = mlm_shop_items.shop_detail_id')
      ->get('mlm_shop_detail')
      ->result_array();

      $pv=0;
      foreach ($shop_detail as $row){
      $pv += $row['shop_items_pv']*$row['shop_items_quantity'];
      }
      $member[$i]['total_pv'] = $pv;
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
