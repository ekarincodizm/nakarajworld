<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SaleOrder extends CI_Controller{
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

  public function LoadDoc($value){

    $data = $value['Result'];
    $this->load->view('back/document/doc_header', $data);
    $this->load->view($value['View']);
    $this->load->view('back/document/doc_footer');
  }

  public function index() {
    $SaleOrderList = $this->ProductsModel->SaleOrderList();
    $value = array(
      'Result' => array(
        'SaleOrderList' => $SaleOrderList
      ),
      'View' => 'back/SaleOrder/SaleOrderList'
    );
    $this->LoadPage($value);
  }
  public function SaleOrderHistory() {
    $SaleOrderHistory = $this->ProductsModel->SaleOrderHistory();
    $value = array(
      'Result' => array(
        'SaleOrderHistory' => $SaleOrderHistory
      ),
      'View' => 'back/SaleOrder/SaleOrderHistory'
    );
    $this->LoadPage($value);
  }
  public function SaleOrderDetail()
  {
    $InvoiceID = $this->uri->segment(3);
    $SaleOrderDetail = $this->ProductsModel->SaleOrderDetail($InvoiceID);
    // $this->debuger->prevalue($InvoiceDetail);
    $value = array(
      'Result' => array(
        'SaleOrderDetail' => $SaleOrderDetail,
      ),
      'View' => 'back/SaleOrder/SaleOrderDetail'
    );
    $this->LoadPage($value);
  }
  public function ConfirmPayment()
  {
    $InvoiceID = $this->uri->segment(3);
    $this->ProductsModel->ConfirmPayment($InvoiceID);
    redirect($this->agent->referrer(), 'refresh');

  }

  public function resultSale()
{
  $InvoiceID = $this->uri->segment(3);
  $SaleOrderDetail = $this->ProductsModel->SaleOrderResult($InvoiceID);
  $Config = $this->ConfigModel->Config();
  $value = array(
    'Result' => array(
      'SaleOrderDetail' => $SaleOrderDetail,
      'Config' => $Config,
    ),
    'View' => 'back/SaleOrder/resultSale'
  );
  $this->LoadDoc($value);
}

public function Payment()
{
  $InvoiceID = $this->uri->segment(3);
  $Accounting = $this->AccountingModel->Accounting($InvoiceID);
		$Config = $this->ConfigModel->Config();
  $value = array(
    'Result' => array(
      'Accounting' => $Accounting,
      'Config' => $Config,
    ),
    'View' => 'back/SaleOrder/SalePurchase'
  );
  $this->LoadDoc($value);
}
}
