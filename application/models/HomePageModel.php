<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePageModel extends CI_Model {

  public function LoadSetting()
  {
    $query = $this->db
    ->get('mlm_frontend_setting')
    ->result();
    return $query;
  }
  public function CheckRegis($data)
  {
    $query = $this->db
    ->where('member_id_card_type', $data['member_id_card_type'])
    ->where('member_citizen_id', $data['member_citizen_id'])
    ->get('mlm_member')
    ->result();
    return $query;
  }
  public function AddMember($data)
  {
    // $this->debuger->prevalue($data);
    $query = $this->db->insert('mlm_member', $data);

    $id = $this->db->insert_id();
    $query = $this->db
    ->where('member_id', $id)
    ->get('mlm_member')
    ->result();
    return $query;
  }
  public function UpdateMember($data)
  {
    // $query = $this->db->insert('mlm_member', $data);
    // $id = $this->db->insert_id();
    $query = $this->db
    ->where('member_id', $data['member_id'])
    ->update('mlm_member',$data);
    // return $query;
  }
  public function AddUser($data)
  {
    $query = $this->db->insert('mlm_user', $data);
  }
  public function UpdateUser($data)
  {
    $query = $this->db
    ->where('member_id', $data['member_id'])
    ->update('mlm_user',$data);
  }
  public function AuthenUser($data)
  {
    $query = $this->db
    ->where('user_name', $data['user_name'])
    ->where('user_pass', base64_encode($data['user_pass']))
    ->get('mlm_user')
    ->result();
    return $query;
  }
  public function AuthenAdmin($data)
  {
    $query = $this->db
    ->get_where('mlm_admin', $data)
    ->result_array();
    return $query;
  }
  public function LoadProfile($id)
  {
    $query = $this->db
    ->where('member_id', $id)
    ->get('mlm_member')
    ->result();
    // $this->debuger->prevalue($query);



    return $query;
  }

  public function addPhoto($data){
    $query = $this->db
    ->where('member_id', $data['member_id'])
    ->update('mlm_member',$data);
  }

  public function allpv($id)
  {
    $member_id = $this->db
    ->where('member_id', $id)
    ->get('mlm_member')
    ->result_array();

    $shop_detail = $this->db
      ->where('member_id', $id)
      ->where('accounting_status',1)
      ->join('mlm_accounting', 'mlm_journal_sale_order_detail.journal_sale_order_detail_id = mlm_accounting.accounting_source_id')
      ->join('mlm_journal_sale_order_item', 'mlm_journal_sale_order_detail.journal_sale_order_detail_id = mlm_journal_sale_order_item.journal_sale_order_detail_id')
      ->get('mlm_journal_sale_order_detail')
      ->result_array();

      $pv=0;
      foreach ($shop_detail as $row){
      $pv += $row['journal_sale_order_item_pv']*$row['journal_sale_order_item_quantity'];
    }
      return $pv;
      //[ยังไม่ทำ]ต้องลบกับรายการใช้ PV ก่อน
  }
}
