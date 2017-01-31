
<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';
class MemberService extends REST_Controller
{
	public function AddBookBank_post()
  {
		$input =  $this->post();
		print_r($input);
    $this->db->insert('mlm_bookbank', $input);
    //redirect($this->agent->referrer(), 'refresh');
  }
	function ListBookBank_post()
		{
			$id = $this->post('id');

			$ListBookBank = $this->AccountModel->BookbankList($id);
			$ListBookBank = json_decode(json_encode($ListBookBank),true);
			$index = 0;
			foreach ($ListBookBank as $row) {
				$returnQuery = $this->AccountModel->BookbankUseCount($row['bookbank_id']);
				$returnQuery = json_decode(json_encode($returnQuery),true);
				$ListBookBank[$index]['UseCount'] = $returnQuery;
				$index++;
			}
			$this->response($ListBookBank);
		}

		public function DeleteBookBank_post()
	  {
			$input =  $this->post();
			// print_r($input);
			$this->AccountModel->DeleteBookbank($input);
	  }

		public function DisableBookBank_post()
	  {
			$input =  $this->post();
			// print_r($input);
			$this->AccountModel->DisableBookbank($input);
	  }
		public function AccountDetailExtend_post()
	  {
			$input =  $this->post();
			//print_r($input);
			$AccountDetailExtend = $this->AccountModel->JounalExtendAccount($input['account_id']);
			$this->response($AccountDetailExtend);
	  }
		public function AddAccountDetailExtend_post()
	  {
			//$input = $this->post();
			$time =  Date('Y-m-d');
	    $expired = strtotime($time);
	    $expired = strtotime("+365 day", $expired);
	    $expired =  Date('Y-m-d', $expired);
			$now = DateTime::createFromFormat('U.u', microtime(true));
			$now = $now->format("Hisu");
			$code = "DR".$now;

			$query = $this->db->where('setting_id', 1)->get('mlm_fee_setting')->result_array();

			$maxJounalExtendId = $this->AccountModel->JounalExtendAccountAll();
			$maxJounalExtendId = $maxJounalExtendId+1;

	    $NewAccountHistory = array(
	      'account_id' => $input['account_id'],
	      'journal_extend_start_date' => $time,
	      'journal_extend_expired_date' => $expired,
				'journal_extend_amount' => $query[0]['setting_extend_fee'],
				'member_id' => $input['member_id'],
				'journal_extend_code' => "EX".sprintf("%05d", $maxJounalExtendId),
	    );
			$this->AccountModel->SaveAccountHistory($NewAccountHistory);
			$returnAccounting_id = $this->db->insert_id();

			$data = array(
				'accounting_date' => $time,
				'accounting_no' => $code,
				'accounting_source_id' => $returnAccounting_id,
				'accounting_tax' => 0,
				'journals_id' => 1,
			);
			$this->AccountModel->AddAccounting($data);

			$AccountDetailExtend = $this->AccountModel->JounalExtendAccount($input['account_id']);
			$this->response($AccountDetailExtend);
	  }
		public function AccountDetailUpclass_post()
	  {
			$input =  $this->post();
			$AccountDetailUpclass = $this->AccountModel->AccountDetailUpclass($input['account_id']);
			//print_r($AccountDetailUpclass);
			$this->response($AccountDetailUpclass);
		}
		public function AddAccountDetailUpclass_post()
	  {
			$input =  $this->post();
			$MyAccountClass = json_decode(json_encode($this->AccountModel->AccountByID( $input['account_id'] )), true);

			$next_account_class_id = $MyAccountClass[0]['account_class_id']+1;
	    $NextClass = array();
	    if ($next_account_class_id!=7) {
	      $NextClass = $this->AccountModel->NextClass($next_account_class_id);
	    }

			$time =  Date('Y-m-d');
			$value = array(
				'point_value' => $NextClass[0]['account_class_pv'],
				'point_detail' => 'ยกระดับ',
				'point_date' => $time,
				'point_type' => 0,
				'member_id' => $input['member_id'],
				'account_id' => $input['account_id'],
			);
			$this->AccountModel->AddAccountDetailUpclass($value);
			//print_r($AccountDetailUpclass);
			$AccountDetailUpclass = $this->AccountModel->AccountDetailUpclass($input['account_id']);

			$updateValue = array(
				'account_id' => $input['account_id'],
				'account_class_id' => $next_account_class_id,
			);
			$this->AccountModel->UpdateAccountClass($updateValue);
			
			$this->response($AccountDetailUpclass);
		}

}
