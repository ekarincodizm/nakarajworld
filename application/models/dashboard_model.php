<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {

  public function DashBoardTeam()
  {
    // $AllTeam = $this->db->get('mlm_account')->num_rows();
    $CodeTeam = array();
    for ($i='A'; $i <='I' ; $i++) {
      $CodeTeam[$i] = $this->db->where('account_team', $i)->get('mlm_account')->num_rows();
    }
    return $CodeTeam;
  }
  public function DashBoardGroup($id)
  {
    $Group = $this->db
    ->where('downline_count_upline_id', $id)
    // ->Where('account_code', $code)
    // ->Where('account_code', $code)
    ->get('mlm_downline_count')->num_rows();
    return $Group;

  }

  public function DashBoardGroupChartPer30Day($id)
  {
    $today_date = date('Y-m-d');
    $dateSearch = date('Y-m-d', strtotime("-30 days"));
    $Group = $this->db
    ->where('mlm_journal_extend.account_id', $id)
    // ->where('journal_extend_start_date <=', $today_date)
    ->where('journal_extend_start_date >=', $dateSearch)
    ->join('mlm_account','mlm_journal_extend.account_id = mlm_account.account_id')
    ->get('mlm_journal_extend')->num_rows();
    return $Group;
  }

  public function HistoryRegister()
  {
    $account_id = 0;
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->where('mlm_accounting.journals_id',1)
    ->where('mlm_accounting.accounting_status', 1)
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->Accounting_model->AccountingSourceDetail($query, $account_id);
    // $this->debuger->prevalue($query);

    $amount = 0;
    foreach ($query as $row) {
      $amount += $row['source_amount'];
    }
    // $this->debuger->prevalue($amount);

    return $amount;
  }

  public function Historyextend()
  {
    $account_id = 0;
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->where('mlm_accounting.journals_id',2)
    ->where('mlm_accounting.accounting_status', 1)
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->Accounting_model->AccountingSourceDetail($query, $account_id);
    // $this->debuger->prevalue($query);

    $amount = 0;
    foreach ($query as $row) {
      $amount += $row['source_amount'];
    }
    // $this->debuger->prevalue($amount);

    return $amount;
  }

  public function HistorySale()
  {
    $account_id = 0;
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->where('mlm_accounting.journals_id',7)
    ->where('mlm_accounting.accounting_status', 1)
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->Accounting_model->AccountingSourceDetail($query, $account_id);
    // $this->debuger->prevalue($query);

    $amount = 0;
    foreach ($query as $row) {
      $amount += $row['source_amount'];
    }
    // $this->debuger->prevalue($amount);

    return $amount;
  }

  public function HistoryExpenses()
  {
    $account_id = 0;
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->where('mlm_accounting.journals_id',4)
    ->where('mlm_accounting.accounting_status', 1)
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->Accounting_model->AccountingSourceDetail($query, $account_id);
    // $this->debuger->prevalue($query);

    $company = array();
    $i=0;
    foreach ($query as $row) {
      if ($row['member']['member_id']!=1) {
        $company[$i]=$row;
        $i++;
      }
    }
    // $this->debuger->prevalue($company);

    $amount = 0;
    foreach ($company as $row) {
      $amount += $row['source_amount'];
    }
    // $this->debuger->prevalue($amount);

    return $amount;
  }

  public function HistoryAllExpenses()
  {
    $account_id = 0;
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->where('mlm_accounting.journals_id',4)
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->Accounting_model->AccountingSourceDetail($query, $account_id);
    // $this->debuger->prevalue($query);

    $company = array();
    $i=0;
    foreach ($query as $row) {
      if ($row['member']['member_id']!=1) {
        $company[$i]=$row;
        $i++;
      }
    }
    // $this->debuger->prevalue($company);

    $amount = 0;
    foreach ($company as $row) {
      $amount += $row['source_amount'];
    }
    // $this->debuger->prevalue($amount);

    return $amount;
  }

  public function HistoryCompany()
  {
    $account_id = 0;
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->where('mlm_accounting.journals_id',4)
    ->or_where('mlm_accounting.journals_id',1)
    ->or_where('mlm_accounting.journals_id',2)
    ->where('mlm_accounting.accounting_status', 1)
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->Accounting_model->AccountingSourceDetail($query, $account_id);
    // $this->debuger->prevalue($query);

    $company = array();
    $i=0;
    foreach ($query as $row) {
      if ($row['member']['member_id']==1) {
        $company[$i]=$row;
        $i++;
      }
    }
    // $this->debuger->prevalue($company);

    $amount = 0;
    foreach ($company as $row) {
      $amount += $row['source_amount'];
    }
    // $this->debuger->prevalue($amount);

    return $amount;
  }

  public function HistoryAdviserCompany()
  {
    $account_id = 0;
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->where('mlm_accounting.journals_id',3)
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->Accounting_model->AccountingSourceDetail($query, $account_id);

    $company = array();
    $i=0;
    foreach ($query as $row) {
      if ($row['member']['member_id']==1) {
        $company[$i]=$row;
        $i++;
      }
    }
    // $this->debuger->prevalue($company);

    $amount = 0;
    foreach ($company as $row) {
      $amount += $row['source_amount'];
    }
    // $this->debuger->prevalue($amount);
    return $amount;
  }

  public function HistoryAdviser()
  {
    $account_id = 0;
    $query =  $this->db
    ->join('mlm_journals', 'mlm_accounting.journals_id = mlm_journals.journals_id')
    ->where('mlm_accounting.journals_id',3)
    ->get('mlm_accounting')
    ->result_array();
    $query = $this->Accounting_model->AccountingSourceDetail($query, $account_id);
    // $this->debuger->prevalue($query);

    $company = array();
    $i=0;
    foreach ($query as $row) {
      if ($row['member']['member_id']!=1) {
        $company[$i]=$row;
        $i++;
      }
    }
    // $this->debuger->prevalue($company);

    $amount = 0;
    foreach ($company as $row) {
      $amount += $row['source_amount'];
    }
    // $this->debuger->prevalue($amount);
    return $amount;
  }
}
