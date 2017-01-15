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
    ->get('mlm_shop_detail')
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
    ->get('mlm_shop_detail')
    ->result_array();
    $i=0;
    foreach ($query as $row) {
      $item = $this->db
      ->select_sum('shop_items_price')
      ->where('shop_detail_id', $row['shop_detail_id'])->get('mlm_shop_items')->result_array();
      $itemQ = $this->db
      // ->select_sum('shop_items_price')
      ->where('shop_detail_id', $row['shop_detail_id'])->get('mlm_shop_items')->num_rows();
      $query[$i]['shop_detail_total_quantity'] = $itemQ;
      $query[$i]['shop_detail_total_price'] = $item[0]['shop_items_price'];
      $i++;
    }
    return $query;
  }
  public function InvoiceDetail($id)
  {
    $query = $this->db
    ->where('mlm_shop_items.shop_detail_id', $id)
    ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
    ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
    ->get('mlm_shop_items')
    ->result_array();
    return $query;

  }
  public function CancelInvoice($id)
  {
    $input['shop_detail_status'] = 0;
    $query = $this->db
    ->where('shop_detail_id', $id)
    ->update('mlm_shop_detail', $input);
  }

  public function SaleOrderList()
  {
    $query = $this->db
    ->get('mlm_shop_detail')
    ->result_array();
    $i=0;
    foreach ($query as $row) {
      $item = $this->db
      ->select_sum('shop_items_price')
      ->where('shop_detail_id', $row['shop_detail_id'])->get('mlm_shop_items')->result_array();
      $itemQ = $this->db
      // ->select_sum('shop_items_price')
      ->where('shop_detail_id', $row['shop_detail_id'])->get('mlm_shop_items')->num_rows();
      $query[$i]['shop_detail_total_quantity'] = $itemQ;
      $query[$i]['shop_detail_total_price'] = $item[0]['shop_items_price'];
      $i++;
    }
    return $query;
  }
  public function SaleOrderHistory($for_date,$to_date)
  {
    $ProductsList = $this->ProductsList();
    $ProductsList = json_decode(json_encode($ProductsList), true);
//


    // if ($for_date!='' && $to_date!='') {
    //   $query = $this->db
    //   ->where('receive_date >=', $for_date)
    //   ->where('receive_date <=', $to_date)
    //   ->where('mlm_shop_items.products_id', $row['products_id'])
    //   ->where('shop_detail_status', 1)
    //   ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
    //   ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
    //   ->get('mlm_shop_items')
    //   ->result_array();
    // }elseif ($for_date!='' && $to_date=='') {
    //   $query = $this->db
    //   ->where('receive_date >=', $for_date)
    //   ->where('mlm_shop_items.products_id', $row['products_id'])
    //   ->where('shop_detail_status', 1)
    //   ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
    //   ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
    //   ->get('mlm_shop_items')
    //   ->result_array();
    // }elseif ($for_date=='' && $to_date!='') {
    //   $query = $this->db
    //   ->where('receive_date <=', $to_date)
    //   ->where('mlm_shop_items.products_id', $row['products_id'])
    //   ->where('shop_detail_status', 1)
    //   ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
    //   ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
    //   ->get('mlm_shop_items')
    //   ->result_array();
    // }elseif ($for_date=='' && $to_date=='') {
    //   $query = $this->db
    //   ->where('mlm_shop_items.products_id', $row['products_id'])
    //   ->where('shop_detail_status', 1)
    //   ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
    //   ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
    //   ->get('mlm_shop_items')
    //   ->result_array();
    // }

//
    $i=0;
    foreach ($ProductsList as $row) {
      if ($for_date!='' && $to_date!='') {
        $query = $this->db
        ->where('shop_detail_date >=', $for_date)
        ->where('shop_detail_date <=', $to_date)
        ->where('mlm_shop_items.products_id', $row['products_id'])
        ->where('shop_detail_status', 1)
        ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
        ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
        ->get('mlm_shop_items')
        ->result_array();
      }elseif ($for_date!='' && $to_date=='') {
        $query = $this->db
        ->where('shop_detail_date >=', $for_date)
        ->where('mlm_shop_items.products_id', $row['products_id'])
        ->where('shop_detail_status', 1)
        ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
        ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
        ->get('mlm_shop_items')
        ->result_array();
      }elseif ($for_date=='' && $to_date!='') {
        $query = $this->db
        ->where('shop_detail_date <=', $to_date)
        ->where('mlm_shop_items.products_id', $row['products_id'])
        ->where('shop_detail_status', 1)
        ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
        ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
        ->get('mlm_shop_items')
        ->result_array();
      }elseif ($for_date=='' && $to_date=='') {
        $query = $this->db
        ->where('mlm_shop_items.products_id', $row['products_id'])
        ->where('shop_detail_status', 1)
        ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
        ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
        ->get('mlm_shop_items')
        ->result_array();
      }
      // $query = $this->db
      // ->where('mlm_shop_items.products_id', $row['products_id'])
      // ->where('shop_detail_status', 1)
      // ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
      // ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
      // ->get('mlm_shop_items')
      // ->result_array();

      $ProductsList[$i]['shop_total_price'] = 0;
      $ProductsList[$i]['shop_total_quantity'] = 0;
      foreach ($query as $sale_row) {
        $ProductsList[$i]['shop_total_price'] += $sale_row['shop_items_price'];
        $ProductsList[$i]['shop_total_quantity'] += $sale_row['shop_items_quantity'];
      }
      $i++;
    }
    // $this->debuger->prevalue($ProductsList);

    return $ProductsList;
  }
  public function SaleOrderDetail($id)
  {
    $query = $this->db
    ->where('mlm_shop_items.shop_detail_id', $id)
    ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
    ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
    ->get('mlm_shop_items')
    ->result_array();
    return $query;
  }

  public function SaleOrderResult($id)
  {
    $query = $this->db
    ->where('mlm_shop_items.shop_detail_id', $id)
    ->join('mlm_shop_detail', 'mlm_shop_items.shop_detail_id = mlm_shop_detail.shop_detail_id')
    ->join('mlm_products', 'mlm_shop_items.products_id = mlm_products.products_id')
    ->join('mlm_member', 'mlm_shop_detail.member_id = mlm_member.member_id')
    ->get('mlm_shop_items')
    ->result_array();
    return $query;
  }

	public function ConfirmPayment($id)
	{
		$input['shop_detail_status'] = 1;
		$this->db
		->where('shop_detail_id', $id)
		->update('mlm_shop_detail',$input);
	}

}
