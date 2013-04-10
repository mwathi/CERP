<?php
class Balances_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['balances'] = Balances::getAll();
        $partakings = Partakings::getAll();
        $data['partakings'] = $partakings[0];
        $data['title'] = "Balances Management::All Balances";
        $data['content_view'] = "balances_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $this -> load -> database();
        $sql = 'Select MAX(Transaction_Id) as Transaction_Id From Balances';
        $query = $this -> db -> query($sql);
        $transaction_id = $query -> result();
        $data['transaction_id'] = $transaction_id[0];
        $data['suppliers'] = Suppliers::getAll();
        $data['title'] = "Balance Management::Add New Balance";
        $data['content_view'] = "add_balance_v";
        $this -> base_params($data);
		}else{
			$this -> load -> view('restricted_v');
		}
    }

    public function save() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $balance_id = $this -> input -> post("balance_id");
        $supplier = $this -> input -> post("supplier");
        $balance_due = $this -> input -> post("balance");
        $date_due = $this -> input -> post("date_due");
        $transaction_id = $this -> input -> post("transaction_id");

        if (strlen($balance_id) > 0) {
            $balance = Balances::getBalance($balance_id);
            $balance = $balance[0];

        } else {
            $balance = new Balances();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {

            $balance -> Supplier = $supplier;
            $balance -> Balance_Due = $balance_due;
            $balance -> Date_Created = date('Y-m-d');
            $balance -> Date_Due = $date_due;
            $balance -> Transaction_Id = $transaction_id + 1;

            $balance -> save();

            $transaction = new Transactions();

            $transaction -> Date = date("Y-m-d");
            if($supplier == 1){
                $transaction -> Transaction = "Balance Accrual for Electricity";    
            }else if($supplier == 2){
                $transaction -> Transaction = "Balance Accrual for Water";
            }else{
                $transaction -> Transaction = "Balance Payment";
            }
            
            $transaction -> Account_Affected_1 = "Utilities Expense";
            $transaction -> Account_Affected_1_Amount = $balance_due;
            $transaction -> Account_Affected_1_Operation = "Debit";
            $transaction -> Account_Affected_2 = "Accounts Payable";
            $transaction -> Account_Affected_2_Amount = $balance_due;
            $transaction -> Account_Affected_2_Operation = "Credit";
            $transaction -> Transaction_Id = $transaction_id + 1;
            $transaction -> save();

            redirect("balances_management/listing");
        }//end else
        }else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function pay_balance($id, $balance_due, $partaking, $transaction_id, $supplier) {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $this -> load -> database();
        $sql = 'UPDATE balances SET balance_due = 0 WHERE id =' . $id . ' ';
        $query = $this -> db -> query($sql);

        $transaction = new Transactions();

        $transaction -> Date = date("Y-m-d");
        if($supplier == 1){
            $transaction -> Transaction = "Balance Payment for Electricity";
        }else if($supplier == 2){
            $transaction -> Transaction = "Balance Payment for Water";
        }else{
            $transaction -> Transaction = "Balance Payment for";    
        }
        
        $transaction -> Account_Affected_1 = "Accounts Payable";
        $transaction -> Account_Affected_1_Amount = $balance_due;
        $transaction -> Account_Affected_1_Operation = "Debit";
        $transaction -> Account_Affected_2 = "Cash";
        $transaction -> Account_Affected_2_Amount = $balance_due;
        $transaction -> Account_Affected_2_Operation = "Credit";
        $transaction -> Ending_Balance = ($partaking - $balance_due);
        $transaction -> Identifier = 1;
        $transaction -> Transaction_Id = $transaction_id;
        $transaction -> save();

        $buffer = $partaking - $balance_due;
        $partakings = new Partakings();
        $partakings -> Transaction_Value = $buffer;
        $partakings -> Date = date('Y-m-d');
        $partakings -> save();

        redirect("balances_management/listing", "refresh");
        }else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('balance', 'Balance Due', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function edit_balance($id) {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $data['suppliers'] = Suppliers::getAll();
        $balance = Balances::getBalance($id);
        $data['balance'] = $balance[0];
        $data['title'] = "Balance Management";
        $data['content_view'] = "add_balance_v";
        $this -> base_params($data);
		}else{
			$this -> load -> view('restricted_v');
		}
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js", "jquery.ui.datepicker.js");
		$data['username'] = $this -> session -> userdata('names');
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
