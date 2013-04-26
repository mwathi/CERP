<?php
class Cheque_Management extends Controller {
	function __construct() {
		parent::__construct();
	}//end constructor

	public function index() {
		$this -> listing();
	}//end index

	public function listing() {
		$data['cheques'] = Cheques::getAll();
		$data['title'] = "Cheque Management::All Cheques";
		$data['content_view'] = "cheques_v";
		$this -> base_params($data);
	}//end listing

	public function add() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$partakings = Partakings::getAll();
			$data['partakings'] = $partakings[0];
			$data['banks'] = Banks::getAll();

			//bank code
			$this -> load -> database();
			$registeredBanks = "SELECT bank,account_name FROM church_particulars";
			$query = $this -> db -> query($registeredBanks);
			$transaction = $query -> result();
			$data['registeredbanks'] = $transaction;

			$data['title'] = "Cheque Management::Add New Cheque";
			$data['content_view'] = "add_cheque_v";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	public function save() {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$cheque_id = $this -> input -> post("cheque_id");
			$bank = $this -> input -> post("bank");
			$cheque_number = $this -> input -> post("cheque_number");
			$drawer = $this -> input -> post("drawer");
			$issued_to = $this -> input -> post("issued_to");
			$amount = $this -> input -> post("amount");
			$opening_balance = $this -> input -> post("opening_balance");

			//new edit
			$bank_related_account_credited = $this -> input -> post("bank_related_account_credited");
			$account_balance = $this -> input -> post("account_balance");

			if (strlen($cheque_id) > 0) {
				$cheque = Cheques::getCheque($cheque_id);
				$cheque = $cheque[0];

			} else {
				$cheque = new Cheques();
			}

			$valid = $this -> _validate_submission();
			if ($valid == false) {
				$this -> listing();
			} else {
				$cheque -> Bank = $bank;
				$cheque -> Cheque_Number = $cheque_number;
				$cheque -> Drawer = $drawer;
				$cheque -> Issued_To = $issued_to;
				$cheque -> Amount = $amount;
				$cheque -> save();

				$transaction = new Transactions();
				$transaction -> Date = date("Y-m-d");
				$transaction -> Account_Affected_1 = "General Expense";
				$transaction -> Transaction = "Cheque Payment towards " . $issued_to;
				$transaction -> Account_Affected_1_Amount = $amount;
				$transaction -> Account_Affected_1_Operation = "Debit";
				$transaction -> Account_Affected_2 = $bank_related_account_credited;
				$transaction -> Account_Affected_2_Amount = $amount;
				$transaction -> Account_Affected_2_Operation = "Credit";
				$transaction -> Ending_Balance = $account_balance - $amount;
				$transaction -> save();

				$buffer = $account_balance - $amount;
				$this -> load -> database();
				$sqlupdatepartakings = "UPDATE partakings SET bank_account = '" . $bank_related_account_credited . "', 
										transaction_value = '" . $buffer . "', date ='" . date('Y-m-d') . "' WHERE bank_account =" . $bank_related_account_credited;
				$query = $this -> db -> query($sqlupdatepartakings);
				redirect("cheque_management/listing");
			}//end else
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function delete($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$this -> load -> database();
			$sql = 'delete from cheques where id =' . $id . ' ';
			$query = $this -> db -> query($sql);
			redirect("cheque_management/listing", "refresh");
		} else {
			$this -> load -> view('restricted_v');
		}
	}//end save

	public function edit_cheque($id) {
		if ($this -> session -> userdata('username') == 'dmwathi') {
			$cheque = Cheques::getCheque($id);
			$data['cheque'] = $cheque[0];
			$data['title'] = "Cheque Management";
			$data['content_view'] = "add_cheque_v";
			$this -> base_params($data);
		} else {
			$this -> load -> view('restricted_v');
		}
	}

	private function _validate_submission() {
		$this -> form_validation -> set_rules('bank', 'Bank', 'trim|required|min_length[1]');
		return $this -> form_validation -> run();
	}//end validate_submission

	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['username'] = $this -> session -> userdata('names');
		$this -> load -> view('template', $data);
	}//end base_params

}//end class
