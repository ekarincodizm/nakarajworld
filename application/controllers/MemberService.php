
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
			// echo $id;
			$ListBookBank = $this->AccountModel->BookbankList($id);
			// print_r($GetMemberProfile);
			$this->response($ListBookBank);
		}

		public function DeleteBookBank_post()
	  {
			$input =  $this->post();
			// print_r($input);
			$this->AccountModel->DeleteBookbank($input);
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
			$query = $this->db->where('setting_id', 1)->get('mlm_fee_setting')->result_array();

			$data = array(
				'accounting_date' => $time,
				'accounting_no' => 0,
				'accounting_source_id' => $input['account_id'],
				'accounting_tax' => 0,
				'journals_id' => 2,
			);


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
				'accounting_no' => 0,
				'accounting_source_id' => $returnAccounting_id,
				'accounting_tax' => 0,
				'journals_id' => 2,
			);
			$this->AccountModel->AddAccounting($data);

			$AccountDetailExtend = $this->AccountModel->JounalExtendAccount($input['account_id']);
			$this->response($AccountDetailExtend);
	  }
}
