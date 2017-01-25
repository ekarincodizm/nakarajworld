<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountModel extends CI_Model {
public function JoinAccountDetail()
{
   $this->db->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')->get('mlm_account')->result_array();

}
public function AddDetail($query)
{
  $this->db->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')->get('mlm_account')->result_array();
  $i=0;
  foreach ($query as $row) {
      $query[$i]['count_adviser'] = $this->db
                                    ->where('mlm_account.account_adviser_id', $row['account_id'])
                                    ->where('mlm_account.member_id !=', $row['member_id'])
                                    ->get('mlm_account')->num_rows();
      $query[$i]['count_downline'] = $this->db
                                    ->where('downline_count_upline_id', $row['account_id'])
                                    ->get('mlm_downline_count')->num_rows();
      $query[$i]['count_three_downline'] = $this->db
                                    ->where('account_upline_id', $row['account_id'])
                                    ->get('mlm_account')->num_rows();
      $query[$i]['adviser'] = $this->db->where('account_id', $row['account_adviser_id'])->get('mlm_account')->result_array();
      $query[$i]['upline'] = $this->db->where('account_id', $row['account_upline_id'])->get('mlm_account')->result_array();
      $i++;
      return $query;
  }
}
  public function AllAccountList()
  {
    $query = $this->db->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')->get('mlm_account')->result_array();
    $i=0;
    foreach ($query as $row) {
        $query[$i]['count_adviser'] = $this->db
                                      ->where('mlm_account.account_adviser_id', $row['account_id'])
                                      ->where('mlm_account.member_id !=', $row['member_id'])
                                      ->get('mlm_account')->num_rows();
        $query[$i]['count_downline'] = $this->db
                                      ->where('downline_count_upline_id', $row['account_id'])
                                      ->get('mlm_downline_count')->num_rows();
        $query[$i]['count_three_downline'] = $this->db
                                      ->where('account_upline_id', $row['account_id'])
                                      ->get('mlm_account')->num_rows();
        $query[$i]['adviser'] = $this->db->where('account_id', $row['account_adviser_id'])->get('mlm_account')->result_array();
        $query[$i]['upline'] = $this->db->where('account_id', $row['account_upline_id'])->get('mlm_account')->result_array();
        $i++;
      }
    return $query;
  }
  public function AccountByID($id)
  {
    $query =  $this->db
    ->where('account_id', $id)
    ->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')
    // ->join('mlm_bookbank', 'mlm_account.bookbank_id = mlm_bookbank.bookbank_id')

    ->get('mlm_account')
    ->result();
    return $query;
  }
  public function FindAccountByID($id)
  {
    $query =  $this->db
    ->where('account_id', $id)
    ->get('mlm_account')
    ->result_array();
    return $query;
  }
  public function AccountNonJoinByID($id)
  {
    $query =  $this->db
    ->where('account_id', $id)
    ->get('mlm_account')
    ->result();
    return $query;
  }
  public function AccountListByUpline($id) {
    $query = $this->db
    ->where('account_upline_id', $id)
    ->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')
    ->get('mlm_account')
    ->result();
    return $query;
  }

  public function FindAccountByCode($value) {
    $query =  $this->db
    ->where('account_team', $value['account_team'])
    ->where('account_level', $value['account_level'])
    ->where('account_code', $value['account_code'])
    ->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')
    ->get('mlm_account')
    ->result();
    return $query;
  }

  public function LoadAccountByMember($id)
  {
    $query = $this->db
    ->where('member_id', $id)
    // ->join('mlm_user', 'mlm_member.member_id = mlm_user.member_id')
    ->get('mlm_account')
    ->result();

    return $query;
  }

  public function AccountByMember($id)
  {
    $query = $this->db ->where('mlm_account.member_id', $id)->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')->get('mlm_account')->result_array();
    $i=0;
    foreach ($query as $row) {
        $query[$i]['count_adviser'] = $this->db
                                      ->where('mlm_account.account_adviser_id', $row['account_id'])
                                      ->where('mlm_account.member_id !=', $row['member_id'])
                                      ->get('mlm_account')->num_rows();
        $query[$i]['count_downline'] = $this->db
                                      ->where('downline_count_upline_id', $row['account_id'])
                                      ->get('mlm_downline_count')->num_rows();
        $query[$i]['count_three_downline'] = $this->db
                                      ->where('account_upline_id', $row['account_id'])
                                      ->get('mlm_account')->num_rows();
        $query[$i]['adviser'] = $this->db->where('account_id', $row['account_adviser_id'])->get('mlm_account')->result_array();
        $query[$i]['upline'] = $this->db->where('account_id', $row['account_upline_id'])->get('mlm_account')->result_array();
        $i++;
      }

    return $query;
  }
  public function AccountListByTeam($value)
  {
    $query = $this->db
    ->where('account_team', $value)
    ->order_by('account_code', 'DESC')
    ->get('mlm_account')->result();
    return $query;
  }

  public function SaveAccount($value, $adviser_id) {
    $this->db->insert('mlm_account', $value);
    $NewID = $this->db->insert_id();
    $NewID = $NewID+1;
    // Insert Temp Count Downline
    $Account = json_decode(json_encode($this->AccountByID($NewID)), true);
    $upline_id = $Account[0]['account_upline_id'];
    do {
      $input = array(
        'downline_count_upline_id' => $upline_id,
        'downline_count_downline_id' => $NewID,
      );
      $this->db->insert('mlm_downline_count', $input);
      $Account = json_decode(json_encode($this->AccountByID($upline_id)), true);
      $upline_id ='';
      if (count($Account)>0) {
        $upline_id = $Account[0]['account_upline_id'];
      } else {
        $upline_id = '';
      }
    } while ($upline_id!='' && $upline_id!=0);
    return $NewID;
  }

  public function SaveAccountHistory($value)
  {
    $this->db->insert('mlm_journal_extend', $value);
    $id = $this->db->insert_id();
    return $id;
  }
  public function SaveJournalExtend($value)
  {
    $this->db->insert('mlm_journal_extend', $value);
    $id = $this->db->insert_id();
    return $id;
  }
  public function SaveAccountingExtend($value)
  {
    $this->db->insert('mlm_accounting', $value);
  }
  public function AddAccounting($value){
    $this->db->insert('mlm_accounting', $value);
  }
  public function ChangeMemberStatus($value){
    $input = array(
        'member_status' => $value['member_status'],
      );
    $this->db
    ->where('member_id',$value['member_id'])
    ->update('mlm_member',$input);
  }
  public function JounalExtendAccount($id)
  {
    $query = $this->db
    ->where('account_id', $id)
    // ->join('mlm_accounting', 'mlm_accounting.accounting_source_id = mlm_journal_extend.journal_extend_id')
    ->get('mlm_journal_extend')->result_array();
    // print_r($query);
    return $query;
  }
  public function JounalExtendAccountAll()
  {
    $query = $this->db
    ->get('mlm_journal_extend')->num_rows();
    return $query;
  }
  public function JounalFreeAccountAll()
  {
    $query = $this->db
    ->get('mlm_journal_fee')->num_rows();
    return $query;
  }
  public function BookbankDetail($id)
  {
    $query = $this->db
    ->where('bookbank_id', $id)
    ->join('mlm_bank', 'mlm_bookbank.bank_id = mlm_bank.bank_id')
    ->get('mlm_bookbank')->result();
    return $query;

  }
  public function AllDownlineByAccount($upline_id)
  {
    $query = $this->db
    ->where('downline_count_upline_id', $upline_id)
    ->get('mlm_downline_count')->result();

    return $query;

  }
  public function ThreeDownline($upline_id)
  {
    $query = $this->db->where('account_upline_id', $upline_id)->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')->get('mlm_account')->result_array();
    $i=0;
    foreach ($query as $row) {
        $query[$i]['count_adviser'] = $this->db
                                      ->where('mlm_account.account_adviser_id', $row['account_id'])
                                      ->where('mlm_account.member_id !=', $row['member_id'])
                                      ->get('mlm_account')->num_rows();
        $query[$i]['count_downline'] = $this->db
                                      ->where('downline_count_upline_id', $row['account_id'])
                                      ->get('mlm_downline_count')->num_rows();
        $query[$i]['count_three_downline'] = $this->db
                                      ->where('account_upline_id', $row['account_id'])
                                      ->get('mlm_account')->num_rows();
        $query[$i]['adviser'] = $this->db->where('account_id', $row['account_adviser_id'])->get('mlm_account')->result_array();
        $query[$i]['upline'] = $this->db->where('account_id', $row['account_upline_id'])->get('mlm_account')->result_array();
        $i++;
      }

    return $query;
  }

  public function AdviserList($adviser_id)
  {
    $query = $this->db->where('account_adviser_id', $adviser_id)->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')->get('mlm_account')->result_array();
    $i=0;
    foreach ($query as $row) {
        $query[$i]['count_adviser'] = $this->db
                                      ->where('mlm_account.account_adviser_id', $row['account_id'])
                                      ->where('mlm_account.member_id !=', $row['member_id'])
                                      ->get('mlm_account')->num_rows();
        $query[$i]['count_downline'] = $this->db
                                      ->where('downline_count_upline_id', $row['account_id'])
                                      ->get('mlm_downline_count')->num_rows();
        $query[$i]['count_three_downline'] = $this->db
                                      ->where('account_upline_id', $row['account_id'])
                                      ->get('mlm_account')->num_rows();
        $query[$i]['adviser'] = $this->db->where('account_id', $row['account_adviser_id'])->get('mlm_account')->result_array();
        $query[$i]['upline'] = $this->db->where('account_id', $row['account_upline_id'])->get('mlm_account')->result_array();
        $i++;
      }

    return $query;
  }

  public function IncomeAccounting($id)
  {
    $query = $this->db
    ->where('mlm_accounting.member_id', $id)
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    // ->join('mlm_member', 'mlm_accounting.member_id = mlm_member.member_id', 'left')
    ->join('mlm_user', 'mlm_accounting.member_id = mlm_user.member_id', 'left')
    ->join('mlm_account', 'mlm_accounting.accounting_source_id = mlm_account.account_id', 'left')
    ->order_by('accounting_id', 'DESC')

    ->get('mlm_accounting')
    ->result();
      return $query;
  }
  public function BookbankList($id)
  {
    $query = $this->db
    ->where('member_id', $id)
    ->join('mlm_bank', 'mlm_bookbank.bank_id = mlm_bank.bank_id')
    ->get('mlm_bookbank')->result();
    return $query;
  }

  public function Deletebank($id)
  {
    $this->db
    ->where('bookbank_id', $id)
    ->delete('mlm_bookbank');
  }
  public function DeleteBookbank($id)
  {
    $this->db
    ->where('bookbank_id', $id['bookbank_id'])
    ->where('member_id', $id['member_id'])
    ->delete('mlm_bookbank');
  }

  public function UpdateAccount($id2)
  {
    $input = array(
        'bookbank_id' => 0,
      );
    $this->db
    ->where('account_id',$id2)
    ->update('mlm_account',$input);
  }

  // public function Editebank($id)
  // {
  //   $this->db->where('account_id', $id)->delete('mlm_account');
  //
  // }

}
