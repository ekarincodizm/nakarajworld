<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SaleOrderHistory extends CI_Controller{
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
    $for_date = isset($_POST['for_date'])?$_POST['for_date']:'';
    $to_date = isset($_POST['to_date'])?$_POST['to_date']:'';
    // $SaleOrderHistory = $this->ProductsModel->SaleOrderHistory();
    $SaleOrderHistory = $this->Products_model->SaleOrderHistory($for_date,$to_date);
    // $this->debuger->prevalue($SaleOrderHistory);
    //new function SwishSearch


    //
    $value = array(
      'Result' => array(
        'loadJQ'=> 'true',
        'for' => $for_date,
        'to'  => $to_date,
        'SaleOrderHistory' => $SaleOrderHistory,
      ),
      'View' => 'back/SaleOrder/SaleOrderHistory'
    );
    $this->LoadPage($value);
  }
}
