<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account_model extends CI_Model {
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
    $query = $this->db->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')->get('mlm_account',400,0)->result_array();
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
    ->join('mlm_account_class', 'mlm_account.account_class_id = mlm_account_class.account_class_id')
    ->get('mlm_account')
    ->result_array();
    // $this->debuger->prevalue($query);
    return $query;
  }
  public function DownlinePerLVL($Account, $RowLvl, $DownlineClass)
  {

    $data['downline_count_upline_id'] = $Account[0]['account_id'];
    $data['account_team'] = $Account[0]['account_team'];
    $data['account_level'] = $Account[0]['account_level']+$RowLvl;
    // print_r($data);
    // $this->debuger->prevalue($data);
    // $this->debuger->prevalue($DownlineClass);

    $query = array();
    $id = $data['downline_count_upline_id'];
    // echo "<pre>";
    // echo "id = ".$id." <br>";

    if ($id==1||$id==2||$id==3||$id==4)
    {

      if ($id==1)
      {
        $query =  $this->db
        ->where('downline_count_upline_id', $data['downline_count_upline_id'])
        ->where('account_level', $data['account_level'])
        ->where('account_class_id >=', $DownlineClass)
        ->join('mlm_account', 'mlm_downline_count.downline_count_downline_id = mlm_account.account_id')
        ->get('mlm_downline_count')
        ->result_array();
      }
      elseif ($id==2)
      {
        for ($i='A'; $i <= 'C' ; $i++) {
          $query_team =  $this->db
          ->where('downline_count_upline_id', $data['downline_count_upline_id'])
          ->where('account_team', $i)
          ->where('account_level', $data['account_level'])
          ->where('account_class_id >=', $DownlineClass)
          ->join('mlm_account', 'mlm_downline_count.downline_count_downline_id = mlm_account.account_id')
          ->get('mlm_downline_count')
          ->result_array();
          // $this->debuger->prevalue($query);

          // array_push($query, $query_team);
          // $this->debuger->prevalue($query);
          // echo "query <br>";
          // print_r($query);
          // echo "query_team <br>";
          // print_r($query_team);
          $arr = count($query);
          if (count($query_team)>0) {
            foreach ($query_team as $row) {
              array_push($query, $row);
              $arr++;
            }
          }

        }
        // echo "end";
        //
        // $this->debuger->prevalue($query);
        // $query = array_push($query3);
      }
      elseif ($id==3)
      {
        for ($i='D'; $i <= 'F' ; $i++) {
          $query_team =  $this->db
          ->where('downline_count_upline_id', $data['downline_count_upline_id'])
          ->where('account_team', $i)
          ->where('account_level', $data['account_level'])
          ->where('account_class_id >=', $DownlineClass)
          ->join('mlm_account', 'mlm_downline_count.downline_count_downline_id = mlm_account.account_id')
          ->get('mlm_downline_count')
          ->result_array();

          $arr = count($query);
          foreach ($query as $row) {
            $query[$arr] = array_push($query_team, $row);
            $arr++;
          }
        }
      }
      elseif ($id==4)
      {
        for ($i='G'; $i <= 'I' ; $i++) {
          $query_team =  $this->db
          ->where('downline_count_upline_id', $data['downline_count_upline_id'])
          ->where('account_team', $i)
          ->where('account_level', $data['account_level'])
          ->where('account_class_id >=', $DownlineClass)
          ->join('mlm_account', 'mlm_downline_count.downline_count_downline_id = mlm_account.account_id')
          ->get('mlm_downline_count')
          ->result_array();

          $arr = count($query);
          foreach ($query as $row) {
            $query[$arr] = array_push($query_team, $row);
            $arr++;
          }
        }
      }
    }
    else
    {
      $query =  $this->db
      ->where('downline_count_upline_id', $data['downline_count_upline_id'])
      ->where('account_team', $data['account_team'])
      ->where('account_level', $data['account_level'])
      ->where('account_class_id >=', $DownlineClass)
      ->join('mlm_account', 'mlm_downline_count.downline_count_downline_id = mlm_account.account_id')
      ->get('mlm_downline_count')
      ->result_array();
    }

    // $this->debuger->prevalue($query);
    return $query;
  }
  public function RepeatPerLVL($Account, $RowLvl, $DownlineClass,$RepeatClass)
  {

    $data['downline_count_upline_id'] = $Account[0]['account_id'];
    $data['account_team'] = $Account[0]['account_team'];
    $data['account_level'] = $Account[0]['account_level']+$RowLvl;
    // print_r($data);
    // $this->debuger->prevalue($data);
    // $this->debuger->prevalue($DownlineClass);

    $query =  $this->db
    ->where('downline_count_upline_id', $data['downline_count_upline_id'])
    ->where('mlm_account.account_team', $data['account_team'])
    ->where('mlm_account.account_level', $data['account_level'])
    ->where('mlm_account_repeat.account_repeat_class ', 2)
    ->where('mlm_account_repeat.account_repeat_round ', 1)
    ->join('mlm_account', 'mlm_downline_count.downline_count_downline_id = mlm_account.account_id')
    ->join('mlm_account_repeat', 'mlm_account.account_id = mlm_account_repeat.account_id')
    ->get('mlm_downline_count')
    ->result_array();

    return $query;
  }

  public function GetGoalClassLvl($DownlineClass, $lvlDown)
  {
    $query = $this->db
    ->where('income_percent_level', $lvlDown)
    ->where('account_class_id', $DownlineClass)
    ->get('mlm_income_percent_setting')
    ->result_array();
    // $this->debuger->prevalue($query);
    return $query;
  }
  public function GetMVByClassLvl($class, $lvl)
  {
    $query = $this->db
    ->where('income_percent_level', $lvl)
    ->where('account_class_id', $class)
    ->get('mlm_income_percent_setting')
    ->result_array();
    // $UplineMVAmount = ($query[0]['income_percent_point']*$query[0]['income_percent_amount'])/100;
    return $query;
  }
  public function GetMVByClassLvl1()
  {
    $query = $this->db
    ->where('account_class_id', 1)
    ->get('mlm_income_percent_setting')
    ->result_array();
    // $UplineMVAmount = ($query[0]['income_percent_point']*$query[0]['income_percent_amount'])/100;
    return $query;
  }
  public function GetMVByClassLvl2()
  {
    $query = $this->db
    ->where('account_class_id', 2)
    ->or_where('account_class_id', 3)
    ->or_where('account_class_id', 4)
    ->or_where('account_class_id', 5)
    ->or_where('account_class_id', 6)
    ->or_where('account_class_id', 7)
    ->get('mlm_income_percent_setting')
    ->result_array();
    // $UplineMVAmount = ($query[0]['income_percent_point']*$query[0]['income_percent_amount'])/100;
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
  public function AccountListByUpline($id)
  {
    $query = $this->db
    ->where('account_upline_id', $id)
    ->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')
    ->get('mlm_account')
    ->result();
    return $query;
  }

  public function FindAccountByCode($value)
  {
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
  public function CountAccountTeam($value)
  {
    $query = $this->db
    ->where('account_team', $value)
    ->order_by('account_code', 'DESC')
    ->get('mlm_account')->num_rows();
    return $query;
  }
  public function SaveAccount($AccountInput, $adviser_id)
  {
    $this->db->insert('mlm_account', $AccountInput);
    $new_account_id = $this->db->insert_id();

    $Account = $this->account_model->FindAccountByID($new_account_id);
    //$this->debuger->prevalue($Account);
    $upline_id = $Account[0]['account_upline_id'];

    do {
      $input = array(
        'downline_count_upline_id' => $upline_id,
        'downline_count_downline_id' => $new_account_id,
      );
      $this->db->insert('mlm_downline_count', $input);
      $Account = $this->account_model->FindAccountByID($upline_id);
      $upline_id ='';
      if (count($Account)>0) {
        $upline_id = $Account[0]['account_upline_id'];
      } else {
        $upline_id = '';
      }
    } while ($upline_id!='' && $upline_id!=0);

    return $new_account_id;
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
    $new_id = $this->db->insert_id();
    return $new_id;
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
    ->order_by('journal_extend_expired_date', 'DESC')
    // ->join('mlm_accounting', 'mlm_accounting.accounting_source_id = mlm_journal_extend.journal_extend_id')
    ->get('mlm_journal_extend')->result_array();
    // print_r($query);
    return $query;
  }
  public function JounalExtend($id)
  {
    $query = $this->db
    ->where('account_id', $id)
    ->where('journals_id', 2)

    ->order_by('journal_extend_expired_date', 'DESC')
    ->join('mlm_accounting', 'mlm_accounting.accounting_source_id = mlm_journal_extend.journal_extend_id')
    ->get('mlm_journal_extend')->result();
    // print_r($query);
    return $query;
  }
  public function JounalExtendAccountAll()
  {
    $query = $this->db
    ->order_by('journal_extend_expired_date', 'DESC')
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
  // นับ ดาวน์ไลน์ ในแผน 1 จะนับแค่ 5 ชั้น ที่ต่อจากตัวเอง
  public function PlanOneDownline($upline_id, $upline_level)
  {
    $query = $this->db
    ->where('account_level', $upline_level+5)
    ->where('downline_count_upline_id', $upline_id)
    ->join('mlm_account', 'mlm_downline_count.downline_count_downline_id = mlm_account.account_id')
    ->get('mlm_downline_count')
    ->result_array();
    // $this->debuger->prevalue(count($query));
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
  // นับ ดาวน์ไลน์ ที่แนะนำเอง ในแผน 1 จะนับแค่ 5 ชั้น ที่ต่อจากตัวเอง
  public function PlanOneDirectAdviser($account_id, $upline_level)
  {
    $query = $this->db
    ->where('account_level <=', $upline_level+5)
    ->where('account_adviser_id', $account_id)
    ->join('mlm_member','mlm_member.member_id = mlm_account.member_id')
    ->get('mlm_account')->result_array();

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
    $query = $this->db
    ->where('account_adviser_id', $adviser_id)
    ->join('mlm_member', 'mlm_account.member_id = mlm_member.member_id')
    ->get('mlm_account')->result_array();
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

  public function BookbankList($id)
  {
    $query = $this->db
    ->where('member_id', $id)
    ->join('mlm_bank', 'mlm_bookbank.bank_id = mlm_bank.bank_id')
    ->get('mlm_bookbank')->result();
    return $query;
  }
  public function BookbankUseCount($id)
  {
    $query = $this->db
    ->where('bookbank_id', $id)
    ->get('mlm_account')->num_rows();
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

  public function DisableBookbank($id)
  {
    $input = array(
      'bookbank_status' => $id['bookbank_status'],
    );
    $this->db
    ->where('bookbank_id', $id['bookbank_id'])
    ->where('member_id', $id['member_id'])
    ->update('mlm_bookbank',$input);
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
  public function AccountDetailUpclass($account_id){
    $query = $this->db
    ->where('account_id', $account_id)
    ->join('mlm_member', 'mlm_member.member_id = mlm_point_value.member_id')
    ->get('mlm_point_value')->result_array();
    // print_r($query);
    return $query;
  }
  public function AddAccountDetailUpclass($value){
    $query = $this->db
    ->insert('mlm_point_value',$value);
  }

  public function NextClass($next_account_class_id)
  {
    $query = $this->db
    ->where('account_class_id', $next_account_class_id)
    ->get('mlm_account_class')->result_array();
    // print_r($query);
    return $query;
  }

  public function ClassResult()
  {
    $query = $this->db
    ->get('mlm_account_class')
    ->result_array();
    return $query;
  }

  public function SaveDividend($input)
  {
    $this->db->insert('mlm_journal_dividend', $input);
    $new_journal_dividend_id = $this->db->insert_id();
    return $new_journal_dividend_id;
  }

  public function FindDividend()
  {
    $query = $this->db
    ->get('mlm_journal_dividend')
    ->num_rows();

    return $query;
  }

  public function UpdateAccountClass($value)
  {
    $account_id = $value['account_id'];
    unset($value['account_id']);
    $this->db
    ->where('account_id',$account_id)
    ->update('mlm_account',$value);
  }

  public function UpgradeAccount($account_id)
  {
    $this->db->set('account_class_id', 'account_class_id+1', FALSE);
    $this->db->where('account_id', $account_id);
    $this->db->update('mlm_account');

    $query = $this->FindAccountByID($account_id);
    $Upline = array();

    if ($query[0]['account_class_id']==2) {
      $Upline = $this->Account_model->FindAccountByID($query[0]['account_upline_id']);
    } else {
      $Upline = $this->db
      ->where('account_level',$query[0]['account_level']-($query[0]['account_class_id']+3))
      ->join('mlm_downline_count','mlm_downline_count.downline_count_upline_id = mlm_account.account_id')
      ->join('mlm_account_class', 'mlm_account.account_class_id = mlm_account_class.account_class_id')
      ->get('mlm_account')
      ->result_array();
    }

    return $Upline;
  }
  public function AddRepeat($input)
  {
    $query = $this->db->insert('mlm_account_repeat', $input);
    return $query;
  }
}
