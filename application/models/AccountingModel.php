<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountingModel extends CI_Model
{
  public function AllAccounting() {
    return $this->db
    // ->where('mlm_accounting.journals_id !=', 1)
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->join('mlm_member', 'mlm_accounting.member_id = mlm_member.member_id', 'left')
    // ->join('mlm_user', 'mlm_member.member_id = mlm_user.member_id', 'left')
    ->join('mlm_account', 'mlm_accounting.accounting_source_id = mlm_account.account_id', 'left')
    ->order_by('accounting_id', 'DESC')

    ->get('mlm_accounting')
    ->result();
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
}
