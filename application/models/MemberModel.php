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
