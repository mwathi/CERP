<?php
class Church_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['church'] = Church_Particulars::getAll();
        $data['title'] = "Church Particulars::All Information";
        $data['content_view'] = "church_particulars_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['banks'] = Banks::getAll();
        $data['title'] = "Church Particulars::Add More Information";
        $data['quick_link'] = "new_particulars";
        $data['content_view'] = "add_church_particulars_v";
        $this -> base_params($data);
    }

    public function save() {
        $church_id = $this -> input -> post("church_id");    
        $church_name = $this -> input -> post("church_name");
        $bank = $this -> input -> post("bank");
        $account_number = $this -> input -> post("account_number");
        $opening_balance = $this -> input -> post("opening_balance");
        $opening_balance_date = $this -> input -> post("opening_balance_date");        

        if (strlen($church_id) > 0) {
            $church = Church_Particulars::getChurch($church_id);
            $church = $church[0];

        } else {
            $church = new Church_Particulars();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {
            $church -> Church_Name = $church_name;       
            $church -> Bank = $bank;
            $church -> Account_Number = $account_number;
            $church -> Opening_Balance = $opening_balance;
            $church -> Opening_Balance_Date = $opening_balance_date; 

            $church -> save();
            
            $partakings = new Partakings();
            $partakings -> Transaction_Value = $opening_balance;
            $partakings -> Date = date('Y-m-d');
            
            $partakings -> save();
            
            redirect("church_management/listing");
        }//end else
    }//end save

    private function _validate_submission() {
        $this -> form_validation -> set_rules('church_name', 'Church Name', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function delete($id) {
        $this -> load -> database();
        $sql = 'DELETE FROM church_particulars WHERE id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("church_management/listing", "refresh");
    }//end save

    public function edit_church($id) {
        $data['banks'] = Banks::getAll();
        $church = Church_Particulars::getChurch($id);
        $data['church'] = $church[0];
        $data['title'] = "Church Particulars";
        $data['content_view'] = "add_church_particulars_v";
        $data['quick_link'] = "new_church";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js", "jquery.ui.datepicker.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
