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
    $AllExpenses = $this->DashBoardModel->HistoryAllExpenses();
    $Sale = $this->DashBoardModel->HistorySale();
    $Expenses = $this->DashBoardModel->HistoryExpenses();
    $Adviser = $this->DashBoardModel->HistoryAdviser();
    $Company = $this->DashBoardModel->HistoryCompany();
    $AdviserCompany = $this->DashBoardModel->HistoryAdviserCompany();
    $Register = $this->DashBoardModel->HistoryRegister();

    $value = array(
      'Result' => array(
        'Sale' => $Sale,
        'Expenses' => $Expenses,
        'AllExpenses' => $AllExpenses,
        'Adviser' => $Adviser,
        'Company' => $Company,
        'AdviserCompany' => $AdviserCompany,
        'Register' => $Register,

      ),
      'View' => 'back/DashBoard/History'
    );
    $this->LoadPage($value);
  }
}
