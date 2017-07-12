<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class history extends CI_Controller {
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
    $AllExpenses = $this->Dashboard_model->HistoryAllExpenses();
    $Sale = $this->Dashboard_model->HistorySale();
    $Expenses = $this->Dashboard_model->HistoryExpenses();
    $Adviser = $this->Dashboard_model->HistoryAdviser();
    $Company = $this->Dashboard_model->HistoryCompany();
    $AdviserCompany = $this->Dashboard_model->HistoryAdviserCompany();
    $Register = $this->Dashboard_model->HistoryRegister();
    $extend = $this->Dashboard_model->Historyextend();


    $value = array(
      'Result' => array(
        'Sale' => $Sale,
        'Expenses' => $Expenses,
        'AllExpenses' => $AllExpenses,
        'Adviser' => $Adviser,
        'Company' => $Company,
        'AdviserCompany' => $AdviserCompany,
        'Register' => $Register,
        'extend' => $extend,

      ),
      'View' => 'back/DashBoard/History'
    );
    $this->LoadPage($value);
  }
}
