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
        $data['title'] = "Balances Management::All Balances";
        $data['content_view'] = "balances_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['suppliers'] = Suppliers::getAll();
        $data['title'] = "Balance Management::Add New Balance";
        $data['content_view'] = "add_balance_v";
        $this -> base_params($data);
    }

    public function save() {
        $balance_id = $this -> input -> post("balance_id");
        $supplier = $this -> input -> post("supplier");
        $balance_due = $this -> input -> post("balance");
        $date_due = $this -> input -> post("date_due");

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

            $balance -> save();

            $transaction = new Transactions();

            $transaction -> Date = date("Y-m-d");
            $transaction -> Transaction = "Balance Accrual";
            $transaction -> Account_Affected_1 = "Utilities Expense";
            $transaction -> Account_Affected_1_Amount = $balance_due;
            $transaction -> Account_Affected_1_Operation = "Debit";
            $transaction -> Account_Affected_2 = "Accounts Payable";
            $transaction -> Account_Affected_2_Amount = $balance_due;
            $transaction -> Account_Affected_2_Operation = "Credit";
            $transaction -> save();

            redirect("balances_management/listing");
        }//end else
    }//end save

    public function pay_balance($id, $balance_due) {
        $this -> load -> database();
        $sql = 'UPDATE balances SET balance_due = 0 WHERE id =' . $id . ' ';
        $query = $this -> db -> query($sql);

        $transaction = new Transactions();

        $transaction -> Date = date("Y-m-d");
        $transaction -> Transaction = "Balance Payment";
        $transaction -> Account_Affected_1 = "Accounts Payable";
        $transaction -> Account_Affected_1_Amount = $balance_due;
        $transaction -> Account_Affected_1_Operation = "Debit";
        $transaction -> Account_Affected_2 = "Cash";
        $transaction -> Account_Affected_2_Amount = $balance_due;
        $transaction -> Account_Affected_2_Operation = "Credit";
        $transaction -> save();

        redirect("balances_management/listing", "refresh");
    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('balance', 'Balance Due', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function edit_balance($id) {
        $data['suppliers'] = Suppliers::getAll();
        $balance = Balances::getBalance($id);
        $data['balance'] = $balance[0];
        $data['title'] = "Balance Management";
        $data['content_view'] = "add_balance_v";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js", "jquery.ui.datepicker.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
