<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounting extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION))
    {
      session_start();
    }
  }
  public function LoadPage($value){
    $data = $value['Result'];
    $this->load->view('back/template/head', $data);
    $this->load->view($value['View']);
    $this->load->view('back/template/footer');
  }
  public function index() {

    $AccountingList = $this->AccountingModel->AccountingSelectAll();
    $value = array(
      'Result' => array(
        'AccountingList' => $AccountingList,
      ),
      'View' => 'back/Accounting/AccountingList'
    );
    $this->LoadPage($value);
  }

  public function AccountingDetail()
  {
    $accounting_id = $this->uri->segment(3);
    $AccountingDetail = $this->AccountingModel->AccountingDetail($accounting_id);
    // $this->debuger->prevalue($AccountingDetail);
    $value = array(
      'Result' => array(
        'AccountingDetail' => $AccountingDetail,
      ),
      'View' => 'back/Accounting/AccountingDetail'
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
    redirect('/Accounting');
  }

  public function ConfirmInvoice()
  {
    $accounting_id = $this->uri->segment(4);
    $this->AccountingModel->ConfirmInvoice($accounting_id);
    redirect($this->agent->referrer(), 'refresh');
  }

  public function ConfirmRecipt()
  {
    $accounting_id = $this->uri->segment(3);
    $this->AccountingModel->ConfirmRecipt($accounting_id);
    redirect($this->agent->referrer(), 'refresh');
  }
}
