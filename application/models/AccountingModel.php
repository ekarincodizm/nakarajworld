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
      $index_id = 'journal_fee_id';
      $source_detail = $this->SelectSourceDetail($source_id, $index_id, $source_table);
      $source_detail['source_code'] = $source_detail['journal_fee_code'];
      $source_detail['source_amount'] = $source_detail['journal_fee_amount'];
    } elseif ($type==2) {
      $source_table = 'mlm_journal_extend';
      $index_id = 'journal_extend_id';
      $source_detail = $this->SelectSourceDetail($source_id, $index_id, $source_table);
      $source_detail['source_code'] = $source_detail['journal_extend_code'];
      $source_detail['source_amount'] = $source_detail['journal_extend_amount'];
    } elseif ($type==3 || $type==4 || $type==5 || $type==6) {
      $source_table = 'mlm_journal_dividend';
      $index_id = 'journal_dividend_id';
      $source_detail = $this->SelectSourceDetail($source_id, $index_id, $source_table);
      $source_detail['source_code'] = $source_detail['journal_dividend_code'];
      $source_detail['source_amount'] = $source_detail['journal_dividend_amount'];
    } elseif ($type==7) {
      $source_table = 'mlm_journal_sale_order_detail';
      $index_id = 'journal_sale_order_detail_id';
      $source_detail = $this->SelectSourceDetail($source_id, $index_id, $source_table);

      $source_detail['source_code'] = $source_detail[0]['journal_sale_order_detail_code'];
      $source_detail['source_amount'] = $source_detail['order_item']['temp_total_price'];
      unset($source_detail['order_item']['temp_total_price']);
    }
    return $source_detail;
  }

  public function SelectSourceDetail($source_id, $index_id, $source_table)
  {
    $query = $this->db->where($index_id, $source_id)->get($source_table)->result_array();



    if (count($query)!=0) {
      if ($source_table=='mlm_journal_sale_order_detail') {
        $query['order_item'] = $this->SaleOrderDetail($source_id);
      }
      $query['order_detail'] = $query[0];

      // account_detail
      if (!empty($query[0]['account_id']) && $query[0]['account_id']!="" && $query[0]['account_id']!=0) {
        $account_detail  = $query[0]['account_detail'] = $this->AccountModel->FindAccountByID($query[0]['account_id']);
        $query['account_detail'] = $account_detail[0];
      } else {
        $query['account_detail'] = "";
      }

      // member_detail
      if (!empty($query[0]['member_id']) && $query[0]['member_id']!="" && $query[0]['member_id']!=0) {
        $member_detail = $this->MemberModel->MemberByID($query[0]['member_id']);
        $query['member_detail'] = $member_detail[0];
      } else {
        $query['member_detail'] = "";
      }
    }
    // echo "<pre>";
    // print_r($query);
    // exit();
    return $query;
  }
  public function SaleOrderDetail($source_id)
  {
    $query = $this->db
    ->where('mlm_journal_sale_order_item.journal_sale_order_detail_id', $source_id)
    // ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_journal_sale_order_detail.journal_sale_order_detail_id')
    ->join('mlm_products', 'mlm_journal_sale_order_item.products_id = mlm_products.products_id')
    ->join('mlm_accounting', 'mlm_accounting.accounting_source_id = mlm_journal_sale_order_item.journal_sale_order_detail_id')
    ->get('mlm_journal_sale_order_item')
    ->result_array();

    $query['temp_total_price'] = 0;

    foreach ($query as $row) {
      $query['temp_total_price'] += ($row['journal_sale_order_item_price']*$row['journal_sale_order_item_quantity']);
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

  public function ConfirmInvoice($accounting_id) {
    $query =  $this->db
    ->where('accounting_status', 1)
    ->where('journals_type', 4)
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->get('mlm_accounting')
    ->num_rows();

    $InvoiceNo = "IN".sprintf("%05d", ($query+1));

    $input = array(
      'accounting_status' => 1,
      'accounting_no' => $InvoiceNo,
    );

    $this->db
    ->where('accounting_id', $accounting_id)
    ->update('mlm_accounting', $input);

  }
  public function ConfirmRecipt($accounting_id) {
    $query =  $this->db
    ->where('accounting_status', 1)
    ->where('journals_type', 5)
    ->or_where('journals_type', 3)
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->get('mlm_accounting')
    ->num_rows();

    $ReciptNo = "RE".sprintf("%05d", ($query+1));

    $input = array(
      'accounting_status' => 1,
      'accounting_no' => $ReciptNo,
    );

    $this->db
    ->where('accounting_id', $accounting_id)
    ->update('mlm_accounting', $input);
  }
}
