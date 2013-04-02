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
        $partakings = Partakings::getAll();
        $data['partakings'] = $partakings[0];
        $data['banks'] = Banks::getAll();
        $data['title'] = "Cheque Management::Add New Cheque";
        $data['content_view'] = "add_cheque_v";
        $this -> base_params($data);
    }

    public function save() {
        $cheque_id = $this -> input -> post("cheque_id");
        $bank = $this -> input -> post("bank");
        $cheque_number = $this -> input -> post("cheque_number");
        $drawer = $this -> input -> post("drawer");
        $issued_to = $this -> input -> post("issued_to");
        $amount = $this -> input -> post("amount");
        $opening_balance = $this -> input -> post("opening_balance");

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
            $transaction -> Account_Affected_1 = "XXX";
            $transaction -> Transaction = "Cheque Payment towards " . $issued_to;
            $transaction -> Account_Affected_1_Amount = $amount;
            $transaction -> Account_Affected_1_Operation = "Debit";
            $transaction -> Account_Affected_2 = "Bank";
            $transaction -> Account_Affected_2_Amount = $amount;
            $transaction -> Account_Affected_2_Operation = "Credit";
            $transaction -> Ending_Balance = $opening_balance;
            $transaction -> save();

            $buffer = $opening_balance;
            $partakings = new Partakings();
            $partakings -> Transaction_Value = $buffer;
            $partakings -> Date = date('Y-m-d');
            $partakings -> save();
            redirect("cheque_management/listing");
        }//end else
    }//end save

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from cheques where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("cheque_management/listing", "refresh");
    }//end save

    public function edit_cheque($id) {
        $cheque = Cheques::getCheque($id);
        $data['cheque'] = $cheque[0];
        $data['title'] = "Cheque Management";
        $data['content_view'] = "add_cheque_v";
        $this -> base_params($data);
    }

    private function _validate_submission() {
        $this -> form_validation -> set_rules('bank', 'Bank', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
