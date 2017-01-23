<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller{
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
    $AccountList = json_decode(json_encode($this->AccountModel->AllAccountList()), true);
    $value = array(
      'Result' => array(
        'AccountList' => $AccountList,
      ),
      'View' => 'back/Account/AllAccount'
    );
    $this->LoadPage($value);
  }

  public function AccountPermission(){
    $input = $this->input->post();
    $this->AccountingModel->Account_Transfer($input);
    redirect($this->agent->referrer(), 'refresh');
  }
}
