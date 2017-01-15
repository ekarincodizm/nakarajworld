<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountingController extends CI_Controller {
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION))
    {
      session_start();

    }
  }
  public function LoadPage($value){

    $data['Result'] = $value['Result'];
    $this->load->view('back/template/head', $data);
    $this->load->view($value['View']);
    $this->load->view('back/template/footer');
  }
  public function LoadDoc($value){

    $data['Result'] = $value['Result'];
    $this->load->view('back/document/doc_header', $data);
    $this->load->view($value['View']);
    $this->load->view('back/document/doc_footer');
  }
  public function index() {
    $AllAccounting = $this->AccountingModels->GetAllAccounting();
	$AllFee = $this->AccountingModels->GetAllFee();
    $value = array(
      'Result' => array(
        'AllAccounting' => $AllAccounting,
		'AllFee' => $AllFee,
      ),
      'View' => 'back/accounting/journals_list'
    );
    $this->LoadPage($value);
  }
  public function ExpensesList() {
    $AllExpenses = $this->AccountingModels->GetAllExpenses();
    $value = array(
      'Result' => array(
        'AllExpenses' => $AllExpenses,
      ),
      'View' => 'back/accounting/invoice_expenses'
    );
    $this->LoadPage($value);
  }
  public function Payment()
  {
    $accounting_id = $this->uri->segment(3);
    $input['accounting_status'] = 1;
    $this->db
    ->where('accounting_id', $accounting_id)
    ->update('mlm_accounting', $input);

    $member = $this->db
    ->where('accounting_id', $accounting_id)
    ->get('mlm_accounting')->result_array();

    $input1['member_status']=1;
    $this->db->where('member_id', $member[0]['member_id'])->update('mlm_member', $input1);
    redirect('/AccountingController');
  }
}
