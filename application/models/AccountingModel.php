<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountingModel extends CI_Model
{
  public function AccountingSelectAll() {
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->order_by('accounting_id', 'DESC')
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->AccountingSourceDetail($query);

    return $query;
  }
  public function AccountingDetail($accounting_id)
  {
    $query =  $this->db
    ->where('accounting_id', $accounting_id)
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->order_by('accounting_id', 'DESC')
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->AccountingSourceDetail($query);
    
    return $query;

  }

  public function AccountingSourceDetail($query)
  {
    $index = 0;
    foreach ($query as $row) {
      $type = $row['journals_id'];
      $source_id = $row['accounting_source_id'];
      $source_detail = $this->FindAccountingSourceDetail($type, $source_id);

      $query[$index]['source_detail'] = $source_detail;
      // $this->debuger->prevalue($source_detail);

      $query[$index]['source_amount'] = $source_detail['source_amount'];
      $query[$index]['source_code'] = $source_detail['source_code'];
      $query[$index]['member'] = $source_detail['member_detail'];
      $query[$index]['account'] = $source_detail['account_detail'];

      unset($query[$index]['source_detail']['account_detail']);
      unset($query[$index]['source_detail']['member_detail']);
      unset($query[$index]['source_detail']['source_code']);
      unset($query[$index]['source_detail']['amount']);
      $index++;
    }
    return $query;
  }

  public function FindAccountingSourceDetail($type, $source_id)
  {
    $source_id = $source_id;
    $source_detail = array();

    if ($type==1) {
      $source_table = 'mlm_journal_fee';
      $source_detail = $this->SelectSourceDetail($source_id, $source_table);
      $source_detail['source_code'] = $source_detail['journal_fee_code'];
      $source_detail['source_amount'] = $source_detail['journal_fee_amount'];
    } elseif ($type==2) {
      $source_table = 'mlm_journal_extend';
      $source_detail = $this->SelectSourceDetail($source_id, $source_table);
      $source_detail['source_code'] = $source_detail['journal_extend_code'];
      $source_detail['source_amount'] = $source_detail['journal_extend_amount'];
    } elseif ($type==3 || $type==4 || $type==5 || $type==6) {
      $source_table = 'mlm_journal_dividend';
      $source_detail = $this->SelectSourceDetail($source_id, $source_table);
      $source_detail['source_code'] = $source_detail['journal_dividend_code'];
      $source_detail['source_amount'] = $source_detail['journal_dividend_amount'];
    } elseif ($type==7) {
      $source_table = 'mlm_journal_sale_order_detail';
      $source_detail = $this->SelectSourceDetail($source_id, $source_table);
      $source_detail['source_code'] = $source_detail['journal_sale_order_detail_code'];
    }

    return $source_detail;
  }

  public function SelectSourceDetail($id, $source_table)
  {
    $query = $this->db->get($source_table)->result_array();

    if (count($query)!=0) {
      $query = $query[0];

      // account_detail
      if (!empty($query['account_id']) && $query['account_id']!="" && $query['account_id']!=0) {
        $account_detail  = $query['account_detail'] = $this->AccountModel->FindAccountByID($query['account_id']);
        $query['account_detail'] = $account_detail[0];
      } else {
        $query['account_detail'] = "";
      }

      // member_detail
      if (!empty($query['member_id']) && $query['member_id']!="" && $query['member_id']!=0) {
        $member_detail = $this->MemberModel->MemberByID($query['member_id']);
        $query['member_detail'] = $member_detail[0];
      } else {
        $query['member_detail'] = "";
      }
    }
    return $query;
  }


  public function Accounting($id)
  {
    $query = $this->db
    ->where('mlm_accounting.accounting_id', $id)
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->join('mlm_member', 'mlm_accounting.member_id = mlm_member.member_id', 'left')
    ->join('mlm_account', 'mlm_accounting.accounting_source_id = mlm_account.account_id', 'left')
    ->order_by('accounting_id', 'DESC')
    ->get('mlm_accounting')
    ->result_array();
    return $query;
  }
  public function Account_Transfer($input){
    $query = $this->db
    ->where('mlm_account.account_id', $input['account_id'])
    ->update('mlm_account', $input);
  }
}
