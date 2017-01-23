
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
			$input =  $this->post('account_id');
			// print_r($input);
			$AccountDetailExtend = $this->AccountModel->HistoryAccount($input);
			$this->response($AccountDetailExtend);
	  }
		public function AddAccountDetailExtend_post()
	  {
			$input = $this->post();
			$time =  Date('Y-m-d');
	    $expired = strtotime($time);
	    $expired = strtotime("+365 day", $expired);
	    $expired =  Date('Y-m-d', $expired);
	    $NewAccountHistory = array(
	      'account_id' => $input['member_id'],
	      'account_history_register_date' => $time,
	      'account_history_expired_date' => $expired,
	    );

			$this->db->get_where();

			$data = array(
				'journals_id' => 2,
				'accounting_amount' => 150,
				'accounting_tax' => 0,
				'member_id' => $input['member_id'],
				'accounting_source_id' => ,
				'accounting_date' => ,
				'accounting_no' => ,
				'accounting_system_note' => ,
			);
	    $this->AccountModel->SaveAccountHistory($NewAccountHistory);
			$this->AccountModel->AddAccounting($data);
	  }
}
