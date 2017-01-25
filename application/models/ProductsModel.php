<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsModel extends CI_Model {

  public function ProductsList()
  {
    $query = $this->db->get('mlm_products')->result();
    return $query;
  }
  public function ProductsDetail($id)
  {
    $query = $this->db
    ->where('products_id', $id)
    ->get('mlm_products')
    ->result();
    return $query;
  }
  public function AddProducts($input)
  {
    $query = $this->db
    ->insert('mlm_products', $input);
  }
  public function UpdateProducts($input)
  {
    $query = $this->db
    ->where('products_id', $input['products_id'])
    ->update('mlm_products', $input);
  }
  public function TempList($MEMBER_ID)
	{
    $query = $this->db
    ->where('member_id', $MEMBER_ID)
    ->join('mlm_products', 'mlm_shop_temp.products_id = mlm_products.products_id')
    ->get('mlm_shop_temp')
    ->result();
    return $query;
	}
  public function ShopDetailAll()
	{
    $query = $this->db
    ->get('mlm_journal_sale_order_detail')
    ->num_rows();
    return $query;
	}
  public function FindTemp($MEMBER_ID, $products_id)
  {
    $query = $this->db
    ->where('member_id', $MEMBER_ID)
    ->where('products_id', $products_id)
    ->get('mlm_shop_temp')
    ->result_array();
    return $query;
  }
  public function InvoiceList($MEMBER_ID)
  {
    $query = $this->db
    ->where('member_id', $MEMBER_ID)
    // ->where('products_id', $products_id)
    ->get('mlm_journal_sale_order_detail')
    ->result_array();
    $i=0;
    foreach ($query as $row) {
      $item = $this->db
      ->select_sum('journal_sale_order_item_price')
      ->where('journal_sale_order_detail_id', $row['journal_sale_order_detail_id'])->get('mlm_journal_sale_order_item')->result_array();
      $itemQ = $this->db
      // ->select_sum('shop_items_price')
      ->where('journal_sale_order_detail_id', $row['journal_sale_order_detail_id'])->get('mlm_journal_sale_order_item')->num_rows();
      $query[$i]['shop_detail_total_quantity'] = $itemQ;
      $query[$i]['shop_detail_total_price'] = $item[0]['journal_sale_order_item_price'];
      $i++;
    }
    return $query;
  }
  public function InvoiceDetail($id)
  {
    $query = $this->db
    ->where('mlm_journal_sale_order_item.journal_sale_order_detail_id', $id)
    ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_journal_sale_order_detail.journal_sale_order_detail_id')
    ->join('mlm_products', 'mlm_journal_sale_order_item.products_id = mlm_products.products_id')
    ->join('mlm_accounting', 'mlm_accounting.accounting_source_id = mlm_journal_sale_order_item.journal_sale_order_detail_id')
    ->get('mlm_journal_sale_order_item')
    ->result_array();
    return $query;

  }
  public function CancelInvoice($id)
  {
    $input['accounting_status'] = 0;
    $query = $this->db
    ->where('accounting_source_id', $id)
    ->update('mlm_accounting', $input);
  }

  public function SaleOrderList()
  {
    $query = $this->db
    ->where('journals_id',7)
    ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_detail.journal_sale_order_detail_id = mlm_accounting.accounting_source_id')
    ->join('mlm_journal_sale_order_item', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_accounting.accounting_source_id')
    ->get('mlm_accounting')
    ->result_array();
    $i=0;
    foreach ($query as $row) {
      $item = $this->db
      ->select_sum('journal_sale_order_item_price')
      ->where('journal_sale_order_detail_id', $row['journal_sale_order_detail_id'])->get('mlm_journal_sale_order_item')->result_array();
      $itemQ = $this->db
      // ->select_sum('shop_items_price')
      ->where('journal_sale_order_detail_id', $row['journal_sale_order_detail_id'])->get('mlm_journal_sale_order_item')->num_rows();
      $query[$i]['shop_detail_total_quantity'] = $itemQ;
      $query[$i]['shop_detail_total_price'] = $item[0]['journal_sale_order_item_price'];
      $i++;
    }
    return $query;
  }
  public function SaleOrderHistory($for_date,$to_date)
  {
    $ProductsList = $this->ProductsList();
    $ProductsList = json_decode(json_encode($ProductsList), true);

    if ($for_date!='' && $to_date!='') {
      $SaleOrder = $this->db
      ->where('accounting_date >=', $for_date)
      ->where('accounting_date <=', $to_date)
      ->where('accounting_status', 1)
      ->where('journals_id', 7)
      ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_detail.journal_sale_order_detail_id = mlm_accounting.accounting_source_id')
      ->join('mlm_journal_sale_order_item', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_journal_sale_order_detail.journal_sale_order_detail_id')
      ->get('mlm_accounting')
      ->result_array();
    } elseif ($for_date!='' && $to_date=='') {
      $SaleOrder = $this->db
      ->where('accounting_date >=', $for_date)
      ->where('accounting_status', 1)
      ->where('journals_id', 7)
      ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_detail.journal_sale_order_detail_id = mlm_accounting.accounting_source_id')
      ->join('mlm_journal_sale_order_item', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_journal_sale_order_detail.journal_sale_order_detail_id')
      ->get('mlm_accounting')
      ->result_array();
    }elseif ($for_date=='' && $to_date!='') {
      $SaleOrder = $this->db
      ->where('accounting_date >=', $to_date)
      ->where('accounting_status', 1)
      ->where('journals_id', 7)
      ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_detail.journal_sale_order_detail_id = mlm_accounting.accounting_source_id')
      ->join('mlm_journal_sale_order_item', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_journal_sale_order_detail.journal_sale_order_detail_id')
      ->get('mlm_accounting')
      ->result_array();
    }elseif ($for_date=='' && $to_date=='') {
      $SaleOrder = $this->db
      ->where('accounting_status', 1)
      ->where('journals_id', 7)
      ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_detail.journal_sale_order_detail_id = mlm_accounting.accounting_source_id')
      ->join('mlm_journal_sale_order_item', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_journal_sale_order_detail.journal_sale_order_detail_id')
      ->get('mlm_accounting')
      ->result_array();
    }

    $index = 0;
    foreach ($ProductsList as $Products_row ) {
    $ProductsList[$index]['temp_totalQuantity'] = 0;
    $ProductsList[$index]['temp_totalPrice'] = 0;
      foreach ($SaleOrder as $SaleOrder_row ) {
        if ($Products_row['products_id'] == $SaleOrder_row['products_id']) {
          $ProductsList[$index]['temp_totalQuantity'] += $SaleOrder_row['journal_sale_order_item_quantity'];
          $ProductsList[$index]['temp_totalPrice'] += $SaleOrder_row['journal_sale_order_item_price'];
        }
      }
      $index++;
    }
    // $this->debuger->prevalue($ProductsList);
    return $ProductsList;
  }
  public function SaleOrderDetail($id)
  {
    $query = $this->db
    ->where('mlm_journal_sale_order_item.journal_sale_order_detail_id', $id)
    ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_journal_sale_order_detail.journal_sale_order_detail_id')
    ->join('mlm_products', 'mlm_journal_sale_order_item.products_id = mlm_products.products_id')
    ->join('mlm_accounting', 'mlm_accounting.accounting_source_id = mlm_journal_sale_order_item.journal_sale_order_detail_id')
    ->get('mlm_journal_sale_order_item')
    ->result_array();
    return $query;
  }

  public function SaleOrderResult($id)
  {
    $query = $this->db
    ->where('mlm_journal_sale_order_item.journal_sale_order_detail_id', $id)
    ->join('mlm_journal_sale_order_detail', 'mlm_journal_sale_order_item.journal_sale_order_detail_id = mlm_journal_sale_order_detail.journal_sale_order_detail_id')
    ->join('mlm_products', 'mlm_journal_sale_order_item.products_id = mlm_products.products_id')
    ->join('mlm_member', 'mlm_journal_sale_order_detail.member_id = mlm_member.member_id')
    ->get('mlm_journal_sale_order_item')
    ->result_array();
    return $query;
  }

	public function ConfirmPayment($id)
	{
    $input['accounting_status'] = 1;
		$this->db
		->where('accounting_source_id', $id)
		->update('mlm_accounting',$input);
	}

}
