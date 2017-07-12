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
    $SaleOrderList = $this->Products_model->SaleOrderList();
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
    $accounting_id = $this->uri->segment(3);
    $AccountingDetail = $this->AccountingModel->AccountingDetail($accounting_id);
    // $this->debuger->prevalue($AccountingDetail);
    $value = array(
      'Result' => array(
        'AccountingDetail' => $AccountingDetail,
      ),
      'View' => 'back/SaleOrder/SaleOrderDetail'
    );
    $this->LoadPage($value);
  }
  public function ConfirmPayment()
  {
    $InvoiceID = $this->uri->segment(4);
    $this->ProductsModel->ConfirmPayment($InvoiceID);
    redirect($this->agent->referrer(), 'refresh');

  }

  public function resultTemplateSaleOrder()
{
  $InvoiceID = $this->uri->segment(3);
  $AccountingDetail = $this->Accounting_model->AccountingDetail($InvoiceID);
  $Config = $this->Config_model->Config();
  //$this->debuger->prevalue($AccountingDetail);
  $value = array(
    'Result' => array(
      'AccountingDetail' => $AccountingDetail,
      'Config' => $Config,
    ),
    'View' => 'back/SaleOrder/resultTemplateSale'
  );
  $this->LoadDoc($value);
}

public function resultTemplateFee()
{
$InvoiceID = $this->uri->segment(3);
$AccountingDetail = $this->Accounting_model->AccountingDetail($InvoiceID);
$Config = $this->Config_model->Config();
//$this->debuger->prevalue($AccountingDetail);

$value = array(
  'Result' => array(
    'AccountingDetail' => $AccountingDetail,
    'Config' => $Config,
  ),
  'View' => 'back/Accounting/resultFee'
);
$this->LoadDoc($value);
}

public function resultTemplateExtend()
{
  $InvoiceID = $this->uri->segment(3);
  $AccountingDetail = $this->AccountingModel->AccountingDetail($InvoiceID);
  $Config = $this->ConfigModel->Config();
  //$this->debuger->prevalue($AccountingDetail);

  $value = array(
    'Result' => array(
      'AccountingDetail' => $AccountingDetail,
      'Config' => $Config,
    ),
  'View' => 'back/Accounting/resultExtend'
);
$this->LoadDoc($value);
}

public function resultTemplateDividend()
{
  $InvoiceID = $this->uri->segment(3);
  $AccountingDetail = $this->Accounting_model->AccountingDetail($InvoiceID);
  //$this->debuger->prevalue($AccountingDetail);
  $Config = $this->Config_model->Config();


  $value = array(
    'Result' => array(
      'AccountingDetail' => $AccountingDetail,
    'Config' => $Config,
    ),
  'View' => 'back/Accounting/resultDividend'
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
