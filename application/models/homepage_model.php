<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_model extends CI_Model {

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
    ->where('user_name', $data['member_citizen_id'])
    ->get('mlm_user')
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
    ->where('mlm_member.member_id', $id)
    ->join('amphur','amphur.amphur_id = mlm_member.member_amphur', 'left')
    ->join('province','province.province_id = mlm_member.member_province', 'left')
    ->join('mlm_user','mlm_user.member_id = mlm_member.member_id', 'left')
    ->get('mlm_member')
    ->result();
    return $query;
  }

  public function LoadUser($id)
  {
    $query = $this->db
    ->where('member_id', $id)
    ->get('mlm_user')
    ->result_array();
    return $query;
  }

  public function addPhoto($data){
    $query = $this->db
    ->where('member_id', $data['member_id'])
    ->update('mlm_member',$data);
  }

  public function MemberPV($id)
  {
    $member = $this->db
    ->where('member_id', $id)
    ->get('mlm_member')
    ->result_array();

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
      $member[$i]['temp_total_pv'] = $pv;
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
      $member[$i]['temp_total_used_pv'] = $pv;
      $i++;
    }
    // $this->debuger->prevalue($memeber);
      return $member;
  }
  public function CheckFreePV($account_id){
      $check = 'FreePV';
      $query = $this->db
      ->where('account_id',$account_id)
      ->where('point_detail',$check)
      ->get('mlm_point_value')
      ->num_rows();

      //$this->debuger->prevalue($query);
      return $query;
  }
  public function Repeat($account_id){

    $Repeat = $this->db
    ->where('account_id',$account_id)
    ->get('mlm_account_repeat')
    ->result_array();

    // $this->debuger->prevalue($Repeat);
    return $Repeat;
    }

    public function AccountRepeat($account_id, $class_id){

      $AccountRepeat = $this->db
      ->where('account_id',$account_id)
      ->where('account_repeat_class',$class_id)
      ->get('mlm_account_repeat')
      ->num_rows();

      // $this->debuger->prevalue($Repeat);
      return $AccountRepeat;
      }
}
