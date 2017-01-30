<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Store extends CI_Controller{
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
	}
	public function LoadUserPage($value){
		$data = $value['Result'];
		$this->load->view('front/Template/UserHead', $data);
		$this->load->view($value['View']);
		$this->load->view('front/Template/UserFooter');
	}
	public function LoadPage($value){
		$data = $value['Result'];
		$this->load->view('front/Template/head', $data);
		$this->load->view($value['View']);
		$this->load->view('front/Template/footer');
	}

	public function index() {
		$ProductsList = $this->ProductsModel->ProductsList();
    $ProductsList = json_decode(json_encode($ProductsList), true);

    $value = array(
      'Result' => array(
        'ProductsList' => $ProductsList,
      ),
			'View' => 'front/HomePage'
		);
		$this->LoadUserPage($value);
	}
  public function ProductsDetail() {
    $products_id = $this->uri->segment(3);
    $ProductsDetail =$this->ProductsModel->ProductsDetail($products_id);
    $ProductsDetail = json_decode(json_encode($ProductsDetail), true);

    $value = array(
      'Result' => array(
        'ProductsDetail' => $ProductsDetail,
      ),
      'View' => 'front/Products/ProductsDetail'
    );
    $this->LoadUserPage($value);
  }
	public function UpdateQuantityShopTemp() {
    $shop_temp_id = $this->uri->segment(3);
		$input = array(
			'shop_temp_quantity' => $_POST['shop_temp_quantity'],
		);
		$this->db->where('shop_temp_id', $shop_temp_id)->update('mlm_shop_temp',$input);
		redirect('Store/TempList');
  }
	public function AddShopTemp() {
    $products_id = $this->uri->segment(3);
		$FindTemp =$this->ProductsModel->FindTemp($_SESSION['MEMBER_ID'],$products_id);
		if (count($FindTemp)>0) {
			$input = array(
				'shop_temp_id' => $FindTemp[0]['shop_temp_id'],
				'shop_temp_quantity' => $FindTemp[0]['shop_temp_quantity']+=1,
			);
			$this->db->where('shop_temp_id', $input['shop_temp_id'])->update('mlm_shop_temp',$input);

		} else {
			$input = array(
				'products_id' => $products_id,
				'shop_temp_quantity' => 1,
				'member_id' => $_SESSION['MEMBER_ID'],
			);
			$this->db->insert('mlm_shop_temp',$input);
		}
		redirect('Store/TempList');
  }
	public function DelItemShopTemp()
	{
		$shop_temp_id = $this->uri->segment(3);
		$this->db->where('shop_temp_id', $shop_temp_id)->delete('mlm_shop_temp');
		redirect('Store/TempList');

	}
	public function TempList()
	{
		$TempList =$this->ProductsModel->TempList($_SESSION['MEMBER_ID']);
		$TempList = json_decode(json_encode($TempList), true);

		$value = array(
			'Result' => array(
				'TempList' => $TempList,
			),
			'View' => 'front/Store/TempList'
		);
		$this->LoadUserPage($value);
	}
	public function CheckOut()
	{
		date_default_timezone_set("Asia/Bangkok");
		$TempList =$this->ProductsModel->TempList($_SESSION['MEMBER_ID']);
		$TempList = json_decode(json_encode($TempList), true);
		$ShopCount = $this->ProductsModel->ShopDetailAll();
		$ShopCode = "SO".sprintf("%05d",($ShopCount+1));
		// Detail
		$input = array(
			'journal_sale_order_detail_code' => $ShopCode,
			'journal_sale_order_detail_date' => Date('Y-m-d H:i:s'),
			'member_id' => $_SESSION['MEMBER_ID'],
		);
		$this->db->insert('mlm_journal_sale_order_detail', $input);
		$DeatilID = $this->db->insert_id();

		$now = DateTime::createFromFormat('U.u', microtime(true));
		$now = $now->format("Hisu");
		$code = "DR".$now;
		// Accounting
		$input = array(
			'accounting_source_id' => $DeatilID,
			'accounting_date' => Date('Y-m-d'),
			'accounting_no' => $code,
			'journals_id' => 7,
		);

		$this->db->insert('mlm_accounting', $input);

		// Items
		foreach ($TempList as $row) {
			$total = $row['products_price_narmal']-($row['products_price_narmal']*$row['products_price_discount']/100);
			$input = array(
				'journal_sale_order_item_quantity' => $row['shop_temp_quantity'],
				'journal_sale_order_item_price' => $total,
				'journal_sale_order_item_pv' => $row['products_pv'],
				'journal_sale_order_detail_id' => $DeatilID,
				'products_id' => $row['products_id'],

			);
			$this->db->insert('mlm_journal_sale_order_item', $input);
			$this->db->where('shop_temp_id', $row['shop_temp_id'])->delete('mlm_shop_temp');

		}
		redirect('Store/InvoiceList');

	}



	public function InvoiceList()
	{
		$InvoiceList =$this->ProductsModel->InvoiceList($_SESSION['MEMBER_ID']);
		$value = array(
			'Result' => array(
				'InvoiceList' => $InvoiceList,
			),
			'View' => 'front/Store/InvoiceList'
		);
		$this->LoadUserPage($value);
	}
	public function InvoiceDetail()
	{
		$InvoiceID = $this->uri->segment(3);
		$InvoiceDetail = $this->ProductsModel->InvoiceDetail($InvoiceID);
		// $this->debuger->prevalue($InvoiceDetail);
		$value = array(
			'Result' => array(
				'InvoiceDetail' => $InvoiceDetail,
			),
			'View' => 'front/Store/InvoiceDetail'
		);
		$this->LoadUserPage($value);
	}
	public function CancelPurchase()
	{
		$id = $this->uri->segment(3);
		$this->ProductsModel->CancelInvoice($id);
		redirect('Store/InvoiceList');

	}
	public function UploadFileSlip()
	{
		$InvoiceID = $this->uri->segment(3);
		if ($_FILES["journal_sale_order_detail_slip"]["name"]!='') {
			$ext = pathinfo($_FILES["journal_sale_order_detail_slip"]["name"],PATHINFO_EXTENSION);
			$new_file = 'slip'.$InvoiceID.'.'.$ext;
			copy($_FILES["journal_sale_order_detail_slip"]["tmp_name"],"assets/image/slip/".$new_file);

			$input = array(
				'journal_sale_order_detail_slip' => $new_file,
			);
			$this->db->where('journal_sale_order_detail_id', $InvoiceID)->update('mlm_journal_sale_order_detail', $input);
		}
		redirect($this->agent->referrer(), 'refresh');

	}

}
